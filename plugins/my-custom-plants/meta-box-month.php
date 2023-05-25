<?php


/*ANCHOR - month
---------------------*/

function plant_post_type_build_month_meta_box($post)
{
    wp_nonce_field(basename(__FILE__), 'plant_post_type_month_meta_box_nonce');
    $grow_info = array(
        array(
            'name' => 'Voranzucht von',
            'value' => 'infrom'
        ),
        array(
            'name' => 'Voranzucht bis',
            'value' => 'into'
        ),
        array(
            'name' => 'ins Freiland von',
            'value' => 'outfrom'
        ),
        array(
            'name' => 'ins Freiland bis',
            'value' => 'outto'
        ),
        array(
            'name' => 'Ernte von',
            'value' => 'earnfrom'
        ),
        array(
            'name' => 'Ernte bis',
            'value' => 'earnto'
        ),
    );
    $grow_info_lenght = count($grow_info);
    $i = 0;
    while ($i < $grow_info_lenght) {
        $name_prefix = 'plant_' . $grow_info[$i]['value'];
        $current_month = get_post_meta($post->ID, $name_prefix, true);
        ?>
        <div class="<?PHP echo $grow_info[$i]['value'] ?>">
            <section id="<?PHP echo $grow_info[$i]['value'] ?>-meta-box-container">  
            <h4>
                    <?PHP echo $grow_info[$i]['name'];
                    ?>
                </h4>
                <select name='plant_<?PHP echo $grow_info[$i]['value'] ?>' id='plant_<?PHP echo $grow_info[$i]['value'] ?>'>
                    <option value=''>Monat auswählen</option>
                    <option value='1' <?PHP if ($current_month == "1") {
                        echo " selected";
                    } ?>>Januar
                    </option>
                    <option value='2' <?PHP if ($current_month == "2") {
                        echo " selected";
                    } ?>>Februar</option>
                    <option value='3' <?PHP if ($current_month == "3") {
                        echo " selected";
                    } ?>>März</option>
                    <option value='4' <?PHP if ($current_month == "4") {
                        echo " selected";
                    } ?>>April
                    </option>
                    <option value='5' <?PHP if ($current_month == "5") {
                        echo " selected";
                    } ?>>Mai</option>
                    <option value='6' <?PHP if ($current_month == "6") {
                        echo " selected";
                    } ?>>Juni</option>
                    <option value='7' <?PHP if ($current_month == "7") {
                        echo " selected";
                    } ?>>Juli
                    </option>
                    <option value='8' <?PHP if ($current_month == "8") {
                        echo " selected";
                    } ?>>August</option>
                    <option value='9' <?PHP if ($current_month == "9") {
                        echo " selected";
                    } ?>>September</option>
                    <option value='10' <?PHP if ($current_month == "10") {
                        echo " selected";
                    } ?>>Oktober
                    </option>
                    <option value='11' <?PHP if ($current_month == "11") {
                        echo " selected";
                    } ?>>November</option>
                    <option value='12' <?PHP if ($current_month == "12") {
                        echo " selected";
                    } ?>>Dezember</option>
                    <?php
                    ?>
                </select>
            </section>
        </div>
        <?php
        $i++;
    }
}

function plant_post_type_save_month_meta_boxes_data($post_id)
{
    $grow_info = array('infrom', 'into', 'outfrom', 'outto', 'earnfrom', 'earnto');
    $grow_info_lenght = count($grow_info);
    $i = 0;

    if (
        !isset($_POST['plant_post_type_month_meta_box_nonce']) ||
        !wp_verify_nonce(
            $_POST['plant_post_type_month_meta_box_nonce'],
            basename(__FILE__)
        )
    ) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (defined('DOING_AJAX') && DOING_AJAX)
        return;

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    while ($i < $grow_info_lenght) {
        $name_prefix = 'plant_' . $grow_info[$i];
        //if ($_POST[$name_prefix] == '-1')
        // return;

        if (isset($_REQUEST[$name_prefix])) {
            update_post_meta(
                $post_id,
                $name_prefix,
                sanitize_text_field($_POST[$name_prefix])
            );
        }
        $i++;
    }

}

add_action('save_post_plant', 'plant_post_type_save_month_meta_boxes_data', 10, 2);