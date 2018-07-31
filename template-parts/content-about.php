<?php
/**
 * Template part for displaying about.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package D_and_E_Consulting
 */

?>
<div class="modal-video-window">
	<span class="close">&times;</span>
	<div class="modal-video">
		<div class="constrain">
			Video Here
		</div>
	</div>
</div
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <section class="secondary-intro-content p60">
        <div class="constrain flexxed">
            <div class="intro-content-text">
                <div class="subtitle"><?php the_title(); ?></div>
                <div class="intro-text">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="intro-content-image">
                <?php $iImage = get_field( 'intro_content_image' ); ?>
                <img src="<?php echo $iImage[ 'url' ]; ?>" alt="<?php echo $iImage[ 'alt' ]; ?>">
            </div>
        </div>
    </section>

    <?php if ( have_rows( 'solutions_&_services' ) ) : ?>
        <section class="about-solutions p30 blue-bg">
            <div class="constrain">
                <h2><?php the_field( 'solutions_&_services_title' ); ?></h2>
                <div class="flexxed">
                    <?php while ( have_rows( 'solutions_&_services' ) ) : the_row(); ?>

                        <div class="ss-block">
                            <?php $sIcon = get_sub_field( 'icon' ); ?>
                            <div class="ss-image">
                                <img src="<?php echo $sIcon[ 'url' ]; ?>" alt="<?php echo $sIcon[ 'alt' ]; ?>">
                            </div>
                            <div class="ss-title"><?php the_sub_field( 'solution_service' ); ?></div>
                        </div>

                    <?php endwhile; ?>
                </div>
                <a class="btn btn-lg green-bg" href="<?php the_field( 'solutions_services_cta_link_url' ); ?>" class="href"><?php the_field( 'solutions_services_cta_link_text' ); ?></a>
            </div>
        </section>

    <?php endif; ?>

    <?php if ( have_rows( 'industries' ) ) : ?>
        <section class="about-industries p30">
            <div class="constrain">
                <h2><?php the_field( 'industries_title' ); ?></h2>
                <div class="ind-cols">
                    <?php while( have_rows( 'industries' ) ) : the_row(); ?>
                        <div class="industry">
                            <?php the_sub_field( 'industry' ); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
                <a class="btn btn-lg ltblue-bg" href="<?php the_field( 'industries_cta_link_url' ); ?>" class="href"><?php the_field( 'industries_cta_link_text' ); ?></a>
            </div>
        </section>

    <?php endif; ?>

    <?php if ( get_field( 'testimonials_option' ) == 'yes' ) : ?>
        <section class="testimonial-slider-module p60" style="background-image: url( '<?php the_field( 'testimonials_module_background_image', 'option' ); ?>' );">
            <div class="constrain">
                <div class="subtitle noline white">
                    <?php the_field( 'testimonials_module_subtitle', 'option' ); ?>
                </div>
                <h2><?php the_field( 'testimonials_module_heading', 'option' ); ?></h2>
                <div class="testimonial-slider">
                    <?php
                        // WP_Query arguments
                        $args = array(
                            'post_type'              => array( 'testimonial' ),
                            'order'                  => 'DESC',
                            'orderby'                => 'title',
                        );

                        // The Query
                        $tQuery = new WP_Query( $args );

                        // The Loop
                        if ( $tQuery->have_posts() ) {
                            while ( $tQuery->have_posts() ) : $tQuery->the_post(); ?>
                                <div class="testimonial-slide">
                                    <div class="tslide-content">
                                        <?php the_content(); ?>
                                        <div class="testimonial-name">
                                            - <?php the_title(); ?>
                                        </div>
                                    </div>
                                </div><!-- .testimonial-slide -->
                            <?php endwhile; ?>
                        <?php } 

                        // Restore original Post Data
                        wp_reset_postdata();
                    ?>
                </div><!-- .testimonial-slider -->
            </div><!-- .constrain-->
        </section><!-- .testimonials-slider -->
    <?php endif; ?>

    <?php if ( get_field( 'client_slider_option' ) == 'yes' ) : ?>
        <section class="client-slider-module p60">
            <div class="constrain">
                <div class="full">
                    <div class="subtitle noline">
                        <?php the_field( 'client_module_subtitle', 'option' ); ?>
                    </div>
                    <h2><?php the_field( 'client_module_heading', 'option' ); ?></h2>
                </div>

                <?php
                    // WP_Query arguments
                    $args = array(
                        'post_type'              => array( 'client' ),
                        'order'                  => 'DESC',
                        'orderby'                => 'title',
                    );

                    // The Query
                    $cQuery = new WP_Query( $args );

                    // The Loop
                    if ( $cQuery->have_posts() ) { ?>
                        <div class="client-slider">
                        <?php while ( $cQuery->have_posts() ) : $cQuery->the_post(); ?>
                            <div class="client-slide">
                                <?php the_post_thumbnail(); ?>
                            </div><!-- .c-slide -->
                        <?php endwhile; ?>
                        </div>
                    <?php } 

                    // Restore original Post Data
                    wp_reset_postdata();
                ?>
            </div><!-- .constrain -->
        </section><!-- .client-slider -->
    <?php endif; ?>

    <?php if ( get_field( 'contact_section_option' ) == 'yes' ) : ?>
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
    <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
