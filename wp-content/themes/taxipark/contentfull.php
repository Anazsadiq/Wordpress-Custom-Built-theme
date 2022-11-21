<?php
/**
 * Full blog post
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="item">

		<div class="image"><?php echo the_post_thumbnail( 'taxipark-big' ); ?></div>

	    <div class="blog-info">
	        <div class="row">
	            <div class="col-lg-6 col-sm-12 col-xs-4">
	                <a href="<?php esc_url( the_permalink() ); ?>" class="date"><span class="fa fa-clock-o"></span><?php echo get_the_date(); ?></a>
	            </div>
	            <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
	            <div class="col-lg-6 col-sm-12  col-xs-8 col-ms-8 right">
	                <ul>
						<?php if ( function_exists( 'pvc_post_views' ) ) : ?>
						<li class="icon-fav fa fa-eye">
							<a href="<?php the_permalink(); ?>"><?php esc_html( strip_tags( pvc_post_views(get_the_ID(), false) ) ); ?></a>
						</li><?php endif; ?>
	                    <li class="icon-comments fa fa-commenting"><a href="<?php the_permalink(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></li>
	                </ul>
	            </div>
	        	<?php endif; ?>
	        </div>
	    </div>

	    <div class="description">
	        <div class="text text-page">
				<?php
					the_content();
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'taxipark' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
				?>
	        </div>
	    </div>
	    <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>


		<?php endif; ?>
		<?php the_tags( '<div class="tags-short"><strong>' . esc_html__( 'Tags:', 'taxipark' ) . '</strong> ', ', ', '</div>' ); ?>
	    <?php
		if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && fw_theme_categorized_blog() ) {

			echo '<div class="cats-short">';
			echo '<strong>' . esc_html__( 'Category:', 'taxipark' ) . '</strong> ';
			echo get_the_category_list( esc_html_x( ', ', 'Used between list items, there is a space after the comma.', 'taxipark' ) );
			echo '</div>';
		}
		?>		
		<?php if ( taxipark_plugin_is_active( 'simple-share-buttons-adder' ) ) { echo do_shortcode( '[ssba]' );} ?>
	</article>
