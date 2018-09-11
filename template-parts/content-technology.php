<?php
/**
 * Template part for displaying single-technology.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package D_and_E_Consulting
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'technology' ); ?>>

    <section class="secondary-intro-content p60">
        <div class="constrain flexxed">
            <div class="intro-content-text">
                <div class="subtitle">Technology</div>
                <div class="intro-text">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="intro-content-image">
               <?php $iImage = get_field( 'intro_content_image' ); ?>
               <img src="<?php echo $iImage[ 'url' ]; ?>" alt="<?php echo $iImage[ 'alt' ]; ?>">
            </div>
        </div>
    </section>

    <?php if ( have_rows( 'technology_sections' ) ) : ?>

        <?php while ( have_rows( 'technology_sections' ) ) : the_row(); ?>

            <?php if ( get_row_layout() == 'content_with_image' ) : ?>

                <section class="flex-content cont-w-image p60 <?php the_sub_field( 'section_color' ); ?>">
                    <div class="constrain">
                        <div class="flexxed">
                            <div class="cwi-image">
                                <?php $image = get_sub_field( 'section_image' ); ?>
                                <img src="<?php echo $image[ 'url' ]; ?>" alt="<?php echo $image[ 'alt' ]; ?>">
                            </div>
                            <div class="cwi-content">
                                <h2><?php the_sub_field( 'section_heading' ); ?></h2>
                                <div class="cwi-text">
                                    <?php the_sub_field( 'section_content' ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <?php elseif ( get_row_layout() == 'full_width' ) : ?>
                <section class="flex-content full-width p60 <?php the_sub_field( 'section_color' ); ?>">
                    <div class="constrain">
                        <h2><?php the_sub_field( 'section_heading' ); ?></h2>
                        <div class="fw-content">
                            <?php the_sub_field( 'section_content' ); ?>
                        </div>
                    </div>
                </section>

            <?php elseif ( get_row_layout() == 'half_and_half' ) : ?>
                <section class="flex-content half-half p60  <?php the_sub_field( 'section_color' ); ?>">
                    <div class="constrain flexxed">
                        <div class="half-content">
                            <?php the_sub_field( 'left_half' ); ?>
                        </div>
                        <div class="half-content">
                            <?php the_sub_field( 'right_half' ); ?>
                        </div>
                    </div>
                </section>  

            <?php endif; ?>

        <?php endwhile; ?>

    <?php endif; ?>

    <?php if ( get_field( 'cta_section_option' ) == 'yes' ) : ?>
        <section class="cta-module p60">
            <div class="constrain">
                <div class="flexxed">
                    <a href="/services" class="btn btn-lg blue-bg">D+E Services <span class="green-txt">+</span></a>
                    <a href="/tech" class="btn btn-lg blue-bg">D+E Technologies <span class="green-txt">+</span></a>
                    <a href="/contact" class="btn btn-lg blue-bg"><i class="fa fa-paper-plane"></i> Contact Us</a>
                </div>
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
