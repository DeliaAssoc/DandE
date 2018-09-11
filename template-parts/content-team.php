<?php
/**
 * Template part for displaying team.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package D_and_E_Consulting
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <section class="secondary-intro-content">
        <div class="constrain">
            <div class="intro-content-text full">
                <h1 class="subtitle"><?php the_title(); ?></h1>
                <div class="intro-text">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="team-members">
        <div class="constrain">
            <div class="flexxed">
            <?php
                // WP_Query arguments
                $args = array(
                    'orderby'   => 'menu_order',
                    'post_per_page' => -1,
                    'post_type' => array( 'team' ),
                );

                // The Query
                $query = new WP_Query( $args );

                // The Loop
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post(); ?>
                        
                        <div class="team-block">
                            <div class="team-bio-block">
                                <a href="#" class="close-bio"><i class="fa fa-times" aria-hidden="true"></i></a>
                                <h3><?php the_title(); ?></h3>
                                <div class="job-title"><?php the_field( 'team_title' ); ?></div>
                                <div class="bio">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <div class="team-main-info">
                                <div class="team-image">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <h3><?php the_title(); ?></h3>
                                <div class="job-title"><?php the_field( 'team_title' ); ?></div>
                                <div class="team-contact-block">
                                    <div class="contact-item team-phone">
                                        <i class="fa fa-phone" aria-hidden="true"></i> <?php the_field( 'phone_number' ); ?>
                                    </div>
                                    <?php if ( get_field( 'mobile_phone_number' ) ) : ?>
                                    <div class="contact-item team-mobile">
                                        <i class="fa fa-mobile" aria-hidden="true"></i> <?php the_field( 'mobile_phone_number' ); ?>
                                    </div>
                                    <div class="contact-item team-email">
                                        <a href="mailto:<?php the_field( 'email_address' ); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php the_field( 'email_address' ); ?></a>
                                    </div>
                                    <?php endif; ?>
                                    <a href="<?php the_field( 'linkedin_url' ); ?>" class="team-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </div>
                                <a href="#" class="bio-btn btn-sm ltblue-bg">Read More</a>
                            </div>
                        </div>
                        
                    <?php }
                }
                // Restore original Post Data
                wp_reset_postdata();
            ?>
            </div>
        </div>
    </section>

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
