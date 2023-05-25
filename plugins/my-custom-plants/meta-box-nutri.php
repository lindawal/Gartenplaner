<?PHP

/**
 * Darstellung der "nutri" Meta Box
 *
 */

function plant_post_type_build_nutri_meta_box($post)
{
    wp_nonce_field(basename(__FILE__), 'plant_post_type_nutri_meta_box_nonce');

    $current_nutri = get_post_meta($post->ID, 'plant_nutri', true);
    ?>
    <div class="inside">
        <section id="nutri-meta-box-container">
            <p>
                    <select name='plant_nutri' id='plant_nutri'>
                    <option value='-1'>Kategorie auswählen</option>
                    <option value='Starkzehrer' <?PHP if ($current_nutri == "Starkzehrer") {
                        echo " selected";
                    } ?>>Starkzehrer
                    </option>
                    <option value='Mittelzehrer' <?PHP if ($current_nutri == "Mittelzehrer") {
                        echo " selected";
                    } ?> >Mittelzehrer</option>
                    <option value='Schwachzehrer' <?PHP if ($current_nutri == "Schwachzehrer") {
                        echo " selected";
                    } ?> >Schwachzehrer</option>
                </select>
            </p>
        </section>
    </div>
    <?php
}

/**
 * Speicherung der "nutri" Meta Box Daten
 *
 * @param int $post_id Die Post ID.
 */

function plant_post_type_save_nutri_meta_boxes_data($post_id)
{
    if (
        !isset($_POST['plant_post_type_nutri_meta_box_nonce']) ||
        !wp_verify_nonce(
            $_POST['plant_post_type_nutri_meta_box_nonce'],
            basename(__FILE__)
        )
    ) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (defined('DOING_AJAX') && DOING_AJAX)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    if ($_POST['plant_nutri'] == '-1')
        return;

    if (isset($_REQUEST['plant_nutri'])) {
        update_post_meta(
            $post_id,
            'plant_nutri',
            sanitize_text_field($_POST['plant_nutri'])
        );
    }
}

add_action('save_post_plant', 'plant_post_type_save_nutri_meta_boxes_data', 10, 2);
