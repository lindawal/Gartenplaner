<?php
/**
 * Plugin Name: 1 Dropdown Pflanzen Kategorie
 * Description:  Widget für die Sidebar
 * Author: Linda
 */

if (!defined('ABSPATH')) {
    exit;
}

include_once __DIR__ . '/category-dropdown-widget.php';

function my_category_dropdown_widget()
{ //registrieren des Widgets: Name meiner register function
    register_widget('My_Category_Dropdown_Widget'); //register_widget (Name meiner Subklasse von WP_Widget)

}
add_action('widgets_init', 'my_category_dropdown_widget'); //Einbinden des Widgets (Name des Hooks, Name meiner register function)

?>