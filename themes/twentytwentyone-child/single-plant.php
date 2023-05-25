<?php

/**
 * Template Name: Pflanzen Einzelseite Template
 *
 * Description: Eine eigene Seite für meinen Post Type „plant“
 */

get_header(); ?>
<main>
    <div id="container">
        <?php
        if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header alignwide">
                        <h2>
                            <?php the_title(); ?>
                        </h2>
                        <!-- <div class="meta">
                            <p>
                                Kategorie:
                                <?php 
                       //         $term_list= get_the_term_list($post->ID, 'plant_category', '', ', '); 
                       //         echo $term_list;?>
                            </p>
                        </div> -->
                    </header>
                    <div class="entry alignwide">
                        <?php the_content(); ?>
                    </div>
                    <?php if ( has_post_thumbnail() ) : ?>
			<div class="my-post-thumbnail alignwide">
                                <img src="<?php the_post_thumbnail_url('large'); ?>"/>
			</div>
            <?php
		endif;
        ?>
                </article>
                <?php
            endwhile; ?>
            <div class="post-navigation">
                <?php /*the_post_navigation(
                    array(
                        'next_text' => 'weitere Pflanzen: ' .  '%title &raquo;',
                        'screen_reader_text' => 'Weitere Beiträge',
                        'in_same_term' => true,
                    )
                ); */
                
                // Previous/next post navigation.
	$twentytwentyone_next = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' );
	$twentytwentyone_prev = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' );

	$twentytwentyone_next_label     = 'nächste Pflanze';
	$twentytwentyone_previous_label = 'vorherige Pflanze';

	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $twentytwentyone_next_label 
            . $twentytwentyone_next . '</p><p class="post-title">%title</p>',
			'prev_text' => '<p class="meta-nav">' . $twentytwentyone_prev . $twentytwentyone_previous_label . '</p><p class="post-title">%title</p>',
		)
	);

                ?>

                
            </div>
            <?php
        endif;
        ?>
    </div>
</main>
<?php
get_footer();
?>