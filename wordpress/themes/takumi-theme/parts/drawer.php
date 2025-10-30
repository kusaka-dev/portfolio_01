<div class="p-drawer-close js-drawer for-drawer" data-target="for-drawer">
</div>

<div class="p-drawer-content p-drawer-content--right for-drawer">
  <?php
  wp_nav_menu(
    array(
      'container'     => 'nav',
      'container_class' => 'p-drawer-content__nav',
      'menu_class'    => 'p-drawer-content__list',
      'theme_location'  => 'drawer',
      'depth'       => 1,
    )
  );
  ?>
</div>