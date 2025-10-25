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
      <p class="c-page-copy__main js-fade-in">未来を創る仲間を募集しています。</p>
      <p class="c-page-copy__sub js-fade-in">
        建築とデザインの力で、新しい価値を生み出す。私たちと一緒に、理想の空間を創造しませんか？
      </p>
    </div>

    <div class="c-section-title p-recruit-section-title js-fade-in">
      <p class="c-section-title__jp">匠建築設計について</p>
      <p class="c-section-title__en">About</p>
    </div>

    <div class="p-recruit-cards">
      <div class="p-recruit-card">
        <div class="p-recruit-card__img js-fade-in">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/recruit-card1-image.webp" alt="匠建築設計について">
        </div>
        <div class="p-recruit-card__body js-fade-in">
          <p class="p-recruit-card__title">多様なプロジェクトに携われる</p>
          <p class="p-recruit-card__text">住宅・商業施設・公共施設など、幅広いプロジェクトに参加できます。 設計の初期段階から施工完了まで、一貫して関わることができます。</p>
        </div>
      </div>

      <div class="p-recruit-card">
        <div class="p-recruit-card__img js-fade-in">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/recruit-card2-image.webp" alt="採用情報">
        </div>
        <div class="p-recruit-card__body js-fade-in">
          <p class="p-recruit-card__title">柔軟な働き方が可能</p>
          <p class="p-recruit-card__text">リモートワーク制度やフレックスタイム制度を導入し、 ライフスタイルに合わせた働き方を実現しています。</p>
        </div>
      </div>

      <div class="p-recruit-card">
        <div class="p-recruit-card__img js-fade-in">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/recruit-card3-image.webp" alt="採用情報">
        </div>
        <div class="p-recruit-card__body js-fade-in">
          <p class="p-recruit-card__title">チームでのクリエイティブな仕事</p>
          <p class="p-recruit-card__text">建築設計、インテリアデザイン、施工管理など、各分野のプロフェッショナルと協力しながら、理想の空間を創り上げることができます。</p>
        </div>
      </div>

      <div class="p-recruit-card">
        <div class="p-recruit-card__img js-fade-in">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/recruit-card4-image.webp" alt="採用情報">
        </div>
        <div class="p-recruit-card__body js-fade-in">
          <p class="p-recruit-card__title">スキルアップを全力でサポート</p>
          <p class="p-recruit-card__text">社内勉強会や資格取得支援制度を完備。 最新の建築技術やデザインスキルを学びながら成長できます。</p>
        </div>
      </div>
    </div>

    <div class="c-section-title p-recruit-section-title js-fade-in">
      <p class="c-section-title__jp">現在募集中の職種</p>
      <p class="c-section-title__en">Jobs</p>
    </div>

    <div class="p-recruit-jobs">
      <a class="js-fade-in" href="<?php echo esc_url( get_permalink( get_page_by_path( 'recruit/job1' ) ) ); ?>" class="p-recruit-job">
        <div class="p-recruit-job__img">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/recruit-job1-image.webp" alt="建築設計士">
        </div>
        <span class="c-bar"></span>
        <p class="p-recruit-job__title">建築設計士</p>
      </a>

      <a class="js-fade-in" href="<?php echo esc_url( get_permalink( get_page_by_path( 'recruit/job2' ) ) ); ?>" class="p-recruit-job">
        <div class="p-recruit-job__img">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/recruit-job2-image.webp" alt="施工管理技士">
        </div>
        <span class="c-bar"></span>
        <p class="p-recruit-job__title">施工管理技士</p>
      </a>

      <a class="js-fade-in" href="<?php echo esc_url( get_permalink( get_page_by_path( 'recruit/job3' ) ) ); ?>" class="p-recruit-job">
        <div class="p-recruit-job__img">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/recruit-job2-image.webp" alt="CADオペレーター">
        </div>
        <span class="c-bar"></span>
        <p class="p-recruit-job__title">CADオペレーター</p>
      </a>
    </div>

  </div>
</div>

<?php get_footer(); ?>