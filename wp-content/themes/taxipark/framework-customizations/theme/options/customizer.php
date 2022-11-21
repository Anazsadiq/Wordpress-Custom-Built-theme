<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); }

$options = array(
    'taxipark_customizer' => array(
        'title' => esc_html__('Taxipark', 'taxipark'),
        'options' => array(

            'main_color' => array(
                'type' => 'color-picker',
                'value' => '#FFC61A',
                'label' => esc_html__('Main Color', 'taxipark'),
            ),

            'secondary_color' => array(
                'type' => 'color-picker',
                'value' => '#1F1F1F',
                'label' => esc_html__('Secondary Color', 'taxipark'),
            ),

            'gray_lighter_color' => array(
                'type' => 'color-picker',
                'value' => '#F5F5F5',
                'label' => esc_html__('Gray Lighter Color', 'taxipark'),
            ),

            'gray_color' => array(
                'type' => 'color-picker',
                'value' => '#CCCCCC',
                'label' => esc_html__('Gray Color', 'taxipark'),
            ),

            'red_color' => array(
                'type' => 'color-picker',
                'value' => '#9F340A',
                'label' => esc_html__('Red Color', 'taxipark'),
            ),

            'white_color' => array(
                'type' => 'color-picker',
                'value' => '#ffffff',
                'label' => esc_html__('White Color', 'taxipark'),
            ),

            'bg_color' => array(
                'type' => 'color-picker',
                'value' => '#ffffff',
                'label' => esc_html__('Background Color', 'taxipark'),
            ),

            'menu_color' => array(
                'type' => 'color-picker',
                'value' => '#CCCCCC',
                'label' => esc_html__('Menu Items Color', 'taxipark'),
            ),

            'block_footer_bg' => array(
                'type' => 'color-picker',
                'value' => '#161616',
                'label' => esc_html__('Footer Block Background', 'taxipark'),
            ),

            'footer_bg' => array(
                'type' => 'color-picker',
                'value' => '#0C0C0C',
                'label' => esc_html__('Footer Background', 'taxipark'),
            ),
            'logo_height' => array(
                'type'  => 'slider',
                'value' => 45,
                'properties' => array(

                    'min' => 20,
                    'max' => 90,
                    'step' => 1,

                ),
                'label' => esc_html__('Inner Logo Max Height, px', 'taxipark'),
            ),        

        ),
    ),
);
