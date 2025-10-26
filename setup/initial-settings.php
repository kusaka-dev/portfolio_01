<?php
/**
 * WordPress初期設定スクリプト
 *
 * フロントページ、パーマリンク設定など、テーマに必要な初期設定を行います。
 *
 * 実行方法:
 * wp eval-file setup/initial-settings.php
 */

if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) {
	echo "このスクリプトはWP-CLI経由でのみ実行できます。\n";
	exit( 1 );
}

WP_CLI::log( 'WordPress初期設定を開始します...' );
WP_CLI::log( '' );

// ========================================
// 1. パーマリンク設定
// ========================================
WP_CLI::log( '1. パーマリンク設定' );

$current_permalink_structure = get_option( 'permalink_structure' );

if ( $current_permalink_structure === '/%postname%/' ) {
	WP_CLI::warning( '  スキップ: パーマリンクは既に「投稿名」に設定されています' );
} else {
	update_option( 'permalink_structure', '/%postname%/' );
	WP_CLI::success( '  完了: パーマリンクを「投稿名」に設定しました' );
}

// パーマリンク構造を反映
flush_rewrite_rules();
WP_CLI::log( '  リライトルールをフラッシュしました' );
WP_CLI::log( '' );

// ========================================
// 2. フロントページ設定
// ========================================
WP_CLI::log( '2. フロントページ設定' );

// フロントページを固定ページに設定
$show_on_front = get_option( 'show_on_front' );

if ( $show_on_front === 'page' ) {
	$page_on_front = get_option( 'page_on_front' );
	WP_CLI::warning( '  スキップ: フロントページは既に固定ページに設定されています (ID: ' . $page_on_front . ')' );
} else {
	// 「Home」という固定ページを探す（なければスキップ）
	$home_page = get_page_by_title( 'Home' );
	if ( $home_page ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home_page->ID );
		WP_CLI::success( '  完了: フロントページを「Home」ページ (ID: ' . $home_page->ID . ') に設定しました' );
	} else {
		WP_CLI::log( '  情報: 「Home」ページが存在しないため、フロントページの設定をスキップしました' );
		WP_CLI::log( '  ※ 必要に応じて管理画面から設定してください' );
	}
}
WP_CLI::log( '' );

// ========================================
// 3. タイムゾーン設定
// ========================================
WP_CLI::log( '3. タイムゾーン設定' );

$current_timezone = get_option( 'timezone_string' );

if ( $current_timezone === 'Asia/Tokyo' ) {
	WP_CLI::warning( '  スキップ: タイムゾーンは既に「Asia/Tokyo」に設定されています' );
} else {
	update_option( 'timezone_string', 'Asia/Tokyo' );
	WP_CLI::success( '  完了: タイムゾーンを「Asia/Tokyo」に設定しました' );
}
WP_CLI::log( '' );

// ========================================
// 4. 日付・時刻フォーマット
// ========================================
WP_CLI::log( '4. 日付・時刻フォーマット設定' );

$date_format = get_option( 'date_format' );
$time_format = get_option( 'time_format' );

if ( $date_format === 'Y年n月j日' && $time_format === 'H:i' ) {
	WP_CLI::warning( '  スキップ: 日付・時刻フォーマットは既に設定されています' );
} else {
	update_option( 'date_format', 'Y年n月j日' );
	update_option( 'time_format', 'H:i' );
	WP_CLI::success( '  完了: 日付フォーマットを「Y年n月j日」、時刻フォーマットを「H:i」に設定しました' );
}
WP_CLI::log( '' );

// ========================================
// 完了メッセージ
// ========================================
WP_CLI::log( '========================================' );
WP_CLI::success( 'WordPress初期設定が完了しました！' );
WP_CLI::log( '========================================' );
WP_CLI::log( '' );
WP_CLI::log( '次のステップ:' );
WP_CLI::log( '1. 管理画面にログインして設定を確認してください' );
WP_CLI::log( '2. 必要に応じて追加の設定を行ってください' );
WP_CLI::log( '3. テーマのカスタマイズを開始してください' );
