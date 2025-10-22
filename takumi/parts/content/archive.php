<?php $tp_entries_column_class = 'p-entries--column-three'; ?>
<div <?php post_class( array( 'p-entries__item', $tp_entries_column_class ) ); ?>>

  <a class="c-media c-media--fit"  href="<?php the_permalink(); ?>">
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

      <div class="c-media__title">
        <?php the_title(); ?>
      </div>
      <div class="c-media__excerpt">
        <?php the_excerpt(); ?>
      </div>
    </div>
  </a>

</div>