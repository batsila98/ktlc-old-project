<?php
/**
 * The header for KTLC theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ktlc
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	wp_body_open(); 

    $themeColor = get_theme_mod('ktlc_theme_color');
	?>

	<div id="ktlcPage">
		<header class="header">
			<div class="header__top">
				<div class="header__topInner container">
					<?php
						$menuArgs = array(
						'theme_location'  => 'top_menu',
						'menu'            => '', 
						'container'       => false, 
						'container_class' => '', 
						'container_id'    => '',
						'menu_class'      => '', 
						'menu_id'         => '',
						'echo'            => false,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '%3$s',
						'depth'           => 0,
						'walker'          => '',
					);
					
					echo strip_tags(wp_nav_menu( $menuArgs ), '<a>' );
					?>
				</div>
			</div>

			<div class="header__bottom">
				<div class="header__bottomInner container">
					<?php the_custom_logo(); ?>

					<nav class="header__nav">
						<button id="primaryMenuButtonClose" class="header__navButtonClose">
							<svg class="header__navButtonCloseIcon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M19 19L1.00005 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M19.0001 1L1 19.0001" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>

						<?php
						wp_nav_menu( 
							array(
								'theme_location'  => 'primary_menu',
								'menu'            => '',
								'container'       => false,
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'header__menu',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
								'depth'           => 0,
								'walker'          => new Ktlc_Walker_Nav_Menu_Primary(),
							)
						);
						?>

						<?php
						$another_conference_link_image = carbon_get_theme_option( 'another_conference_link_image' );
						$another_conference_link_text  = carbon_get_theme_option( 'another_conference_link_text' );
						$another_conference_link_url   = carbon_get_theme_option( 'another_conference_link_url' );
						
						if ( $another_conference_link_image && $another_conference_link_text && $another_conference_link_url ) :
							?>
							<a href="<?php echo esc_url( $another_conference_link_url ); ?>" class="header__anotherConferenceLink">
								<img src="<?php echo esc_url( $another_conference_link_image ); ?>" alt="Another conference" class="header__anotherConferenceLinkImage">
								<?php echo esc_html( $another_conference_link_text ); ?>
							</a>
							<?php
						endif;
						?>
					</nav>

					<button id="primaryMenuButton" class="header__navButton" aria-controls="primary-menu-list" aria-expanded="false">
						<svg class="header__navButtonIcon" width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 11H15" stroke="<?php echo $themeColor ? $themeColor : '#555'; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M1 6H15" stroke="<?php echo $themeColor ? $themeColor : '#555'; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M1 1H15" stroke="<?php echo $themeColor ? $themeColor : '#555'; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</button>
				</div>
			</div>
		</header>
