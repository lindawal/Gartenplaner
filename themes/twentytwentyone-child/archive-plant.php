<?php

/**
 * Template Name: Pflanzen Archive Template
 *
 * Description: Eine eigene Archivseite für meinen Post Type „plant“
 */

get_header();

$archive_decscription = get_the_archive_description();
?>

<div class="my-archive-header">
    <!--Archivtitel -->
    <h2>
        <?php the_archive_title(); ?>
    </h2>
    <!-- Darstellung der Archivbeschreibung -->
    <?php
    echo $archive_decscription; ?>
</div>
<!-- Darstellung der Produkte -->
<div class="uebersicht">
    <?php if (have_posts()): ?>

        <?php if (is_active_sidebar('plant-sidebar')): ?>
            <div class="plant-widget">
                <?php dynamic_sidebar('plant-sidebar'); ?>
            </div>
            <?php
        endif;
        ?>
        <div class="my-article-container">
            <!-- <div class="my-post-header">
        </div> -->
            <div class='my-post-archive-flex'>
                <?php
                while (have_posts()):
                    the_post();
                    get_template_part('templates/post/plant-content', get_post_format());

                endwhile;

    else:
        ?>
        <div class="my-article-container">
        <div class='my-post-archive-flex'>
        <?php
        echo 'keine Ergebnisse<br>';
    endif;
    ?>
        </div>
        <?php the_posts_pagination(); ?>
    </div>
</div>

<?php
get_footer();