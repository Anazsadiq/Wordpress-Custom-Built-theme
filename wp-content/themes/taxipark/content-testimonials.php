<?php
/**
 */
?>
<div class="col-sm-4 item">
	<article class="inner">
		<div class="text"><?php the_content() ?></div>
		<div class="quote">
			<span class="fa fa-quote-left"></span>
			<div class="name"><?php the_title(); ?></div>
			<?php echo the_post_thumbnail( 'taxipark-testimonials' ); ?>    
		</div>
	</article>
</div>
