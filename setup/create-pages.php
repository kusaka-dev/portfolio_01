<?php
/**
 * 固定ページ作成スクリプト
 *
 * テーマに必要な固定ページを一括作成します。
 *
 * 実行方法:
 * wp eval-file setup/create-pages.php
 */

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	echo "このスクリプトはWP-CLI経由でのみ実行できます。\n";
	exit( 1 );
}

/**
 * 作成する固定ページの定義
 */
$pages = [
	[
		'post_title'   => '会社概要',
		'post_name'    => 'company',
		'post_content' => '<!-- wp:paragraph -->
<p>会社概要ページです。</p>
<!-- /wp:paragraph -->',
		'menu_order'   => 1,
	],
	[
		'post_title'   => '事業内容',
		'post_name'    => 'service',
		'post_content' => '<!-- wp:paragraph -->
<p>事業内容ページです。</p>
<!-- /wp:paragraph -->',
		'menu_order'   => 2,
	],
	[
		'post_title'   => '採用情報',
		'post_name'    => 'recruit',
		'post_content' => '<!-- wp:paragraph -->
<p>採用情報ページです。</p>
<!-- /wp:paragraph -->',
		'menu_order'   => 3,
	],
	[
		'post_title'   => '建築設計スタッフ募集',
		'post_name'    => 'job1',
		'post_content' => '<!-- wp:paragraph -->
<p>建築設計スタッフの求人詳細ページです。</p>
<!-- /wp:paragraph -->',
		'menu_order'   => 4,
		'post_parent'  => 'recruit', // 親ページのスラッグ
	],
	[
		'post_title'   => 'インテリアデザイナー募集',
		'post_name'    => 'job2',
		'post_content' => '<!-- wp:paragraph -->
<p>インテリアデザイナーの求人詳細ページです。</p>
<!-- /wp:paragraph -->',
		'menu_order'   => 5,
		'post_parent'  => 'recruit',
	],
	[
		'post_title'   => 'CADオペレーター募集',
		'post_name'    => 'job3',
		'post_content' => '<!-- wp:paragraph -->
<p>CADオペレーターの求人詳細ページです。</p>
<!-- /wp:paragraph -->',
		'menu_order'   => 6,
		'post_parent'  => 'recruit',
	],
	[
		'post_title'   => 'お問い合わせ',
		'post_name'    => 'contact',
		'post_content' => '<!-- wp:paragraph -->
<p>お問い合わせページです。</p>
<!-- /wp:paragraph -->',
		'menu_order'   => 7,
	],
	[
		'post_title'   => 'プライバシーポリシー',
		'post_name'    => 'privacy-policy',
		'post_content' => '<!-- wp:paragraph -->
<p>プライバシーポリシーページです。</p>
<!-- /wp:paragraph -->',
		'menu_order'   => 8,
	],
];

WP_CLI::log( '固定ページの作成を開始します...' );
WP_CLI::log( '' );

$created_count = 0;
$skipped_count = 0;
$parent_pages = []; // 親ページIDを保存

foreach ( $pages as $page_data ) {
	$post_name = $page_data['post_name'];

	// 既存ページの確認
	$existing_page = get_page_by_path( $post_name, OBJECT, 'page' );

	if ( $existing_page ) {
		WP_CLI::warning( "スキップ: 「{$page_data['post_title']}」は既に存在します (ID: {$existing_page->ID})" );
		// 親ページとして使用される可能性があるので保存
		$parent_pages[ $post_name ] = $existing_page->ID;
		$skipped_count++;
		continue;
	}

	// 親ページIDの解決
	$post_parent = 0;
	if ( isset( $page_data['post_parent'] ) ) {
		$parent_slug = $page_data['post_parent'];
		if ( isset( $parent_pages[ $parent_slug ] ) ) {
			$post_parent = $parent_pages[ $parent_slug ];
		} else {
			// 親ページを検索
			$parent_page = get_page_by_path( $parent_slug, OBJECT, 'page' );
			if ( $parent_page ) {
				$post_parent = $parent_page->ID;
				$parent_pages[ $parent_slug ] = $parent_page->ID;
			}
		}
	}

	// ページ作成
	$post_id = wp_insert_post( [
		'post_type'    => 'page',
		'post_title'   => $page_data['post_title'],
		'post_name'    => $post_name,
		'post_content' => $page_data['post_content'],
		'post_status'  => 'publish',
		'menu_order'   => $page_data['menu_order'],
		'post_parent'  => $post_parent,
	] );

	if ( is_wp_error( $post_id ) ) {
		WP_CLI::error( "エラー: 「{$page_data['post_title']}」の作成に失敗しました - {$post_id->get_error_message()}" );
		continue;
	}

	// 親ページとして使用される可能性があるので保存
	$parent_pages[ $post_name ] = $post_id;

	$parent_info = $post_parent ? " (親: ID {$post_parent})" : '';
	WP_CLI::success( "作成: 「{$page_data['post_title']}」(ID: {$post_id}){$parent_info}" );
	$created_count++;
}

WP_CLI::log( '' );
WP_CLI::log( '========================================' );
WP_CLI::success( "完了: {$created_count}ページを作成しました。" );
if ( $skipped_count > 0 ) {
	WP_CLI::log( "スキップ: {$skipped_count}ページ（既に存在）" );
}
WP_CLI::log( '========================================' );
