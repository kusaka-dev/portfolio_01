<article <?php post_class( array( 'p-entry', 'p-entry--single' ) ); ?>>
  <div class="p-entry__body">
    <div class="p-entry-content">
      <div class="c-section-subtitle js-fade-in">
        <div class="c-section-subtitle__txt p-single__title"><?php the_title(); ?></div>
      </div>

      <div class="p-single__date js-fade-in">
        <span><?php echo get_the_date(); ?></span>
      </div>

      <?php if ( has_post_thumbnail() ) : ?>
        <div class="p-single__thumbnail js-fade-in">
          <?php the_post_thumbnail( 'large' ); ?>
        </div>
      <?php endif; ?>

      <?php the_content(); ?>

      <?php
      wp_link_pages(
        array(
          'before'     => '<nav class="p-entry-links">',
          'after'      => '</nav>',
          'link_before'  => '',
          'link_after'   => '',
          'next_or_number' => 'number',
          'separator'    => '',
        )
      );
      ?>
    </div>
  </div>

  <?php $tp_tags = my_get_post_tags(); ?>
  <?php if ( $tp_tags ) : ?>
    <div class="p-entry__tags">
      <div class="p-entry-tags">
        <?php foreach ( $tp_tags as $tp_tag ) : ?>
          <div class="p-entry-tags__item">
            <a href="<?php echo esc_url( $tp_tag['link'] ); ?>"><?php echo esc_html( $tp_tag['name'] ); ?></a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>

</article>