<?php
/**
 * Das Standard-Template zum Anzeigen eines Produktes
 */
?>

<article
    id="post-<?php the_ID(); ?>"
    <?php post_class(); ?>
>
<div class="post__header <?php if ( has_post_thumbnail() ) : ?>post__header--cover<?php endif; ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="my_post_image">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</div>
			<?php
		endif;

		if ( get_the_title() ) :
			?>
			<h3 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php endif; ?>
        </div>
    <div class="my_content">
        <?php the_excerpt(); ?>
    </div>
    <div>
        <br>
        <?php
        if ( ! is_single() ) :
		?>
		<a href="<?php the_permalink(); ?>" class="my_post_readmore"><i class="triangle-right"></i><span>Weiterlesen</span></a>
	<?php endif; ?>
    </div>

</article>