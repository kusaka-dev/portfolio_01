<?php
/**
 * Takumi Theme Functions
 * テーマのメイン機能ファイル
 */

// ========================================
// テーマ基本設定
// ========================================

/**
 * テーマの基本機能を有効化
 * アイキャッチ画像、RSSフィード、HTML5対応などを設定
 */
function my_setup() {
  add_theme_support( 'post-thumbnails' );      // アイキャッチ画像を有効化
  add_theme_support( 'automatic-feed-links' ); // RSSフィード用のリンクを自動追加
  add_theme_support( 'title-tag' );            // <title>タグをWordPressに管理させる
  add_theme_support( 'custom-logo' );          // カスタムロゴ機能を有効化
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
}
add_action( 'after_setup_theme', 'my_setup' );

// ========================================
// CSS・JavaScriptの読み込み
// ========================================

/**
 * CSSとJavaScriptファイルを読み込む
 * 外部ライブラリ（FontAwesome、Swiper、GSAP）とカスタムスクリプトを読み込み
 */
function my_script_init() {
	// CSS読み込み
	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '5.8.2', 'all' );
	wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.2.6', 'all' );
	wp_enqueue_style( 'common', get_template_directory_uri() . '/assets/css/common.css', array(), '1.0.1', 'all' );
	wp_enqueue_style( 'my', get_template_directory_uri() . '/assets/css/style.css', array('common'), '1.0.1', 'all' );
	wp_enqueue_style( 'df', get_stylesheet_uri(), array(), '1.0.1', 'all' );

	// JavaScript読み込み
	wp_deregister_script( 'jquery' );  // WordPress標準のjQueryを解除
	wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), '3.7.1', true );
	wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.2.6', true );
	wp_enqueue_script( 'gsap', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js', array(), '3.12.7', true );
	wp_enqueue_script( 'ScrollTrigger', 'https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js', array('gsap'), '3.12.7', true );
	wp_enqueue_script( 'swiper-init', get_template_directory_uri() . '/assets/js/swiper-init.js', array( 'swiper' ), '1.0.1', true );
	wp_enqueue_script( 'my', get_template_directory_uri() . '/assets/js/script.js', array( 'ScrollTrigger' ), '1.0.1', true );
}
add_action( 'wp_enqueue_scripts', 'my_script_init' );

// ========================================
// セキュリティ対策
// ========================================

/**
 * 作成者アーカイブページを無効化
 * セキュリティ向上のため、ユーザー名の列挙を防ぐ
 */
function disable_author_archive_query() {
	if (php_sapi_name() !== 'cli') {
		$query_string = $_SERVER['QUERY_STRING'] ?? '';
		if( preg_match('/author=([0-9]*)/i', $query_string) && !preg_match('/post_author=/i', $query_string) ){
			wp_redirect( home_url() );
			exit;
		}
	}
}
add_action('init', 'disable_author_archive_query');

// ========================================
// ナビゲーションメニュー設定
// ========================================

/**
 * カスタムメニューを登録
 * ヘッダー、フッター、ドロワーの3つのメニュー位置を作成
 */
function my_menu_init() {
	register_nav_menus(
		array(
			'global'  => 'ヘッダーメニュー',
			'footer'  => 'フッターメニュー',
			'drawer'  => 'ドロワーメニュー',
		)
	);
}
add_action( 'init', 'my_menu_init' );

// ========================================
// ウィジェットエリア設定
// ========================================

/**
 * サイドバーウィジェットエリアを登録
 * 通常のサイドバーと実績紹介用サイドバーの2つを作成
 */
function my_widget_init() {
  // メインサイドバー
  register_sidebar(
    array(
      'name'      => 'サイドバー',
      'id'      => 'sidebar',
      'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="p-widget__title">',
      'after_title'   => '</div>',
    )
  );

  // 実績紹介ページ用サイドバー
  register_sidebar(
    array(
      'name'      => '実績紹介サイドバー',
      'id'      => 'works_sidebar',
      'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="p-widget__title">',
      'after_title'   => '</div>',
    )
  );
}
add_action( 'widgets_init', 'my_widget_init' );

// ========================================
// カスタムウィジェット
// ========================================

/**
 * 実績紹介の最新投稿を表示するウィジェット
 * カスタム投稿タイプ「works」の最新投稿一覧を表示
 */
class Works_Recent_Posts_Widget extends WP_Widget {
  public function __construct() {
    parent::__construct(
      'works_recent_posts',
      '最新の実績紹介投稿',
      array( 'description' => 'カスタム投稿タイプ「works」の最新投稿を表示します。' )
    );
  }

  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
    }

    $query_args = array(
      'post_type'    => 'works',
      'posts_per_page' => ! empty( $instance['number'] ) ? absint( $instance['number'] ) : 5,
      'orderby'    => 'date',
      'order'      => 'DESC',
    );
    $query = new WP_Query( $query_args );

    if ( $query->have_posts() ) {
      echo '<ul class="works-recent-posts">';
      while ( $query->have_posts() ) {
        $query->the_post();
        echo '<li><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></li>';
      }
      echo '</ul>';
    } else {
      echo '<p>投稿がありません。</p>';
    }

    wp_reset_postdata();
    echo $args['after_widget'];
  }

  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '最新の実績紹介投稿';
    $number = ! empty( $instance['number'] ) ? $instance['number'] : 5;
    ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">タイトル:</label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>">表示する投稿数:</label>
      <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>">
    </p>
    <?php
  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = sanitize_text_field( $new_instance['title'] );
    $instance['number'] = absint( $new_instance['number'] );
    return $instance;
  }
}

/**
 * 実績カテゴリー一覧を表示するウィジェット
 * カスタムタクソノミー「work_category」のカテゴリー一覧を表示
 */
class Work_Category_Widget extends WP_Widget {
  public function __construct() {
    parent::__construct(
      'work_category_widget',
      '実績カテゴリー一覧',
      array( 'description' => 'カスタムタクソノミー「実績カテゴリー」の一覧を表示します。' )
    );
  }

  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
    }

    $terms = get_terms( array(
      'taxonomy'   => 'work_category',
      'hide_empty' => true,
    ) );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
      echo '<ul class="work-category-list">';
      foreach ( $terms as $term ) {
        echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . esc_html( $term->name ) . '</a></li>';
      }
      echo '</ul>';
    } else {
      echo '<p>カテゴリーがありません。</p>';
    }

    echo $args['after_widget'];
  }

  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : 'カテゴリー一覧';
    ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">タイトル:</label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <?php
  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = sanitize_text_field( $new_instance['title'] );
    return $instance;
  }
}

/**
 * カスタムウィジェットを登録
 */
function register_custom_widgets() {
  register_widget( 'Works_Recent_Posts_Widget' );
  register_widget( 'Work_Category_Widget' );
}
add_action( 'widgets_init', 'register_custom_widgets' );

// ========================================
// 画像サイズ設定
// ========================================

// カスタム画像サイズを追加（840x600、トリミングあり）
add_image_size( 'my_thumbnail', 840, 600, true );

// ========================================
// ACF JSON設定
// ========================================

/**
 * ACFフィールドグループのJSON保存先を設定
 * フィールドグループを編集すると、自動的にJSONファイルとして保存される
 */
function my_acf_json_save_point( $path ) {
	return get_stylesheet_directory() . '/acf-json';
}
add_filter( 'acf/settings/save_json', 'my_acf_json_save_point' );

/**
 * ACFフィールドグループのJSON読み込み先を設定
 * JSONファイルからフィールドグループを読み込む
 */
function my_acf_json_load_point( $paths ) {
	// Remove the original path (optional).
	unset( $paths[0] );

	// Append the new path and return it.
	$paths[] = get_stylesheet_directory() . '/acf-json';

	return $paths;
}
add_filter( 'acf/settings/load_json', 'my_acf_json_load_point' );

// ========================================
// 外部ファイルの読み込み
// ========================================

require_once get_template_directory() . '/inc/tags.php';              // カスタムタグ関数
require_once get_template_directory() . '/inc/breadcrumb.php';        // パンくずリスト
require_once get_template_directory() . '/inc/page-title.php';        // ページタイトル
require_once get_template_directory() . '/inc/custom-post-types.php'; // カスタム投稿タイプ
require_once get_template_directory() . '/inc/custom-taxonomies.php'; // カスタムタクソノミー

// ========================================
// パンくずリストカスタマイズ
// ========================================

/**
 * パンくずリストのホーム表示を変更
 */
function my_breadcrumb_home_change( $home ) {
	return 'ホーム';
}
add_filter( 'my_breadcrumb_home', 'my_breadcrumb_home_change' );

/**
 * パンくずリストの区切り文字を変更
 */
function my_breadcrumb_bridge_change( $bridge ) {
	return $bridge;
}
add_filter( 'my_breadcrumb_bridge', 'my_breadcrumb_bridge_change' );

/**
 * パンくずリストのタイトルを変更
 * ホームページの場合は「ブログ」と表示
 */
function my_breadcrumb_title_change( $title ) {
	if ( is_home() ) {
		$title = 'ブログ';
	}
	return $title;
}
add_filter( 'my_breadcrumb_title', 'my_breadcrumb_title_change' );

// ========================================
// アーカイブページタイトルカスタマイズ
// ========================================

/**
 * アーカイブページのタイトルをカスタマイズ
 * 各種アーカイブページで不要な接頭辞を削除
 */
function my_archive_title( $title ) {
	if ( is_home() ) {
		$title = 'ブログ';
	} elseif ( is_category() ) {
		$title = '' . single_cat_title( '', false ) . '';
	} elseif ( is_tag() ) {
		$title = '' . single_tag_title( '', false ) . '';
	} elseif ( is_post_type_archive() ) {
		$title = '' . post_type_archive_title( '', false ) . '';
	} elseif ( is_tax() ) {
		$title = '' . single_term_title( '', false );
	} elseif ( is_search() ) {
		$title = '「' . esc_html( get_query_var( 's' ) ) . '」の検索結果';
	} elseif ( is_author() ) {
		$title = '' . get_the_author() . '';
	} elseif ( is_date() ) {
		$title = '';
		if ( get_query_var( 'year' ) ) {
			$title .= get_query_var( 'year' ) . '年';
		}
		if ( get_query_var( 'monthnum' ) ) {
			$title .= get_query_var( 'monthnum' ) . '月';
		}
		if ( get_query_var( 'day' ) ) {
			$title .= get_query_var( 'day' ) . '日';
		}
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'my_archive_title' );

// ========================================
// 表示テキストのカスタマイズ
// ========================================

/**
 * カテゴリー・アーカイブリストの投稿数表示を整形
 * 投稿数を<span>タグで囲む
 */
function my_list_anchor( $output ) {
	$output = preg_replace( '/<\/a>.*?\((\d+)\)/', ' <span>($1)</span></a>', $output );
	return $output;
}
add_filter( 'wp_list_categories', 'my_list_anchor' );
add_filter( 'get_archives_link', 'my_list_anchor' );

/**
 * パンくずリストのタイトル長さを制限
 * 最大300文字まで表示
 */
function my_breadcrumb_title( $title ) {
	$max_num = 300;
	if ( mb_strlen( $title ) > $max_num ) {
		$title = mb_substr( $title, 0, $max_num ) . '...';
	}
	return $title;
}
add_filter( 'my_breadcrumb_title', 'my_breadcrumb_title', 10, 2 );

/**
 * アーカイブページのタイトル長さを制限
 * 最大50文字まで表示（個別ページを除く）
 */
function my_custom_archive_title_length( $title ) {
  $max_length = 50;
  if ( mb_strlen( $title ) > $max_length && !(is_single()) && !(is_page()) ) {
    $title = mb_substr( $title, 0, $max_length ) . '...';
  }
  return $title;
}
add_filter( 'the_title', 'my_custom_archive_title_length' );

/**
 * 抜粋文の長さを変更
 * デフォルト55文字から80文字に変更
 */
function my_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'my_excerpt_length', 999 );

/**
 * 抜粋文の末尾を変更
 * デフォルト[...]から...に変更
 */
function my_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'my_excerpt_more' );

// ========================================
// コメント機能を無効化
// ========================================

/**
 * すべての投稿タイプでコメントとトラックバックを無効化
 */
function disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'disable_comments_post_types_support');

/**
 * 管理画面からコメント関連メニューを非表示
 */
function disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'disable_comments_admin_menu');

/**
 * 管理バーからコメントメニューを非表示
 */
function disable_comments_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'disable_comments_admin_bar');

/**
 * コメントステータスを常に閉じる
 */
function disable_comments_status() {
	return false;
}
add_filter('comments_open', 'disable_comments_status', 20, 2);
add_filter('pings_open', 'disable_comments_status', 20, 2);

/**
 * 既存のコメントを非表示
 */
function disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'disable_comments_hide_existing_comments', 10, 2);
