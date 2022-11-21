<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * Theme Includes
 */
require_once get_template_directory() . '/inc/init.php';

/**
 * Theme defaults
 */

add_theme_support( 'title-tag' );

/**
 * TGM Plugin Activation
 */
{
	require_once get_template_directory() . '/TGM-Plugin-Activation/class-tgm-plugin-activation.php';

/** @internal */
function taxipark_action_theme_register_required_plugins() {
	tgmpa( array(

		array(
		'name'      => esc_html__('Like-Themes Plugins', 'taxipark'),
		'slug'      => 'like-themes-plugins',
		'source'   	=> get_template_directory() . '/inc/plugins/like-themes-plugins.zip',
		'required'  => true,
		'version'  => '1.2.4',
		),
		array(
		'name'      => esc_html__('WPBakery Visual Composer', 'taxipark'),
		'slug'      => 'js_composer',
		'source'   	=> 'http://updates.like-themes.com/plugins/js_composer/js_composer.zip',
		'required'  => true,
		),		
		array(
		'name'      => esc_html__('Envato Market', 'taxipark'),
		'slug'      => 'envato-market',
		'source'   	=> get_template_directory() . '/inc/plugins/envato-market.zip',
		'required'  => false,
		),						
		array(
		'name'      => esc_html__('Breadcrumb-navxt', 'taxipark'),
		'slug'      => 'breadcrumb-navxt',
		'required'  => false,
		),
		array(
		'name'      => esc_html__('Contact Form 7', 'taxipark'),
		'slug'      => 'contact-form-7',
		'required'  => true,
		),
		array(
		'name'      => esc_html__('Post-views-counter', 'taxipark'),
		'slug'      => 'post-views-counter',
		'required'  => false,
		),
		array(
		'name'      => esc_html__('Unyson', 'taxipark'),
		'slug'      => 'unyson',
		'source'   	=> 'http://updates.like-themes.com/plugins/unyson/unyson-fork.zip',
		'required'  => true,
		),
		array(
		'name'             => esc_html__('WooCommerce', 'taxipark'),
		'slug'             => 'woocommerce',
		'required'         => false,
		),
	) );

}
	add_action( 'tgmpa_register', 'taxipark_action_theme_register_required_plugins' );
}

/**
 * Includes template part, allowing to pass variables
 */
function taxipark_get_template_part( $slug, $name = null, array $taxipark_params = array() ) {

	$slug = $slug;
	if ( ! is_null( $name ) ) {

		$slug .= '-' . $name;
	}

	include( get_template_directory() . '/' . $slug . '.php' );
}

/**
 * Single comment function
 */
if ( ! function_exists( 'taxipark_single_comment' ) ) {
	function taxipark_single_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) {
			case 'pingback' :
				?>
				<li class="trackback"><?php esc_html_e( 'Trackback:', 'taxipark' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'taxipark' ), '<span class="edit-link">', '<span>' ); ?>
				<?php
				break;
			case 'trackback' :
				?>
				<li class="pingback"><?php esc_html_e( 'Pingback:', 'taxipark' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'taxipark' ), '<span class="edit-link">', '<span>' ); ?>
				<?php
				break;
			default :
				$author_id = $comment->user_id;
				$author_link = get_author_posts_url( $author_id );
				?>
				<li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'comment_item' ); ?>>
					<div class="comment-single">
						<div class="comment-author-avatar"><?php echo get_avatar( $comment, 45 ); ?></div>
						<div class="comment-content">
							<div class="comment-info">
	                            <?php echo esc_html__( 'by', 'taxipark' );?> <span class="comment-author"><?php echo ( ! empty( $author_id ) ? '<a href="' . esc_url( $author_link ) . '">' : '') . comment_author() . ( ! empty( $author_id ) ? '</a>' : ''); ?></span><span class="hidden-ms hidden-xs"> | </span>
	                            <span class="comment-date-time"><span class="comment-date"><span class="comment_date_label hidden-ms hidden-xs"><?php esc_html_e( 'Posted', 'taxipark' ); ?></span> <span class="comment_date_value"><?php echo get_comment_date( get_option( 'date_format' ) ); ?></span></span><span class="hidden-ms hidden-xs"> | </span>
	                            <span class="comment-time"><?php echo get_comment_date( get_option( 'time_format' ) ); ?></span></span>
							</div>
							<div class="comment_text_wrap">
								<?php if ( $comment->comment_approved == 0 ) { ?>
								<div class="comment_not_approved"><?php esc_html_e( 'Your comment is awaiting moderation.', 'taxipark' ); ?></div>
								<?php } ?>
								<div class="comment-text"><?php comment_text(); ?></div>
							</div>
							<?php if ( $depth < $args['max_depth'] ) { ?>
								<div class="comment-reply"><?php comment_reply_link( array_merge( $args, array(
									'depth' => $depth,
									'max_depth' => $args['max_depth'],
								) ) ); ?></div>
							<?php } ?>
						</div>
					</div>
				<?php
				break;
		}// End switch().
	}
}// End if().

/**
 * Print H1 header
*/
if ( ! function_exists( 'taxipark_get_h1' ) ) {

	function taxipark_get_h1() {

		global $wp_post;
		
		if ( is_home() ) {

			$title = esc_html__( 'All Blog Posts', 'taxipark' );
		} 
			else
		if ( is_front_page() ) {

			$title = esc_html__( 'Home', 'taxipark' );
		}
			else
		if ( is_year() ) {

			$title = sprintf( esc_html__( 'Year Archives: %s', 'taxipark' ), get_the_date( 'Y' ) );
		}
			else				
		if ( is_month() ) {

			$title = sprintf( esc_html__( 'Month Archives: %s', 'taxipark' ), get_the_date( 'F Y' ) );
		}
			else
		if ( is_day() ) {

			$title = sprintf( esc_html__( 'Day Archives: %s', 'taxipark' ), get_the_date() );
		}
			else
		if ( is_category() ) {

			$title = single_cat_title( '', false );
		}
			else
		if ( is_tag() ) {

			$title = sprintf( esc_html__( 'Tag: %s', 'taxipark' ), single_tag_title( '', false ) );
		}
			else
		if ( is_tax() ) {

			$title = single_term_title( '', false );
		}
			else
		if ( is_search() ) {

			$title = sprintf( esc_html__( 'Search Results: %s', 'taxipark' ), get_search_query() );
		} 
			else				
		if ( is_author() ) {

			if ( !empty( get_query_var( 'author_name' ) ) ) {

				$q = get_user_by( 'slug', get_query_var( 'author_name' ) );
			}
				else {

				$q = get_userdata( get_query_var( 'author' ) );
			}

			$title = sprintf( esc_html__( 'Author: %s', 'taxipark' ), $q->display_name );
		} 
			else
		if ( is_post_type_archive() ) {

			$q   = get_queried_object();
			$title = '';
			if ( !empty( $q->labels->all_items ) ) {

				$title = $q->labels->all_items;
			}
		}
			else
		if ( is_attachment() ) {

			$title = sprintf( esc_html__( 'Attachment: %s', 'taxipark' ), get_the_title() );
		}
			else
		if ( is_404() ) {

			$title = esc_html__( '404 Not Found', 'taxipark' );
		}
			else {

			$title = get_the_title();
		}

		echo wp_kses_post($title);
	}
}

/**
 * Fix for widgets without header
 */
add_filter( 'dynamic_sidebar_params', 'taxipark_check_sidebar_params' );
function taxipark_check_sidebar_params( $params ) {
	global $wp_registered_widgets;

	// Exclude for widget with default title
	if ( in_array( $params[0]['widget_name'], array( 'Categories', 'Archives', 'Meta', 'Pages', 'Recent Comments', 'Recent Posts' ) ) ) { return $params;
	}

	$settings_getter = $wp_registered_widgets[ $params[0]['widget_id'] ]['callback'][0];
	$settings = $settings_getter->get_settings();
	$settings = $settings[ $params[1]['number'] ];

	if ( $params[0]['after_widget'] === '</div></aside>' && isset( $settings['title'] ) && empty( $settings['title'] ) ) {
		$params[0]['before_widget'] .= '<div class="content">';
	}

	return $params;
}

/**
 * Adds custom post type active item in menu
 */
add_action( 'nav_menu_css_class', 'taxipark_add_current_nav_class', 10, 2 );
function taxipark_add_current_nav_class( $classes, $item ) {

	// Getting the current post details
	global $post, $wp;

	$id = ( isset( $post->ID ) ? get_the_ID() : null );

	if ( isset( $id ) ) {

		// Getting the post type of the current post
		$current_post_type = get_post_type_object( get_post_type( $post->ID ) );
		if (!empty($current_post_type->rewrite['slug'])) {

			$current_post_type_slug = $current_post_type->rewrite['slug'];
		}
			else {

			$current_post_type_slug = '';
		}

		$current_url = esc_url( str_replace( '/', '', parse_url( home_url( add_query_arg( array(),$wp->request ) ), PHP_URL_PATH ) ) );
		$menu_slug = strtolower( trim( $item->url ) );

		if ( !empty($current_post_type_slug) && strpos( $menu_slug,$current_post_type_slug ) !== false && $current_url != '#' && $current_url != '' && $current_url === str_replace( '/', '', parse_url( $item->url, PHP_URL_PATH ) ) ) {

			$classes[] = 'current-menu-item';

		} else {

			$classes = array_diff( $classes, array( 'current_page_parent' ) );
		}
	}

	if ( get_post_type() != 'post' && $item->object_id == get_site_option( 'page_for_posts' ) ) {

		$classes = array_diff( $classes, array( 'current_page_parent' ) );
	}

	return $classes;
}


/**
 * Manual excerpt generation
 */
function taxipark_excerpt( $content ) {
	global $post;

	if ( ! empty( $post->post_content ) &&
		 ! preg_match( '#<!--more-->#', $post->post_content ) &&
		 ! preg_match( '#<!--nextpage-->#', $post->post_content ) &&
		 ! preg_match( '#twitter.com#', $post->post_content ) &&
		 ! preg_match( '#wp-caption#', $post->post_content ) &&
//		 ! preg_match( '#embed#i', $post->post_content ) &&
		 ! preg_match( '#iframe#i', $post->post_content )
		) {
		$content = taxipark_cut_excerpt( $post->post_content );
	}

	return $content;
}

function taxipark_cut_excerpt( $content = '' ) {

	$cut = false;
	$excerpt_more = apply_filters( 'excerpt_more', ' [...]' );
	$content = taxipark_get_content( $content );
	$texts = preg_grep( '#(<[^>]+>)|(<\/[^>]+>)#s', $content, PREG_GREP_INVERT );
	$total_length = count( preg_split( '//u', implode( '', $texts ), - 1, PREG_SPLIT_NO_EMPTY ) );
	if ( function_exists( 'fw' ) ) {
		$excerpt_set = (int) fw_get_db_settings_option( 'excerpt_auto' );
	} else {
		$excerpt_set = 0;
	}

	if ( $excerpt_set == 0 ) {

		$excerpt_set = 250;
	}
	$excerpt_length = (int) apply_filters( 'excerpt_length', $excerpt_set );

	foreach ( $texts as $key => $text ) {

		$text = preg_split( '//u', $text, - 1, PREG_SPLIT_NO_EMPTY );
		$text = array_slice( $text, 0, $excerpt_length );
		$excerpt_length = $excerpt_length - count( $text );
		$cut = $key;

		if ( 0 >= $excerpt_length ) {
			$content[ $key ] = $texts[ $key ] = implode( '', $text );
			break;
		}
	}

	if ( false !== $cut ) {
		array_splice( $content, $cut + 1 );
	}

	$content = taxipark_strip_tags( $texts, $cut );

	$content = implode( ' ', $content );
	$content = preg_replace( '/<\/p>/', '', $content );

	if ( $total_length > $excerpt_length ) {
		$content .= $excerpt_more;
	}

	return wp_kses_post( $content );
}

/**
 * Cuts text by the number of characters
 */
if ( !function_exists( 'taxipark_cut_text' ) ) {

	function taxipark_cut_text( $text, $cut = 300, $aft = ' ...' ) {
		if ( empty( $text ) ) {
			return null;
		}

		if ( function_exists( 'fw' ) ) {
			$cut = (int) fw_get_db_settings_option( 'excerpt_wc_auto' );
		}

		$text = wp_strip_all_tags( $text, true );
		$text = strip_tags( $text );
		$text = preg_replace( "/<p>|<\/p>|<br>|(( *&nbsp; *)|(\s{2,}))|\\r|\\n/", ' ', $text );
		if ( function_exists('mb_strripos') AND mb_strlen( $text ) > $cut ) {
			$text = mb_substr( $text, 0, $cut, 'UTF-8' );
			return mb_substr( $text, 0, mb_strripos( $text, ' ', 0, 'UTF-8' ), 'UTF-8' ) . $aft;
		} else {
			return $text;
		}
	}
}

function taxipark_get_content( $content = '' ) {

	$result = array();
	$content = capital_P_dangit( $content );

	$content = wptexturize( $content );
	$content = convert_smilies( $content );
	$content = wpautop( $content );
	$content = prepend_attachment( $content );
	$content = strip_shortcodes( $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	$content = str_replace( array( "\r\n", "\r" ), "\n", $content );
	$content = preg_split( '#(<[^>]+>)|(<\/[^>]+>)#s', trim( $content ), - 1, PREG_SPLIT_DELIM_CAPTURE );
	$content = array_diff( $content, array( "\n", '' ) );
	$content = array_values( $content );

	foreach ( $content as $key => $value ) {
		$result[] = str_replace( array( "\r\n", "\r", "\n" ), '', $value );
	}

	return $result;
}

function taxipark_strip_tags( $texts = array(), $cut = 0 ) {
	if ( ! is_array( $texts ) ) {
		return $texts;
	}

	$clean = array( '<p>' );

	foreach ( $texts as $key => $value ) {
		if ( $key <= $cut ) {
			$clean[] = $value;
		}
	}

	return $clean;
}

if ( !function_exists( 'taxipark_is_wc' ) ) {
	/**
	 * Return true|false is woocommerce conditions.
	 *
	 * @param string $tag
	 * @param string|array $attr
	 *
	 * @return bool
	 */
	function taxipark_is_wc($tag, $attr='') {

		if( !class_exists( 'woocommerce' ) ) return false;
		switch ($tag) {
			case 'wc_active':
		        return true;
		    case 'woocommerce':
		        if( function_exists( 'is_woocommerce' ) && is_woocommerce() ) return true;
				break;
		    case 'shop':
		        if( function_exists( 'is_shop' ) && is_shop() ) return true;
				break;
			case 'product_category':
		        if( function_exists( 'is_product_category' ) && is_product_category($attr) ) return true;
				break;
		    case 'product_tag':
		        if( function_exists( 'is_product_tag' ) && is_product_tag($attr) ) return true;
				break;
		    case 'product':
		    	if( function_exists( 'is_product' ) && is_product() ) return true;
				break;
		    case 'cart':
		        if( function_exists( 'is_cart' ) && is_cart() ) return true;
				break;
		    case 'checkout':
		        if( function_exists( 'is_checkout' ) && is_checkout() ) return true;
				break;
		    case 'account_page':
		        if( function_exists( 'is_account_page' ) && is_account_page() ) return true;
				break;
		    case 'wc_endpoint_url':
		        if( function_exists( 'is_wc_endpoint_url' ) && is_wc_endpoint_url($attr) ) return true;
				break;
		    case 'ajax':
		        if( function_exists( 'is_ajax' ) && is_ajax() ) return true;
				break;
		}

		return false;
	}

}


/**
 * Checking active status of plugin
 */
function taxipark_plugin_is_active( $plugin_var, $plugin_dir = null ) {

	if ( empty( $plugin_dir ) ) { $plugin_dir = $plugin_var;
	}
	return in_array( $plugin_dir . '/' . $plugin_var . '.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
}

/**
 * Adding custom stylesheet to admin
 */
add_action( 'admin_enqueue_scripts', 'taxipark_admin_css' );
function taxipark_admin_css() {

	wp_enqueue_style( 'taxipark-admin', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );
}



function taxipark_css_style() {

	wp_enqueue_style(
		'bootstrap',
		get_template_directory_uri() . '/assets/css/bootstrap-grid.css',
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'taxipark-plugins',
		get_template_directory_uri() . '/assets/css/plugins.css',
		array(),
		wp_get_theme()->get('Version')
	);

	wp_enqueue_style(
		'taxipark-theme-style',
		get_stylesheet_uri(),
		array( 'bootstrap', 'taxipark-plugins' ),
		wp_get_theme()->get('Version')
	);

	if ( function_exists( 'fw_get_db_settings_option' ) ){

		$header_bg = fw_get_db_settings_option( 'header_bg' );
		if (! empty( $header_bg ) ) {

			wp_add_inline_style( 'taxipark-theme-style', '.page-header { background-image: url(' . esc_attr( $header_bg['url'] ) . ') !important; } ' );
		}

		$go_top_img = fw_get_db_settings_option( 'go_top_img' );
		if (! empty( $go_top_img ) ) {

			wp_add_inline_style( 'taxipark-theme-style', '.go-top:before { background-image: url(' . esc_attr( $go_top_img['url'] ) . ') !important; } ' );
		}

		$menu_bg = fw_get_db_settings_option( 'menu-bg' );
		$menu_bg_visible = fw_get_db_settings_option( 'menu-bg-visible' );
		if (! empty( $menu_bg ) AND !empty( $menu_bg_visible ) ) {

			wp_add_inline_style( 'taxipark-theme-style', 'nav.navbar #navbar ul.navbar-nav > li > a span:after { background-image: url(' . esc_attr( $menu_bg['url'] ) . ') !important; } ' );
		}

		$cars = fw_get_db_settings_option( 'cars' );
		if ( !empty($cars) ) {

			foreach ($cars as $key => $item) {

				if ( !empty($item['icon']['url']) ) {

					wp_add_inline_style( 'taxipark-theme-style', '.car-select-'. esc_attr( $key ).' { background-image: url(' . esc_attr( $item['icon']['url'] ) . ') !important; } ' );				
				}
			}
		}

		$logo_height = fw_get_db_customizer_option('logo_height');
		if ( !empty($logo_height) ) {

			wp_add_inline_style( 'taxipark-theme-style', 'nav.navbar.navbar-inner .logo img { max-height: '.esc_attr($logo_height).'px; width: auto; } ' );			
			wp_add_inline_style( 'taxipark-theme-style', 'nav.navbar.navbar-inner .logo { padding: 0; top: 50%; margin-top: -'.esc_attr((int)($logo_height / 2)).'px } ' );						
		}

		$pace = fw_get_db_settings_option( 'page-loader' );
		
		if ( !empty($pace) AND !empty($pace['loader']) AND  $pace['loader'] == 'image' AND !empty($pace['image']) AND !empty($pace['image']['loader_img'])) {

			wp_add_inline_style( 'taxipark-theme-style', '.paceloader-image .pace-image { background-image: url(' . esc_attr( $pace['image']['loader_img']['url'] ) . ') !important; } ' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'taxipark_css_style' );

