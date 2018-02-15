<?php

//include_once "widgets/widget.php";
include_once "testimonial/testimonial.php";
show_admin_bar(false);


/**
 * Include styles/scripts
 */
add_action('wp_enqueue_scripts', 'elena_home_scripts');
function elena_home_scripts()
{

    /**
     * CSS
     */
    wp_enqueue_style('default', get_stylesheet_uri());
    wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i&amp;subset=cyrillic', null, null);
    wp_enqueue_style('custom-plugin-style-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', null, null);
    wp_enqueue_style('custom-plugin-style-owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css', null, null);
    wp_enqueue_style('custom-plugin-style-owl-carousel-theme-default', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css', null, null);
    wp_enqueue_style('custom-style-head', get_template_directory_uri() . '/inc/css/head.min.css', '1.0.0');
    wp_enqueue_style('custom-style-main', get_template_directory_uri() . '/inc/css/main.min.css', '1.0.0');


    /**
     * JS
     */
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom-plugin-google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCW9tebveH-_nB9GqMBdz2Qw9wBa3Tvc-Y&callback=initMap', null, null, true);
    wp_enqueue_script('custom-plugin-owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js', array('jquery'), null, true);
//    wp_enqueue_script('custom-scripts-google-maps-config', get_template_directory_uri() . '/inc/js/google.maps.js', null, '1.0.0', true);
    wp_enqueue_script('custom-scripts-common', get_template_directory_uri() . '/inc/js/common.min.js', array('jquery'), '1.0.0', true);


    /**
     * Specific vars
     */
    $google_maps_icon = ot_get_option('google_maps_marker_icon');
    $google_maps_zoom = ot_get_option('google_maps_zoom');
    $google_maps_lat = ot_get_option('google_maps_lat');
    $google_maps_lng = ot_get_option('google_maps_lng');

    wp_localize_script('custom-scripts-common', 'metaVars', array(
        'gMapMarkerIcon' => $google_maps_icon,
        'gMapZoom' => $google_maps_zoom,
        'gMapLat' => $google_maps_lat,
        'gMapLng' => $google_maps_lng,
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'ajaxNonce' => wp_create_nonce('elena-ajax-custom-nonce')
    ));

}


/**
 * Set async and defer
 *
 * @param $tag
 * @param $handle
 * @param $src
 * @return mixed
 */
function elena_make_script_async( $tag, $handle, $src )
{
    if ( 'custom-plugin-google-maps' != $handle ) {
        return $tag;
    }

    return str_replace( '<script', '<script async defer', $tag );
}
add_filter( 'script_loader_tag', 'elena_make_script_async', 10, 3 );


/**
 * Theme support
 */
add_theme_support('title-tag');
add_theme_support('widgets');


/**
 * Support svg icons
 */
add_filter('upload_mimes', 'cc_mime_types');
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}


/**
 * Registration menu
 */
add_action('after_setup_theme', 'elena_register_nav_menu');
function elena_register_nav_menu()
{
    register_nav_menu('general', 'Главное меню');
}


/**
 * Registration widgets
 */
//add_action('widgets_init', 'elena_my_widgets');
function elena_my_widgets()
{
    register_sidebar(array(
        'name' => "Footer site name",
        'id' => 'footer_sidebar',
        'description' => 'These widgets will be shown in the footer of the site',
        'before_widget' => false,
        'after_widget' => false,
        'before_title' => '<span class="hidden">',
        'after_title' => '</span>',
    ));

    register_sidebar(array(
        'name' => "Footer copyright",
        'id' => 'footer_copyright',
        'description' => 'These widgets will be shown in the footer of the site',
        'before_widget' => false,
        'after_widget' => false,
        'before_title' => '<span class="hidden">',
        'after_title' => '</span>',
    ));

    register_sidebar(array(
        'name' => "Footer form titles",
        'id' => 'footer_form_titles',
        'description' => 'These widgets will be shown in the footer of the site',
        'before_widget' => false,
        'after_widget' => false,
        'before_title' => '<span class="hidden">',
        'after_title' => '</span>',
    ));

    register_sidebar(array(
        'name' => "Footer partners",
        'id' => 'footer_partners',
        'description' => 'These widgets will be shown in the footer of the site',
        'before_widget' => false,
        'after_widget' => false,
        'before_title' => '<span class="hidden">',
        'after_title' => '</span>',
    ));

    register_sidebar(array(
        'name' => "Footer form subscribe",
        'id' => 'footer_form_subscribe',
        'description' => 'These widgets will be shown in the footer of the site',
        'before_widget' => false,
        'after_widget' => false,
        'before_title' => '<span class="hidden">',
        'after_title' => '</span>',
    ));
}
