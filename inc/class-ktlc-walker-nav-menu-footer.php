<?php
/**
 * Walker for primary menu.
 *
 * Implements the custom walker for primary menu.
 *
 * @package WordPress
 */

/**
 * The Ktlc_Walker_Nav_Menu_Footer
 *
 * Implements custom walker for nav menu
 *
 * @package WordPress
 */
class Ktlc_Walker_Nav_Menu_Footer extends Walker_Nav_Menu {
	/**
	 * Functions start_lvl.
	 *
	 * @see Ktlc_Walker_Nav_Menu_Footer::start_lvl()
	 *
	 * @param string $output html output.
	 * @param int    $depth Menu item depth.
	 * @param object $args Function wp_nav_menu parameters.
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		if ( 0 !== $depth ) {
			$output .= '<ul class="footer__submenu footer__submenu_level2">';
		} else {
			$output .= '<ul class="footer__submenu">';
		}
	}

	/**
	 * Functions start_el.
	 *
	 * @see Ktlc_Walker_Nav_Menu_Footer::start_el()\
	 *
	 * @param string $output html output.
	 * @param object $item Menu item object.
	 * @param int    $depth Menu item depth.
	 * @param object $args Function wp_nav_menu parameters.
	 * @param int    $id Function Menu item id.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		global $wp_query;

		$indent      = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = '';
		$value       = '';
		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[]   = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

		if ( 0 !== $depth ) {
			$class_names = ' class="' . esc_attr( $class_names ) . ' footer__submenuItem"';
		} else {
			$class_names = ' class="' . esc_attr( $class_names ) . ' footer__menuItem"';
		}

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . '>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

		if ( 0 === $depth ) :
			$attributes .= ' class="footer__menuItemLink"';
		else :
			$attributes .= ' class="footer__submenuItemLink"';
		endif;

		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';

		$themeColor = get_theme_mod('ktlc_theme_color');

		$item_output .= '<svg class="footer__menuItemLinkIcon" width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L1.70711 0.292893ZM8 8L8.70711 8.70711C9.09763 8.31658 9.09763 7.68342 8.70711 7.29289L8 8ZM0.292893 14.2929C-0.0976311 14.6834 -0.0976311 15.3166 0.292893 15.7071C0.683417 16.0976 1.31658 16.0976 1.70711 15.7071L0.292893 14.2929ZM0.292893 1.70711L7.29289 8.70711L8.70711 7.29289L1.70711 0.292893L0.292893 1.70711ZM7.29289 7.29289L0.292893 14.2929L1.70711 15.7071L8.70711 8.70711L7.29289 7.29289Z" fill="' . $themeColor . '"/></svg>';
		
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

