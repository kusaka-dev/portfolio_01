<?php
/**
 * Breadcrumb Functions
 */

if (!function_exists('my_breadcrumb')) {
  function my_breadcrumb() {
    if (is_front_page()) {
      return;
    }

    $html = '';
    $before = '<div class="p-breadcrumb"><ul>';
    $after = '</ul></div>';
    $home = apply_filters('my_breadcrumb_home', 'Home');
    $home_tag = '<li><a href="' . esc_url(home_url('/')) . '">' . $home . '</a></li>';
    $bridge = apply_filters('my_breadcrumb_bridge', '&gt;');
    $bridge_tag = '<li><span class="p-breadcrumb__bridge">' . $bridge . '</span></li>';

    $html .= $before . $home_tag . $bridge_tag;

    if (is_home() || is_attachment()) {
      $html .= '<li><span class="p-breadcrumb__current">' . apply_filters('my_breadcrumb_title', get_the_title()) . '</span></li>';

    } elseif (is_single()) {
      if (get_post_type() !== 'post') {
        $post_type = get_post_type_object(get_post_type());
        $html .= '<li><a href="' . esc_url(get_post_type_archive_link(get_post_type())) . '">' . esc_html($post_type->labels->name) . '</a></li>' . $bridge_tag;
      } else {
        $categories = my_get_post_categories(get_the_ID());
        $parents = get_ancestors($categories[0]['id'], 'category');
        if ($parents) {
          $parents = array_reverse($parents);
          foreach ($parents as $parent_id) {
            $parent = get_category($parent_id);
            $html .= '<li><a href="' . esc_url(get_category_link($parent->term_id)) . '">' . esc_html($parent->cat_name) . '</a></li>' . $bridge_tag;
          }
        }
        $html .= '<li><a href="' . esc_url($categories[0]['link']) . '">' . esc_html($categories[0]['name']) . '</a></li>' . $bridge_tag;
      }
      $html .= '<li><span class="p-breadcrumb__current">' . apply_filters('my_breadcrumb_title', get_the_title()) . '</span></li>';

    } elseif (is_page()) {
      $parents = get_ancestors(get_the_ID(), 'page');
      if ($parents) {
        $parents = array_reverse($parents);
        foreach ($parents as $parent_id) {
          $html .= '<li><a href="' . esc_url(get_permalink($parent_id)) . '">' . esc_html(get_the_title($parent_id)) . '</a></li>' . $bridge_tag;
        }
      }
      $html .= '<li><span class="p-breadcrumb__current">' . apply_filters('my_breadcrumb_title', get_the_title()) . '</span></li>';

    } elseif (is_category()) {
      $parents = get_ancestors(get_query_var('cat'), 'category');
      if ($parents) {
        $parents = array_reverse($parents);
        foreach ($parents as $parent_id) {
          $parent = get_category($parent_id);
          $html .= '<li><a href="' . esc_url(get_category_link($parent->term_id)) . '">' . esc_html($parent->cat_name) . '</a></li>' . $bridge_tag;
        }
      }
      $html .= '<li><span class="p-breadcrumb__current">' . apply_filters('my_breadcrumb_title', single_cat_title('', false)) . '</span></li>';

    } elseif (is_tax('work_category')) {
      $archive_link = get_post_type_archive_link('works');
      $html .= '<li><a href="' . esc_url($archive_link) . '">実績紹介</a></li>' . $bridge_tag;
      $term = get_queried_object();
      $html .= '<li><span class="p-breadcrumb__current">' . esc_html($term->name) . '</span></li>';

    } elseif (is_post_type_archive('works')) {
      $html .= '<li><span class="p-breadcrumb__current">実績紹介</span></li>';

    } elseif (is_search()) {
      $html .= '<li><span class="p-breadcrumb__current">' . apply_filters('my_breadcrumb_title', '「' . get_query_var('s') . '」の検索結果') . '</span></li>';

    } elseif (is_404()) {
      $html .= '<li><span class="p-breadcrumb__current">404</span></li>';
    }

    $html .= $after;
    echo wp_kses_post($html);
  }
}