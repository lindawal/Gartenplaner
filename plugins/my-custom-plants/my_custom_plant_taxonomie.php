<?php

// WordPress Hook der die Funktion "create_product_taxonomies" beim initialisieren von WordPress aufruft
add_action('init', 'create_plant_taxonomies', 0);

// Selbst definierte Funktion die wir oben an den Hook übergeben
function create_plant_taxonomies()
{
    // Die Labels sind für die Ausgaben im Backend zuständig
    $labels = array(
        'name' => __('Pflanzen Kategorien'),
        'singular_name' => __('Pflanzen Kategorie'),
        'search_items' => __('Pflanzen Kategorien durchsuchen'),
        'all_items' => __('Alle Pflanzen Kategorien'),
        'parent_item' => __('Pflanzen Hauptkategorie'),
        'parent_item_colon' => __('Pflanzen Hauptkategorie:'),
        'edit_item' => __('Pflanzen Kategorie bearbeiten'),
        'update_item' => __('Pflanzen Kategorie aktualisieren'),
        'add_new_item' => __('Neue Pflanzen Kategorie hinzufügen'),
        'new_item_name' => __('Neue Pflanzen Kategorie Name'),
        'menu_name' => __('Pflanzen Kategorien'),
    );

    // Name der Taxonomie - array('product') verbindet diese Taxonomie mit dem Post-Type product
    register_taxonomy(
        'plant_category',
        array('plant'),
        array(
            'hierarchical' => false,
            'public' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_in_rest' => true,
            'query_var' => 'plant_category',
            'rewrite' => array('slug' => 'pflanzen-kategorie'),
        )
    );
}

?>