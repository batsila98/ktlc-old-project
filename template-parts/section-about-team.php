<?php

$about_team_data = $args;

$about_team_bg_image       = $about_team_data['bg_image'];
$about_team_title          = $about_team_data['title'];
$about_team_text           = $about_team_data['text'];
$about_team_form_title     = $about_team_data['form_title'];
$about_team_form_shortcode = $about_team_data['form_shortcode'];
?>

<section class="sectionAboutTeam" style="background-image: url('<?php echo esc_url( $about_team_bg_image ); ?>');">
    <div class="sectionAboutTeam__inner container">
        <div class="sectionAboutTeam__content">
            <h2 class="sectionAboutTeam__title">
                <?php echo esc_html( $about_team_title ); ?>
            </h2>

            <div class="sectionAboutTeam__text">
                <?php print_r( $about_team_text ); ?>
            </div>
        </div>

        <div class="sectionAboutTeam__formWrapper">
            <h4 class="sectionAboutTeam__formTitle">
                <?php echo esc_html( $about_team_form_title ); ?>
            </h4>

            <?php echo do_shortcode( $about_team_form_shortcode ); ?>
        </div>
    </div>
</section>