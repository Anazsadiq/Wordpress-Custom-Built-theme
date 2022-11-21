<?php
/**
 * The default template for displaying content inner item
 *
 * Used for both single and index/archive/search.
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'matchHeight' ); ?>>
	    <a href="<?php the_permalink(); ?>" class="photo">
	        <?php echo the_post_thumbnail(); ?>    
	    </a>
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
							<a href="<?php the_permalink(); ?>"><?php  esc_html( strip_tags( pvc_post_views(get_the_ID(), false) ) ); ?></a>
						</li><?php endif; ?>
	                    <li class="icon-comments fa fa-commenting"><a href="<?php the_permalink(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></li>
	                </ul>
	            </div>
	        	<?php endif; ?>
	        </div>
	    </div>
	    <div class="description">
	        <a href="<?php esc_url( the_permalink() ); ?>" class="header"><h5><?php the_title(); ?></h5></a>
	        <div class="text text-page margin-bottom-0">
			<?php if ( is_search() ) : ?> 
				<?php
					the_excerpt();
				?>
			<?php else : ?>
				<?php
					add_filter( 'the_content', 'taxipark_excerpt' );
					the_content( esc_html__( 'Read more &rarr;', 'taxipark' ) );
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'taxipark' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );

				?>
			<?php endif; ?>
	        </div>
	    </div>	    
	</article>
