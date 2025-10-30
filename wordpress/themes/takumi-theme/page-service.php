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
      <p class="c-page-copy__main js-fade-in">受け継がれる匠の技、未来へつなぐ建築デザイン。</p>
      <p class="c-page-copy__sub js-fade-in">
        私たちは、伝統の技術と現代の設計思想を融合し、機能美と快適性を兼ね備えた空間を創造します。<br>
        住宅から商業施設、公共建築まで、細部にまでこだわり、お客様の理想をかたちにすることを大切にしています。<br>
        時を経ても色褪せないデザインと、持続可能な未来を見据えた建築を提供し、人々の暮らしを豊かにする空間を築いていきます。
      </p>
    </div>

    <div class="p-service-cards">
      <a class="p-service-card js-fade-in" href="#item1">
        <div class="p-service-card__img">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/service-card1-image.webp" alt="建築設計・デザイン">
        </div>
        <div class="p-service-card__body">
          <p class="p-service-card__title">建築設計<br>デザイン</p>
          <p class="p-service-card__text">住まいから商業施設まで用途や環境に合わせた最適な設計を提供します。</p>
        </div>
      </a>

      <a class="p-service-card js-fade-in" href="#item2">
        <div class="p-service-card__img">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/service-card2-image.webp" alt="リノベーション・リフォーム">
        </div>
        <div class="p-service-card__body">
          <p class="p-service-card__title">リノベーション<br>リフォーム</p>
          <p class="p-service-card__text">既存の建物に新しい価値を加え、快適で機能的な空間へと再生します。</p>
        </div>
      </a>

      <a class="p-service-card js-fade-in" href="#item3">
        <div class="p-service-card__img">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/service-card3-image.webp" alt="インテリアデザイン・空間プロデュース">
        </div>
        <div class="p-service-card__body">
          <p class="p-service-card__title">インテリアデザイン<br>空間プロデュース</p>
          <p class="p-service-card__text">建築と調和した美しいインテリアデザインを提案し、快適な空間を創出します。</p>
        </div>
      </a>
    </div>

    <div class="p-service-items">
      <div class="p-service-item" id="item1">
        <div class="p-service-item__img p-service-item__img-sp js-fade-in">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/service-card3-image.webp" alt="インテリアデザイン・空間プロデュース">
        </div>
        <div class="p-service-item__body">
          <div class="p-service-item__heading js-fade-in">
            <p class="p-service-item__title-jp">建築設計・デザイン</p>
            <p class="p-service-item__title-en">Architectural Design & Planning</p>
          </div>
          <p class="p-service-item__text js-fade-in">
            住まいから商業施設、公共建築まで、機能性と美しさを両立した設計を提供します。伝統的な職人技と最先端のデザイン手法を融合し、唯一無二の空間を創造します。お客様の想いを大切にし、ライフスタイルやビジネスに最適な建築デザインを提案いたします。
          </p>
          <a href="<?php echo esc_url(get_term_link(get_term_by('slug', 'architecture_design', 'work_category'))); ?>" class="c-button js-fade-in">建築設計・デザイン事例はこちら</a>
        </div>
        <div class="p-service-item__img p-service-item__img-pc js-fade-in">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/service-card3-image.webp" alt="インテリアデザイン・空間プロデュース">
        </div>
      </div>

      <div class="p-service-item" id="item2">
        <div class="p-service-item__img js-fade-in">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/service-card3-image.webp" alt="インテリアデザイン・空間プロデュース">
        </div>
        <div class="p-service-item__body">
          <div class="p-service-item__heading js-fade-in">
            <p class="p-service-item__title-jp">リノベーション・リフォーム</p>
            <p class="p-service-item__title-en">Renovation & Remodeling</p>
          </div>
          <p class="p-service-item__text js-fade-in">
            住まいや店舗を、より魅力的で機能的な空間へと生まれ変わらせます。築年数の経過した建物も、現代のライフスタイルに合った快適な空間へと再設計。機能性の向上はもちろん、デザインの美しさにもこだわり、お客様の理想の空間づくりをサポートします。
          </p>
          <a href="<?php echo esc_url(get_term_link(get_term_by('slug', 'renovation_reform', 'work_category'))); ?>" class="c-button js-fade-in">リノベーション・リフォーム事例はこちら</a>
        </div>
      </div>

      <div class="p-service-item" id="item3">
        <div class="p-service-item__img p-service-item__img-sp js-fade-in">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/service-card3-image.webp" alt="インテリアデザイン・空間プロデュース">
        </div>
        <div class="p-service-item__body">
          <div class="p-service-item__heading js-fade-in">
            <p class="p-service-item__title-jp">インテリアデザイン・空間プロデュース</p>
            <p class="p-service-item__title-en">Interior Design & Space Planning</p>
          </div>
          <p class="p-service-item__text js-fade-in">
            建築だけでなく、空間全体の調和を考えたインテリアデザインを提案します。色彩、素材、照明、家具の選定まで、トータルコーディネートを行い、快適で洗練された空間を創り上げます。お客様のライフスタイルやブランドイメージを反映し、唯一無二の空間を実現します。
          </p>
          <a href="<?php echo esc_url(get_term_link(get_term_by('slug', 'interior_design_spatial_produce', 'work_category'))); ?>" class="c-button js-fade-in">インテリアデザイン・空間プロデュース事例はこちら</a>
        </div>
        <div class="p-service-item__img p-service-item__img-pc js-fade-in">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/service-card3-image.webp" alt="インテリアデザイン・空間プロデュース">
        </div>
      </div>
    </div>

  </div>
</div>

<?php get_footer(); ?>