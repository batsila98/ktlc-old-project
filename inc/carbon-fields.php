<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'ktlc_implement_fields' );
function ktlc_implement_fields() {
    /**
     * Theme options fields
     */
    $theme_options_container = Container::make( 'theme_options', __( 'Theme Options' ) )
        ->add_fields( array() );

    Container::make( 'theme_options', __( 'Header options' ) )
        ->set_page_parent( $theme_options_container )
        ->add_fields( array(
            Field::make( 'separator', 'another_conference_separator', __( 'Another Conference Link Options' ) ),
            Field::make( 'image', 'another_conference_link_image', __( 'Another Conference Link Image' ) )
                ->set_value_type( 'url' )
                ->set_width( 20 ),
            Field::make( 'text', 'another_conference_link_text', __( 'Another Conference Link Text' ) )
                ->set_width( 40 ),
            Field::make( 'text', 'another_conference_link_url', __( 'Another Conference Link URL' ) )
                ->set_width( 40 ),
        ) );

    Container::make( 'theme_options', __( 'Footer options' ) )
        ->set_page_parent( $theme_options_container )
        ->add_tab( __( 'Footer Logo' ), array(
            Field::make( 'image', 'footer_logo', __( 'Image' ) )
                ->set_value_type( 'url' )
                ->set_width( 40 ),
            Field::make( 'text', 'footer_logo_title', __( 'Title' ) )
                ->set_width( 60 ),
        ) )
        ->add_tab( __( 'Footer Contacts' ), array(
            Field::make( 'text', 'footer_contacts_title', __( 'Title' ) ),
            Field::make( 'complex', 'footer_emails', __( 'Emails' ) )
                ->add_fields( array(
                    Field::make( 'text', 'email', __( 'Email' ) ),
                ) )
                ->set_width( 50 ),
            Field::make( 'complex', 'footer_phones', __( 'Phone Numbers' ) )
                ->add_fields( array(
                    Field::make( 'text', 'phone', __( 'Phone Number' ) ),
                ) )
                ->set_width( 50 ),
            Field::make( 'complex', 'footer_social_networks', __( 'Social Networks' ) )
                ->add_fields( array(
                    Field::make( 'image', 'social_network_image', __( 'Image' ) )
                        ->set_value_type( 'url' )
                        ->set_width( 50 ),
                    Field::make( 'text', 'social_network_url', __( 'URL' ) )
                        ->set_width( 50 ),
                ) )
        ) )
        ->add_tab( __( 'Footer Organizers' ), array(
            Field::make( 'text', 'footer_organizers_title', __( 'Title' ) )
                ->set_width( 50 ),
            Field::make( 'text', 'footer_organizers_data_title', __( 'Title above organizers data' ) )
                ->set_width( 50 ),
            Field::make( 'complex', 'footer_organizers', __( 'Conference Organizers' ) )
                ->add_fields( array(
                    Field::make( 'image', 'organizer_image', __( 'Image' ) )
                        ->set_value_type( 'url' )
                        ->set_width( 20 ),
                    Field::make( 'text', 'organizer_url', __( 'URL' ) )
                        ->set_width( 30 ),
                    Field::make( 'textarea', 'organizer_data', __( 'Data' ) )
                        ->set_width( 50 ),
                ) )
        ) )
        ->add_tab( __( 'Copyright' ), array(
            Field::make( 'text', 'footer_copyright_text', __( 'Text' ) ),
        ) );

    
    /**
     * Custom fields for Sponsor post type
     */
    Container::make( 'post_meta', 'Sponsor\'s fields' )
        ->where( 'post_type', '=', 'sponsor' )
        ->add_fields( array(
            Field::make( 'text',   'sponsor_website_url', __( 'Sponsor Url' ) )
                ->set_width( 50 ),
            Field::make( 'text',   'sponsor_tagline',     __( 'Sponsor Tagline' ) )
                ->set_width( 50 ),
            Field::make( 'image', 'sponsor_level_image', __( 'Sponsor Level Image' ) )
                ->set_value_type( 'url' )
                ->set_width( 50 ),
            Field::make( 'text', 'sponsor_level_title', __( 'Sponsor Level Title' ) )
                ->set_width( 50 ),
        ) );

    /**
     * Custom fields for Partner post type
     */
    Container::make( 'post_meta', 'Partner\'s fields' )
        ->where( 'post_type', '=', 'partner' )
        ->add_fields( array(
            Field::make( 'text', 'partner_url', __( 'Partner Url' ) )
                ->set_width( 50 ),
            Field::make( 'text', 'partner_tagline', __( 'Partner Tagline' ) )
                ->set_width( 50 ),
        ) );

    /**
     * Custom fields for Speakers post type
     */
    Container::make( 'post_meta', 'Speaker\'s fields' )
        ->where( 'post_type', '=', 'speaker' )
        ->add_fields( array(
            Field::make( 'radio_image', 'speaker_language',           __( 'Speaker Language' ) )
                ->set_options( array(
                    'english' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg/2560px-Flag_of_the_United_Kingdom_%283-5%29.svg.png',
                    'polish'  => 'https://upload.wikimedia.org/wikipedia/en/thumb/1/12/Flag_of_Poland.svg/2560px-Flag_of_Poland.svg.png',
                ) )
                ->set_width( 50 ),
            Field::make( 'text',        'speaker_position',           __( 'Speaker Position' ) )
                ->set_width( 50 ),
            Field::make( 'text',        'speaker_company',            __( 'Speaker Company' ) )
                ->set_width( 50 ),
            Field::make( 'text',        'speaker_company_url',        __( 'Speaker Company URL' ) )
                ->set_width( 50 ),
            Field::make( 'textarea',    'speaker_presentation_title', __( 'Speaker Presentation Title' ) )
                ->set_width( 50 ),
            Field::make( 'textarea',    'speaker_abstract',           __( 'Speaker Abstract' ) )
                ->set_width( 50 ),
            Field::make( 'date_time',   'speaker_event',              __( 'Speaker Event' ) )
                ->set_attribute( 'placeholder', 'Date and time of event' )
                ->set_width( 50 ),
            Field::make( 'complex',     'speaker_track',              __( 'Speaker Track' ) )
                ->add_fields( array(
                    Field::make( 'text', 'title', __( 'Title' ) ),
                ) )
                ->set_width( 50 ),
        ) );

    /**
     * Home page fields
     */
    Container::make( 'post_meta', __( 'Home Page', 'crb' ) )
        ->where( 'post_id', '=', get_option( 'page_on_front' ) )
        ->add_fields( array(
            Field::make( 'complex', 'home_page_sections', __( 'Home Page Sections' ) )
                ->add_fields( 'banner', array(
                    Field::make( 'image', 'image', __( 'Banner Image' ) )
                        ->set_value_type( 'url' )
                        ->set_width( 20 ),
                    Field::make( 'text', 'title', __( 'Banner Title' ) )
                        ->set_width( 80 ),
                    Field::make( 'text', 'subtitle', __( 'Banner Subtitle' ) )
                        ->set_width( 50 ),
                    Field::make( 'text', 'date', __( 'Banner Conferences Date' ) )
                        ->set_width( 50 ),
                    Field::make( 'complex', 'buttons', __( 'Banner Buttons' ) )
                        ->add_fields( array(
                            Field::make( 'text', 'text', __( 'Button Title' ) )
                                ->set_width( 50 ),
                            Field::make( 'association', 'link', __( 'Association' ) )
                                ->set_types( array(
                                    array(
                                        'type'      => 'post',
                                        'post_type' => 'page',
                                    )
                                ) )
                                ->set_max( 1 )
                                ->set_width( 50 ),
                        ) )
                ) )
                ->add_fields( 'sponsors', array(
                    Field::make( 'association', 'sponsor', __( 'Association' ) )
                        ->set_types( array(
                            array(
                                'type'      => 'post',
                                'post_type' => 'sponsor',
                            )
                        ) )
                ) )
                ->add_fields( 'ribbon', array(
                    Field::make( 'image', 'image', __( 'Background Image' ) )
                        ->set_width( 20 ),
                    Field::make( 'textarea', 'title', __( 'Title' ) )
                        ->set_width( 80 ),
                    Field::make( 'text', 'link_text', __( 'Link Text' ) )
                        ->set_width( 50 ),
                    Field::make( 'text', 'link_url', __( 'Link URL' ) )
                        ->set_width( 50 ),
                ) )
                ->add_fields( 'about', array(
                    Field::make( 'image', 'bg_image', __( 'Backgrond Image' ) )
                        ->set_value_type( 'url' ),
                    Field::make( 'text', 'title', __( 'Title' ) )
                        ->set_width( 50 ),
                    Field::make( 'text', 'subtitle', __( 'Subtitle' ) )
                        ->set_width( 50 ),
                    Field::make( 'complex', 'features', __( 'Features Content' ) )
                        ->add_fields( array(
                            Field::make( 'image', 'image', __( 'Image' ) )
                                ->set_value_type( 'url' )
                                ->set_width( 20 ),
                            Field::make( 'textarea', 'text', __( 'Text' ) )
                                ->set_width( 80 ),
                            Field::make( 'text', 'title', __( 'Title' ) )
                                ->set_width( 50 ),
                            Field::make( 'text', 'link', __( 'Link' ) )
                                ->set_width( 50 ),
                        ) )
                        ->set_max( 6 )
                ) )
                ->add_fields( 'facebook_feed', array(
                    Field::make( 'text', 'title', __( 'Title' ) )
                        ->set_width( 50 ),
                    Field::make( 'text', 'shortcode', __( 'Shortcode' ) )
                        ->set_width( 50 ),
                ) )
                ->add_fields( 'testimonials', array(
                    Field::make( 'image', 'image', __( 'Image' ) )
                        ->set_value_type( 'url' )
                        ->set_width( 50 ),
                    Field::make( 'image', 'image_pattern', __( 'Pattern Image' ) )
                        ->set_value_type( 'url' )
                        ->set_width( 50 ),
                    Field::make( 'text', 'title', __( 'Title' ) )
                        ->set_width( 50 ),
                    Field::make( 'textarea', 'text', __( 'Text' ) )
                        ->set_width( 50 ),
                    Field::make( 'complex', 'list', __( 'Testimonials list' ) )
                        ->add_fields( array(
                            Field::make( 'image', 'image', __( 'Image' ) )
                                ->set_width( 20 ),
                            Field::make( 'text', 'author', __( 'Author\'s name and Surname' ) )
                                ->set_width( 80 ),
                            Field::make( 'textarea', 'text', __( 'Text' ) )
                                ->set_width( 80 ),
                        ) )
                        ->set_max( 4 )
                ) )
                ->add_fields( 'subscribe', array(
                    Field::make( 'text', 'title', __( 'Title' ) )
                        ->set_width( 50 ),
                    Field::make( 'text', 'subtitle', __( 'Subtitle' ) )
                        ->set_width( 50 ),
                ) )
                ->add_fields( 'blog', array(
                    Field::make( 'text', 'title', __( 'Title' ) )
                        ->set_width( 50 ),
                    Field::make( 'text', 'subtitle', __( 'Subtitle' ) )
                        ->set_width( 50 ),
                ) )
                ->add_fields( 'about_team', array(
                    Field::make( 'image', 'bg_image', __( 'Backgrond Image' ) )
                        ->set_value_type( 'url' ),
                    Field::make( 'text', 'title', __( 'Title' ) )
                        ->set_width( 50 ),
                    Field::make( 'rich_text', 'text', __( 'Text' ) )
                        ->set_width( 50 ),
                    Field::make( 'text', 'form_title', __( 'Form Title' ) )
                        ->set_width( 50 ),
                    Field::make( 'text', 'form_shortcode', __( 'Form Shortcode' ) )
                        ->set_width( 50 ),
                ) )
                ->set_layout( 'tabbed-vertical' )
                ->set_duplicate_groups_allowed( false )
        ) );
}