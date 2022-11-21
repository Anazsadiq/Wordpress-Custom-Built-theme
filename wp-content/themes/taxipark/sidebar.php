<?php
/**
 * The sidebar containing the main widget area
 *
 */

if ( taxipark_is_wc('woocommerce') || taxipark_is_wc('shop') || taxipark_is_wc('product') ) : ?>
	<div class="col-md-3">
		<div id="content-sidebar" class="content-sidebar woocommerce-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-wc' ); ?>
		</div>
	</div>
	</div></div>
<?php elseif ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div class="col-md-4">
		<div id="content-sidebar" class="content-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</div>
<?php endif; ?>
