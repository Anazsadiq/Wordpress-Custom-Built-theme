<?php
/**
 */
?>
<div class="swiper-slide">
	<div class="item">
	    <article class="person">
	        <?php echo the_post_thumbnail( 'taxipark-testimonials' ); ?>    
	        <div class="name"><?php the_title(); ?></div>
	        <span><?php echo esc_html( fw_get_db_post_option( get_the_ID(), 'descr' ) ); ?></span>
	        <div class="text"><?php the_content() ?></div>
	    </article>
	</div>
</div>
