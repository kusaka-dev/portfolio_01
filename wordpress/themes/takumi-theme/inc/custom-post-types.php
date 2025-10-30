<?php
/**
 * Custom Post Types
 */

function create_custom_post_type_works() {
  register_post_type(
    'works',
    array(
      'labels'    => array(
        'name'      => '実績紹介',
        'singular_name' => '実績紹介',
      ),
      'public'    => true,
      'has_archive'   => true,
      'menu_position' => 5,
      'supports'    => array( 'title', 'editor', 'thumbnail' ),
      'menu_icon'   => 'dashicons-portfolio',
      'rewrite'     => array( 'slug' => 'works' ),
    )
  );
}
add_action( 'init', 'create_custom_post_type_works' );
