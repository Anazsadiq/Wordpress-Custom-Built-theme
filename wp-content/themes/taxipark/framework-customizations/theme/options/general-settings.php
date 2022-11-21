<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title'   => esc_html__( 'General', 'taxipark' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => esc_html__( 'General Settings', 'taxipark' ),
				'type'    => 'box',
				'options' => array(
					'logo'    => array(
						'label' => esc_html__( 'Logo', 'taxipark' ),
						'desc'  => esc_html__( 'Upload logo', 'taxipark' ),
						'type'  => 'upload',
					),
					'logo_home'    => array(
						'label' => esc_html__( 'Logo Homepage', 'taxipark' ),
						'desc'  => esc_html__( 'Upload logo', 'taxipark' ),
						'type'  => 'upload',
					),
					'google_api'    => array(
						'label' => esc_html__( 'Google API Key', 'taxipark' ),
						'desc'  => esc_html__( 'Required for contacts page, also used in widget', 'taxipark' ),
						'type'  => 'text',
					),					
					'navbar-layout-global'    => array(
						'label' => esc_html__( 'Navbar Global Setting', 'taxipark' ),
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
					'navbar-affix-scroll'    => array(
						'label' => esc_html__( 'Navbar Sticked Option', 'taxipark' ),
						'type'    => 'select',
						'choices' => array(
							'' => esc_html__( 'Allways Visible', 'taxipark' ),
							'scroll-hide'  => esc_html__( 'Hidden on scroll down', 'taxipark' ),
						),
						'value' => '',
					),											
					'topbar_layout'    => array(
						'label' => esc_html__( 'Top Bar', 'taxipark' ),
						'type'    => 'select',
						'description'   => esc_html__( 'Info bar at top of the site. Can be edited from Sections Menu.', 'taxipark' ),
						'choices' => array(
							'visible'  => esc_html__( 'Visible', 'taxipark' ),
							'desktop'  => esc_html__( 'Visible Desktop Only', 'taxipark' ),
							'disabled' => esc_html__( 'Hidden Always', 'taxipark' ),
						),
						'value' => 'desktop',
					),
					'menu-bg'    => array(
						'label' => esc_html__( 'Menu Active Background', 'taxipark' ),
						'desc'  => esc_html__( 'Icon used as active/hover menu label (24x6)px, by default is yellow', 'taxipark' ),
						'type'  => 'upload',
					),					
					'menu-bg-visible'    => array(
						'label' => esc_html__( 'Menu Active Background Visibilty', 'taxipark' ),
						'desc'  => esc_html__( 'You can totaly hide hover pattern', 'taxipark' ),
						'type'    => 'select',						
						'choices' => array(
							'0'  => esc_html__( 'Hidden', 'taxipark' ),
							'1'  => esc_html__( 'Visible', 'taxipark' ),
						),
						'value' => '1',
					),									
					'header_bg'    => array(
						'label' => esc_html__( 'Inner Header Background', 'taxipark' ),
						'desc'  => esc_html__( 'By default header is gray, you can replace it with background image', 'taxipark' ),
						'type'  => 'upload',
					),
					'page-loader'    => array(
						'type'    => 'multi-picker',
						'picker'       => array(
							'loader' => array(
								'label'   => esc_html__( 'Page Loader', 'taxipark' ),
								'type'    => 'select',
								'choices' => array(
									'disabled' => esc_html__( 'Disabled', 'taxipark' ),
									'enabled' => esc_html__( 'Enabled', 'taxipark' ),
									'image' => esc_html__( 'Pulse Image', 'taxipark' ),
								),
								'value' => 'dots'
							)
						),
						'choices' => array(
							'image' => array(
								'loader_img'    => array(
									'label' => esc_html__( 'Page Loader Image', 'taxipark' ),
									'type'  => 'upload',
								),
							),
						),						
						'value' => 'enabled',
					),						
					'excerpt_auto'    => array(
						'label' => esc_html__( 'Excerpt Blog Size', 'taxipark' ),
						'desc'  => esc_html__( 'Automaticly cuts content for blogs', 'taxipark' ),
						'value'	=> 250,
						'type'  => 'short-text',
					),
					'excerpt_wc_auto'    => array(
						'label' => esc_html__( 'Excerpt WooCommerce Size', 'taxipark' ),
						'desc'  => esc_html__( 'Automaticly cuts description for products', 'taxipark' ),
						'value'	=> 50,
						'type'  => 'short-text',
					),					
				),
			),
		),
	),
	'cars' => array(
		'title'   => esc_html__( 'Car Types', 'taxipark' ),
		'type'    => 'tab',
		'options' => array(
			'cars-box' => array(
				'type'    => 'box',
				'options' => array(

					'cars' => array(
						'label' => esc_html__( 'Items', 'taxipark' ),
						'type' => 'addable-box',
						'value' => array(),
						'desc' => esc_html__( 'Car Icons Used in Contact Form 7 with shortcode [car_select]', 'taxipark' ),
						'box-options' => array(
							'text' => array(
								'label' => esc_html__( 'Header', 'taxipark' ),
								'type' => 'text',
							),
							'icon'    => array(
								'label' => esc_html__( 'Icon', 'taxipark' ),
								'type'  => 'upload',
							),
							'vip'    => array(
								'label' => esc_html__( 'Vip', 'taxipark' ),
								'desc' => esc_html__( 'Will be markered', 'taxipark' ),
								'type'  => 'checkbox',
							),							
						),
						'template' => '{{- text }}',
					),
				),
			),
		),
	),	
	'footer' => array(
		'title'   => esc_html__( 'Footer Block', 'taxipark' ),
		'type'    => 'tab',
		'options' => array(

			'footer-box' => array(
				'title'   => esc_html__( 'Footer Settings', 'taxipark' ),
				'type'    => 'box',
				'options' => array(
					'copyrights'    => array(
						'label' => esc_html__( 'Copyrights', 'taxipark' ),
						'type'  => 'wp-editor',
					),					
					'go_top_img'    => array(
						'label' => esc_html__( 'Go Top Image', 'taxipark' ),
						'type'  => 'upload',
					),
					'go_top_hide'    => array(
						'label' => esc_html__( 'Hide Go Top button in footer', 'taxipark' ),
						'type'  => 'switch',
						'value'	=> 'no',
					),
					'footer_1_hide'    => array(
						'label' => esc_html__( 'Hide Footer 1 Widget', 'taxipark' ),
						'type'  => 'switch',
						'value'	=> 'no',
					),
					'footer_2_hide'    => array(
						'label' => esc_html__( 'Hide Footer 2 Widgets', 'taxipark' ),
						'type'  => 'switch',
						'value'	=> 'no',
					),
					'footer_3_hide'    => array(
						'label' => esc_html__( 'Hide Footer 3 Widgets', 'taxipark' ),
						'type'  => 'switch',
						'value'	=> 'no',
					),
					'footer_4_hide'    => array(
						'label' => esc_html__( 'Hide Footer 4 Widgets', 'taxipark' ),
						'type'  => 'switch',
						'value'	=> 'no',
					),						
					'footer_1_hide_mobile'    => array(
						'label' => esc_html__( 'Hide Footer 1 Widgetss on mobile', 'taxipark' ),
						'type'  => 'switch',
						'value'	=> 'no',
					),
					'footer_2_hide_mobile'    => array(
						'label' => esc_html__( 'Hide Footer 2 Widgetss on mobile', 'taxipark' ),
						'type'  => 'switch',
						'value'	=> 'yes',
					),
					'footer_3_hide_mobile'    => array(
						'label' => esc_html__( 'Hide Footer 3 Widgetss on mobile', 'taxipark' ),
						'type'  => 'switch',
						'value'	=> 'no',
					),
					'footer_4_hide_mobile'    => array(
						'label' => esc_html__( 'Hide Footer 4 Widgetss on mobile', 'taxipark' ),
						'type'  => 'switch',
						'value'	=> 'yes',
					),					
				),
			),
		),
	),
);
