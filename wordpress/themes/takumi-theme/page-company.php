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

    <dl class="c-table js-fade-in">
      <dt>会社名</dt>
      <dd>匠建築設計</dd>
      <dt>所在地</dt>
      <dd><address>〒000-0000 東京都◯◯区◯◯町1-2-3</address></dd>
      <dt>設立</dt>
      <dd>20XX年XX月</dd>
      <dt>代表者</dt>
      <dd>◯◯ ◯◯</dd>
      <dt>事業内容</dt>
      <dd>
        建築設計・デザイン<br>
        住宅・商業施設・公共施設の設計・監理<br>
        リノベーション・インテリアデザイン
      </dd>
    </dl>

    <div class="c-section-title p-company-section-title js-fade-in">
      <h2 class="c-section-title__jp">アクセス</h2>
      <p class="c-section-title__en">Access</p>
    </div>

    <div class="c-section-subtitle js-fade-in">
      <h3 class="c-section-subtitle__txt">本社</h3>
    </div>

    <p class="js-fade-in">〒000-0000 東京都◯◯区◯◯町1-2-3</p>
    <p class="js-fade-in">TEL 0000-00-0000</p>

    <div class="p-access-imgaes js-fade-in">
      <img class="js-fade-in" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/building-image.webp' ); ?>" alt="本社">
      <iframe class="js-fade-in" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.8319461296105!2d139.76448647583595!3d35.681139772587336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd89f700b%3A0x277c49ba34ed38!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1742214354916!5m2!1sja!2sjp"
        width="525" height="325" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade" sandbox="allow-scripts allow-popups allow-popups-to-escape-sandbox allow-same-origin">
      </iframe>
    </div>

  </div>
</div>

<?php get_footer(); ?>