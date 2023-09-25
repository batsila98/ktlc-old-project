<?php

$themeColor = get_theme_mod('ktlc_theme_color');

$testimonials_data = $args;

$title   = $testimonials_data['title'];
$text    = $testimonials_data['text'];
$list    = $testimonials_data['list'];
$image   = $testimonials_data['image'];
$pattern = $testimonials_data['image_pattern'];
?>

<section class="testimonials">
    <div class="testimonials__inner container">
        <div class="testimonials__content">
            <img src="<?php echo esc_url( $image ); ?>" alt="" class="testimonials__image">

            <h2 class="testimonials__title">
                <?php echo esc_html( $title ); ?>
            </h2>

            <p class="testimonials__text">
                <?php echo esc_html( $text ); ?>
            </p>
        </div>

        <div class="testimonials__list">
            <?php
            foreach ( $list as $testimonial ) :
                ?>

                <div class="testimonials__item">
                    <div class="testimonials__itemText">
                        <?php echo '"' . esc_html( $testimonial['text'] ) . '"'; ?>
                    </div>

                    <?php echo wp_get_attachment_image( $testimonial['image'], 'thumbnail', true, array( 'class' => 'testimonials__itemImage' ) ); ?>

                    <span class="testimonials__itemAuthor">
                        <?php echo esc_html( $testimonial['author'] ); ?>
                    </span>
                </div>

                <?php
            endforeach;
            ?>
        </div>
    </div>

    <!-- <img src="<?php echo esc_url( $pattern ); ?>" alt="Pattern Image" class="testimonials__imagePattern"> -->

    <svg class="testimonials__waveBottomLower" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#efefef" fill-opacity="1" d="M0,160L60,176C120,192,240,224,360,234.7C480,245,600,235,720,224C840,213,960,203,1080,208C1200,213,1320,235,1380,245.3L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>

    <svg class="testimonials__waveBottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="<?php echo $themeColor; ?>" fill-opacity="1" d="M0,256L60,261.3C120,267,240,277,360,282.7C480,288,600,288,720,277.3C840,267,960,245,1080,229.3C1200,213,1320,203,1380,197.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
</section>
