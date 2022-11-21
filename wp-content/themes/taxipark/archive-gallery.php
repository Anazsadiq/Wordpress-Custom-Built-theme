<?php
/**
 * Gallery page
 */

// Getting gallery layout
if ( function_exists( 'fw_get_db_settings_option' ) ) {

	$taxipark_layout = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'gallery-layout' );
}
?>
<?php get_header(); ?>

<div class="gallery-page inner-page gallery-2">
	<div class="container">
		<div class="row">

			<?php
				if ( get_query_var( 'paged' ) ) {

					$paged = get_query_var( 'paged' );
				} elseif ( get_query_var( 'page' ) ) {

					$paged = get_query_var( 'page' );
				} else {

					$paged = 1;
				}

				$wp_query = new WP_Query( array(
					'post_type' => 'gallery',
					'paged' => (int) $paged,
				) );

				
				if ( ! empty($taxipark_layout) && $taxipark_layout == 'col-3' ) {

					$taxipark_grid = 3;
				}
					elseif ( ! empty($taxipark_layout) && $taxipark_layout == 'col-4' ) {

					$taxipark_grid = 4;
				}
					else {

					$taxipark_grid = 2;
				}

				if ( $wp_query->have_posts() ) :
					while ( $wp_query->have_posts() ) : $wp_query->the_post();

						taxipark_get_template_part( 'content', 'taxipark-gallery', array(
							'grid' => $taxipark_grid,
						) );

					endwhile;
				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>  
		</div>
		<?php
		if ( have_posts() ) {

			fw_theme_paging_nav();
		}
		?>        
	</div>
</div>            
<?php get_footer(); ?>
