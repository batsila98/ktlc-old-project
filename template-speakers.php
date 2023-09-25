<?php
/**
 * Template Name: Speakers Template
 */

get_header();
?>

<main class="pageSpeakers">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                ?>
        
                <header class="pageSpeakers__header" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                    <div class="pageSpeakers__headerInner container">
                        <h1 class="pageSpeakers__title">
                            <?php the_title(); ?>
                        </h1>
                    </div>
                </header>

                <?php
                $speakers_query = new WP_Query( array(
                    'post_type' => 'speaker',
                    'posts_per_page' => -1,
                ) );

                if ( $speakers_query->have_posts() ) :
                    ?>
                    <div class="pageSpeakers__speakers">
                        <div class="pageSpeakers__speakersInner">
                            <div class="pageSpeakers__tabs">
                                <nav class="pageSpeakers__tabsNav">
                                    <?php
                                    $counter = 0;
                                    while ( $speakers_query->have_posts() ) :
                                        $speakers_query->the_post();
                                        $speaker_id = get_the_ID();

                                        $speaker_language           = carbon_get_post_meta( $speaker_id, 'speaker_language' );
                                        $speaker_company            = carbon_get_post_meta( $speaker_id, 'speaker_company' );
                                        $speaker_company_url        = carbon_get_post_meta( $speaker_id, 'speaker_company_url' );
                                        $speaker_position           = carbon_get_post_meta( $speaker_id, 'speaker_position' );
                                        $speaker_presentation_title = carbon_get_post_meta( $speaker_id, 'speaker_presentation_title' );
                                        $speaker_abstract           = carbon_get_post_meta( $speaker_id, 'speaker_abstract' );
                                        $speaker_event              = carbon_get_post_meta( $speaker_id, 'speaker_event' );
                                        $speaker_track              = carbon_get_post_meta( $speaker_id, 'speaker_track' );
                                        ?>

                                        <button class="pageSpeakers__tabsNavButton <?php echo $counter === 0 ? 'pageSpeakers__tabsNavButton_active' : ''; $counter++; ?>" data-target="<?php echo 'ktlc-speaker-' . get_post_field( 'post_name', $speaker_id ); ?>"  data-targetmobile="<?php echo 'ktlc-speaker-mobile-' . get_post_field( 'post_name', $speaker_id ); ?>">
                                            <?php
                                            the_post_thumbnail( 'thumbnail', array( 'class' => 'pageSpeakers__tabsNavImage' ) );
                                            the_title(); ?>
                                        </button>

                                        <div class="pageSpeakers__tabsItemMobile" id="<?php echo 'ktlc-speaker-mobile-' . get_post_field( 'post_name', $speaker_id ); ?>">
                                            <?php
                                            the_post_thumbnail( 'medium', array( 'class' => 'pageSpeakers__tabsItemImage' ) );
                                            ?>

                                            <div class="pageSpeakers__tabsItemDetails">
                                                <h4 class="pageSpeakers__tabsItemName">
                                                    <?php the_title(); ?>
                                                </h4>

                                                <p class="pageSpeakers__tabsItemCompany">
                                                    <?php echo esc_html( $speaker_company ); 
                                                    
                                                    if ( $speaker_company_url !== '' ) :
                                                        ?>
                                                        —
                                                        <a href="<?php echo esc_url( $speaker_company_url ); ?>" class="pageSpeakers__tabsItemCompanyUrl" rel="nofollow" target="_blank">
                                                            <?php _e( 'Website', 'ktlc' ); ?>
                                                        </a>
                                                        <?php
                                                    endif;
                                                    ?>
                                                </p>

                                                <p class="pageSpeakers__tabsItemPosition">
                                                    <?php echo esc_html( $speaker_position ); ?>
                                                </p>

                                                <p class="pageSpeakers__tabsItemPresentation">
                                                    <?php echo esc_html( $speaker_presentation_title ); ?>
                                                </p>

                                                <p class="pageSpeakers__tabsItemAbstract">
                                                    <?php echo wp_kses_post( $speaker_abstract ); ?>
                                                </p>

                                                <p class="pageSpeakers__tabsItemEvent">
                                                    <?php echo wp_kses_post( $speaker_event ); ?>
                                                </p>

                                                <?php
                                                if ( ! empty( $speaker_track ) ) :
                                                    ?>
                                                    <div class="pageSpeakers__tabsItemTrack">
                                                        <?php
                                                        foreach ( $speaker_track as $track_item ) :
                                                            ?>
                                                            <span class="pageSpeakers__tabsItemTrackItem">
                                                                <?php echo esc_html( $track_item['title'] ); ?>
                                                            </span>
                                                            <?php
                                                        endforeach;
                                                        ?>
                                                    </div>
                                                    <?php
                                                    endif;
                                                ?>
                                            </div>

                                            <div class="pageSpeakers__tabsItemContent">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>

                                        <?php
                                    endwhile;
                                    ?>
                                </nav>

                                <div class="pageSpeakers__tabsContent">
                                    <?php
                                    $counter = 0;
                                    while ( $speakers_query->have_posts() ) :
                                        $speakers_query->the_post();
                                        $speaker_id = get_the_ID();

                                        $speaker_language           = carbon_get_post_meta( $speaker_id, 'speaker_language' );
                                        $speaker_company            = carbon_get_post_meta( $speaker_id, 'speaker_company' );
                                        $speaker_company_url        = carbon_get_post_meta( $speaker_id, 'speaker_company_url' );
                                        $speaker_position           = carbon_get_post_meta( $speaker_id, 'speaker_position' );
                                        $speaker_presentation_title = carbon_get_post_meta( $speaker_id, 'speaker_presentation_title' );
                                        $speaker_abstract           = carbon_get_post_meta( $speaker_id, 'speaker_abstract' );
                                        $speaker_event              = carbon_get_post_meta( $speaker_id, 'speaker_event' );
                                        $speaker_track              = carbon_get_post_meta( $speaker_id, 'speaker_track' );
                                        ?>

                                        <div id="<?php echo 'ktlc-speaker-' . get_post_field( 'post_name', $speaker_id ); ?>" class="pageSpeakers__tabsItem <?php echo $counter === 0 ? 'pageSpeakers__tabsItem_visible' : ''; $counter++; ?>">
                                            <?php
                                            the_post_thumbnail( 'medium', array( 'class' => 'pageSpeakers__tabsItemImage' ) );
                                            ?>

                                            <div class="pageSpeakers__tabsItemDetails">
                                                <h4 class="pageSpeakers__tabsItemName">
                                                    <?php the_title(); ?>
                                                </h4>

                                                <p class="pageSpeakers__tabsItemCompany">
                                                    <?php echo esc_html( $speaker_company ); 
                                                    
                                                    if ( $speaker_company_url !== '' ) :
                                                        ?>
                                                        —
                                                        <a href="<?php echo esc_url( $speaker_company_url ); ?>" class="pageSpeakers__tabsItemCompanyUrl" rel="nofollow" target="_blank">
                                                            <?php _e( 'Website', 'ktlc' ); ?>
                                                        </a>
                                                        <?php
                                                    endif;
                                                    ?>
                                                </p>

                                                <p class="pageSpeakers__tabsItemPosition">
                                                    <?php echo esc_html( $speaker_position ); ?>
                                                </p>

                                                <p class="pageSpeakers__tabsItemPresentation">
                                                    <?php echo esc_html( $speaker_presentation_title ); ?>
                                                </p>

                                                <p class="pageSpeakers__tabsItemAbstract">
                                                    <?php echo wp_kses_post( $speaker_abstract ); ?>
                                                </p>

                                                <p class="pageSpeakers__tabsItemEvent">
                                                    <?php echo wp_kses_post( $speaker_event ); ?>
                                                </p>

                                                <?php
                                                if ( ! empty( $speaker_track ) ) :
                                                    ?>
                                                    <div class="pageSpeakers__tabsItemTrack">
                                                        <?php
                                                        foreach ( $speaker_track as $track_item ) :
                                                            ?>
                                                            <span class="pageSpeakers__tabsItemTrackItem">
                                                                <?php echo esc_html( $track_item['title'] ); ?>
                                                            </span>
                                                            <?php
                                                        endforeach;
                                                        ?>
                                                    </div>
                                                    <?php
                                                    endif;
                                                ?>
                                            </div>

                                            <div class="pageSpeakers__tabsItemContent">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>

                                        <?php
                                    endwhile;
                                    ?>
                                </div>
                            </div>
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