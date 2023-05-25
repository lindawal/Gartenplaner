<?php

function wpse_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'my-meta-style', $plugin_url . 'my-meta-style.css' );
}
add_action( 'wp_enqueue_scripts', 'wpse_load_plugin_css' );

?>