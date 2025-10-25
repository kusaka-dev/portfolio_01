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

    <div class="c-page-copy">
      <p class="c-page-copy__sub p-contact-page-copy__sub js-fade-in">
        ご依頼・ご相談は、下記のお問い合わせフォーム、またはお電話にてお気軽にご相談ください。<br>
        TEL：000-000-0000 受付時間：9:00～18:00（土日祝日除く）
      </p>
    </div>

    <div class="c-section-subtitle js-fade-in">
      <h2 class="c-section-subtitle__txt">お問い合わせフォーム</h2>
    </div>

    <div class="c-contact-form js-fade-in">
      <?php echo do_shortcode('[contact-form-7 id="b79392f" title="お問い合わせフォーム"]'); ?>
    </div>

  </div>
</div>

<?php get_footer(); ?>