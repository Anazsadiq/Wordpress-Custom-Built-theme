<?php
/**
 * The template for displaying posts in the Gallery post format
 */

?>
<?php if ( isset( $taxipark_params['grid'] ) && $taxipark_params['grid'] === 4 ) : ?><div class="col-lg-3 col-md-4 col-sm-6 col-ms-6"><?php endif; ?>
<?php if ( isset( $taxipark_params['grid'] ) && $taxipark_params['grid'] === 3 ) : ?><div class="col-lg-4 col-md-4 col-sm-6 col-ms-6"><?php endif; ?>
<?php if ( ! isset( $taxipark_params['grid'] ) || $taxipark_params['grid'] === 2 ) : ?><div class="col-lg-6 col-md-6 col-sm-6 col-ms-6"><?php endif; ?>

	<article class="item matchHeight">
		<a href="<?php esc_url( the_permalink() ); ?>" class="photo"><?php echo the_post_thumbnail( 'taxipark-gallery' ); ?></a>
		<div class="descr">
			<div class="row">
				<div class="col-lg-12">
					<h5><?php the_title(); ?></h5>
				</div>
				<div class="col-lg-12">
					<ul>
						<li><span class="fa fa-clock-o"></span><?php echo get_the_date(); ?></li>
					</ul>
				</div>
			</div>
		</div>
	</article>
</div>
