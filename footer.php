<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package D_and_E_Consulting
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="top-footer p60">
			<div class="constrain flexxed">
				<div class="footer-ident">
					<a class="footer-id" href="/">
						<img src="<?php echo get_theme_mod( 'theme_footer_logo' ); ?>" alt="">
					</a>
					<div class="footer-address">
						<div class="street">
							<?php echo get_theme_mod( 'theme_company_street' ); ?>
						</div>
						<div class="city-state">
							<?php echo get_theme_mod( 'theme_company_city' ); ?>, <?php echo get_theme_mod( 'theme_company_state' ); ?> <?php echo get_theme_mod( 'theme_company_zip' ); ?>
						</div>
					</div>
					<div class="footer-contacts">
						<div class="phone">
							<a href="tel:<?php echo get_theme_mod( 'theme_company_phone' ); ?>"><i class="fa fa-phone" aria-hidden="true"></i> Phone: <?php echo get_theme_mod( 'theme_company_phone' ); ?></a>
						</div>
						<div class="fax">
							<i class="fa fa-fax" aria-hidden="true"></i> Fax: <?php echo get_theme_mod( 'theme_company_fax' ); ?>
						</div>
						<div class="email">
							<a href="mailto:<?php echo get_theme_mod( 'theme_company_email' ); ?>"><i class="fa fa-envelope" aria-hidden="true"></i> Email: <?php echo get_theme_mod( 'theme_company_email' ); ?></a>
						</div>
						<div class="get-directions">
							<a href=""><i class="fa fa-map-marker" aria-hidden="true"></i> Get Directions</a>
						</div>
					</div>
				</div>
				<div class="footer-links">

				</div>
			</div>
		</div>
		<div class="bottom-footer">
			<div class="constrain flexxed">

			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
