<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ktlc
 */

get_header();
?>

	<main id="homePage" class="homePage">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				$sections = carbon_get_the_post_meta( 'home_page_sections' );

				if ( $sections ) :
					foreach ( $sections as $section ) :
						switch ( $section['_type'] ) :
							case 'banner':
								get_template_part('template-parts/banner', null, $section);
								break;

							case 'sponsors':
								if ( count( $section['sponsor'] ) > 5 ) :
									get_template_part('template-parts/sponsors', 'carousel', $section);
								else :
									get_template_part('template-parts/sponsors', 'list', $section);
								endif;
								break;

							case 'ribbon':
								get_template_part('template-parts/ribbon', null, $section);
								break;

							case 'about':
								get_template_part('template-parts/about', null, $section);
								break;

							case 'facebook_feed':
								get_template_part('template-parts/facebook', 'feed', $section);
								break;

							case 'testimonials':
								get_template_part('template-parts/testimonials', null, $section);
								break;

							case 'subscribe':
								get_template_part('template-parts/subscribe', null, $section);
								break;

							case 'blog':
								get_template_part('template-parts/section', 'blog', $section);
								break;

							case 'about_team':
								get_template_part('template-parts/section', 'about-team', $section);
								break;
						endswitch;
					endforeach;
				endif;
			endwhile;
		else :
		endif;
		?>
	</main>

<?php
get_footer();
