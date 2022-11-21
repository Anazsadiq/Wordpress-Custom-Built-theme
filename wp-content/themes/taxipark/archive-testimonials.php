<?php
/**
 * Testimonials page
 */
?>
<?php get_header(); ?>

<div class="container">
	<div class="testimonials-list inner-page">
		<div class="row masonry">
			<?php

			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			}
				elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' );
			}
				else {

				$paged = 1;
			}

			$wp_query = new WP_Query( array(
				'post_type' => 'testimonials',
				'paged' => (int) $paged,
			) );

			if ( $wp_query->have_posts() ) :
				while ( $wp_query->have_posts() ) : $wp_query->the_post();

					get_template_part( 'content', 'testimonials' );

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
