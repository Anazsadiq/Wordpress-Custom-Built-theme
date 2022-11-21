<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header( 'no-h1' ); ?>

	<section class="page-404">
		<div class="container">
			<div class="center">

			<?php

			$page = get_posts( array(
				'name' => '404-layout',
				'post_type' => 'page',
			) );

			if ( $page ) {
				echo wp_kses_post( $page[0]->post_content );
			} else {
				?>
				<img src="<?php echo esc_attr( get_template_directory_uri() . '/assets/images/404.png' ); ?>" class="full-width" alt="404">
				<h1><?php echo esc_html__( 'Sorry Page Was Not Found', 'taxipark' ) ?></h1>
				<a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="btn btn-lg btn-pink"><?php echo esc_html__( 'Home Page', 'taxipark' ) ?></a>
				<?php
			}
			?>
			</div>
		</div>
	</section>
<?php

get_footer();

