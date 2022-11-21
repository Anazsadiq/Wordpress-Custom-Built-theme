<?php
/**
 * The template for displaying the footer
 */
?>
    </div>
    <?php
    /**
     * Footer include section
     */
    if ( function_exists( 'FW' ) ) {

        $partners_layout = 'default';
//        $partners_layout = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'partners-layout' );

        remove_filter( 'the_content', 'taxipark_excerpt' );

        if ($partners_layout == 'default') {

            $footer_query = new WP_Query( array(
                'post_type' => 'sections',
                'name' => 'partners',
                'posts_per_page' => 1,
            ) );

            if ( $footer_query->have_posts() ) :
                while ( $footer_query->have_posts() ) : $footer_query->the_post();
                    echo '<div class="container">';
                    the_content();
                    echo '</div>';
                endwhile;
            endif;    
        }
    }

    ?>
    <?php
    /**
    	Footer customization
    */
    if ( function_exists( 'fw_get_db_settings_option' ) ) {

    	/* Counting active cols number */
    	$footer_cols_num = 0;
    	for ($x = 1; $x <= 4; $x++) {

    		if ( !fw_get_db_settings_option( 'footer_' . $x . '_hide' ) ) {

    			$footer_cols_num++;
    		}
    	}
    }                
    	else {

        $footer_cols_num = 0;
   	}    	

    $taxipark_footer_sidebars_active = 0;
    for ($x = 1; $x <= 4; $x++) {

        if ( !isset($footer_hide[ $x ]) && is_active_sidebar( 'footer-' . $x ) ) {

            $taxipark_footer_sidebars_active++;
        }
    }    
	?>	
	<?php if ( $footer_cols_num > 0 AND $taxipark_footer_sidebars_active > 0): ?>
	<section id="block-footer">
		<div class="container">
			<div class="row">
                <?php
                /* By default columns with different layout */
                $footer_tmpl = array(
                	4	=>	array(
                			'col-md-3 col-sm-6 col-ms-12',
                			'col-md-3 col-sm-6 col-ms-12',
                			'col-md-3 col-sm-6 col-ms-12',
                			'col-md-3 col-sm-6 col-ms-12',
                		),
                	3	=>	array(
                			'col-md-4 col-sm-6 col-ms-12',
                			'col-md-5 col-sm-6 col-ms-12',
                			'col-md-3 col-sm-6 col-ms-12',
                			'col-md-4 col-sm-6 col-ms-12',
                		),
                	2	=>	array(
                			'col-md-6 col-sm-12',
                			'col-md-6 col-sm-12',
                			'col-md-6 col-sm-12',
                			'col-md-6 col-sm-12',
                		),
                	1	=>	array(
                			'col-md-12',
                			'col-md-12',
                			'col-md-12',
                			'col-md-12',
                		),
                );

               	$footer_hide = array();
                if ( function_exists( 'fw_get_db_settings_option' ) ) {

                	/* Counting active cols number */
                	$footer_cols_num = 0;
                	for ($x = 1; $x <= 4; $x++) {

                		if ( !fw_get_db_settings_option( 'footer_' . $x . '_hide' ) ) {

                			$footer_cols_num++;
                		}
                			else {

                			$footer_hide[$x] = true;
                		}
                	}
                }                
                	else {

	                $footer_cols_num = 4;
               	}

                for ($x = 1; $x <= 4; $x++):

                	$class = '';
                	if ( isset($footer_tmpl[$footer_cols_num][( $x - 1 )]) ) {

                		$class = $footer_tmpl[$footer_cols_num][( $x - 1 )];
                	}

                	$col_hide_mobile = '';
                	if ( function_exists( 'fw_get_db_settings_option' ) && fw_get_db_settings_option( 'footer_' . $x . '_hide_mobile') ) {

                		$col_hide_mobile = 'hidden-xs hidden-ms hidden-sm';
                	}
                    ?>
                    <?php if ( !isset($footer_hide[ $x ]) ): ?>
					<div class="<?php echo esc_attr( $class ).' '.esc_attr( $col_hide_mobile ); ?> matchHeight clearfix">    
						<?php if ( is_active_sidebar( 'footer-' . $x ) ) : ?>
							<div class="footer-widget-area">
								<?php
                                    dynamic_sidebar( 'footer-' . $x );
                                    
                                ?>
							</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>
                    <?php
                endfor;
                ?>
			</div>
		</div>
	</section><?php endif; ?>
	<footer class="footer-block">
		<div class="container">
			<?php if ( function_exists( 'fw_get_db_settings_option' ) && fw_get_db_settings_option( 'copyrights' ) ) : ?>
				<?php echo wp_kses_post( fw_get_db_settings_option( 'copyrights' ) ); ?>
			<?php else : ?>
				<p><?php echo esc_html__( 'Like-themes &copy; All Rights Reserved - 2017', 'taxipark' );?></p>
			<?php endif; ?>
			<?php if ( function_exists( 'fw_get_db_settings_option' ) && !fw_get_db_settings_option( 'go_top_hide') ) : ?>
				<a href="#" class="go-top hidden-xs hidden-ms"></a>
			<?php endif; ?>
		</div>
	</footer>
	<!-- Scripts -->
	<?php wp_footer(); ?>
</body>
</html>
