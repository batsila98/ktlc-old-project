<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ktlc
 */

$footer_logo_title = carbon_get_theme_option( 'footer_logo_title' );
$footer_logo       = carbon_get_theme_option( 'footer_logo' );

$footer_contacts_title = carbon_get_theme_option( 'footer_contacts_title' );
$footer_emails         = carbon_get_theme_option( 'footer_emails' );
$footer_phones         = carbon_get_theme_option( 'footer_phones' );
$footer_socials        = carbon_get_theme_option( 'footer_social_networks' );

$footer_organizers_title      = carbon_get_theme_option( 'footer_organizers_title' );
$footer_organizers_data_title = carbon_get_theme_option( 'footer_organizers_data_title' );
$footer_organizers            = carbon_get_theme_option( 'footer_organizers' );

$footer_copyright_text = carbon_get_theme_option( 'footer_copyright_text' );

?>

	<footer id="colophon" class="footer">
		<div class="footer__inner container">
			<div class="footer__left">
				<div class="footer__logo">
					<h6 class="footer__logoTitle footer__title">
						<?php echo esc_html( $footer_logo_title ); ?>
					</h6>

					<img src="<?php echo esc_url( $footer_logo ); ?>" alt="KTLC Logo" class="footer__logoImage">
				</div>

				<div class="footer__contacts">
					<h6 class="footer__contactsTitle footer__title">
						<?php echo esc_html( $footer_contacts_title ); ?>
					</h6>

					<?php
					if ( $footer_emails ) :
						?>
						<div class="footer__emails">
							<?php
							foreach ( $footer_emails as $email ) :
								?>
								<a href="mailto:<?php echo esc_url( $email['email'] ); ?>" class="footer__email">
									<svg class="footer__emailIcon" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M18 1H2C1.44772 1 1 1.44772 1 2V14C1 14.5523 1.44772 15 2 15H18C18.5523 15 19 14.5523 19 14V2C19 1.44772 18.5523 1 18 1Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										<path d="M1 2L10.2571 9L19 2" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
									<?php echo esc_html( $email['email'] ); ?>
								</a>
								<?php
							endforeach;
							?>
						</div>
						<?php
					endif;
					?>

					<?php
					if ( $footer_phones ) :
						?>
						<div class="footer__phones">
							<?php
							foreach ( $footer_phones as $phone ) :
								?>
								<a href="tel:<?php echo esc_url( $phone['phone'] ); ?>" class="footer__phone">
									<svg class="footer__phoneIcon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M6.0578 1.97784L5.12932 2.34923L5.12932 2.34923L6.0578 1.97784ZM6.87778 4.0278L7.80626 3.6564L7.80626 3.6564L6.87778 4.0278ZM6.6285 5.60136L7.39672 6.24154L7.39672 6.24154L6.6285 5.60136ZM6.18719 6.13092L6.95542 6.77111L6.95542 6.77111L6.18719 6.13092ZM6.28226 8.22671L5.57516 8.93381L5.57516 8.93381L6.28226 8.22671ZM7.77329 9.71774L8.4804 9.01063L8.4804 9.01063L7.77329 9.71774ZM9.86908 9.8128L9.2289 9.04458L9.2289 9.04458L9.86908 9.8128ZM10.3986 9.3715L11.0388 10.1397L11.0388 10.1397L10.3986 9.3715ZM11.9722 9.12222L11.6008 10.0507L11.6008 10.0507L11.9722 9.12222ZM14.0222 9.9422L14.3936 9.01372L14.3936 9.01372L14.0222 9.9422ZM2.47368 2H4.6135V0H2.47368V2ZM5.12932 2.34923L5.94931 4.39919L7.80626 3.6564L6.98628 1.60645L5.12932 2.34923ZM5.86028 4.96117L5.41897 5.49074L6.95542 6.77111L7.39672 6.24154L5.86028 4.96117ZM5.57516 8.93381L7.06619 10.4248L8.4804 9.01063L6.98937 7.5196L5.57516 8.93381ZM10.5093 10.581L11.0388 10.1397L9.75846 8.60328L9.2289 9.04458L10.5093 10.581ZM11.6008 10.0507L13.6508 10.8707L14.3936 9.01372L12.3436 8.19374L11.6008 10.0507ZM14 11.3865V13.5263H16V11.3865H14ZM13.5263 14C7.16051 14 2 8.83949 2 2.47368H0C0 9.94406 6.05594 16 13.5263 16V14ZM14 13.5263C14 13.7879 13.7879 14 13.5263 14V16C14.8925 16 16 14.8925 16 13.5263H14ZM13.6508 10.8707C13.8617 10.955 14 11.1593 14 11.3865H16C16 10.3415 15.3638 9.40182 14.3936 9.01372L13.6508 10.8707ZM11.0388 10.1397C11.1956 10.0091 11.4113 9.97491 11.6008 10.0507L12.3436 8.19374C11.4721 7.84513 10.4796 8.00236 9.75846 8.60328L11.0388 10.1397ZM7.06619 10.4248C8.0008 11.3595 9.49387 11.4272 10.5093 10.581L9.2289 9.04458C9.00816 9.22853 8.68358 9.21381 8.4804 9.01063L7.06619 10.4248ZM5.41897 5.49074C4.57281 6.50613 4.64054 7.9992 5.57516 8.93381L6.98937 7.5196C6.78619 7.31642 6.77147 6.99184 6.95542 6.77111L5.41897 5.49074ZM5.94931 4.39919C6.02509 4.58865 5.99091 4.80441 5.86028 4.96117L7.39672 6.24154C7.99764 5.52044 8.15487 4.52794 7.80626 3.6564L5.94931 4.39919ZM4.6135 2C4.84067 2 5.04496 2.13831 5.12932 2.34923L6.98628 1.60645C6.59818 0.636208 5.65848 0 4.6135 0V2ZM2.47368 0C1.10751 0 0 1.10751 0 2.47368H2C2 2.21208 2.21208 2 2.47368 2V0Z" fill="white"/>
									</svg>
									<?php echo esc_html( $phone['phone'] ); ?>
								</a>
								<?php
							endforeach;
							?>
						</div>
						<?php
					endif;
					?>

					<?php
					if ( $footer_socials ) :
						?>
						<div class="footer__socials">
							<?php
							foreach ( $footer_socials as $social ) :
								?>
								<a href="<?php echo esc_url( $social['social_network_url'] ); ?>" class="footer__social" target="_blank" rel="nofollow">
									<img src="<?php echo esc_html( $social['social_network_image'] ); ?>" alt="" class="footer__socialImage">
								</a>
								<?php
							endforeach;
							?>
						</div>
						<?php
					endif;
					?>
				</div>
			</div>

			<div class="footer__right">
					<?php
					if ( $footer_organizers ) :
						?>
						<div class="footer__organizers">
							<div class="footer__organizersLeft">
								<h6 class="footer__organizersTitle footer__title">
									<?php echo esc_html( $footer_organizers_title ); ?>
								</h6>
								<?php
								foreach ( $footer_organizers as $organizer ) :
									?>
									<a href="<?php echo esc_url( $organizer['organizer_url'] ); ?>" class="footer__organizer" target="_blank" rel="nofollow">
										<img src="<?php echo esc_url( $organizer['organizer_image'] ); ?>" alt="" class="footer__organizerImage">
									</a>
									<?php
								endforeach;
								?>
							</div>

							<div class="footer__organizersRight">
								<h6 class="footer__organizersTitle footer__title">
									<?php echo esc_html( $footer_organizers_data_title ); ?>
								</h6>
								<?php
								foreach ( $footer_organizers as $organizer ) :
									?>
									<p class="footer__organizerData">
										<?php echo wp_kses_post( $organizer['organizer_data'] ); ?>
									</p>
									<?php
								endforeach;
								?>
							</div>
						</div>
						<?php
					endif;
					?>
			</div>

			<div class="footer__bottom">
				<?php
				wp_nav_menu( 
					array(
						'theme_location'  => 'footer_menu',
						'menu'            => '',
						'container'       => false,
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'footer__menu',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => new Ktlc_Walker_Nav_Menu_Footer(),
					)
				);
				?>

				<div class="footer__copyright">
					<?php echo wp_kses_post( $footer_copyright_text ); ?> 
				</div>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
