<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	'general' => array(
		'title'   => esc_html__( 'Layout', 'taxipark' ),
		'type'    => 'box',
		'options' => array(
			'general-box' => array(
				'type'    => 'box',
				'options' => array(
					'navbar-layout'    => array(
						'label' => esc_html__( 'Navbar', 'taxipark' ),
						'type'    => 'select',
						'choices' => array(
							'default'  => esc_html__( 'Default', 'taxipark' ),
							'yellow'  => esc_html__( 'Bottom Line', 'taxipark' ),
							'transparent' => esc_html__( 'Dark Transparent', 'taxipark' ),
							'home' => esc_html__( 'Homepage static', 'taxipark' ),
							'disabled' => esc_html__( 'Hidden', 'taxipark' ),
						),
						'value' => 'default',
					),			
					'topbar-layout'    => array(
						'label' => esc_html__( 'Top Bar', 'taxipark' ),
						'type'    => 'select',
						'description'   => esc_html__( 'Info bar at top of the site. Can be edited from Sections Menu.', 'taxipark' ),
						'choices' => array(
							'visible'  => esc_html__( 'Visible', 'taxipark' ),
							'desktop'  => esc_html__( 'Visible Desktop Only', 'taxipark' ),
							'disabled' => esc_html__( 'Hidden Always', 'taxipark' ),
						),
						'value' => 'default',
					),						
					'header-layout'    => array(
						'label' => esc_html__( 'Page Header', 'taxipark' ),
						'type'    => 'select',
						'choices' => array(
							'default'  => esc_html__( 'Default', 'taxipark' ),
							'disabled' => esc_html__( 'Hidden', 'taxipark' ),
						),
						'value' => 'default',
					),
					'margin-layout'    => array(
						'label' => esc_html__( 'Content Margin', 'taxipark' ),
						'type'    => 'select',
						'description'   => esc_html__( 'For full-width pages, like homepage, margins must be disabled.', 'taxipark' ),
						'choices' => array(
							'default'  => esc_html__( 'Default Text Page', 'taxipark' ),
							'disabled' => esc_html__( 'Margins Removed', 'taxipark' ),
						),
						'value' => 'default',
					),					
					'sidebar-layout'    => array(
						'label' => esc_html__( 'Sidebar', 'taxipark' ),
						'type'    => 'select',
						'choices' => array(
							'disabled' => esc_html__( 'Hidden', 'taxipark' ),
							'left'  => esc_html__( 'Sidebar Left', 'taxipark' ),
							'right'  => esc_html__( 'Sidebar Right', 'taxipark' ),
						),
						'value' => 'disabled',
					),
					'partners-layout'    => array(
						'label' => esc_html__( 'Partners Block', 'taxipark' ),
						'type'    => 'select',
						'description'   => esc_html__( 'Partners block before footer. Can be edited from Sections Menu.', 'taxipark' ),
						'choices' => array(
							'default'  => esc_html__( 'Visible', 'taxipark' ),
							'disabled' => esc_html__( 'Hidden', 'taxipark' ),
						),
						'value' => 'default',
					),						
					'blog-layout'    => array(
						'label' => esc_html__( 'Blog Layout', 'taxipark' ),
						'description'   => esc_html__( 'Used only for blog pages. You may ignore them on static pages.', 'taxipark' ),
						'type'    => 'select',
						'choices' => array(
							'default'  => esc_html__( 'Default', 'taxipark' ),
							'classic'  => esc_html__( 'One Column', 'taxipark' ),
							'two-cols' => esc_html__( 'Two Columns', 'taxipark' ),
							'three-cols' => esc_html__( 'Three Columns', 'taxipark' ),
						),
						'value' => 'default',
					),
					'gallery-layout'    => array(
						'label' => esc_html__( 'Gallery Layout', 'taxipark' ),
						'description'   => esc_html__( 'Used only for gallery pages. You may ignore them on static pages.', 'taxipark' ),
						'type'    => 'select',
						'choices' => array(
							'default' => esc_html__( 'Default', 'taxipark' ),
							'col-2' => esc_html__( 'Two Columns', 'taxipark' ),
							'col-3' => esc_html__( 'Three Columns', 'taxipark' ),
							'col-4' => esc_html__( 'Four Columns', 'taxipark' ),
						),
						'value' => 'default',
					),					
				)
			),
		)
	)
);


