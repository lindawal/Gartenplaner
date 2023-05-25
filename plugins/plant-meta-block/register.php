<?php

 /*registrieren der Javascripte in Wordpress und verknüpfen der entsprechenden Wordpress Elemente
 AUFBAU
    function mein Funktionsname()
    Aufruf der register-Funktion z.B. wp_register_script
    Bezeichnung z.B. 'block-felder-test'
    Pfad zu meiner Datei z.B. plugins_url( 'assets/js/blocks/mein_block.js', __FILE__ ),
    Abhängigkeit der Elemente in Wordpress z.B. ist Richtext Teil von wp.editor.RichText, daher muss hier im Array wp-editor angegeben werden
 */

function register_plant_meta_block() {
    wp_register_script(
        'plant_meta_block',
        plugins_url( 'assets/js/blocks/plant_meta_block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-components' )
    );

    register_block_type( 'plant/meta-data', array(
        'editor_script'   => 'plant_meta_block',
        'render_callback' => 'show_plant_meta_block',
        // 'attributes' => array(
        //     'content' => array(
        //         'type' => 'string',
        //         'selector' => 'my-plant-meta',
        //     ),
        // ),
    ) );
}
add_action( 'init', 'register_plant_meta_block');

function wpse_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'my-meta-style', $plugin_url . 'assets/css/my-meta-style.css' );
}
add_action( 'wp_enqueue_scripts', 'wpse_load_plugin_css' );


require_once __DIR__ . './plant_meta_display_function.php';