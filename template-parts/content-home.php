<?php
/**
 * Template part for displaying homepage.php
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
                <iframe width="768" height="432" src="<?php the_field( 'video_url' ); ?>" frameborder="0" allow="autoplay; encrypted-media" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
		</div>
	</div>
</div>
<?php endif; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <section class="hero">
            <?php if ( have_rows( 'hero_slider' ) ) : ?>
                <div class="hero-slider">
                <?php while ( have_rows( 'hero_slider' ) ) : the_row(); ?>
                
                    <div class="slide">
                        <?php $image = get_sub_field( 'slide_image' ); ?>
                        <img src="<?php echo $image[ 'url' ]; ?>" alt="<?php echo $image[ 'alt' ]; ?>">
                        <div class="slide-content">
                            <div class="constrain">
                                <div class="text-content">
                                    <?php the_sub_field( 'slide_content' ); ?>
                                </div>
                                <div class="slide-btns flexxed">
                                    <?php if ( get_sub_field( 'slide_button_1_link' ) ) : ?>
                                        <a class="btn-md white-bg" href="<?php the_sub_field( 'slide_button_1_link' ); ?>"><i class="fa fa-paper-plane"></i> <?php the_sub_field( 'slide_button_1_text' ); ?></a>
                                    <?php endif; ?>
                                    <?php if ( get_sub_field( 'slide_button_2_link' ) ) : ?>
                                        <a class="btn-md white-brdr" href="<?php the_sub_field( 'slide_button_2_link' ); ?>"><?php the_sub_field( 'slide_button_2_text' ); ?></a>
                                    <?php endif; ?>      
                                </div>
                            </div><!-- .constrain -->
                        </div>
                        
                    </div>

                <?php endwhile; ?>
                </div><!-- .slider -->
            <?php endif; ?>
    </section><!-- .hero-slider -->

    <section class="intro-content p60">
        <div class="constrain flexxed">
            <div class="half">
                <div class="mcontent-block">
                    <div class="subtitle"><?php the_field( 'main_content_subtitle' ); ?></div>
                    <?php the_field( 'main_content_text' ); ?>
                </div>
            </div>
            <div class="half">
                <a href="<?php the_field( 'main_content_main_image_link' ); ?>">
                    <?php $mImage = get_field( 'main_content_image' ); ?>
                    <img class="see-how-we-work" src="<?php echo $mImage[ 'url' ]; ?>" alt="<?php echo $mImage[ 'alt' ]; ?>">
                </a>
            </div>
        </div>

    </section><!-- .intro-content -->

    <section class="possibilities p60">
        <div class="constrain">
            <div class="subtitle noline">
                <?php the_field( 'possibilities_subtitle', 'options' ); ?>
            </div>
            <div class="full">
                <?php the_field( 'possibilities_content', 'options' ); ?>
            </div>
            <div class="pos-items flexxed">
                <?php if ( have_rows( 'possibilities_items', 'options' ) ) : ?>
                    <?php $pCount = count( get_field( 'possibilities_items', 'options' ) ); ?>
                    <?php while ( have_rows( 'possibilities_items', 'options' ) ) : the_row(); ?>
                        <div class="pos-item pitems-<?php echo $pCount; ?>">
                            <?php $pImage = get_sub_field( 'possibility_item_icon', 'options' ); ?>
                            <div class="pos-icon">
                                <img src="<?php echo $pImage[ 'url' ]; ?>" alt="<?php echo $pImage[ 'alt' ]; ?>">
                            </div>
                            <div class="pos-text">
                                <?php the_sub_field( 'possibility_item_content', 'options' ); ?>
                            </div>
                            <a class="pos-link" href="<?php the_sub_field( 'possibility_item_link', 'options' ); ?>">Read More +</a>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section><!-- .possibilities -->

    <section class="benefits">
        <div class="flexxed">
            <div class="half section-image">
                <?php $bImage = get_field( 'benefits_image' ); ?>
                <img style="display: block;" src="<?php echo $bImage[ 'url' ]; ?>" alt="<?php echo $bImage[ 'alt' ]; ?>">
            </div>
            <div class="half ltblue-bg p60">
                <div class="constrain side-content">
                    <div class="subtitle white">
                        <?php the_field( 'benefits_subtitle' ); ?>
                    </div>
                        <?php the_field( 'benefits_content' ); ?>
                        <div class="benefit-items flexxed">
                            <?php if ( have_rows( 'benefits_items' ) ) : ?>
                                <ol class="bennies">
                                <?php while ( have_rows( 'benefits_items' ) ) : the_row(); ?>
                                    <li>
                                        <div class="title"><?php the_sub_field( 'item_title' ); ?></div>
                                        <div class="item-content"><?php the_sub_field( 'item_content' ); ?></div>
                                    </li>
                                <?php endwhile; ?>
                                </ol>
                            <?php endif; ?>
                        </div>
                    </div>
                </div><!-- .constrain -->
            </div>
        </div>
    </section><!-- .benefits -->

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

    <?php if ( get_field( 'recent_blog_option' ) == 'yes' ) : ?>
        <section class="recent-blogs p60">
            <div class="constrain">
                <div class="full">
                    <div class="subtitle"><?php the_field( 'recent_post_module_subtitle', 'option' ); ?></div>
                    <div class="text-content"><?php the_field( 'recent_post_module_content', 'option' ); ?></div>
                </div>
            </div>
            <div class="constrain flexxed">

                <?php
                    $count = get_field( 'recent_post_count' );

                    // WP_Query arguments
                    $args = array(
                        'post_type'              => array( 'post' ),
                        'numberposts'            => $count,
                        'order'                  => 'DESC',
                        'orderby'                => 'title',
                        'posts_per_page'         => '2'
                    );

                    // The Query
                    $tQuery = new WP_Query( $args );

                    // The Loop
                    if ( $tQuery->have_posts() ) {
                        while ( $tQuery->have_posts() ) : $tQuery->the_post(); ?>
                            <div class="post-block posts-<?php echo $count; ?>">
                            <?php the_post_thumbnail(); ?>
                            <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                            <div class="post-date"><?php echo get_the_date(); ?> <span class="dkgray-text">/</span> <?php the_time(); ?></div>
                            <?php the_excerpt(); ?>
                            <a class="post-link" href="<?php the_permalink(); ?>">Read More +</a>
                            </div>
                        <?php endwhile; ?>
                    <?php } 

                    // Restore original Post Data
                    wp_reset_postdata();
                ?>
            </div><!-- .constrain.flexxed -->
        </section><!-- .recent-blogs -->
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
