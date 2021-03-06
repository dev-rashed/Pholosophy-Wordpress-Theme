<a class="header__toggle-menu" href="#0" title="Menu"><span>
        <?php _e("Menu", 'philosophy') ?>
    </span></a>

<nav class="header__nav-wrap">

    <h2 class="header__nav-heading h6"><?php _e('Site Navigation', 'philosophy') ?></h2>

    <?php 
        $philosophy_nav = wp_nav_menu(array(
            'theme_location' => 'topmenu',
            'menu_id' => 'top-menu',
            'container' => 'ul',
            'menu_class' => 'header__nav',
            'echo' => false
        ));
       $philosophy_nav = str_replace("menu-item-has-children", "menu-item-has-children has-children", $philosophy_nav);
        echo wp_kses_post($philosophy_nav);
    ?>

    <a href="#0" title="Close Menu"
        class="header__overlay-close close-mobile-menu"><?php _e('Close', 'philosophy') ?></a>

</nav> <!-- end header__nav-wrap -->