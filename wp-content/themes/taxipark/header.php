<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head>
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="format-detection" content="telephone=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	// Pageloder Overlay
	if ( function_exists( 'fw' ) ) {

		$taxipark_pace = fw_get_db_settings_option( 'page-loader' );
		if ( !empty($taxipark_pace['loader']) AND $taxipark_pace['loader'] != 'disabled' ) {

			echo '<div id="preloader"></div>';
		}
	}
?>
	<?php get_template_part( 'navbar' ); ?>
	<?php
	$pageheader_layout = 'default';
	if ( function_exists( 'fw_get_db_settings_option' ) ) {

		$pageheader_layout = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'header-layout' );
	}

	?>
	<?php if ( $pageheader_layout != 'disabled' ) : ?>
	<header class="page-header">
	    <div class="container">
			<ul class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php if ( function_exists( 'bcn_display' ) ) {
				bcn_display_list();
			}?>
			</ul>	    
	    	<h1><?php taxipark_get_h1(); ?></h1>
	    </div>
	</header>
	<?php endif; ?>

	<div class="container">