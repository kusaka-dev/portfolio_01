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

<div class="p-content js-fade-in">
  <div class="l-inner">
    <div class="p-content__row">
      <div class="l-primary" role="main">

        <main class="p-content__single">

          <div class="c-section-title p-s-works__section-title js-fade-in">
            <h2 class="c-section-title__jp"><?php the_title(); ?></h2>
          </div>

          <div class="p-s-works__txt js-fade-in">
            <?php the_content(); ?>
          </div>

          <dl class="c-table js-fade-in">
            <dt>所在地</dt>
            <dd><address><?php echo esc_html(get_field('address')); ?></address></dd>

            <dt>用途</dt>
            <dd><?php echo esc_html(get_field('purpose')); ?></dd>

            <dt>構造</dt>
            <dd><?php echo esc_html(get_field('structure')); ?></dd>

            <dt>延床面積</dt>
            <dd><?php echo esc_html(get_field('total_floor_area')); ?></dd>

            <dt>竣工年</dt>
            <dd><?php echo esc_html(get_field('completion_year')); ?>年</dd>
          </dl>

          <div class="c-section-subtitle js-fade-in">
            <h2 class="c-section-subtitle__txt">ギャラリー</h2>
          </div>

          <div class="p-single-works__photos js-fade-in">
            <?php 
            $photos = get_field('photos');
            if ($photos) :
              echo '<div class="photo-grid">'; // グリッドラッパーを追加
              foreach ($photos as $photo) : ?>
                <div class="photo-item">
                  <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>">
                </div>
              <?php endforeach;
              echo '</div>'; // グリッドラッパーの閉じタグ
            endif;
            ?>
          </div>

          <div class="c-section-subtitle js-fade-in">
            <h2 class="c-section-subtitle__txt">お客さまの声</h2>
          </div>

          <div class="p-s-works__txt p-s-works__txt--left js-fade-in">
            <p><?php echo wp_kses_post(get_field('voice')); ?></p>
          </div>

          <div class="c-section-subtitle js-fade-in">
            <h2 class="c-section-subtitle__txt">担当者のコメント</h2>
          </div>

          <div class="p-s-works__txt p-s-works__txt--left js-fade-in">
            <p><?php echo wp_kses_post(get_field('comment')); ?></p>
          </div>

          <div class="p-s-works__button js-fade-in">
            <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="c-button p-s-works__button">お問い合わせはこちら</a>
          </div>

          <div class="p-s-works__meta js-fade-in">
            <p>Category：</p>
            <?php echo wp_kses_post(get_the_term_list( get_the_ID(), 'work_category', '', ', ', '' )); ?>
          </div>

        </main>

      </div>

      <?php get_sidebar('works'); ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>