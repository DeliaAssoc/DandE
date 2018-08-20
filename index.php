<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
			<section class="recent-blogs p30">
				<div class="constrain">
					<div class="blog-intro-content p30">
						<div class="subtitle">The D+E Blog</div>
						<div class="intro-text">
							<h1>News & Insights</h1>
						</div>
						<p>We regularly share valuable knowledge and up-to-date information on HR, capital management, payroll and related topics.</p>
					</div>
				</div>
				<div class="constrain flexxed">
					
					<?php
					if ( have_posts() ) :
						
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
			</section>
			<section class="cta-module p60">
				<div class="constrain">
					<div class="flexxed">
						<a href="/services" class="btn btn-lg blue-bg">D+E Services <span class="green-txt">+</span></a>
						<a href="/tech" class="btn btn-lg blue-bg">D+E Technologies <span class="green-txt">+</span></a>
						<a href="/contact" class="btn btn-lg blue-bg"><i class="fa fa-paper-plane"></i> Contact Us</a>
					</div>
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
