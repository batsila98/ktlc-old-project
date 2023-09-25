<?php

$feed_data = $args;

$feed_shortcode = $feed_data['shortcode'];
$feed_title     = $feed_data['title'];
?>

<section class="facebookFeed">
    <div class="facebookFeed__inner container">
        <h2 class="facebookFeed__title">
            <?php echo esc_html( $feed_title ); ?>
        </h2>

        <div class="facebookFeed__content">
            <?php echo do_shortcode( $feed_shortcode ); ?>
        </div>
    </div>
</section>