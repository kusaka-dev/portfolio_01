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

    <div class="c-section-subtitle js-fade-in">
      <h2 class="c-section-subtitle__txt">404 Not Found</h2>
    </div>

    <p class="p-404__txt js-fade-in">
      ページが見つかりませんでした。<br>
      トップページに戻るボタンからお戻りください。
    </p>

    <a href="<?php echo esc_url(home_url('/')); ?>" class="c-button p-404__btn js-fade-in">
      トップページに戻る
    </a>

  </div>
</div>

<?php get_footer(); ?>