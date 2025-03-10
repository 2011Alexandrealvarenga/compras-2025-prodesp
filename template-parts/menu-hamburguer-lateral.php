<!-- menu desktop  -->
<div class="back-menu" id="back-menu-desktop">
  <div class="box-menu-content" id="menu-lateral-desktop">
    
    
    
    
    <!-- <img class="btn-style btn-ham-close" src="https://compras.sp.gov.br/wp-content/uploads/2024/03/btn-icon-menu.svg"> -->
    <img class="btn-ham-close" src="https://compras.sp.gov.br/wp-content/uploads/2024/03/hamburguer-close.png" alt="">
    <nav class="menu-hamburguer" id="">
      <?php
        $args = apply_filters( 'Prodesp-theme/menu/main-menu-args', array(
          'theme_location'   => 'main_hamburguer',
          'container'        => '',
          'menu_id'          => 'main-menu',
          'fallback_cb'      => 'Prodesp_set_nav_menu',
          'fallback_message' => esc_html__( 'Set main menu', 'Prodesp' ),
        ) );
        wp_nav_menu( $args );
      ?>
    </nav>
  </div>
</div>
<!-- menu mobile  -->
<div class="back-menu" id="back-menu-mobile">
  <div class="box-menu-content" id="menu-lateral-mobile">
    <img class="btn-ham-close" src="https://compras.sp.gov.br/wp-content/uploads/2024/03/hamburguer-close.png" alt="">
    <nav class="menu-hamburguer" id="">
      <?php
        $args = apply_filters( 'Prodesp-theme/menu/main-menu-args', array(
          'theme_location'   => 'main_mobile_version',
          'container'        => '',
          'menu_id'          => 'main-menu',
          'fallback_cb'      => 'Prodesp_set_nav_menu',
          'fallback_message' => esc_html__( 'Set main menu', 'Prodesp' ),
        ) );
        wp_nav_menu( $args );
      ?>
    </nav>
  </div>
</div>
