<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ktlc
 */

get_header();
?>

	<main id="primary" class="pageSingle">
		<div class="pageSingle__content">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', get_post_type() );
				?>

				<div class="pageSingle__nav container">
					<?php
					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'ktlc' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'ktlc' ) . '</span> <span class="nav-title">%title</span>',
						)
					);
					?>
				</div>

				<?php
				if ( comments_open() || get_comments_number() ) :
					?>
					<div class="pageSingle__commmentArea container">
						<?php comments_template(); ?>
					</div>
					<?php
				endif;

			endwhile;
			?>
		</div>
	</main>

<?php
get_footer();
