<?php

$sponsors = $args['sponsor'];

if ( $sponsors ) :
    ?>

    <section class="sponsorsList">
        <div class="sponsorsList__inner container">
            <h2 class="sponsorsList__title">
                <?php _e( 'Our sponsors', 'ktlc' ); ?>
            </h2>

            <?php
            foreach ( $sponsors as $sponsor ) :
                $sponsor_data  = get_post( $sponsor['id'] );
                $sponsor_image = get_the_post_thumbnail_url( $sponsor['id'], 'medium' );
                $sponsor_link  = carbon_get_post_meta( $sponsor['id'], 'sponsor_website_url' );
                $sponsor_title = $sponsor_data->post_title;
                ?>

                <a href="<?php echo esc_url( $sponsor_link ); ?>" class="sponsorsList__link" rel="nofollow" target="_blank">
                    <img src="<?php echo esc_html( $sponsor_image ); ?>" alt="" class="sponsorsList__image">
                </a>

                <?php
            endforeach;
            ?>
        </div>
    </section>

    <?php
endif;
?>