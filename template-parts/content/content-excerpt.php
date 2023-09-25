<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$themeColor = get_theme_mod('ktlc_theme_color');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'contentExcerpt' ); ?>>
    <header class="contentExcerpt__header">
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="contentExcerpt__ImageLink">
            <?php the_post_thumbnail( 'large', array( 'class' => 'contentExcerpt__Image', )); ?>
        </a>

        <?php the_title( sprintf( '<h2 class="contentExcerpt__title"><a href="%s"  class="contentExcerpt__titleLink">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    </header>

	<div class="contentExcerpt__content">
        <div class="contentExcerpt__categories">
            <?php
            $categories = get_the_category();

            if ( ! empty( $categories ) ) :
                foreach ( $categories as $category ) :
                    ?>

                    <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="contentExcerpt__category" title="<?php echo esc_attr( sprintf( __( 'View all posts in %s', 'ktlc' ), $category->name ) ) ?>">
                        <svg class="contentExcerpt__categoryIcon" width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L1.70711 0.292893ZM8 8L8.70711 8.70711C9.09763 8.31658 9.09763 7.68342 8.70711 7.29289L8 8ZM0.292893 14.2929C-0.0976311 14.6834 -0.0976311 15.3166 0.292893 15.7071C0.683417 16.0976 1.31658 16.0976 1.70711 15.7071L0.292893 14.2929ZM0.292893 1.70711L7.29289 8.70711L8.70711 7.29289L1.70711 0.292893L0.292893 1.70711ZM7.29289 7.29289L0.292893 14.2929L1.70711 15.7071L8.70711 8.70711L7.29289 7.29289Z" fill="<?php echo $themeColor; ?>"/></svg>
                        <?php echo esc_html( $category->name ); ?>
                    </a>

                    <?php
                endforeach;
            endif;
            ?>
        </div>

        <div class="contentExcerpt__excerpt">
		    <?php the_excerpt(); ?>
        </div>

        <div class="contentExcerpt__postMeta">
            <?php echo ktlc_render_post_meta(); ?>
        </div>
	</div>

    <a href="<?php echo get_permalink(); ?>" class="contentExcerpt__postButton">
        <svg class="contentExcerpt__postButtonIcon" width="26" height="22" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 11H24.3333" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M14.3333 1L24.3333 11L14.3333 21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>
</article>