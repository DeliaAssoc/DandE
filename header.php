<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package D_and_E_Consulting
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="modal-search-window">
	<span class="close">&times;</span>
	<div class="modal-search">
		<div class="constrain">
			<?php get_search_form(); ?>
		</div>
	</div>
</div>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="upper-header">
			<div class="constrain flexxed">
			
				<div class="uh-left">
					<?php if ( get_theme_mod( 'theme_company_phone' ) ) :?>
						<div class="contact-link phone">
							<a href="tel:<?php echo get_theme_mod( 'theme_company_phone' ); ?>">Call us at <?php echo get_theme_mod( 'theme_company_phone' ); ?></a> 
						</div>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'theme_company_street' ) ) :?>
						<div class="contact-link address">
							<?php echo get_theme_mod( 'theme_company_street' ); ?>, <?php echo get_theme_mod( 'theme_company_state' ); ?>
						</div>
					<?php endif; ?>	
					<?php if ( get_theme_mod( 'theme_company_email' ) ) :?>
						<div class="contact-link email">
							<a href="mailto:<?php echo get_theme_mod( 'theme_company_email' ); ?>"><?php echo get_theme_mod( 'theme_company_email' ); ?></a> 
						</div>
					<?php endif; ?>
					<div class="contact-link search">
						<?php get_search_form(); ?> Search
					</div>			
				</div><!-- .uh-left -->

				<div class="uh-right">
					<?php social_media_list(); ?>
					<a href="/wp-admin" class="login">Login</a>
				</div>

			</div>
		</div><!-- .upper-header -->
		<div class="main-header">
			<div class="constrain flexxed">
				<div class="site-branding">
					<a href="/">
						<div class="site-logo">
							<img src="<?php echo get_theme_mod( 'theme_logo' ); ?>" />
						</div>
					</a>
				</div><!-- .site-branding -->
			
				<?php if ( get_theme_mod( 'theme_company_phone' ) ) :?>
					<div class="mobile-phone">	
						<div class="top">Give Us a Call</div>
						<div class="bottom">
							<a href="tel:<?php echo get_theme_mod( 'theme_company_phone' ); ?>"><?php echo get_theme_mod( 'theme_company_phone' ); ?></a> 
						</div>
					</div>
				<?php endif; ?>
				

				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav><!-- #site-navigation -->
			</div><!-- .constrain -->
		</div><!-- .main-header -->
		<div class="mobile-header">
			<div class="constrain">
				<a href="#" class="mobile-search"><i class="fa fa-search" aria-hidden="true"></i></a>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
