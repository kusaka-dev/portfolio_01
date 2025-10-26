<?php
/**
 * セットアップリセットスクリプト
 *
 * セットアップスクリプトで作成したページやメニューを削除します。
 * ※注意: このスクリプトは開発環境でのみ使用してください
 *
 * 実行方法:
 * wp eval-file setup/reset.php
 */

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	echo "このスクリプトはWP-CLI経由でのみ実行できます。\n";
	exit( 1 );
}

WP_CLI::log( '========================================' );
WP_CLI::log( 'セットアップリセットを開始します' );
WP_CLI::log( '========================================' );
WP_CLI::log( '' );
WP_CLI::warning( '注意: このスクリプトは作成したページとメニューを削除します。' );
WP_CLI::log( '' );

// 確認プロンプト（CLI実行時は自動でYesとして扱う）
WP_CLI::log( '続行しますか？ (このスクリプトは確認なしで実行されます)' );
WP_CLI::log( '' );

// ========================================
// 1. 固定ページの削除
// ========================================
WP_CLI::log( '1. 固定ページの削除' );

$pages_to_delete = [
	'company',
	'service',
	'recruit',
	'job1',
	'job2',
	'job3',
	'contact',
	'privacy-policy',
];

$deleted_pages = 0;
$not_found_pages = 0;

foreach ( $pages_to_delete as $page_slug ) {
	$page = get_page_by_path( $page_slug, OBJECT, 'page' );

	if ( $page ) {
		$result = wp_delete_post( $page->ID, true ); // 完全削除（ゴミ箱に入れない）

		if ( $result ) {
			WP_CLI::success( "  削除: 「{$page->post_title}」(ID: {$page->ID})" );
			$deleted_pages++;
		} else {
			WP_CLI::error( "  エラー: 「{$page->post_title}」の削除に失敗しました" );
		}
	} else {
		WP_CLI::log( "  スキップ: 「{$page_slug}」ページが見つかりません" );
		$not_found_pages++;
	}
}

WP_CLI::log( '' );
WP_CLI::log( "  削除: {$deleted_pages}ページ" );
if ( $not_found_pages > 0 ) {
	WP_CLI::log( "  スキップ: {$not_found_pages}ページ（見つかりません）" );
}
WP_CLI::log( '' );

// ========================================
// 2. メニューの削除
// ========================================
WP_CLI::log( '2. メニューの削除' );

$menus_to_delete = [
	'ヘッダーメニュー',
	'ユーティリティメニュー',
	'ドロワーメニュー',
];

$deleted_menus = 0;
$not_found_menus = 0;

foreach ( $menus_to_delete as $menu_name ) {
	$menu = wp_get_nav_menu_object( $menu_name );

	if ( $menu ) {
		$result = wp_delete_nav_menu( $menu->term_id );

		if ( $result && ! is_wp_error( $result ) ) {
			WP_CLI::success( "  削除: 「{$menu_name}」(ID: {$menu->term_id})" );
			$deleted_menus++;
		} else {
			$error_message = is_wp_error( $result ) ? $result->get_error_message() : '不明なエラー';
			WP_CLI::error( "  エラー: 「{$menu_name}」の削除に失敗しました - {$error_message}" );
		}
	} else {
		WP_CLI::log( "  スキップ: 「{$menu_name}」メニューが見つかりません" );
		$not_found_menus++;
	}
}

WP_CLI::log( '' );
WP_CLI::log( "  削除: {$deleted_menus}個のメニュー" );
if ( $not_found_menus > 0 ) {
	WP_CLI::log( "  スキップ: {$not_found_menus}個のメニュー（見つかりません）" );
}
WP_CLI::log( '' );

// ========================================
// 3. メニュー位置の割り当て解除
// ========================================
WP_CLI::log( '3. メニュー位置の割り当て解除' );

$locations = get_theme_mod( 'nav_menu_locations' );

if ( is_array( $locations ) && ! empty( $locations ) ) {
	set_theme_mod( 'nav_menu_locations', [] );
	WP_CLI::success( '  完了: すべてのメニュー位置の割り当てを解除しました' );
} else {
	WP_CLI::log( '  スキップ: メニュー位置に割り当てられているメニューはありません' );
}
WP_CLI::log( '' );

// ========================================
// 完了メッセージ
// ========================================
WP_CLI::log( '========================================' );
WP_CLI::success( 'リセットが完了しました！' );
WP_CLI::log( '========================================' );
WP_CLI::log( '' );
WP_CLI::log( '削除した内容:' );
WP_CLI::log( "  - 固定ページ: {$deleted_pages}ページ" );
WP_CLI::log( "  - メニュー: {$deleted_menus}個" );
WP_CLI::log( '' );
WP_CLI::log( '※ セットアップを再実行する場合は、以下のコマンドを順番に実行してください:' );
WP_CLI::log( '  1. wp eval-file setup/create-pages.php' );
WP_CLI::log( '  2. wp eval-file setup/create-menus.php' );
WP_CLI::log( '  3. wp eval-file setup/initial-settings.php' );
