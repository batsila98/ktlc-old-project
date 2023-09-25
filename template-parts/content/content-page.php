<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage KTLC
 * @since KTLC 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'simplePage' ); ?>>

        <header class="simplePage__header">
            <?php 
            if ( ktlc_can_show_post_thumbnail() ) :
                ?>
                <figure class="simplePage__thumbnail">
                    <?php
                    the_post_thumbnail( 'post-thumbnail', array( 'loading' => false ) );
                    
                    if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) :
                        ?>
                        <figcaption class="simplePage__thumbnailCaption">
                            <?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?>
                        </figcaption>
                        <?php
                    endif;
                    ?>
                </figure>
                <?php
            else :
                ?>
                <div class="simplePage__thumbnail">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/resources/dist/images/ThumbnailPlaceholder-SimplePage.webp' ?>" alt="" class="simplePage__thumbnailPlaceholder">
                </div>
                <?php
            endif;
            ?>

            <div class="container">
                <div class="simplePage__heading">
                    <?php the_title( '<h1 class="simplePage__title">', '</h1>' ); ?>
                </div>
            </div>
            
		</header>

	<div class="simplePage__content">
		<div class="container">
            <?php the_content(); ?>
        </div>
	</div>
</article>