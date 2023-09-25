<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ktlc
 */

/**
 * Add SVG to allowed file uploads
 */
function ktlc_add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg';
	$new_filetypes['svgz'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );

	return $file_types;
} 
add_action('upload_mimes', 'ktlc_add_file_types_to_uploads');

/**
 * Post Excerpt
 */
add_filter( 'excerpt_length', function() {
	return 40;
} );

add_filter( 'excerpt_more', function( $more ) {
	global $post;
    return '<a class="excerptMoreLink" href="'. get_permalink($post->ID) . '">Read More...</a>';
} );

/**
 * Determines if post thumbnail can be displayed.
 *
 * @since KTLC 1.0
 *
 * @return bool
 */
function ktlc_can_show_post_thumbnail() {
	/**
	 * Filters whether post thumbnail can be displayed.
	 *
	 * @since KTLC 1.0
	 *
	 * @param bool $show_post_thumbnail Whether to show post thumbnail.
	 */
	return apply_filters(
		'ktlc_can_show_post_thumbnail',
		! post_password_required() && ! is_attachment() && has_post_thumbnail()
	);
}

function ktlc_render_post_meta() {
	$post_meta_content  = '';
	$post_meta_content .= '<div class="postMeta__author">';
	$post_meta_content .= apply_filters(
		'hestia_blog_post_meta',
		sprintf(
			/* translators: %1$s is Author name wrapped, %2$s is Time */
			esc_html__( 'By %1$s, %2$s', 'ktlc' ),
			sprintf(
				/* translators: %1$s is Author name, %2$s is author link */
				'<a href="%2$s" title="%1$s" class="postMeta__authorLink">%1$s</a>',
				esc_html( get_the_author() ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
			),
			sprintf(
				/* translators: %1$s is Time since post, %2$s is author Close tag */
				esc_html__( '%1$s ago %2$s', 'ktlc' ),
				sprintf(
					/* translators: %1$s is Time since, %2$s is Link to post */
					'<a href="%2$s" class="postMeta__dateLink">%1$s',
					ktlc_get_time_tags(),
					esc_url( get_permalink() )
				),
				'</a>'
			)
		)
	);
	$post_meta_content .= '</div>';

	return $post_meta_content;
}

function ktlc_get_time_tags() {
	$created   = get_the_time( 'U' );
	$format    = get_option( 'date_format' );
	$array     = current_datetime();
	$localtime = $array->getTimestamp() + $array->getOffset();

	$time  = '<time class="postMeta__date" datetime="' . esc_attr( date_i18n( 'c', $created ) ) . '" content="' . esc_attr( date_i18n( 'Y-m-d', $created ) ) . '">';
	$time .= esc_html( human_time_diff( get_the_time( 'U' ), $localtime ) );
	$time .= '</time>';
	if ( get_the_time( 'U' ) === get_the_modified_time( 'U' ) ) {
		return $time;
	}
	$time .= '<time class="postMeta__updatedDate ktlc-hidden" datetime="' . esc_attr( get_the_modified_date( 'c' ) ) . '">';
	$time .= esc_html( date_i18n( $format, $created ) );
	$time .= '</time>';

	return $time;
}

/**
 * Social sharing icons for single view.
 *
 * @since KTLC 1.0
 */
function ktlc_social_icons() {
	$post_link  = esc_url( get_the_permalink() );
	$post_title = get_the_title();

	$facebook_url = add_query_arg(
		array(
			'u' => $post_link,
		),
		'https://www.facebook.com/sharer.php'
	);

	$twitter_url = add_query_arg(
		array(
			'url'  => $post_link,
			'text' => rawurlencode( html_entity_decode( wp_strip_all_tags( $post_title ), ENT_COMPAT, 'UTF-8' ) ),
		),
		'http://twitter.com/share'
	);

	$email_title = str_replace( '&', '%26', $post_title );

	$email_url = add_query_arg(
		array(
			'subject' => wp_strip_all_tags( $email_title ),
			'body'    => $post_link,
		),
		'mailto:'
	);

	$social_links = '
	<div class="sharePost">
		<a target="_blank" rel="tooltip"
			data-original-title="' . esc_attr__( 'Share on Facebook', 'ktlc' ) . '"
			class="sharePost__button sharePost__button_facebook"
			href="' . esc_url( $facebook_url ) . '">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="20" height="17"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
		</a>
		
		<a target="_blank" rel="tooltip"
			data-original-title="' . esc_attr__( 'Share on Twitter', 'ktlc' ) . '"
			class="sharePost__button sharePost__button_twitter"
			href="' . esc_url( $twitter_url ) . '">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="17"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
		</a>
		
		<a rel="tooltip"
			data-original-title=" ' . esc_attr__( 'Share on Email', 'ktlc' ) . '"
			class="sharePost__button"
			href="' . esc_url( $email_url ) . '">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="17"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>
		</a>
	</div>';
	echo apply_filters( 'hestia_filter_blog_social_icons', $social_links );
}
add_action( 'ktlc_blog_social_icons', 'ktlc_social_icons' );

if ( ! function_exists( 'ktlc_comments_list' ) ) {
	/**
	 * Custom list of comments for the theme.
	 *
	 * @param string  $comment comment.
	 * @param array   $args arguments.
	 * @param integer $depth depth.
	 *
	 * @since Hestia 1.0
	 */
	function ktlc_comments_list( $comment, $args, $depth ) {
		$themeColor = get_theme_mod('ktlc_theme_color');
		?>
		<div <?php comment_class( empty( $args['has_children'] ) ? '' : 'coment_hasChild' ); ?>
				id="comment-<?php comment_ID(); ?>">
			<div class="comment__body">
				<h6 class="comment__heading">
					<div class="comment__author">
						<svg class="comment__authorIcon" width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M1 19C1 16.2386 4.58172 14 9 14C13.4183 14 17 16.2386 17 19" stroke="<?php echo $themeColor; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M9 11C11.7614 11 14 8.76142 14 6C14 3.23858 11.7614 1 9 1C6.23858 1 4 3.23858 4 6C4 8.76142 6.23858 11 9 11Z" stroke="<?php echo $themeColor; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>

						<?php echo get_comment_author_link(); ?>
					</div>
					<small class="comment__date">
						<svg class="comment__dateIcon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 19C14.9706 19 19 14.9706 19 10C19 5.02944 14.9706 1 10 1C5.02944 1 1 5.02944 1 10C1 14.9706 5.02944 19 10 19Z" stroke="<?php echo $themeColor; ?>" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/><path d="M10 5V10H15" stroke="<?php echo $themeColor; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>

						<?php
						printf(
							/* translators: %1$s is Date, %2$s is Time */
							esc_html__( '%1$s at %2$s', 'ktlc' ),
							get_comment_date(),
							get_comment_time()
						);
						edit_comment_link( esc_html__( '(Edit)', 'ktlc' ), '  ', '' );
						?>
					</small>
				</h6>
				<div class="comment__text">
					<?php comment_text(); ?>
				</div>
				<div class="comment__footer">
					<?php
					echo get_comment_reply_link(
						array(
							'depth'      => $depth,
							'max_depth'  => $args['max_depth'],
							'reply_text' => sprintf(
								'<svg class="comment__replyIcon" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 9L1 5L5 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 14C8.44772 14 8 14.4477 8 15C8 15.5523 8.44772 16 9 16V14ZM1 4C0.447715 4 0 4.44772 0 5C0 5.55228 0.447715 6 1 6V4ZM9 16H14V14H9V16ZM14 4H1V6H14V4ZM20 10C20 6.68629 17.3137 4 14 4V6C16.2091 6 18 7.79086 18 10H20ZM14 16C17.3137 16 20 13.3137 20 10H18C18 12.2091 16.2091 14 14 14V16Z" fill="white"/></svg>%s',
								esc_html__( 'Reply', 'ktlc' )
							),
						),
						$comment->comment_ID,
						$comment->comment_post_ID
					);
					?>
				</div>
			</div>
		</div>
		<?php
	}
}

/**
 * Move comment field above user details.
 *
 * @param array $fields comment form fields.
 *
 * @return array
 * @since KTLC 1.0
 */
function ktlc_comment_message( $fields ) {

	if ( array_key_exists( 'comment', $fields ) ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
	}

	if ( array_key_exists( 'cookies', $fields ) ) {
		$cookie_field = $fields['cookies'];
		unset( $fields['cookies'] );
		$fields['cookies'] = $cookie_field;
	}

	return $fields;
}
add_filter( 'comment_form_fields', 'ktlc_comment_message' );

/*
* Add the custom columns to the post post type:
*/
add_filter( 'manage_post_posts_columns', 'set_custom_edit_post_columns' );
function set_custom_edit_post_columns( $columns ) {
	$post_thumb_column['post_thumb'] = __( 'Thumbnail', 'ktlc' );
	$columns = array_slice( $columns, 0, 1 ) + $post_thumb_column + $columns;

	return $columns;
}

/*
* Add the data to the custom columns for the post post type:
*/
add_action( 'manage_post_posts_custom_column' , 'ktlc_custom_post_column', 10, 2 );
function ktlc_custom_post_column( $column_name ) {
	switch ( $column_name ) {
		case 'post_thumb':
			?>
			<a href="<?php echo get_edit_post_link(); ?>">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'thumbnail' );
				} else {
					echo '<img src="" alt="Post image" class="post_image">';
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
		.type-post .column-post_thumb a {
			display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid transparent;
            border-radius: 10px;
            overflow: hidden;
    		transition: all 0.3s;
        }

		.type-post:hover .column-post_thumb a {
			border-color: <?php echo $themeColor; ?>;
            box-shadow: 0 10px 40px 0 rgb(23 23 23 / 20%);
		}

		.column-post_thumb {
			width: 200px;
		}

		.column-post_thumb img {
			width: 100%;
			height: 140px;
			max-width: unset;
			max-height: unset;
			object-fit: cover;
			border-radius: 10px;
    		transition: all 0.3s;
		}
	</style>
	<?php
} );