<?php

$ribbon_data = $args;

$ribbon_image     = $ribbon_data['image'];
$ribbon_title     = $ribbon_data['title'];
$ribbon_link_text = $ribbon_data['link_text'];
$ribbon_link_url  = $ribbon_data['link_url'];
?>

<section class="ribbon">
    <div class="ribbon__inner container">
        <div class="ribbon__content" style="background-image: url('<?php echo wp_get_attachment_image_url( $ribbon_image, 'large'); ?>')">
            <h2 class="ribbon__title">
                <?php echo esc_html( $ribbon_title ); ?>
            </h2>

            <a href="<?php echo esc_url( $ribbon_link_url ); ?>" class="ribbon__link buttonMain">
                <?php echo esc_html( $ribbon_link_text ); ?>
            </a>
        </div>
    </div>
</section>