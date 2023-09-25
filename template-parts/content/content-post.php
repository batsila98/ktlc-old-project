<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KTLC
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'contentPost' ); ?>>
	<header class="contentPost__header">
        <div class="contentPost__headerInner container">
            <?php the_title( '<h1 class="contentPost__title">', '</h1>' ); ?>

            <div class="contentPost__categories">
                <?php
                if ( has_category() ) :
                    $categories_list = get_the_category_list();
                    if ( $categories_list ) :
                        printf(
                            '<span class="contentPost__categoriesLinks">' . esc_html__( 'Categories: %s', 'ktlc' ) . ' </span>',
                            $categories_list // phpcs:ignore WordPress.Security.EscapeOutput
                        );
                    endif;
                endif;
                ?>
            </div>
        </div>
		
		<?php the_post_thumbnail('full', array( 'class' => 'contentPost__image' )); ?>
	</header>

	<div class="contentPost__body">
        <div class="contentPost__bodyInner container">
            <div class="contentPost__content">
                <?php the_content(); ?>
            </div>

            <div class="contentPost__sidebar">
                <?php get_sidebar(); ?>
            </div>

            <div class="contentPost__shareArea">
                <?php do_action( 'ktlc_blog_social_icons' ); ?>
            </div>

            <div class="contentPost__linkPages">
                <?php
                wp_link_pages(
                    array(
                        'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'ktlc' ) . '">',
                        'after'    => '</nav>',
                        'pagelink' => esc_html__( 'Page %', 'ktlc' ),
                    )
                );
                ?>
            </div>
        </div>
	</div>
</article>