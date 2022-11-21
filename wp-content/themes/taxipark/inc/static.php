<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Include static files: javascript and css
 */

if ( is_admin() ) {
	return;
}

if ( function_exists( 'fw' ) ) {

	fw()->backend->option_type( 'icon-v2' )->packs_loader->enqueue_frontend_css();
} else {

	wp_enqueue_style(
		'font-awesome',
		get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css',
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'fw-css',
		get_template_directory_uri() . '/assets/css/fw.css',
		array(),
		'1.0'
	);
}

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

/**
 * Loading plugins and custom taxipark js scripts
 */
wp_enqueue_script(
	'modernizr',
	get_template_directory_uri() . '/assets/js/modernizr-2.6.2.min.js',
	array( 'jquery' ),
	'1.0',
	false
);

wp_enqueue_script(
	'html5shiv',
	get_template_directory_uri() . '/assets/js/html5shiv.js',
	array(),
	'',
	false
);
wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

wp_enqueue_script(
	'taxipark-map-style',
	get_template_directory_uri() . '/assets/js/map-style.js',
	array( 'jquery' ),
	'1.0',
	true
);

wp_enqueue_script(
	'taxipark-plugins',
	get_template_directory_uri() . '/assets/js/plugins.js',
	array( 'jquery' ),
	'1.0',
	true
);

wp_enqueue_script(
	'taxipark-scripts',
	get_template_directory_uri() . '/assets/js/scripts.js',
	array( 'taxipark-plugins' ),
	wp_get_theme()->get('Version'),
	true
);


wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', array( 'jquery' ), '1.1.0', true );
wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.1.0' );


wp_localize_script( 'taxipark-scripts', 'taxipark_scripts', array( 'base_href' => get_template_directory_uri() ) );

if ( function_exists( 'fw' ) ) {

	$taxipark_pace = fw_get_db_settings_option( 'page-loader' );
	if ( !empty($taxipark_pace['loader']) AND $taxipark_pace['loader'] != 'disabled' ) {

		wp_enqueue_script('pace', get_template_directory_uri() . '/assets/js/pace.js', array( 'jquery' ), '', true );
	}
}


/**
 * Customization
 */
if ( function_exists( 'fw' ) ) {

	require_once get_template_directory() . '/inc/theme-style.php';

	wp_add_inline_style( 'taxipark-theme-style', taxipark_generate_css() );
}


$query_args = array(
		'family' => 'Fira+Sans+Condensed:700,800%7COpen+Sans:400,600,700',
		'subset' => 'latin,latin-ext',
);

wp_enqueue_style(
	'taxipark-google-fonts', esc_url( add_query_arg( $query_args, '//fonts.googleapis.com/css' ) ), array(), null
);


/**
 * Loading FontAwesome 5 fonts
 */
wp_enqueue_style( 'vc_font_awesome_5' );


