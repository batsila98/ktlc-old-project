<?php

$themeColor = get_theme_mod('ktlc_theme_color');

$banner_data = $args;

$banner_buttons  = $banner_data['buttons'];
$banner_date     = $banner_data['date'];
$banner_image    = $banner_data['image'];
$banner_subtitle = $banner_data['subtitle'];
$banner_title    = $banner_data['title'];
?>

<section class="bannerHome" style="background-image: url('<?php echo esc_url( $banner_image ); ?>')">
    <div class="bannerHome__inner container">
        <h1 class="bannerHome__title">
            <?php echo esc_html( $banner_title ); ?>
        </h1>
        <h5 class="bannerHome__subtitle">
            <?php echo esc_html( $banner_subtitle ); ?>
        </h5>
        <p class="bannerHome__date">
            <?php echo esc_html( $banner_date ); ?>
        </p>

        <?php
        foreach ( $banner_buttons as $key => $button ) :
            $button_link = get_permalink( $button['link'][0]['id'] );
            $button_text = $button['text'];
            $classes = 'bannerHome__button';

            if ( $key === array_key_last( $banner_buttons ) ) :
                $classes .= ' buttonSecondary';
            else :
                $classes .= ' buttonMain';
            endif;
            ?>
            <a href="<?php echo esc_url( $button_link ); ?>" class="<?php echo esc_html( $classes ); ?>">
                <?php echo esc_html( $button_text ); ?>
            </a>
            <?php
        endforeach;
        ?>
    </div>

    <svg class="bannerHome__wave bannerHome__wave_bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="<?php echo $themeColor; ?>" fill-opacity="1" d="M0,128L60,154.7C120,181,240,235,360,261.3C480,288,600,288,720,266.7C840,245,960,203,1080,197.3C1200,192,1320,224,1380,240L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>

    <svg class="bannerHome__wave bannerHome__wave_bottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,224L60,240C120,256,240,288,360,293.3C480,299,600,277,720,261.3C840,245,960,235,1080,234.7C1200,235,1320,245,1380,250.7L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
</section>

