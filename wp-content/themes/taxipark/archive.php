<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

$taxipark_sidebar_hidden = false;
if ( function_exists( 'fw_get_db_settings_option' ) ) {

	$taxipark_layout = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'blog-layout' );
	if ($taxipark_layout == 'three-cols') {

		$taxipark_sidebar_hidden = true;
	}
}


get_header(); ?>

<div class="inner-page">
	<?php if ( !$taxipark_sidebar_hidden ): ?><div class="row"><?php endif; ?>
        <div class="<?php if ( !$taxipark_sidebar_hidden ): ?>col-lg-8 col-md-8<?php endif; ?>">
            <div class="blog">
				<?php

				if ( $wp_query->have_posts() ) :
					// Start the Loop.
					while ( $wp_query->have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */

						// Showing classic blog without framework
							get_template_part( 'content', $wp_query->get_post_format() );
						endwhile;

					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'content', 'none' );

					endif;
				?>
				<?php
				if ( have_posts() ) {

					fw_theme_paging_nav();
				}
	            ?>
	        </div>
	    </div>
	    <?php if ( !$taxipark_sidebar_hidden ) :?>
            <?php
            	get_sidebar();
            ?>
		<?php endif; ?>
	<?php if ( !$taxipark_sidebar_hidden ): ?></div><?php endif; ?>
</div>
<?php

get_footer();

