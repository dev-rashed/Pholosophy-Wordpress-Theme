<?php

require_once( get_theme_file_path('inc/tgm.php') );
require_once( get_theme_file_path('inc/attatchments.php') );

if ( ! isset( $content_width ) ) $content_width = 900;
if(site_url() == "http://theme-dev.test/") {
    define( 'VERSION', time() );
} else {
    define( 'VERSION', wp_get_theme()->get( 'Version' ) );
}

function philosophy_theme_setup() {
    load_theme_textdomain( 'philosophy' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'search-form', 'comment-list' ) );
    add_theme_support( 'post-formats', array('image', 'gallery', 'video', 'audio', 'link', 'quote') );
    add_image_size( "philosophy-square-small", 400, 400, true);
    add_editor_style( 'assets/css/editor-style.css' );
    add_theme_support( 'custom-logo' );

    register_nav_menu( 'topmenu', __( 'Top Menu', 'philosophy' ) );
    register_nav_menus( array(
        'footer-left'   => __( 'Footer Left Menu', 'philosophy' ),
        'footer-middle'   => __( 'Footer Middle Menu', 'philosophy' ),
        'footer-right'   => __( 'Footer Right Menu', 'philosophy' ),
    ) );
}
add_action( 'after_setup_theme', 'philosophy_theme_setup' );

function philosophy_theme_scripts() {
    wp_enqueue_style( 'fontawesome-css', get_theme_file_uri() . '/assets/css/font-awesome/font-awesome.min.css', null, "1.0" );
    wp_enqueue_style( 'fonts-css', get_theme_file_uri() . '/assets/css/fonts.css', null, "1.0" );
    wp_enqueue_style( 'base-css', get_theme_file_uri() . '/assets/css/base.css', null, "1.0" );
    wp_enqueue_style( 'main-css', get_theme_file_uri() . '/assets/css/main.css', null, "1.0" );
    wp_enqueue_style( 'philosophy-css', get_stylesheet_uri(), null, VERSION );

    wp_enqueue_script( 'modernizr', get_theme_file_uri() . '/assets/js/modernizr.js', null, "1.0", false );
    wp_enqueue_script( 'pace-js', get_theme_file_uri() . '/assets/js/pace.min.js', null, "1.0", false );
    wp_enqueue_script( 'plugins-js', get_theme_file_uri() . '/assets/js/plugins.js', array('jquery'), "1.0", true );
    if ( is_singular() ) {
        wp_enqueue_script( "comment-reply" );
    }
    wp_enqueue_script( 'main-js', get_theme_file_uri() . '/assets/js/main.js', array('jquery'), "1.0", true );
}
add_action( 'wp_enqueue_scripts', 'philosophy_theme_scripts' );

function philosophy_pagination() {
    global $wp_query;

    $links = paginate_links(array(
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'list',
    ));
    $links = str_replace('page-numbers', 'pgn__num', $links);
    $links = str_replace('next pgn__num', 'pgn__next', $links);
    $links = str_replace('prev pgn__num', 'pgn__prev', $links);
	$links = str_replace('<ul class="pgn__num">', '<ul>', $links);
	echo wp_kses_post($links);
}

remove_action( 'term_description', 'wpautop' );

function philosophy_widgets() {
    register_sidebar( array(
        'name'          => __( 'About us page', 'philosophy' ),
        'id'            => 'about-us',
        'description'   => __( 'Widgets in this area will be shown on about us page', 'philosophy' ),
        'before_widget' => '<div class="col-block">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact page map', 'philosophy' ),
        'id'            => 'contact-map',
        'description'   => __( 'Widgets in this area will be shown on contact page map', 'philosophy' ),
        'before_widget' => '<div id="map-wrap">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact page widgets', 'philosophy' ),
        'id'            => 'contact-widgets',
        'description'   => __( 'Widgets in this area will be shown on contact page widgets', 'philosophy' ),
        'before_widget' => '<div class="col-block">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Before footer', 'philosophy' ),
        'id'            => 'before-footer',
        'description'   => __( 'Widgets in this area will be shown on footer', 'philosophy' ),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Right', 'philosophy' ),
        'id'            => 'footer-right',
        'description'   => __( 'Widgets in this area will be shown on footer right side', 'philosophy' ),
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Bottom', 'philosophy' ),
        'id'            => 'footer-bottom',
        'description'   => __( 'Widgets in this area will be shown on footer bottom side', 'philosophy' ),
        'before_widget' => '<div class="s-footer__copyright">',
        'after_widget'  => '</div>',
        'before_title'  => '<span>',
        'after_title'   => '</span>',
    ) );
    
}
add_action( 'widgets_init', 'philosophy_widgets' );

add_filter('use_widgets_block_editor', '__return_false');

function philosophy_get_search_form( $form ) {
    $action = home_url( '/' );
    $label = __( 'Search For', 'philosophy' );
    $btnlabel = __( 'Search', 'philosophy' );
    $placeholder = __( 'Type Keywords', 'philosophy' );
    $newForm = <<<FORM
<form role="search" method="get" class="header__search-form" action="{$action}">
    <label>
        <span class="hide-content">{$label}</span>
        <input type="search" class="search-field" placeholder="{$placeholder}" value="" name="s" title="Search for:" autocomplete="off">
    </label>
    <input type="submit" class="search-submit" value="${$btnlabel}">
</form>
FORM;
return $newForm;
}
add_filter( 'get_search_form', 'philosophy_get_search_form' );