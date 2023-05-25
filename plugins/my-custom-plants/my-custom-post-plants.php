<?php

// WordPress Hook der die Funktion "create_post_type" beim initialisieren von WordPress aufruft
add_action('init', 'create_post_type');

// Selbst definierte Funktion die an den Hook übergeben wird
function create_post_type()
{
    // register_post_type( 'Name des Post-Types', 'Weitere Optionen als array' );
    register_post_type(
        'plant',
        array(
            /* Labes definieren die Ausgaben im Backend */
            'labels' => array(
                'name' => __('Pflanzen'),
                'singular_name' => __('Pflanze'),
                'add_new' => __('Neue Pflanze hinzufügen'),
                'add_new_item' => __('Neue Pflanze hinzufügen'),
                'edit_item' => __('Pflanze bearbeiten'),
                'new_item' => __('Neue Pflanze'),
                'all_items' => __('Alle Pflanzen'),
                'view_item' => __('Pflanze ansehen'),
                'search_items' => __('Pflanze suchen'),
                'not_found' => __('Keine Pflanzen gefunden'),
                'not_found_in_trash' => __('Keine Pflanzen im Papierkorb gefunden'),
                'menu_name' => __('Meine Pflanzen')
            ),
            'public' => true,       //Ob die Taxonomie für die öffentliche Verwendung über die Admin-Oberfläche oder durch Front-End-Benutzer vorgesehen ist
            // 'publicly_queryable' => true,     //erbt von Public
            // 'show_ui' => true,               //erbt von Public
            'menu_position' => 5,               //Position im Admin-Menü
            'menu_icon' => 'dashicons-carrot', //icon im Admin-Menü
            'hierarchical' => true,             //hierarchische Seitenansicht
            /* Hier kann ein URL Slug definiert werden, also die Permalink Struktur des Post-Types - hier beispiel.de/pflanzen/ */
            'rewrite' => array('slug' => 'pflanzen'),
            /* Funktionen des Editors */
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes'),
            'has_archive' => true,      //Archiv erlauben
            'show_in_rest' => true,     //Taxonomie in die REST-API aufnehmen -> wichtig für Blockeditor
            'template' => array(        //Template zum Anlegen neuer Pflanzen
                array(
                    'plant/meta-data',
                ),
                array(
                    'core/paragraph',
                    array(
                        'placeholder' => 'Text einfügen',
                    ),
                ),
                array(
                    'core/heading',
                    array(
                        'level' => 3,
                        'content' => 'Aussaat und Pflanzung',
                    ),
                ),
                array(
                    'core/paragraph',
                    array(
                        'placeholder' => 'Text einfügen',
                    ),
                ),
                array(
                    'core/heading',
                    array(
                        'level' => 3,
                        'content' => 'Fruchtfolge und Mischkultur',
                    ),
                ),
                array(
                    'core/paragraph',
                    array(
                        'placeholder' => 'Text einfügen',
                    ),
                ),
            ),
            // 'template_lock' => 'false',
        )
    );
}


?>