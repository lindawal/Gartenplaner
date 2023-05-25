<?PHP

function add_custom_plant_meta_box($meta_box_id, $meta_box_title)
{
    $plugin_prefix = 'plant_post_type_';

    $html_id_attribute = $plugin_prefix . $meta_box_id . '_meta_box';  // z.b. plant_post_type_nutri_meta_box
    $php_callback_function = $plugin_prefix . 'build_' . $meta_box_id . '_meta_box'; //z.b.plant_post_type_build_nutri_meta_box
    $show_me_on_post_type = 'plant';
    $box_placement = 'side';
    $box_priority = 'low';

    add_meta_box(
        $html_id_attribute,     //plant_post_type_nutri_meta_box
        $meta_box_title,        //Nährstoffbedarf
        $php_callback_function, //z.b.plant_post_type_build_nutri_meta_box
        $show_me_on_post_type,
        $box_placement,
        $box_priority
    );
}

// function add_custom_plant_month_meta_box($meta_box_id, $meta_box_title)
// {
//     $plugin_prefix = 'plant_post_type_';

//     $html_id_attribute = $plugin_prefix . $meta_box_id . '_meta_box';  // z.b. plant_post_type_nutri_meta_box
//     $php_callback_function = $plugin_prefix . 'build_' . 'month' . '_meta_box'; //z.b.plant_post_type_build_nutri_meta_box
//     $show_me_on_post_type = 'plant';
//     $box_placement = 'side';
//     $box_priority = 'low';

//     add_meta_box(
//         $html_id_attribute,     //plant_post_type_nutri_meta_box
//         $meta_box_title,        //Nährstoffbedarf
//         $php_callback_function, //z.b.plant_post_type_build_nutri_meta_box
//         $show_me_on_post_type,
//         $box_placement,
//         $box_priority,
//         $meta_box_id
//     );
// }

/**
 * Registrieren der Meta Boxen
 *
 * @param object $post Das Post Objekt.
 */
// $name = 'inForm';

function plant_post_type_add_meta_boxes($post)
{
    add_custom_plant_meta_box('nutri', __('Nährstoffbedarf'));
    add_custom_plant_meta_box('month', __('Pflanzinfo'));
    // add_custom_plant_meta_box($meta_box_id, __($meta_box_title));
    // Hier können weitere Meta Boxen registriert werden.
}
add_action('add_meta_boxes_plant', 'plant_post_type_add_meta_boxes');
require_once __DIR__ . "./meta-box-nutri.php";
require_once __DIR__ . "./meta-box-month.php";

// $meta_box_id ='into';

// function plant_post_type_add_month_meta_boxes($post)
//  { //global $meta;
//     add_custom_plant_month_meta_box('into', __('Endmonat Voranzucht'));
//     add_custom_plant_month_meta_box('outfrom', __('Startmonat Freiland'));
//     // add_custom_plant_meta_box($meta_box_id, __($meta_box_title));
//     // Hier können weitere Meta Boxen registriert werden.
// }
// add_action('add_meta_boxes_plant', 'plant_post_type_add_month_meta_boxes');

// require_once __DIR__ . "./meta-box-month.php";


