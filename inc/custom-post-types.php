<?php
/*
* Creating a function to create custom post type "Sponsor"
*/
function ktlc_custom_post_type_sponsor() {
  
	// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Sponsors', 'Post Type General Name', 'ktlc' ),
        'singular_name'       => _x( 'Sponsor', 'Post Type Singular Name', 'ktlc' ),
        'menu_name'           => __( 'Sponsors', 'ktlc' ),
        'parent_item_colon'   => __( 'Parent Sponsor', 'ktlc' ),
        'all_items'           => __( 'All Sponsors', 'ktlc' ),
        'view_item'           => __( 'View Sponsor', 'ktlc' ),
        'add_new_item'        => __( 'Add New Sponsor', 'ktlc' ),
        'add_new'             => __( 'Add New', 'ktlc' ),
        'edit_item'           => __( 'Edit Sponsor', 'ktlc' ),
        'update_item'         => __( 'Update Sponsor', 'ktlc' ),
        'search_items'        => __( 'Search Sponsor', 'ktlc' ),
        'not_found'           => __( 'Not Found', 'ktlc' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'ktlc' ),
    );
      
	// Set other options for Custom Post Type
    $args = array(
        'label'               => __( 'sponsor', 'ktlc' ),
        'description'         => __( 'Conferences sponsors', 'ktlc' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // 'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'https://img.icons8.com/fluency/20/000000/manager.png',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
  
    );
    register_post_type( 'sponsor', $args );
  
}
  
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
add_action( 'init', 'ktlc_custom_post_type_sponsor', 0 );

/*
* Add the custom columns to the sponsors post type:
*/
add_filter( 'manage_sponsor_posts_columns', 'set_custom_edit_sponsors_columns' );
function set_custom_edit_sponsors_columns( $columns ) {
	$sponsor_thumb_column['sponsor_thumb'] = __( 'Logo', 'ktlc' );
	$columns = array_slice( $columns, 0, 1 ) + $sponsor_thumb_column + $columns;

	return $columns;
}

/*
* Add the data to the custom columns for the sponsors post type:
*/
add_action( 'manage_sponsor_posts_custom_column' , 'custom_sponsors_column', 10, 2 );
function custom_sponsors_column( $column_name ) {
	switch ( $column_name ) {
		case 'sponsor_thumb':
			?>
			<a href="<?php echo get_edit_post_link(); ?>">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'medium' );
				} else {
					echo '<img src="" alt="Sponsor image" class="sponsor_image">';
				}
				?>
			</a>
			<?php
			break;
	}
}

/*
* Creating a function to create custom post type "Partner"
*/
function ktlc_custom_post_type_partner() {
  
	// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Partners', 'Post Type General Name', 'ktlc' ),
        'singular_name'       => _x( 'Partner', 'Post Type Singular Name', 'ktlc' ),
        'menu_name'           => __( 'Partners', 'ktlc' ),
        'parent_item_colon'   => __( 'Parent Partner', 'ktlc' ),
        'all_items'           => __( 'All Partners', 'ktlc' ),
        'view_item'           => __( 'View Partner', 'ktlc' ),
        'add_new_item'        => __( 'Add New Partner', 'ktlc' ),
        'add_new'             => __( 'Add New', 'ktlc' ),
        'edit_item'           => __( 'Edit Partner', 'ktlc' ),
        'update_item'         => __( 'Update Partner', 'ktlc' ),
        'search_items'        => __( 'Search Partner', 'ktlc' ),
        'not_found'           => __( 'Not Found', 'ktlc' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'ktlc' ),
    );
      
	// Set other options for Custom Post Type
    $args = array(
        'label'               => __( 'partner', 'ktlc' ),
        'description'         => __( 'Conferences partners', 'ktlc' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // 'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'https://img.icons8.com/fluency/20/000000/conference-call.png',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
  
    );
    register_post_type( 'partner', $args );
  
}
  
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
add_action( 'init', 'ktlc_custom_post_type_partner', 0 );

/*
* Add the custom columns to the partners post type:
*/
add_filter( 'manage_partner_posts_columns', 'set_custom_edit_partners_columns' );
function set_custom_edit_partners_columns( $columns ) {
	$partner_thumb_column['partner_thumb'] = __( 'Logo', 'ktlc' );
	$columns = array_slice( $columns, 0, 1 ) + $partner_thumb_column + $columns;

	return $columns;
}

/*
* Add the data to the custom columns for the partners post type:
*/
add_action( 'manage_partner_posts_custom_column' , 'custom_partners_column', 10, 2 );
function custom_partners_column( $column_name ) {
	switch ( $column_name ) {
		case 'partner_thumb':
			?>
			<a href="<?php echo get_edit_post_link(); ?>">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'medium' );
				} else {
					echo '<img src="" alt="Partner image" class="partner_image">';
				}
				?>
			</a>
			<?php
			break;
	}
}

/*
* Creating a function to create custom post type "Speaker"
*/
function ktlc_custom_post_type_speaker() {
  
	// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Speakers', 'Post Type General Name', 'ktlc' ),
        'singular_name'       => _x( 'Speaker', 'Post Type Singular Name', 'ktlc' ),
        'menu_name'           => __( 'Speakers', 'ktlc' ),
        'parent_item_colon'   => __( 'Parent Speaker', 'ktlc' ),
        'all_items'           => __( 'All Speakers', 'ktlc' ),
        'view_item'           => __( 'View Speaker', 'ktlc' ),
        'add_new_item'        => __( 'Add New Speaker', 'ktlc' ),
        'add_new'             => __( 'Add New', 'ktlc' ),
        'edit_item'           => __( 'Edit Speaker', 'ktlc' ),
        'update_item'         => __( 'Update Speaker', 'ktlc' ),
        'search_items'        => __( 'Search Speaker', 'ktlc' ),
        'not_found'           => __( 'Not Found', 'ktlc' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'ktlc' ),
    );
      
	// Set other options for Custom Post Type
    $args = array(
        'label'               => __( 'speaker', 'ktlc' ),
        'description'         => __( 'Conferences speakers', 'ktlc' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // 'taxonomies'          => array( 'genres' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'https://img.icons8.com/fluency/20/000000/consultation.png',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
  
    );
    register_post_type( 'speaker', $args );
  
}
  
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
add_action( 'init', 'ktlc_custom_post_type_speaker', 0 );

/*
* Add the custom columns to the speakers post type:
*/
add_filter( 'manage_speaker_posts_columns', 'set_custom_edit_speakers_columns' );
function set_custom_edit_speakers_columns( $columns ) {
	$speaker_thumb_column['speaker_thumb'] = __( 'Logo', 'ktlc' );
	$columns = array_slice( $columns, 0, 1 ) + $speaker_thumb_column + $columns;

	return $columns;
}

/*
* Add the data to the custom columns for the speakers post type:
*/
add_action( 'manage_speaker_posts_custom_column' , 'custom_speakers_column', 10, 2 );
function custom_speakers_column( $column_name ) {
	switch ( $column_name ) {
		case 'speaker_thumb':
			?>
			<a href="<?php echo get_edit_post_link(); ?>">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'medium' );
				} else {
					echo '<img src="" alt="Speaker image" class="speaker_image">';
				}
				?>
			</a>
			<?php
			break;
	}
}

/*
* Add styles for registered columns
*/
add_action( 'admin_print_footer_scripts-edit.php', function () {
    $themeColor = get_theme_mod('ktlc_theme_color');
	?>
	<style>
		.column-sponsor_thumb a, .column-partner_thumb a, .column-speaker_thumb a {
			display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid transparent;
            border-radius: 10px;
            overflow: hidden;
    		transition: all 0.3s;
		}

        .type-sponsor:hover .column-sponsor_thumb a, .type-partner:hover .column-partner_thumb a, .type-speaker:hover .column-speaker_thumb a {
            border-color: <?php echo $themeColor; ?>;
            box-shadow: 0 10px 40px 0 rgb(23 23 23 / 20%);
        }

		.column-sponsor_thumb, .column-partner_thumb, .column-speaker_thumb {
			width: 180px;
		}

		.column-sponsor_thumb img, .column-partner_thumb img, .column-speaker_thumb img {
			width: 100%;
			height: 140px;
			max-width: unset;
			max-height: unset;
			object-fit: contain;
    		transition: all 0.3s;
		}

        .column-speaker_thumb img {
			object-fit: cover;
        }
	</style>
	<?php
} );