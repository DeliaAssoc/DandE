<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package D_and_E_Consulting
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('posts-2'); ?>>

	<div class="entry-content">
	<div class="post-block posts-<?php echo $count; ?>">
		<?php the_post_thumbnail(); ?>
		<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
		<div class="post-date"><?php echo get_the_date(); ?> <span class="dkgray-text">/</span> <?php the_time(); ?></div>
		<?php the_excerpt(); ?>
		<a class="post-link" href="<?php the_permalink(); ?>">Read More +</a>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
