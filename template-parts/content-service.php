<?php
/**
 * Template part for displaying single-service.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package D_and_E_Consulting
 */

?>
<?php if ( get_field( 'video_url' ) ) : ?>
<div class="modal-video-window">
	<span class="close">&times;</span>
	<div class="modal-video">
		<div class="constrain">
            <div class="responsive">
                <iframe width="700" height="394" src="<?php the_field( 'video_url' ); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
		</div>
	</div>
</div>
<?php endif; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'article' ); ?>>

    <section class="secondary-intro-content p60">
        <div class="constrain flexxed">
            <div class="intro-content-text">
                <div class="subtitle">Service</div>
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

    <?php if ( get_field( 'cta_section_option' ) == 'yes' ) : ?>
        <section class="cta-module p60">
            <div class="constrain">
                <div class="flexxed">
                    <a href="#" class="btn btn-lg blue-bg">D+E Services <span class="green-txt">+</span></a>
                    <a href="#" class="btn btn-lg blue-bg">D+E Technologies <span class="green-txt">+</span></a>
                    <a href="/contact" class="btn btn-lg blue-bg"><i class="fa fa-paper-plane"></i> Contact Us</a>
                </div>
            </div>
        </section>
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
