<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package D_and_E_Consulting
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="breadcrumbs">
				<div class="constrain">
					<?php bcn_display(); ?>
				</div>
			</section>
			<section class="single-post p60">
				<div class="constrain">
					<?php
					while ( have_posts() ) :
						the_post();

						the_post_thumbnail(); ?>

						<div class="post-meta">
							by <?php the_author(); ?> / <?php the_date(); ?>
						</div>

						<h2><?php the_title(); ?></h2>

						<?php the_content(); ?>

						<div class="share-this">
							Share This:
							<a target="_blank" class="share-icon facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a target="_blank" class="share-icon twitter" href="http://twitter.com/intent/tweet?status=<?php the_title(); ?>+<?php the_permalink(); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a target="_blank" class="share-icon linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=<?php echo site_url(); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						</div>

					<?php endwhile; // End of the loop.
					?>
				</div>
			</section>
			<section class="contact-module flexxed">
				<div class="half left-half p60">
					<div class="constrain">
						<div class="subtitle">
							<?php the_field( 'contact_form_subtitle', 'option' ); ?>
						</div>
						<div class="text">
							<?php the_field( 'contact_form_content', 'option' ); ?>
						</div>
						<?php $sc = get_field( 'contact_form_shortcode', 'option' ); ?>
						<div class="blue-form">
							<?php echo do_shortcode( $sc ); ?>
						</div>
					</div>
				</div>
				<div class="half right-half p60" style="background-image: url( '<?php the_field( 'contact_side_background_image', 'option' ); ?>' );">
					<div class="side-content">
						<?php the_field( 'contact_side_content', 'option' ); ?>
					</div>
				</div>
			</section><!-- .contact-module -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
