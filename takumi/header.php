<?php
/**
 * Header Meta
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="p-header__caution">
  <div class="l-inner">
    <p>本サイトは架空の建築設計事務所を想定したポートフォリオサイトです。実在の企業・団体とは一切関係ございません。</p>
  </div>
</div>

<?php $tp_logo_tag = is_front_page() ? 'h1' : 'div'; ?>
<header class="l-header p-header" role="banner">
  <div class="l-inner">
    <div class="p-header__row">

      <<?php echo esc_attr( $tp_logo_tag ); ?> class="p-header__logo">
        <?php if ( has_custom_logo() ) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( apply_filters( 'tp_logo', get_bloginfo( 'name' ) ) ); ?></a>
        <?php endif; ?>
      </<?php echo esc_attr( $tp_logo_tag ); ?>>

      <nav class="p-header__nav">
        <?php
        wp_nav_menu(
          array(
            'container'    => false,
            'depth'      => 1,
            'theme_location' => 'global',
          )
        );
        ?>
      </nav>

      <div class="p-header__drawer">
        <div class="p-drawer-icon js-drawer for-drawer" data-target="for-drawer">
          <button class="p-drawer-icon__bars">
            <span class="p-drawer-icon__bar"></span>
            <span class="p-drawer-icon__bar"></span>
            <span class="p-drawer-icon__bar"></span>
          </button>
        </div>
      </div>

    </div>
  </div>
</header>

<?php get_template_part( 'parts/drawer' ); ?>
