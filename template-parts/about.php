<?php

$about_data = $args;

$about_bg_image = $about_data['bg_image'];
$about_title    = $about_data['title'];
$about_subtitle = $about_data['subtitle'];
$about_features = $about_data['features'];
?>

<section class="about" style="background-image: url('<?php echo esc_url( $about_bg_image ); ?>')">
    <div class="about__inner container">
        <div class="about__titles">
            <h2 class="about__title">
                <?php echo esc_html( $about_title ); ?>
            </h2>
            
            <p class="about__subtitle">
                <?php echo $about_subtitle; ?>
            </p>
        </div>

        <div class="about__featuresList">
            <?php
            foreach ( $about_features as $feature ) :
                ?>

                <div class="about__feature">
                    <?php
                    if ( $feature['link'] !== '' ) :
                        ?>

                        <a href="<?php echo esc_url( $feature['link'] ); ?>" class="about__featureLink">
                            <img src="<?php echo esc_url( $feature['image'] ); ?>" alt="" class="about__featureImage">

                            <span class="about__featureTitle">
                                <?php echo esc_html( $feature['title'] ); ?>
                            </span>
                        </a>

                        <?php
                    else :
                        ?>

                        <div class="about__featureLink">
                            <img src="<?php echo esc_url( $feature['image'] ); ?>" alt="" class="about__featureImage">

                            <span class="about__featureTitle">
                                <?php echo esc_html( $feature['title'] ); ?>
                            </span>
                        </div>
                        
                        <?php
                    endif;
                    ?>
                    
                    <p class="about__featureText">
                            <?php echo esc_html( $feature['text'] ); ?>
                    </p>

                    <?php
                    if ( $feature['link'] !== '' ) :
                        ?>

                        <a href="<?php echo esc_url( $feature['link'] ); ?>" class="about__featureLink">
                            <svg class="about__featureLinkIcon" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 2C10.4477 2 10 1.55228 10 1C10 0.447715 10.4477 0 11 0H17C17.2652 0 17.5196 0.105357 17.7071 0.292894C17.8946 0.48043 18 0.734784 18 1L18 7C18 7.55229 17.5523 8 17 8C16.4477 8 16 7.55228 16 7L16 3.41422L6.70711 12.7071C6.31658 13.0976 5.68342 13.0976 5.29289 12.7071C4.90237 12.3166 4.90237 11.6834 5.29289 11.2929L14.5858 2H11ZM0 4C0 2.89543 0.895431 2 2 2H7C7.55228 2 8 2.44772 8 3C8 3.55228 7.55228 4 7 4H2V16H14V11C14 10.4477 14.4477 10 15 10C15.5523 10 16 10.4477 16 11V16C16 17.1046 15.1046 18 14 18H2C0.895431 18 0 17.1046 0 16V4Z" fill="#E91E63"/>
                            </svg>
                        </a>
                        
                        <?php
                    endif;
                    ?>
                </div>
                
                <?php
            endforeach;
            ?>
        </div>
    </div>

    <svg class="about__waveTop" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,32L60,32C120,32,240,32,360,37.3C480,43,600,53,720,58.7C840,64,960,64,1080,53.3C1200,43,1320,21,1380,10.7L1440,0L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>



    <svg class="about__waveBottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#efefef" fill-opacity="1" d="M0,192L60,197.3C120,203,240,213,360,213.3C480,213,600,203,720,176C840,149,960,107,1080,101.3C1200,96,1320,128,1380,144L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>

    <svg class="about__waveBottom" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,160L60,176C120,192,240,224,360,234.7C480,245,600,235,720,224C840,213,960,203,1080,208C1200,213,1320,235,1380,245.3L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
</section>