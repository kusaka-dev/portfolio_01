<?php
get_header();
?>

<div class="p-page-title">
  <img class="p-page-title__image" src="<?php echo my_page_title_image(); ?>" alt="Page Title Image">
  <div class="l-inner p-page-title__inner">
    <h1 class="p-page-title__heading">
      <span class="p-page-title__jp"><?php echo my_page_title_ja(); ?></span>
      <span class="p-page-title__en"><?php echo my_page_title_en(); ?></span>
    </h1>
  </div>
</div>

<?php
get_template_part( 'parts/breadcrumb' );
?>

<div class="p-content">
  <div class="l-inner">
    <div class="p-content__row">

      <main class="l-primary">
        <div class="p-content__page">

          <?php
          if ( have_posts() ) :
            while ( have_posts() ) :
              the_post();

              get_template_part( 'parts/content/page' );
              get_template_part( 'parts/pagenation', 'page' );

            endwhile;
          endif;
          ?>

        </div>
      </main>

      <?php get_sidebar(); ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>