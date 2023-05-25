<?php
function twentytwentyone_child_styles() {
wp_deregister_style( 'twenty-twenty-one-style');
wp_register_style('twenty-twenty-one-style', get_template_directory_uri().
'/style.css');
wp_enqueue_style('twenty-twenty-one-style', get_template_directory_uri().
'/style.css');
wp_enqueue_style( 'childtheme-style',
get_stylesheet_directory_uri().'/style.css', array('twenty-twenty-one-style')
);
wp_enqueue_style('inter-font', get_stylesheet_directory_uri() . '/assets/fonts/inter/font-styles.css');
wp_enqueue_style('ibm-plex-mono', get_stylesheet_directory_uri() . '/assets/fonts/ibm-plex-mono/font-styles.css');
}
add_action( 'wp_enqueue_scripts', 'twentytwentyone_child_styles' );


// function register_my_menus() {
//     register_nav_menus(
//       array(
//           'main-menu' => __( 'Hauptmenü' ),
//           'mobile-menu' => __( 'Menü auf Mobilgeräten' ),
//           'secondary-menu' => __( 'Footermenü' )
//           )
//      );
//    }
//    add_action( 'init', 'register_my_menus' );

   add_action( 'wp_enqueue_scripts', 'add_child_theme_scripts' ); 

//Scripte laden
function add_child_theme_scripts () {
    wp_enqueue_script(
        'mjquery', // eigener Name
        get_stylesheet_directory_uri() . '/assets/js/jquery-3.6.3.min.js', // Pfad
        array('jquery') // Abhängigkeiten
    );
    // wp_enqueue_script(
    //     'jquery-nav-toggle', // eigener Name
    //     get_stylesheet_directory_uri() . '/assets/js/jquery-nav.js', // Pfad
    //     array() // Abhängigkeiten
    // );
}

//  Archive Seiten ohne Kategoriebezeichnung anzeigen
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
  }); 

  function twenty_twenty_one_child_sidebar(){
    register_sidebar(
    array(
    'name' => esc_html__( 'Pflanzen-Sidebar', 'twentytwentyonechild' ),
    'id' => 'plant-sidebar',
    'description' => esc_html__('Widgets hinzufügen, um diese im Pflanzen Archiv anzuzeigen'),
    'before_title' => '<h3  class="widget-title">',
    'after_title' => '</h3>',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    ) );
    }

        // register_sidebar(
        //     array(
        //         'name'          => esc_html__( 'Footer', 'twentytwentyone' ),
        //         'id'            => 'sidebar-1',
        //         'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'twentytwentyone' ),
        //         'before_widget' => '<section id="%1$s" class="widget %2$s">',
        //         'after_widget'  => '</section>',
        //         'before_title'  => '<h2 class="widget-title">',
        //         'after_title'   => '</h2>',
        //     )
        // );
 
    add_action( 'widgets_init', 'twenty_twenty_one_child_sidebar' );


//Länge der excerpt Ausgabe beschränken
    add_filter( 'excerpt_length', function($length) {
        return 35;
     } );