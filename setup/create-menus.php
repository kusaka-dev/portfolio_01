<?php
/**
 * ナビゲーションメニュー作成スクリプト
 *
 * テーマに必要なメニューとメニュー項目を一括作成・登録します。
 *
 * 実行方法:
 * wp eval-file setup/create-menus.php
 */

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	echo "このスクリプトはWP-CLI経由でのみ実行できます。\n";
	exit( 1 );
}

/**
 * メニュー定義
 */
$menus = [
	'header-menu' => [
		'name'        => 'ヘッダーメニュー',
		'location'    => 'global',
		'description' => 'サイトヘッダーに表示されるメインナビゲーション',
		'items'       => [
			[
				'title' => 'トップ',
				'url'   => home_url( '/' ),
				'type'  => 'custom',
			],
			[
				'title' => '会社概要',
				'slug'  => 'company',
				'type'  => 'page',
			],
			[
				'title' => '事業内容',
				'slug'  => 'service',
				'type'  => 'page',
			],
			[
				'title' => '実績紹介',
				'url'   => home_url( '/works/' ),
				'type'  => 'custom',
			],
			[
				'title' => '採用情報',
				'slug'  => 'recruit',
				'type'  => 'page',
			],
			[
				'title' => 'お問い合わせ',
				'slug'  => 'contact',
				'type'  => 'page',
			],
		],
	],
	'footer-menu' => [
		'name'        => 'フッターメニュー',
		'location'    => 'footer',
		'description' => 'サイトフッターに表示されるメニュー',
		'items'       => [
			[
				'title' => '会社概要',
				'slug'  => 'company',
				'type'  => 'page',
			],
			[
				'title' => '事業内容',
				'slug'  => 'service',
				'type'  => 'page',
			],
			[
				'title' => '実績紹介',
				'url'   => home_url( '/works/' ),
				'type'  => 'custom',
			],
			[
				'title' => 'お知らせ',
				'url'   => home_url( '/news/' ),
				'type'  => 'custom',
			],
			[
				'title' => '採用情報',
				'slug'  => 'recruit',
				'type'  => 'page',
			],
			[
				'title' => 'お問い合わせ',
				'slug'  => 'contact',
				'type'  => 'page',
			],
			[
				'title' => 'プライバシーポリシー',
				'slug'  => 'privacy-policy',
				'type'  => 'page',
			],
		],
	],
	'drawer-menu' => [
		'name'        => 'ドロワーメニュー',
		'location'    => 'drawer',
		'description' => 'モバイル用ドロワーメニュー',
		'items'       => [
			[
				'title' => 'トップ',
				'url'   => home_url( '/' ),
				'type'  => 'custom',
			],
			[
				'title' => '会社概要',
				'slug'  => 'company',
				'type'  => 'page',
			],
			[
				'title' => '事業内容',
				'slug'  => 'service',
				'type'  => 'page',
			],
			[
				'title' => '実績紹介',
				'url'   => home_url( '/works/' ),
				'type'  => 'custom',
			],
			[
				'title' => '採用情報',
				'slug'  => 'recruit',
				'type'  => 'page',
			],
			[
				'title' => 'お問い合わせ',
				'slug'  => 'contact',
				'type'  => 'page',
			],
		],
	],
];

WP_CLI::log( 'ナビゲーションメニューの作成を開始します...' );
WP_CLI::log( '' );

$created_menus = 0;
$created_items = 0;
$skipped_menus = 0;

foreach ( $menus as $menu_slug => $menu_data ) {
	WP_CLI::log( "処理中: {$menu_data['name']}" );

	// メニューの存在確認
	$menu_exists = wp_get_nav_menu_object( $menu_data['name'] );

	if ( $menu_exists ) {
		WP_CLI::warning( "  スキップ: メニュー「{$menu_data['name']}」は既に存在します (ID: {$menu_exists->term_id})" );
		$menu_id = $menu_exists->term_id;
		$skipped_menus++;
	} else {
		// メニュー作成
		$menu_id = wp_create_nav_menu( $menu_data['name'] );

		if ( is_wp_error( $menu_id ) ) {
			WP_CLI::error( "  エラー: メニュー「{$menu_data['name']}」の作成に失敗しました - {$menu_id->get_error_message()}" );
			continue;
		}

		WP_CLI::success( "  作成: メニュー「{$menu_data['name']}」(ID: {$menu_id})" );
		$created_menus++;
	}

	// メニュー位置に割り当て
	$locations = get_theme_mod( 'nav_menu_locations' );
	if ( ! is_array( $locations ) ) {
		$locations = [];
	}
	$locations[ $menu_data['location'] ] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
	WP_CLI::log( "  割り当て: メニュー位置「{$menu_data['location']}」に設定" );

	// メニューアイテムの追加
	$menu_order = 0;
	foreach ( $menu_data['items'] as $item_data ) {
		$menu_order++;

		// メニューアイテムの設定
		$menu_item_args = [
			'menu-item-title'    => $item_data['title'],
			'menu-item-status'   => 'publish',
			'menu-item-position' => $menu_order,
		];

		if ( $item_data['type'] === 'page' ) {
			// 固定ページの場合
			$page = get_page_by_path( $item_data['slug'], OBJECT, 'page' );
			if ( ! $page ) {
				WP_CLI::warning( "    スキップ: ページ「{$item_data['slug']}」が見つかりません" );
				continue;
			}
			$menu_item_args['menu-item-object-id'] = $page->ID;
			$menu_item_args['menu-item-object']    = 'page';
			$menu_item_args['menu-item-type']      = 'post_type';
		} else {
			// カスタムURLの場合
			$menu_item_args['menu-item-url']  = $item_data['url'];
			$menu_item_args['menu-item-type'] = 'custom';
		}

		$item_id = wp_update_nav_menu_item( $menu_id, 0, $menu_item_args );

		if ( is_wp_error( $item_id ) ) {
			WP_CLI::warning( "    エラー: 「{$item_data['title']}」の追加に失敗しました - {$item_id->get_error_message()}" );
			continue;
		}

		WP_CLI::log( "    追加: 「{$item_data['title']}」" );
		$created_items++;
	}

	WP_CLI::log( '' );
}

WP_CLI::log( '========================================' );
WP_CLI::success( "完了: {$created_menus}個のメニューを作成し、{$created_items}個のメニュー項目を追加しました。" );
if ( $skipped_menus > 0 ) {
	WP_CLI::log( "スキップ: {$skipped_menus}個のメニュー（既に存在）" );
}
WP_CLI::log( '========================================' );
