<?php




function mitsogo_theme_support(){
   // Adds dynamic title tag support
   add_theme_support('title-tag');
}
add_action('after_setup_theme','mitsogo_theme_support');




function mitsogo_menus(){

	$locations = array(
	    'primary' => "Desktop Primary ",
	    'footer' => "Footer Menu Items"
     );

	 register_nav_menus($locations);
}
add_action('init','mitsogo_menus');





function load_stylesheet(){

	$version = wp_get_theme()->get('Version');
	// wp_register_style('bootstrap',"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css",  array(),false,'all');
	// wp_enqueue_style('bootstrap');

	wp_register_style('style',get_template_directory_uri(). "./style.css", array(), true,'all');
	wp_enqueue_style('style');
   

	wp_register_style('testimonials',get_template_directory_uri(). "./assets/css/testimonials.css", array(), true,'all');
	wp_enqueue_style('testimonials');

	wp_register_style('swiper-bundle',get_template_directory_uri(). "./assets/css/swiper-bundle.min.css", array(), true,'all');
	wp_enqueue_style('swiper-bundle');

	wp_register_style('bootstrapmin',get_template_directory_uri(). "./assets/css/bootstrap.min.css", array(), true,'all');
	wp_enqueue_style('bootstrapmin');


	wp_register_style('fontawesome',"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" , array(), false,'all');
	wp_enqueue_style('fontawesome');
}
add_action('wp_enqueue_scripts', 'load_stylesheet');



function mitsogo_register_scripts() {

	//wp_enqueue_script('mitsogo-jquery','https://code.jquery.com/jquery-3.4.1.slim.min.js',array(), '3.4.1',false);
	//wp_enqueue_script('mitsogo-popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',array(), '1.16.0',false);
    // wp_enqueue_script('mitsogo-bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',array(), '4.4.1',false);
	
	
	wp_register_script('my_amazing_script', get_template_directory_uri() . './assets/js/main.js', array('jquery'),'1.1', true);
    wp_enqueue_script('my_amazing_script');



	wp_register_script('bootstrapmin', get_template_directory_uri() . './assets/js/bootstrapmin.js', array('jquery'),'1.1', true);
    wp_enqueue_script('bootstrapmin');



}
add_action('wp_enqueue_scripts', 'mitsogo_register_scripts');


?>

