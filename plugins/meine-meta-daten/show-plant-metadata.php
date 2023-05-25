<?php

include_once __DIR__ . "./month_num_to_name.php";
include_once __DIR__ . "./nachbarn.php";

add_filter('the_content', 'show_plant_meta');
function show_plant_meta($content)
{   $curCategory =  get_the_term_list(get_the_ID(), 'plant_category');
    $nutri = get_post_meta(get_the_ID(), 'plant_nutri', true);
    $inFrom = get_post_meta(get_the_ID(), 'plant_infrom', true);
    $inTo = get_post_meta(get_the_ID(), 'plant_into', true);
    $outFrom = get_post_meta(get_the_ID(), 'plant_outfrom', true);
    $outTo = get_post_meta(get_the_ID(), 'plant_outto', true);
    $earnFrom = get_post_meta(get_the_ID(), 'plant_earnfrom', true);
    $earnTo = get_post_meta(get_the_ID(), 'plant_earnto', true);

if (is_single() && (preg_match('/pflanze/i', $curCategory))
) {    
    echo "<div class='my-plant-meta'>";
    
//Nährstoffe anzeigen
    if (!empty($nutri)) {
        echo "<div>";
        echo "<p>Nährstoffbedarf:</p>" .
            "<p>" . $nutri . "</p>";
        echo "</div>";
    }
//Voranzucht von bis
    if (!empty($inFrom) || !empty($inTo)) {
        $month_nameFrom = month_num_to_name($inFrom);
        $month_nameTo = month_num_to_name($inTo);
        echo "<div>";
        echo "<p>Voranzucht:</p>";
        if ($month_nameFrom != $month_nameTo) {
            echo "<p>" . $month_nameFrom . " bis " . $month_nameTo . "</p>";
        } else
        echo "<p>" . $month_nameFrom . "</p>";
        echo "</div>";
    }
//Freiland Pflanzung von bis
    if (!empty($outFrom) || !empty($outTo)) {
        $month_nameFrom = month_num_to_name($outFrom);
        $month_nameTo = month_num_to_name($outTo);
        echo "<div>";
        echo "<p>Ins Freiland pflanzen:</p>";
        if ($month_nameFrom != $month_nameTo) {
            echo "<p>" . $month_nameFrom . " bis " . $month_nameTo . "</p>";
        } else
            echo "<p>" . $month_nameFrom . "</p>";
        echo "</div>";
    }
//Ernte von bis
if (!empty($earnFrom) || !empty($earnTo)) {
    $month_nameFrom = month_num_to_name($earnFrom);
    $month_nameTo = month_num_to_name($earnTo);
    echo "<div>";
    echo "<p>Ernte:</p>";
    if ($month_nameFrom != $month_nameTo) {
        echo "<p>" . $month_nameFrom . " bis " . $month_nameTo . "</p>";
    } else
        echo "<p>" . $month_nameFrom . "</p>";
    echo "</div>";
}
//Pflanzennachbarn
    if (!empty($nutri)) {
    $gute_nachbarn = gute_pflanzen_nachbarn($nutri);
    echo "<div>";
    echo "<p>Gute Nachbarn:</p>" .
        "<p>" . $gute_nachbarn . "</p>";
    echo "</div>";

    $schlechte_nachbarn = schlechte_pflanzen_nachbarn($nutri);
    echo "<div>";
    echo "<p>Schlechte Nachbarn:</p>" .
        "<p>" . $schlechte_nachbarn . "</p>";
    echo "</div>";
    }
    echo "</div>";
}
    return $content;

}