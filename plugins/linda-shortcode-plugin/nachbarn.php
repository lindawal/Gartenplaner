<?PHP

function schlechte_nachbarn($args)
{
    $nahrstoffe = get_nahrstoffe($args);
    $attr = array(
        'post_type' => 'plant',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'meta_query' => array(
            'show_post_query' => array(
                'key' => 'plant_nutri',
                'value' => $nahrstoffe,
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

function gute_nachbarn($args)
{
    $nahrstoffe = get_nahrstoffe($args);
    $attr = array(
        'post_type' => 'plant',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'meta_query' => array(
            'show_post_query' => array(
                'key' => 'plant_nutri',
                'value' => $nahrstoffe,
                'compare' => 'NOT LIKE'
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

function get_nahrstoffe($args)
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