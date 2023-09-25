<?php
/**
 * Template Name: Sponsors Template
 */

get_header();

$themeColor = get_theme_mod('ktlc_theme_color');
?>

<main class="pageSponsors">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            ?>
    
            <header class="pageSponsors__header" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                <div class="pageSponsors__headerInner container">
                    <h1 class="pageSponsors__title">
                        <?php the_title(); ?>
                    </h1>
                </div>
            </header>

            <?php
            $sponsors_query = new WP_Query( array(
                'post_type' => 'sponsor',
                'posts_per_page' => -1,
            ) );

            if ( $sponsors_query->have_posts() ) :
                ?>
                <div class="pageSponsors__sponsors">
                    <div class="pageSponsors__sponsorsInner container">
                        <?php
                        while ( $sponsors_query->have_posts() ) :
                            $sponsors_query->the_post();

                            $sponsor_url         = carbon_get_post_meta( get_the_ID(), 'sponsor_website_url' );
                            $sponsor_tagline     = carbon_get_post_meta( get_the_ID(), 'sponsor_tagline' );
                            $sponsor_level_image = carbon_get_post_meta( get_the_ID(), 'sponsor_level_image' );
                            $sponsor_level_title = carbon_get_post_meta( get_the_ID(), 'sponsor_level_title' );
                            ?>
                            <div class="pageSponsors__sponsor">
                                <a href="<?php echo esc_url( $sponsor_url ); ?>" class="pageSponsors__sponsorImageLink" rel="nofollow" target="_blank">
                                    <?php the_post_thumbnail( 'medium', array( 'class' => 'pageSponsors__sponsorImage' ) ); ?>
                                </a>

                                <h4 class="pageSponsors__sponsorTitle">
                                    <?php the_title(); ?>
                                </h4>

                                <div class="pageSponsors__sponsorLevel">
                                    <img src="<?php echo esc_url( $sponsor_level_image ); ?>" alt="" class="pageSponsors__sponsorLevelImage">
                                    
                                    <span class="pageSponsors__sponsorLevelTitle">
                                        <?php echo esc_html( $sponsor_level_title ); ?>
                                    </span>
                                </div>

                                <div class="pageSponsors__sponsorTagline">
                                    <?php echo esc_html( $sponsor_tagline ); ?>
                                </div>

                                <div class="pageSponsors__sponsorDescription">
                                    <?php the_content(); ?>

                                    <button class="pageSponsors__sponsorDescButton">
                                        <?php _e( 'Read more', 'ktlc' ); ?>
                                        <svg class="pageSponsors__sponsorDescButtonIcon" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg" class="header__menuItemArrow"><path d="M15.7071 1.70711C16.0976 1.31658 16.0976 0.683417 15.7071 0.292893C15.3166 -0.0976311 14.6834 -0.0976311 14.2929 0.292893L15.7071 1.70711ZM8 8L7.29289 8.70711C7.48043 8.89464 7.73478 9 8 9C8.26522 9 8.51957 8.89464 8.70711 8.70711L8 8ZM1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L1.70711 0.292893ZM14.2929 0.292893L7.29289 7.29289L8.70711 8.70711L15.7071 1.70711L14.2929 0.292893ZM8.70711 7.29289L1.70711 0.292893L0.292893 1.70711L7.29289 8.70711L8.70711 7.29289Z" fill="<?php echo $themeColor; ?>"/></svg>
                                    </button>
                                </div>

                                <a href="<?php echo esc_url( $sponsor_url ); ?>" class="pageSponsors__sponsorLink buttonMain" rel="nofollow" target="_blank">
                                    <?php _e( 'Visit website', 'ktlc' ); ?>
                                </a>
                            </div>
                            <?php
                        endwhile;
                        ?>
                    </div>
                </div>
                <?php
            endif;

            wp_reset_postdata();
            ?>

            <?php
        endwhile;
    endif;
    ?>
</main>

<?php get_footer(); ?>