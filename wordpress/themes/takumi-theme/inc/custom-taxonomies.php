<?php
/**
 * Custom Taxonomies
 */

function create_custom_taxonomy_work_category() {
  register_taxonomy(
    'work_category',
    'works',
    array(
      'label'       => '実績カテゴリー',
      'rewrite'       => array( 'slug' => 'work_category' ),
      'hierarchical'    => true,
      'show_admin_column' => true,
    )
  );

  $categories = array(
    'architecture_design'        => '建築設計・デザイン',
    'renovation_reform'        => 'リノベーション・リフォーム',
    'interior_design_spatial_produce'  => 'インテリアデザイン・空間プロデュース',
  );

  foreach ( $categories as $slug => $name ) {
    if ( ! term_exists( $name, 'work_category' ) ) {
      wp_insert_term( $name, 'work_category', array( 'slug' => $slug ) );
    }
  }
}
add_action( 'init', 'create_custom_taxonomy_work_category' );

function unify_work_category_and_works_archive( $query ) {
  if ( is_admin() || ! $query->is_main_query() ) {
    return $query;
  }

  if ( is_post_type_archive( 'works' ) || is_tax( 'work_category' ) ) {
    $query->set( 'post_type', 'works' );
  }

  return $query;
}
add_action( 'pre_get_posts', 'unify_work_category_and_works_archive' );
