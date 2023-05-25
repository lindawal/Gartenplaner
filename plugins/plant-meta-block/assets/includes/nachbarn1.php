<?PHP

/**
 * Summary of pflanzen_nachbarn
 * @param mixed $args
 * @param mixed $compare
 * @return string Loop mit den geeigneten Pflanzen
 */
function pflanzen_nachbarn($args, $compare = '')
{
    $nahrstoffe = get_naehrstoffe1($args);
    $attr = array(
        'post__not_in' => array(get_the_ID()),//schließt die Id des aktuellen Posts aus
        'post_type' => 'plant',
        'post_status' => 'publish',
        'posts_per_page' => 3,
         'meta_query' => array(
             'show_post_query' => array(
                 'key' => 'plant_nutri',
                 'value' => $nahrstoffe,
                 'compare' => $compare,        //entspricht dem meta_query Muster ='' oder entspricht nicht = 'NOT LIKE'
             ),
        )
    );
    $the_query = new WP_Query($attr);
    $string = '';
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $string .= '<a href="' . get_permalink() . '">';
            $string .= get_the_title();
            $string .= '&#8194;</a> ';
        }
        $string .= '</p>';

    } else
        $string = 'keine';

    wp_reset_postdata();
    return $string;
}

function get_naehrstoffe1($args)
{
    extract(
        shortcode_atts(
            array(
                'post_id' => NULL,
            ),
            $args
        )
    );
    global $post;
    $post_id = (NULL === $post_id) ? $post->ID : $post_id;
    $nahrstoffe = get_post_meta($post_id, 'plant_nutri', true);

    return $nahrstoffe;
}

?>