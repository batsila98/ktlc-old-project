<?php

$sponsors      = $args['sponsor'];

if ( $sponsors ) :
    ?>

    <section class="sponsorsCarousel">
        <h2 class="sponsorsCarousel__title">
            <?php _e( 'Our sponsors', 'ktlc' ); ?>
        </h2>

        <div class="swiper sponsorsCarousel__carousel">
            <div class="swiper-wrapper sponsorsCarousel__carouselInner">
                <?php
                foreach ( $sponsors as $sponsor ) :
                    $sponsor_data  = get_post( $sponsor['id'] );
                    $sponsor_image = get_the_post_thumbnail_url( $sponsor['id'], 'medium' );
                    $sponsor_link  = carbon_get_post_meta( $sponsor['id'], 'sponsor_website_url' );
                    $sponsor_title = $sponsor_data->post_title;
                    ?>
                    
                    <div class="swiper-slide sponsorsCarousel__slide">
                        <a href="<?php echo esc_url( $sponsor_link ); ?>" class="sponsorsCarousel__link" rel="nofollow" target="_blank">
                            <img src="<?php echo esc_html( $sponsor_image ); ?>" alt="" class="sponsorsCarousel__image">
                        </a>
                    </div>

                    <?php
                endforeach;
                ?>
            </div>
        </div>
    </section>

    <?php
endif;
?>