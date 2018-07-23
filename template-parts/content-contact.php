<?php
/**
 * Template part for displaying contact.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package D_and_E_Consulting
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <section class="contact-intro-content p60">
        <div class="constrain flexxed">
            <div class="intro-content-text">
                <div class="subtitle"><?php the_title(); ?></div>
                <div class="main-contact contact-info-block">
                    <h2>Get in Touch Today</h2>
                    <div class="cp-contact-address">
                        <div class="address">
                            <?php echo get_theme_mod( 'theme_company_street' ); ?>
                        </div>
                        <div class="address">
                            <?php echo get_theme_mod( 'theme_company_city' ); ?>, <?php echo get_theme_mod( 'theme_company_state' ); ?> <?php echo get_theme_mod( 'theme_company_zip' ); ?>
                        </div>
                    </div>
                    <div class="cp-contact-info">
                        <?php if ( get_theme_mod( 'theme_company_phone' ) ) : ?>
                            <div class="contact-item">
                                <i class="fa fa-phone" aria-hidden="true"></i> Phone: <a href="tel:<?php echo get_theme_mod( 'theme_company_phone' ); ?>"><?php echo get_theme_mod( 'theme_company_phone' ); ?></a>
                            </div>
                        <?php endif; ?>
                        <?php if ( get_theme_mod( 'theme_company_fax' ) ) : ?>
                            <div class="contact-item">
                                <i class="fa fa-fax" aria-hidden="true"></i> Fax: <?php echo get_theme_mod( 'theme_company_fax' ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( get_theme_mod( 'theme_company_email' ) ) : ?>
                            <div class="contact-item">
                                <i class="fa fa-envelope" aria-hidden="true"></i> Email: <a href="mailto:<?php echo get_theme_mod( 'theme_company_email' ); ?>"><?php echo get_theme_mod( 'theme_company_email' ); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if ( get_field( 'driving_direction' ) ) : ?>
                    <div class="driving-directions contact-info-block">
                        <?php the_field( 'driving_direction' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( get_field( 'nearby_accommodations' ) ) : ?>
                    <div class="accommodations contact-info-block">
                        <?php the_field( 'nearby_accommodations' ); ?>
                    </div>
                <?php endif; ?>

            </div>
            <div class="contact-page-form">
                <div class="subtitle"><?php the_field( 'form_subtitle' ); ?></div>
                <div class="form-subcontent"><?php the_field( 'form_subcontent' ); ?></div>
                <div class="form">
                    <?php $formsc = get_field( 'form_shortcode' ); ?>
                    <?php echo do_shortcode( $formsc ); ?>
                </div>
            </div>
        </div>
    </section>

    <?php if ( get_field( 'map_section_display' ) == 'yes' ) : ?>
    <section class="gmap">
        <?php echo get_theme_mod( 'theme_company_gmap' ); ?>
    </section>
    <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
