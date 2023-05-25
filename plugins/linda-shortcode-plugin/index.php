<?php
/**
 * Plugin Name: Meine Shortcodes
 * Description: Shortcodes für benutzerdefinierte Felder
 * Author: Linda
 */

if (!defined('ABSPATH')) {
    exit;
}


/**
 * [gute_nachbarn] gibt einen Loop eines benutzerdefinierten Feldes zu bestimmten Eigenschaften wieder
 * funktioniert nur mit:
 * Posttype: 'plant'
 * Feld: 'plant_nutri'
 * @return string
*
* Bsp. [my_field 'plant_nutri']
 */
require_once __DIR__ . '/nachbarn.php';

add_shortcode('gute_nachbarn', 'gute_nachbarn');
add_shortcode('schlechte_nachbarn', 'schlechte_nachbarn');


/**
 * [my_field '@param'] gibt den Inhalt eines benutzerdefinierten Feldes wieder
 * erwartet einen Parameter:
 * @param string key des benutzerdefinierten Feldes
 * 
 * @return string benutzerdefiniertes Feld
*
* Bsp. [my_field 'plant_nutri']
 */
add_shortcode('my_field', 'shortcode_field');
function shortcode_field($attr)
{
    extract(shortcode_atts(
        array(
            'post_id' => NULL,
        ), $attr));
    if (!isset($attr[0]))
        return;
    $field = esc_attr($attr[0]);
    global $post;
    $post_id = (NULL === $post_id) ? $post->ID : $post_id;
    return get_post_meta($post_id, $field, true);
}


/**
 * [my_month_field '@param' '@param'] gibt den Inhalt eines benutzerdefinierten Feldes zum Pflanzmonat wieder
 * Pflanzmonat Integer wird in Monatsnamen als String umgewandelt
 * 
 * erwartet zwei Parameter:
 * @param string key des 1. benutzerdefinierten Feldes
 * @param string key des 2. benutzerdefinierten Feldes
 * 
 * @return string @param 1 bis @param 2
*
* Bsp. [my_month_field 'plant_infrom' 'plant_into']
 */

require_once __DIR__ . "./month_num_to_name.php";
add_shortcode('my_month_field', 'shortcode_month_field');
function shortcode_month_field($atts)
{
    extract(shortcode_atts(
        array(
            //wenn keine Parameter für Post_ID übergeben werden, werden diese als NULL ausgegeben
            'post_id' => NULL,
        ), $atts));
    if (!isset($atts[0]) || !isset($atts[1]))
        return;
    $month_field1 = esc_attr($atts[0]);
    $month_field2 = esc_attr($atts[1]);

    global $post;
    $post_id = (NULL === $post_id) ? $post->ID : $post_id;

    $month_num1 = get_post_meta($post_id, $month_field1, true);
    $month_num2 = get_post_meta($post_id, $month_field2, true);
    $month_name1 = num_to_name($month_num1);
    $month_name2 = num_to_name($month_num2);

    if ($month_name1 != $month_name2) {
        $month_string = $month_name1 . " bis " . $month_name2;
    } else
        $month_string = $month_name1;

    return $month_string;
}

/**
 * [my_field format='@param'] gibt das Datum der Betrachtung der Seite wieder
 * erwartet einen Parameter:
 * @param string Formatierung für php-date-Funktion
 * 
 * @return string Angesehen am: DATUM
*
* Bsp. [angesehen format= 'd.F.Y']
 */

add_shortcode('angesehen', 'mein_shortcode');
function mein_shortcode($attr)
{
    $string = '<p>Angesehen am: ';
    $string .= date($attr['format'], time());
    $string .= '</p>';
    return $string;
}

/**
 * [current_year] returns the Current Year as a 4-digit string.
 * @return string Current Year
 */

add_shortcode('current_year', 'salcodes_year');
function salcodes_init()
{
    function salcodes_year()
    {
        return getdate()['year'];
    }
}
add_action('init', 'salcodes_init');


?>