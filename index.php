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

<?php
if ( is_home() && get_option( 'page_for_posts' ) ) {
    $blog_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_option( 'page_for_posts' ) ), 'full' );
	$blog_thumbnail = $blog_thumbnail[0];
}
?>

<div class="pageIndex">
	<?php if ( is_home() && ! is_front_page() && ! empty( single_post_title( '', false ) ) ) : ?>
		<header class="pageIndex__header" style="background-image: url('<?php echo $blog_thumbnail; ?>');">
			<div class="pageIndex__headerInner container">
				<h1 class="pageIndex__title"><?php single_post_title(); ?></h1>
			</div>
		</header>
	<?php endif; ?>

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