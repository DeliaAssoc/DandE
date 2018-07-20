<?php
/**
 * Template part for displaying modules.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package D_and_E_Consulting
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( get_the_content() ) : ?>
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
    <?php endif; ?>


    <?php if ( have_rows( 'modules' ) ) : ?>

        <?php while ( have_rows( 'modules' ) ) : the_row(); ?>

            <?php if ( get_row_layout() == 'full_width_module' ) : ?>
                <section class="module <?php the_sub_field( 'module_background_color' ); ?> <?php the_sub_field( 'module_padding' ); ?>">
                    <div class="constrain">
                        <?php if ( get_sub_field( 'heading' ) ) : ?>
                            <div class="module-intro">
                                <h2><?php the_sub_field( 'heading' ); ?></h2>
                                <div class="subtext"><?php the_sub_field( 'sub_text' ); ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="module-content flexxed">
                            <div class="mc-item">
                                <?php the_sub_field( 'full_width_content' ); ?>
                            </div>
                        </div>
                    </div>
                </section>                
            <?php elseif ( get_row_layout() == 'half_and_half_module' ) : ?>
                <section class="module <?php the_sub_field( 'module_background_color' ); ?> <?php the_sub_field( 'module_padding' ); ?>">
                    <div class="constrain">
                        <?php if ( get_sub_field( 'heading' ) ) : ?>
                            <div class="module-intro">
                                <h2><?php the_sub_field( 'heading' ); ?></h2>
                                <div class="subtext"><?php the_sub_field( 'sub_text' ); ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="module-content flexxed">
                            <div class="mc-item half">
                                <?php the_sub_field( 'left_content' ); ?>
                            </div>
                            <div class="mc-item half">
                                <?php the_sub_field( 'right_content' ); ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php elseif ( get_row_layout() == 'one_third_and_two_thirds' ) : ?>
                <section class="module <?php the_sub_field( 'module_background_color' ); ?> <?php the_sub_field( 'module_padding' ); ?>">
                    <div class="constrain">
                        <?php if ( get_sub_field( 'heading' ) ) : ?>
                            <div class="module-intro">
                                <h2><?php the_sub_field( 'heading' ); ?></h2>
                                <div class="subtext"><?php the_sub_field( 'sub_text' ); ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="module-content flexxed">
                            <div class="mc-item one-third">
                                <?php the_sub_field( 'left_content' ); ?>
                            </div>
                            <div class="mc-item two-thirds">
                                <?php the_sub_field( 'right_content' ); ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php elseif ( get_row_layout() == 'two_thirds_and_one_third' ) : ?>
                <section class="module <?php the_sub_field( 'module_background_color' ); ?> <?php the_sub_field( 'module_padding' ); ?>">
                    <div class="constrain">
                        <?php if ( get_sub_field( 'heading' ) ) : ?>
                            <div class="module-intro">
                                <h2><?php the_sub_field( 'heading' ); ?></h2>
                                <div class="subtext"><?php the_sub_field( 'sub_text' ); ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="module-content flexxed">
                            <div class="mc-item two-thirds">
                                <?php the_sub_field( 'left_content' ); ?>
                            </div>
                            <div class="mc-item one-third">
                                <?php the_sub_field( 'right_content' ); ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php elseif ( get_row_layout() == 'three_column' ) : ?>
                <section class="module <?php the_sub_field( 'module_background_color' ); ?> <?php the_sub_field( 'module_padding' ); ?>">
                    <div class="constrain">
                        <?php if ( get_sub_field( 'heading' ) ) : ?>
                            <div class="module-intro">
                                <h2><?php the_sub_field( 'heading' ); ?></h2>
                                <div class="subtext"><?php the_sub_field( 'sub_text' ); ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="module-content flexxed">
                            <div class="mc-item one-third">
                                <?php the_sub_field( 'first_column_content' ); ?>
                            </div>
                            <div class="mc-item one-third">
                                <?php the_sub_field( 'middle_column_content' ); ?>
                            </div>
                            <div class="mc-item one-third">
                                <?php the_sub_field( 'last_column_content' ); ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

        <?php endwhile; ?>

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
