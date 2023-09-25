<?php
/**
 * Template Name: Partners Template
 */

get_header();

$themeColor = get_theme_mod('ktlc_theme_color');
?>

<main class="pagePartners">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            ?>
    
            <header class="pagePartners__header" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                <div class="pagePartners__headerInner container">
                    <h1 class="pagePartners__title">
                        <?php the_title(); ?>
                    </h1>
                </div>
            </header>

            <?php
            $partners_query = new WP_Query( array(
                'post_type' => 'partner',
                'posts_per_page' => -1,
            ) );

            if ( $partners_query->have_posts() ) :
                ?>
                <div class="pagePartners__partners">
                    <div class="pagePartners__partnersInner container">
                        <?php
                        while ( $partners_query->have_posts() ) :
                            $partners_query->the_post();

                            $partner_url     = carbon_get_post_meta( get_the_ID(), 'partner_url' );
                            $partner_tagline = carbon_get_post_meta( get_the_ID(), 'partner_tagline' );
                            ?>
                            <div class="pagePartners__partner">
                                <a href="<?php echo esc_url( $partner_url ); ?>" class="pagePartners__partnerImageLink" rel="nofollow" target="_blank">
                                    <?php the_post_thumbnail( 'medium', array( 'class' => 'pagePartners__partnerImage' ) ); ?>
                                </a>

                                <h4 class="pagePartners__partnerTitle">
                                    <?php the_title(); ?>
                                </h4>

                                <div class="pagePartners__partnerTagline">
                                    <?php echo esc_html( $partner_tagline ); ?>
                                </div>

                                <div class="pagePartners__partnerDescription">
                                    <?php the_content(); ?>

                                    <button class="pagePartners__partnerDescButton">
                                        <?php _e( 'Read more', 'ktlc' ); ?>
                                        <svg class="pagePartners__partnerDescButtonIcon" width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg" class="header__menuItemArrow"><path d="M15.7071 1.70711C16.0976 1.31658 16.0976 0.683417 15.7071 0.292893C15.3166 -0.0976311 14.6834 -0.0976311 14.2929 0.292893L15.7071 1.70711ZM8 8L7.29289 8.70711C7.48043 8.89464 7.73478 9 8 9C8.26522 9 8.51957 8.89464 8.70711 8.70711L8 8ZM1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L1.70711 0.292893ZM14.2929 0.292893L7.29289 7.29289L8.70711 8.70711L15.7071 1.70711L14.2929 0.292893ZM8.70711 7.29289L1.70711 0.292893L0.292893 1.70711L7.29289 8.70711L8.70711 7.29289Z" fill="<?php echo $themeColor; ?>"/></svg>
                                    </button>
                                </div>

                                <a href="<?php echo esc_url( $partner_url ); ?>" class="pagePartners__partnerLink buttonMain" rel="nofollow" target="_blank">
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