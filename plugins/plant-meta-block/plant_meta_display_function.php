<?php

include_once __DIR__ . "./assets/includes/month_num_to_name1.php";
include_once __DIR__ . "./assets/includes/nachbarn1.php";

function show_plant_meta_block()
{
    $nutri = get_post_meta(get_the_ID(), 'plant_nutri', true);
    $meta_data = array();
    $meta_info = array('Nährstoffbedarf', 'Gute Nachbarn', 'Schlechte Nachbarn');
    $string = "";

    $grow_info = array(
        array(
            'name' => 'Voranzucht:',
            'from' => 'infrom',
            'to' => 'into'
        ),
        array(
            'name' => 'ins Freiland pflanzen:',
            'from' => 'outfrom',
            'to' => 'outto'
        ),
        array(
            'name' => 'Ernte:',
            'from' => 'earnfrom',
            'to' => 'earnto'
        ),
    );
    $grow_info_lenght = count($grow_info);
    $i = 0;
    while ($i < $grow_info_lenght) {
        $id_from_prefix = 'plant_' . $grow_info[$i]['from'];
        $id_to_prefix = 'plant_' . $grow_info[$i]['to'];
        $meta_From = get_post_meta(get_the_ID(), $id_from_prefix, true);
        $meta_To = get_post_meta(get_the_ID(), $id_to_prefix, true);



        if (!empty($meta_From) || !empty($meta_To)) {
            if (empty($string)) {
                $string .= "<div class='my-plant-meta'>";
            }
            $month_nameFrom = month_num_to_name1($meta_From);
            $month_nameTo = month_num_to_name1($meta_To);
            $string .= "<div>";
            $string .= "<p>" . $grow_info[$i]['name'] . "</p>";
            if ($month_nameFrom != $month_nameTo) {
                $string .= "<p>" . $month_nameFrom . " bis " . $month_nameTo . "</p>";
            } else
                $string .= "<p>" . $month_nameFrom . "</p>";
            $string .= "</div>";
        }
        $i++;
    }

      //Nährstoffe und Pflanzennachbarn anzeigen
      if (!empty($nutri)) {
        if (empty($string)) {
            $string .= "<div class='my-plant-meta'>";
        }
        $gute_nachbarn = pflanzen_nachbarn($nutri, 'NOT LIKE');
        $schlechte_nachbarn = pflanzen_nachbarn($nutri);
        $meta_data[] = $nutri;
        $meta_data[] = $gute_nachbarn;
        $meta_data[] = $schlechte_nachbarn;

        $meta_data_lenght = count($meta_data);
        $i = 0;
        while ($i <  $meta_data_lenght) {
        $string .= "<div>";
        $string .= "<p>" . $meta_info[$i] . ":</p>" .
            "<p>" .  $meta_data[$i] . "</p>";
        $string .= "</div>";
        $i++;
    }


    if (!empty($string)) {
        $string .= "</div>";
    }

    return $string;
}
}

?>