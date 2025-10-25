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
    <p class="p-archive-w__description js-fade-in">
      「匠建築設計」は、機能性と美しさを融合させ、理想の空間を創造します。<br>
      伝統技術と最新デザインを活かし、住宅や商業施設、リノベーションまで幅広く対応。<br>
      細部にまでこだわり、心を動かす建築を実現します。
    </p>
  </div>

  <div class="p-archive-w__meta js-fade-in">
    <div class="l-inner">
      <?php
      $terms = get_terms( array(
        'taxonomy' => 'work_category',
        'orderby'  => 'name',
        'order'  => 'ASC',
        'hide_empty' => false,
      ) );

      if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :
      ?>
        <ul class="p-archive-w__list">
          <li class="<?php echo ( is_post_type_archive( 'works' ) ) ? 'p-archive-w__current' : ''; ?>">
            <a href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>">すべて</a>
          </li>
          <?php foreach ( $terms as $term ) : ?>
            <?php
            $current_class = ( is_tax( 'work_category', $term->term_id ) ) ? ' p-archive-w__current' : '';
            ?>
            <li class="<?php echo esc_attr( $current_class ); ?>">
              <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                <?php echo esc_html( $term->name ); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>

  <div class="l-inner">
    <?php
    if ( have_posts() ) :
    ?>
    <div class="p-archive-head js-fade-in">
      <div class="p-archive-head__description"><?php the_archive_description(); ?></div>
    </div>

    <div class="p-entries p-entries--horizon04 js-fade-in">
      <?php
      while ( have_posts() ) :
        the_post();

        get_template_part( 'parts/content/archive' );

      endwhile;
      ?>
    </div>

    <?php get_template_part( 'parts/pagenation', 'archive' ); ?>

    <?php else : ?>
      <p class="js-fade-in">実績紹介はまだありません。</p>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>