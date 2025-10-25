<?php
$args = array(
  'post_type'    => 'works',
  'posts_per_page' => 3,
  'orderby'    => 'date',
  'order'      => 'DESC',
  'suppress_filters' => true,
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
  while ( $query->have_posts() ) : $query->the_post();
    $tp_entries_column_class = 'p-entries--column-three';
    ?>
    <a <?php post_class( array( 'p-entries__item', $tp_entries_column_class ) ); ?> href="<?php the_permalink(); ?>">
      <div class="c-media c-media--fit">
        <div class="c-media__img">
          <div class="c-media__img-in">
            <?php
            if ( has_post_thumbnail() ) {
              the_post_thumbnail( 'my_thumbnail' );
            } else {
              echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/img/no-img.webp" alt="">';
            }
            ?>
          </div>
          <span class="c-bar"></span>
        </div>

        <div class="c-media__body">
          <div class="c-media__meta">
            <div class="c-media__label"><?php my_the_post_category(); ?></div>
            <time class="c-media__published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
          </div>
          <div class="c-media__title"><?php the_title(); ?></div>
          <div class="c-media__excerpt"><?php the_excerpt(); ?></div>
        </div>
      </div>
    </a>
    <?php
  endwhile;
  wp_reset_postdata();
else :
  ?>
  <p>現在、実績紹介はありません。</p>
  <?php
endif;
?>