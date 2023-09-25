<?php

$themeColor = get_theme_mod('ktlc_theme_color');

$blog_data = $args;

$blog_title    = $blog_data['title'];
$blog_subtitle = $blog_data['subtitle'];
?>

<section class="sectionBlog">
    <div class="sectionBlog__inner container">
        <div class="sectionBlog__titles">
            <h2 class="sectionBlog__title">
                <?php echo esc_html( $blog_title ); ?>
            </h2>

            <p class="sectionBlog__subtitle">
                <?php echo esc_html( $blog_subtitle ); ?>
            </p>

            <button class="sectionBlog__button buttonMain">
                <?php _e( 'View all', 'ktlc' ); ?>
            </button>
        </div>

        <div class="sectionBlog__list">
            <?php
            $blog_args  = array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
            );
            $blog_query = new WP_Query( $blog_args );
            
            if ( $blog_query->have_posts() ) :
                while ( $blog_query->have_posts() ) :
                    $blog_query->the_post();
                    $post_categories = get_the_category( get_the_ID() );
                    ?>
                    
                    <div class="sectionBlog__post">
                        <a href="<?php echo get_permalink(); ?>" class="sectionBlog__postImageLink">
                            <?php echo get_the_post_thumbnail( get_the_ID(), 'large', array( 'class' => 'sectionBlog__postImage' ) ); ?>
                        </a>

                        <div class="sectionBlog__postContent">
                            <?php
                            foreach ( $post_categories as $category ) :
                                ?>

                                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="sectionBlog__postCategory">
                                    <svg class="sectionBlog__postCategoryIcon" width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.70711 0.292893C1.31658 -0.0976311 0.683417 -0.0976311 0.292893 0.292893C-0.0976311 0.683417 -0.0976311 1.31658 0.292893 1.70711L1.70711 0.292893ZM8 8L8.70711 8.70711C9.09763 8.31658 9.09763 7.68342 8.70711 7.29289L8 8ZM0.292893 14.2929C-0.0976311 14.6834 -0.0976311 15.3166 0.292893 15.7071C0.683417 16.0976 1.31658 16.0976 1.70711 15.7071L0.292893 14.2929ZM0.292893 1.70711L7.29289 8.70711L8.70711 7.29289L1.70711 0.292893L0.292893 1.70711ZM7.29289 7.29289L0.292893 14.2929L1.70711 15.7071L8.70711 8.70711L7.29289 7.29289Z" fill="<?php echo $themeColor; ?>"/>
                                    </svg>
                                    <?php echo esc_html( $category->name ); ?>
                                </a>

                                <?php
                            endforeach;
                            ?>

                            <h6 class="sectionBlog__postTitle">
                                <a href="<?php echo get_permalink(); ?>" class="sectionBlog__postLink">
                                    <?php echo wp_kses_post( get_the_title() ); ?>
                                </a>
                            </h6>

                            <p class="sectionBlog__postExcerpt">
                                <?php echo wp_kses_post( get_the_excerpt() ); ?>
                            </p>
                        </div>

                        <a href="<?php echo get_permalink(); ?>" class="sectionBlog__postButton">
                            <svg class="sectionBlog__postButtonIcon" width="26" height="22" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 11H24.3333" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.3333 1L24.3333 11L14.3333 21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                    
                    <?php
                endwhile;
            endif;

            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>