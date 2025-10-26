<?php
/**
 * Page Title Functions
 */

function my_page_title($type = 'ja', $escape = true) {
  static $cache = array();

  if (empty($cache)) {
    // ページタイトルデータ（固定ページ用）
    $data = array(
      'company' => array('ja' => '会社案内', 'en' => 'Company', 'img' => 'company.webp'),
      'service' => array('ja' => 'サービス', 'en' => 'Service', 'img' => 'service.webp'),
      'recruit' => array('ja' => '採用情報', 'en' => 'Recruit', 'img' => 'recruit.webp'),
      'contact' => array('ja' => 'お問い合わせ', 'en' => 'Contact', 'img' => 'contact.webp'),
      'privacy-policy' => array('ja' => 'プライバシーポリシー', 'en' => 'Privacy Policy', 'img' => 'privacy-policy.webp'),
      'works' => array('ja' => '実績紹介', 'en' => 'Works', 'img' => 'works-bg.webp'),
      'blog' => array('ja' => 'ブログ', 'en' => 'Blog', 'img' => 'post-bg.webp'),
      '404' => array('ja' => '404', 'en' => 'Not Found', 'img' => '404.webp'),
      'default' => array('ja' => 'ページ', 'en' => 'Page', 'img' => 'no-img.png'),
    );

    // ページタイプを判定
    if (is_404()) {
      $context = '404';
    } elseif (is_page()) {
      $slug = get_post_field('post_name', get_post());
      $parent_id = wp_get_post_parent_id(get_the_ID());
      $context = ($parent_id && get_post_field('post_name', $parent_id) === 'recruit') ? 'recruit' : $slug;
    } elseif ((is_single() && get_post_type() === 'works') || is_tax('work_category') || is_post_type_archive('works')) {
      $context = 'works';
    } elseif (is_category()) {
      // カテゴリーアーカイブは動的にタイトル取得
      $category = get_queried_object();
      $cache = array(
        'ja' => $category->name,
        'en' => ucfirst($category->slug),
        'img' => get_template_directory_uri() . '/assets/img/page-title-bg/post-bg.webp'
      );
      $value = isset($cache[$type]) ? $cache[$type] : '';
      return $escape ? ($type === 'img' ? esc_url($value) : esc_html($value)) : $value;
    } elseif (is_tag()) {
      // タグアーカイブは動的にタイトル取得
      $tag = get_queried_object();
      $cache = array(
        'ja' => $tag->name,
        'en' => ucfirst($tag->slug),
        'img' => get_template_directory_uri() . '/assets/img/page-title-bg/post-bg.webp'
      );
      $value = isset($cache[$type]) ? $cache[$type] : '';
      return $escape ? ($type === 'img' ? esc_url($value) : esc_html($value)) : $value;
    } elseif (is_single()) {
      $context = 'blog';
    } else {
      $context = 'default';
    }

    // データ取得と画像パス生成
    $cache = isset($data[$context]) ? $data[$context] : $data['default'];
    $cache['img'] = get_template_directory_uri() . '/assets/img/page-title-bg/' . $cache['img'];
  }

  $value = isset($cache[$type]) ? $cache[$type] : '';
  return $escape ? ($type === 'img' ? esc_url($value) : esc_html($value)) : $value;
}

function my_page_title_image() {
  return my_page_title('img');
}

function my_page_title_ja() {
  return my_page_title('ja');
}

function my_page_title_en() {
  return my_page_title('en');
}