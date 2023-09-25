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
 * @package WordPress
 * @subpackage KTLC
 * @since KTLC 1.0
 */

get_header(); ?>

<div class="pageIndex">
	<header class="pageIndex__header" style="background-image: url('<?php echo get_stylesheet_directory_uri() . '/resources/dist/images/ThumbnailPlaceholder-SimplePage.webp' ?>');">
		<div class="pageIndex__headerInner container">
			<?php
			the_archive_title( '<h1 class="pageIndex__title">', '</h1>' );
			the_archive_description( '<div class="pageIndex__description">', '</div>' );
			?>
		</div>
	</header>

	<div class="pageIndex__content">
		<div class="pageIndex__contentInner container">
			<div class="pageIndex__posts">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content/content-none' );

				endif;
				?>
			</div>

			<div class="pageIndex__sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();