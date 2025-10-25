<footer class="l-footer p-footer" role="contentinfo">

  <div class="p-footer__menu">
    <div class="l-inner">
      <nav class="p-footer-nav">
        <?php
        wp_nav_menu(
          array(
            'container'    => false,
            'depth'      => 1,
            'theme_location' => 'utility',
          )
        );
        ?>
      </nav>
    </div>
  </div>

  <div class="p-footer__copy">
    <div class="l-inner">
      <p>
        Copyright &copy; <?php echo esc_html( current_time( 'Y' ) ); ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
        All Rights Reserved.
      </p>
    </div>
  </div>

</footer>
<?php get_template_part( 'parts/totop' ); ?>
<?php wp_footer(); ?>

</body>
</html>
