<?php
/**
 * Template Tags
 */

function my_get_post_categories( $id ) {
  global $post;
  $this_categories = array();

  if ( 0 === $id ) {
    $id = $post->ID;
  }

  $categories = get_the_category( $id );
  if ( ! $categories ) {
    return false;
  }

  foreach ( $categories as $category ) {
    $this_categories[] = array(
      'id'   => $category->cat_ID,
      'name' => $category->name,
      'slug' => $category->slug,
      'link' => get_category_link( $category->cat_ID ),
    );
  }

  return $this_categories;
}

function my_the_post_category( $anchor = true, $id = 0 ) {
  $this_categories = my_get_post_categories( $id );

  if ( isset( $this_categories[0] ) ) {
    if ( $anchor ) {
      echo '<p>' . esc_html( $this_categories[0]['name'] ) . '</p>';
    } else {
      echo esc_html( $this_categories[0]['name'] );
    }
  }
}

function my_get_post_tags( $id = 0 ) {
  global $post;
  $this_tags = array();

  if ( 0 === $id ) {
    $id = $post->ID;
  }

  $tags = get_the_tags( $id );
  if ( ! $tags ) {
    return false;
  }

  foreach ( $tags as $tag ) {
    $this_tags[] = array(
      'id'   => $tag->term_id,
      'name' => $tag->name,
      'slug' => $tag->slug,
      'link' => get_tag_link( $tag->term_id ),
    );
  }

  return $this_tags;
}

function my_get_post_terms( $taxonomy, $id = 0 ) {
  global $post;
  $this_terms = array();

  if ( 0 === $id ) {
    $id = $post->ID;
  }

  $terms = get_the_terms( $id, $taxonomy );
  if ( ! $terms ) {
    return false;
  }

  foreach ( $terms as $term ) {
    $this_terms[] = array(
      'id'   => $term->term_id,
      'name' => $term->name,
      'slug' => $term->slug,
      'link' => get_term_link( $term->term_id, $taxonomy ),
    );
  }

  return $this_terms;
}

function my_the_post_term( $taxonomy, $anchor = true, $id = 0 ) {
  $this_terms = my_get_post_terms( $taxonomy, $id );

  if ( isset( $this_terms[0] ) ) {
    if ( $anchor ) {
      echo '<a href="' . esc_url( $this_terms[0]['link'] ) . '">' . esc_html( $this_terms[0]['name'] ) . '</a>';
    } else {
      echo esc_html( $this_terms[0]['name'] );
    }
  }
}