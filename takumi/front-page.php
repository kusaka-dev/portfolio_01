<?php
get_header();
?>

<div class="p-content">

  <!-- Slider main container -->
  <div class="p-mv">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="slide-img">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/mv1.webp' ); ?>" alt="スライド1">
          </div>
        </div>
        <div class="swiper-slide">
          <div class="slide-img">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/mv2.webp' ); ?>" alt="スライド2">
          </div>
        </div>
        <div class="swiper-slide">
          <div class="slide-img">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/mv3.webp' ); ?>" alt="スライド3">
          </div>
        </div>
      </div>
    </div>

    <div class="l-inner p-mv__body">
      <h2 class="p-mv__tit">SHAPING THE FUTURE</h2>
      <p class="p-mv__catch01">確かな技術と革新のデザインで、人々の暮らしを豊かに。</p>
      <p class="p-mv__catch02">高品質な設計と施工、柔軟な対応力を兼ね備えたワンストップ体制で、<br>社会に価値ある空間を提供します。</p>
    </div>
  </div>

  <!-- Company Section -->
  <section class="p-top-company c-plx c-top-section">
    <div class="c-plx__image"></div>
    <div class="c-plx__body">
      <div class="l-inner p-top-company__body">
        <div class="p-top-company__image--sp">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/building-image.webp' ); ?>" alt="本社">
        </div>
        <div class="p-top-company__contents">
          <p class="p-top-company__txt1 js-fade-in">匠建築設計 – 未来へつなぐ匠の技</p>
          <p class="p-top-company__txt2 js-fade-in">
            匠建築設計は、建築設計のプロフェッショナルとして、機能美と快適性を兼ね備えた空間を創造します。<br>
            確かな技術 と 細部へのこだわり で理想の建築を実現<br>
            住宅・商業施設・リノベーション まで幅広く対応<br>
            環境との調和を大切にした設計 で持続可能な未来へ<br>
            あなたの思い描く空間を、匠の技で形にします。 まずはお気軽にご相談ください。
          </p>
          <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'company' ) ) ); ?>" class="c-button js-fade-in">詳しくはこちら</a>
        </div>
        <div class="p-top-company__image--pc js-fade-in">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/building-image.webp' ); ?>" alt="本社">
        </div>
      </div>
    </div>
  </section>

  <!-- Service Section -->
  <section class="p-top-service c-top-section">
    <div class="l-inner p-top-service__body">
      <h3 class="c-top-heading c-top-heading__white p-top-service__heading js-fade-in">
        <span class="c-top-heading--ja">事業内容</span>
        <span class="c-top-heading--en">Service</span>
      </h3>
      <div class="p-top-service__items js-fade-in">
        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'service' ) ) ); ?>#item1" class="p-top-service__item">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/top-service-item1.webp' ); ?>" alt="建築設計・デザイン">
          <p class="p-top-service__item-txt">建築設計<br>デザイン</p>
        </a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'service' ) ) ); ?>#item2" class="p-top-service__item">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/top-service-item2.webp' ); ?>" alt="リノベーション・リフォーム">
          <p class="p-top-service__item-txt">リノベーション<br>リフォーム</p>
        </a>
        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'service' ) ) ); ?>#item3" class="p-top-service__item">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/top-service-item3.webp' ); ?>" alt="インテリアデザイン・空間プロデュース">
          <p class="p-top-service__item-txt">インテリアデザイン<br>空間プロデュース</p>
        </a>
      </div>
    </div>
  </section>

  <!-- Works Section -->
  <section class="c-top-section">
    <div class="l-inner">
      <h3 class="c-top-heading js-fade-in">
        <span class="c-top-heading--ja">実績紹介</span>
        <span class="c-top-heading--en">Works</span>
      </h3>
      <div class="p-entries p-entries--horizon04 js-fade-in">
        <?php get_template_part( 'parts/content/works-archive-top' ); ?>
      </div>
      <div class="p-top-works__btn">
        <a href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>" class="c-button js-fade-in">実績一覧</a>
      </div>
    </div>
  </section>

  <!-- Access Section -->
  <section class="p-top-access c-plx c-top-section">
    <div class="c-plx__image"></div>
    <div class="c-plx__body">
      <div class="l-inner p-top-access__body">
        <h3 class="c-top-heading p-top-access__heading js-fade-in">
          <span class="c-top-heading--ja">アクセス</span>
          <span class="c-top-heading--en">Access</span>
        </h3>
        <p class="p-top-access__address js-fade-in">
          〒000-0000 東京都◯◯区◯◯町1-2-3<br>
          TEL：000-000-0000
        </p>
        <iframe class="js-fade-in" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.8319461296105!2d139.76448647583595!3d35.681139772587336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd89f700b%3A0x277c49ba34ed38!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1742214354916!5m2!1sja!2sjp" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" sandbox="allow-scripts allow-popups allow-popups-to-escape-sandbox allow-same-origin"></iframe>
      </div>
    </div>
  </section>

</div>

<?php get_footer(); ?>