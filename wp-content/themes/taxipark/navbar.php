<?php
/**
 * Navbar part
 */
?>

    <?php
    /**
     * Topbar include section
     */

    $topbar_layout = 'disabled';
	if ( function_exists( 'fw_get_db_settings_option' ) ) {

		$topbar_layout = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'topbar-layout' );
		if ( empty($topbar_layout) OR $topbar_layout == 'default' ) $topbar_layout = fw_get_db_settings_option( 'topbar_layout' );
		if ( empty($topbar_layout) ) $topbar_layout = 'desktop';		
	}

	if ( $topbar_layout != 'disabled') {

		if ( $topbar_layout == 'desktop') $topbar_visible = ' visible-lg'; else $topbar_visible = '';

	    $top_query = new WP_Query( array(
	        'post_type' => 'sections',
	        'name' => 'top-bar',
	        'posts_per_page' => 1,
	    ) );

	    if ( $top_query->have_posts() ) :
	        while ( $top_query->have_posts() ) : $top_query->the_post();
	            echo '<div class="topbar-wrapper container '.$topbar_visible.'">';
	            the_content();
	            echo '</div>';
	        endwhile;
	    endif;

	    wp_reset_postdata();
	}

	$navbar_layout = 'default';
	if ( function_exists( 'fw_get_db_settings_option' ) ) {

		$navbar_layout = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'navbar-layout' );
		if ( $navbar_layout == 'default' ) {

			$navbar_layout = fw_get_db_settings_option( 'navbar-layout-global' );
		}
	}

	// Different navbar layouts
	$navbar_static = 'navbar-static';
	$navbar_wrapper = 'nav-wrapper';
	$navbar_affix = 'navbar-affix';

	if ( function_exists('FW') ) {

		$navbar_affix_scroll = fw_get_db_settings_option( 'navbar-affix-scroll' );
	}

	if ( !empty($navbar_layout) AND $navbar_layout == 'yellow' ) {

		echo '<div class="navbar-gray-yellow-transparent">';
		$navbar_static = 'navbar-fixed-top';		
		$navbar_wrapper = '';
		$navbar_affix = '';		
	}

	if ( !empty($navbar_layout) AND $navbar_layout == 'transparent' ) {

		echo '<div class="navbar-dark-transparent">';
		$navbar_static = 'navbar-fixed-top';
		$navbar_wrapper = '';
		$navbar_affix = '';		
	}

	if ( !empty($navbar_layout) AND $navbar_layout == 'home' ) {

		$navbar_wrapper = '';
		$navbar_static .= ' navbar-home';
		$navbar_affix = '';
	}

	if ( !empty($navbar_layout) AND $navbar_layout == 'default' ) {

		$navbar_static .= ' navbar-inner';
	}

	if ( !empty($navbar_affix) ) $navbar_spy = 'affix'; else $navbar_spy = '';

    ?>
	<div class="<?php echo esc_attr( $navbar_wrapper ); ?>" id="nav-wrapper">
		<nav class="navbar <?php echo esc_attr( $navbar_affix ); ?> <?php echo esc_attr( $navbar_static ); ?>" data-spy="<?php echo esc_attr( $navbar_spy ); ?>">
			<div class="container">
				<?php if ( $navbar_layout == 'home' ): ?>
				<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php
					if ( function_exists( 'fw_get_db_settings_option' ) ) {

						$taxipark_logo = fw_get_db_settings_option( 'logo_home' );
						if ( ! empty( $taxipark_logo ) ) {

							echo wp_get_attachment_image( $taxipark_logo['attachment_id'], 'taxipark-big' );
						}
					}
					?>
				</a>
				<?php endif; ?>

				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed">
						<span class="sr-only"><?php echo esc_html__( 'Toggle navigation', 'taxipark' ); ?></span>
						<span class="icon-bar top-bar"></span>
						<span class="icon-bar middle-bar"></span>
						<span class="icon-bar bottom-bar"></span>
					</button>
					<?php if ( $navbar_layout != 'home' ): ?>
					<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php
						if ( function_exists( 'fw_get_db_settings_option' ) ) {

							$taxipark_logo = fw_get_db_settings_option( 'logo' );
							if ( ! empty( $taxipark_logo ) ) {

								echo wp_get_attachment_image( $taxipark_logo['attachment_id'], 'taxipark-big' );
							}
						}

						if ( empty( $taxipark_logo ) ) {

							echo '<img src="' . esc_attr( get_template_directory_uri() . '/assets/images/logo.png' ) . '" alt="' . esc_attr( get_bloginfo( 'title' ) ) . '">';
						}
						?>
					</a>
					<?php endif; ?>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<button type="button" class="navbar-toggle collapsed">
						<span class="sr-only"><?php echo esc_html__( 'Toggle navigation', 'taxipark' ); ?></span>
						<span class="icon-bar top-bar"></span>
						<span class="icon-bar middle-bar"></span>
						<span class="icon-bar bottom-bar"></span>
					</button>				

					<div class="pull-right nav-right visible-lg">
						<?php if( taxipark_is_wc('wc_active') ) : ?>
						<a href="<?php echo wc_get_cart_url(); ?>" class="shop_table cart" title="<?php echo esc_html__( 'View your shopping cart', 'taxipark' ); ?>">
							<span class="name"><?php echo esc_html__( 'Cart', 'taxipark' ); ?></span>
							<i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="cart-contents header-cart-count count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
						<?php endif; ?>
					</div>						
					<?php
						wp_nav_menu(array(
							'theme_location'	=> 'primary',
							'menu_class' => 'nav navbar-nav',
							'container'	=> 'ul',
							'link_before' => '<span>',     
							'link_after'  => '</span>'							
						));

					?>
					<div class="nav-mob hidden-lg">
						<?php if( taxipark_is_wc('wc_active') ) : ?>
						<a href="<?php echo wc_get_cart_url(); ?>" class="shop_table cart" title="<?php echo esc_html__( 'View your shopping cart', 'taxipark' ); ?>">
							<span class="name"><?php echo esc_html__( 'Cart', 'taxipark' ); ?></span>
							<i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="cart-contents header-cart-count count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
						<?php endif; ?>
					</div>									
				</div>



			</div>
		</nav>
	</div>
	<?php

	if ( !empty($navbar_layout) AND ($navbar_layout == 'yellow' OR $navbar_layout == 'transparent' ) ) echo '</div>';


