<?php

// Die Widget-Klasse erstellen
class My_Category_Dropdown_Widget extends WP_Widget
{

    // Die Widget-Initialisierungsmethode
    function __construct()
    {
        parent::__construct(
            'my_category_dropdown_widget',
            // Widget-ID
            'Dropdown für Pflanzen-Kategorien',
            // Widget-Name
            array('description' => 'Ein einfaches Sidebar Widget, welches ein Dropdown Menü mit den Pflanzen-Kategorien anzeigt.') // Widget-Beschreibung
        );
    }

    // Ausgabe des Widget-Contents im Front-End (Website)
    public function widget($args, $instance)
    {
        // Widget-Titel
        $title1 = apply_filters('widget_title', $instance['title']);

        // Widget-Ausgabe 
        echo $args['before_widget'];
        if (!empty($title1)) {
            echo $args['before_title'] . $title1 . $args['after_title'];
        }
        ?>

        <?php
        $plant_categories = get_categories('taxonomy=plant_category');
        $current_cat = single_term_title("", false);

        echo "<select name='cat' id='cat' class='postform'>" .
            "<option value='-1'>Kategorie auswählen</option>";
        foreach ($plant_categories as $plant_category) {
            if ($plant_category->count > 0) {

                echo "<option value='" . $plant_category->slug . "'";
                if ($current_cat == $plant_category->name) {
                    echo " selected";
                }
                echo ">" . $plant_category->name . "</option>";

            }
        }
        echo "</select>";
        ?>
        <script>
            jQuery(function ($) {
                $('#cat').on('change', function () {
                    var selectedValue = $(this).val();
                    if (selectedValue !== '-1') {
                        window.location.href = "<?php echo home_url() ?>/pflanzen-kategorie/" + selectedValue + "/";
                    }
                });
            });
        </script>
        <?php
        echo $args['after_widget'];
    }

    // Widget-Formular im Admin Bereich
    public function form($instance)
    {
        $title1 = !empty($instance['title']) ? $instance['title'] : esc_html__('', 'text_domain');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Titel:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                value="<?php echo esc_attr($title1); ?>">
        </p>
    <?php
    }

    // Widget-Formular aktualisieren
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

}