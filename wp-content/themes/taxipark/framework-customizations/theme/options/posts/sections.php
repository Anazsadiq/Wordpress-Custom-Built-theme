<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	'theme_block' => array(
		'title'   => esc_html__( 'Theme Block', 'taxipark' ),
		'label'   => esc_html__( 'Theme Block', 'taxipark' ),
		'type'    => 'select',
		'choices' => array(
			'none'  => esc_html__( 'Not Assigned', 'taxipark' ),
			'top_bar'  => esc_html__( 'Top Bar', 'taxipark' ),
			'partners' => esc_html__( 'Partners Footer Block', 'taxipark' ),
		),
		'value' => 'none',
	)
);


