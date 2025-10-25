<?php
get_header();
get_template_part( 'parts/breadcrumb' );
?>

<div class="p-content p-content--column-one">
  <div class="l-inner">
    <div class="p-content__row">

      <main class="l-primary">
        <div class="p-content__archive">

          <?php if ( have_posts() ) : ?>
            <div class="p-archive-head">
              <h2 class="p-archive-head__title"><?php the_archive_title(); ?></h2>
              <div class="p-archive-head__description"><?php the_archive_description(); ?></div>
            </div>

            <div class="p-entries">
              <?php
              while ( have_posts() ) :
                the_post();

                get_template_part( 'parts/content/archive' );

              endwhile;
              ?>
            </div>

            <?php get_template_part( 'parts/pagenation', 'archive' ); ?>
          <?php endif; ?>

        </div>
      </main>

      <?php get_sidebar(); ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>