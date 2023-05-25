<?php

/**
 * Template Name: Suche Template
 *
 * Description: Eine Seite für Suchanfragen
 */

get_header(); ?>

<!--Wiedergabe des Suchparameters -->
<div class="my-archive-header">
<h2> Suche:
    <?php echo $s ?>
</h2>
</div>
<div class="uebersicht">
    <!-- Darstellung der Sidebar -->
     <?php if (is_active_sidebar('plant-sidebar')): ?>
            <div class="plant-widget">
                <?php dynamic_sidebar('plant-sidebar'); ?>
            </div>
            <?php
        endif;
        ?>
    <!-- Darstellung der Produkte -->
    <?php if (have_posts()): ?>
     
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