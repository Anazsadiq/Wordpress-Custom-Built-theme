<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * Generating inline css styles for customization
 */
if ( !function_exists('taxipark_generate_css') ) {

	function taxipark_generate_css() {

		// List of attributes
		$css = array(
			'main_color' 		=> true,
			'secondary_color' 	=> true,
			'gray_lighter_color' 	=> true,
			'gray_color' 	=> true,
			'red_color' 	=> true,
			'white_color' 	=> true,
			'bg_color' 	=> true,
			'menu_color' 	=> true,
			'block_footer_bg' 	=> true,
			'footer_bg' 	=> true,
		);

		// Escaping all the attributes
		$css_rgb = array();
		foreach ($css as $key => $item) {

			$css[$key] = esc_attr(fw_get_db_customizer_option($key));
			$css_rgb[$key] = sscanf(esc_attr(fw_get_db_customizer_option($key)), "#%02x%02x%02x");
		}

		$theme_style = "
.yellow,
a,
nav.navbar .cart .count,
nav.navbar #navbar ul.navbar-nav .current_page_parent > a,  nav.navbar #navbar ul.navbar-nav .current_page_item > a,
nav.navbar #navbar ul.navbar-nav > li.page_item_has_children:hover > ul,  
nav.navbar #navbar ul.navbar-nav > li.hasSub:hover > a,
nav.navbar #navbar ul.navbar-nav ul,
nav.navbar #navbar ul.navbar-nav ul.children li.current_page_item > a,  nav.navbar #navbar ul.navbar-nav ul.sub-menu li.current_page_item > a,
nav.navbar #navbar ul.navbar-nav > li.page_item_has_children > a:after,
nav.navbar #navbar ul.navbar-nav > li.menu-item-has-children > a:after,
nav.navbar #navbar ul.navbar-nav > li.hasSub > a:after,
nav.navbar #navbar ul.navbar-nav > li.page_item_has_children:hover > a:after,
nav.navbar #navbar ul.navbar-nav > li.menu-item-has-children:hover > a:after,
nav.navbar #navbar ul.navbar-nav > li.hasSub:hover > a:after,
.homepage-block-1 h2,
header.page-header .breadcrumbs li:not(:last-child):after,
header.page-header .breadcrumbs li a:hover,
header.page-header .breadcrumbs li,
.homepage-block-2 h2,
.homepage-block-2 .large-image-center .dialog h3,
.homepage-block-2 .large-image-center .dialog .fa,
.download-block h5,
#block-footer h4,
#block-footer .social-icons-list a:hover,
#block-footer .address li span,
#block-footer .address li a:hover,
#block-footer .widget_nav_menu ul li a:hover,
#block-footer .widget_nav_menu ul li a:before,
#block-footer .widget_nav_menu ul li.active a,
footer a,
footer a:hover,
.widget-area aside ul li a:hover,
.widget-area aside.widget_calendar caption,
.widget_calendar caption,
.blog article .description .header:hover h5,
.blog-info .fa,
.blog-post h1,
.blog-post h3,
.blog-post .tags-short strong,
.gallery-page .descr .fa,
.alert.vc_color-info,
.vc_message_box.vc_color-info .fa,.alert.vc_color-info .fa,
.block-descr h4,
.vc_tta-accordion h4 a,
.social-icons-list li span,
.social-small.social-yellow a,
.social-small.social-yellow a:hover,
.tags a:hover,
input.btn-black[type=\"submit\"], .btn.btn-black, .wp-searchform input.btn-black[type=\"submit\"], form.post-password-form input.btn-black[type=\"submit\"], form.search-form input.btn-black[type=\"submit\"], form.wpcf7-form input.btn-black[type=\"submit\"], form.form input.btn-black[type=\"submit\"], form.comment-form input.btn-black[type=\"submit\"], form input.btn-black[type=\"submit\"],
input[type=\"submit\"]:hover,
.btn:hover,
.wp-searchform input[type=\"submit\"]:hover,
form.post-password-form input[type=\"submit\"]:hover,
form.search-form input[type=\"submit\"]:hover,
form.wpcf7-form input[type=\"submit\"]:hover,
form.form input[type=\"submit\"]:hover,
form.comment-form input[type=\"submit\"]:hover,
form input[type=\"submit\"]:hover,

.fw-btn.btn-black-bordered:hover,
input[type=\"submit\"].btn-black-bordered:hover,
.btn.btn-black-bordered:hover,
.wp-searchform input[type=\"submit\"].btn-black-bordered:hover,
form.post-password-form input[type=\"submit\"].btn-black-bordered:hover,
form.search-form input[type=\"submit\"].btn-black-bordered:hover,
form.wpcf7-form input[type=\"submit\"].btn-black-bordered:hover,
form.form input[type=\"submit\"].btn-black-bordered:hover,
form.comment-form input[type=\"submit\"].btn-black-bordered:hover,
form input[type=\"submit\"].btn-black-bordered:hover,

.fw-btn.btn-yellow.btn-bg-dark:hover,
input[type=\"submit\"].btn-yellow.btn-bg-dark:hover,
.btn.btn-yellow.btn-bg-dark:hover,
.wp-searchform input[type=\"submit\"].btn-yellow.btn-bg-dark:hover,
form.post-password-form input[type=\"submit\"].btn-yellow.btn-bg-dark:hover,
form.search-form input[type=\"submit\"].btn-yellow.btn-bg-dark:hover,
form.wpcf7-form input[type=\"submit\"].btn-yellow.btn-bg-dark:hover,
form.form input[type=\"submit\"].btn-yellow.btn-bg-dark:hover,
form.comment-form input[type=\"submit\"].btn-yellow.btn-bg-dark:hover,
form input[type=\"submit\"].btn-yellow.btn-bg-dark:hover,

.wp-searchform.wp-searchform,form input[type=\"submit\"]:hover,
.fw-btn.btn-yellow.btn-white,form input[type=\"submit\"].btn-yellow:hover,
.fw-btn.btn-yellow.btn-bg-dark:hover,form input[type=\"submit\"].btn-red:hover,
.fw-btn.btn-black,form.comment-form input[type=\"submit\"].btn-black,form input[type=\"submit\"].btn-black,
form.comment-form input[type=\"submit\"].btn-black.btn-white:hover,form input[type=\"submit\"].btn-black.btn-white:hover,
.fw-btn.btn-black-bordered,form input[type=\"submit\"].btn-black-bordered:hover,
.fw-btn.align-right,.taxi-form-full input[type=\"submit\"]:hover,
.form-taxi-short .wpcf7-submit:hover,
.paging-navigation .pagination .page-numbers:not(.next):not(.prev):not(.current):hover,.page-numbers .pagination .page-numbers:not(.next):not(.prev):not(.current):hover,
.paging-navigation .pagination .page-numbers:not(.next):not(.prev).current,.page-numbers .pagination .page-numbers:not(.next):not(.prev).current,
.paging-navigation .next:not(.disabled):hover,.page-numbers .next:not(.disabled):hover,
.comments-area .comment-info .comment-author,
.comments-area .comment-reply-link:hover,
.comments-area .comment-reply-link:before,
h5.yellow,h6.yellow,
.heading.heading-large h4,
.heading.heading-small h4,
.heading.spanned h4,
.social-small a,
.widget-area aside ul li::before,
.comment-text ul.disc li::before, .text-page ul.disc li::before, .comment-text ul.check li::before, .text-page ul.check li::before,
.paging-navigation .pagination .page-numbers:not(.next):not(.prev), .page-numbers .pagination .page-numbers:not(.next):not(.prev),
.btn.btn-default-bordered,
.btn.btn-second,
form.search-form:not(.halio-form) input[type=\"submit\"]:hover, form.wpcf7-form:not(.halio-form) input[type=\"submit\"]:hover,
form:not(.halio-form) input[type=\"submit\"]:hover,
.wpb-js-composer .vc_tta-panel .vc_tta-icon,
.alert.alert-warning .fa, .alert.alert-warning .header,
.alert.alert-warning p,
.block-icon.icon-h-right a, .block-icon.icon-h-right span,
ol li::before,
.team-item h4,
h1 span:not(.fa), h2 span:not(.fa), h3 span:not(.fa), h4 span:not(.fa), h5 span:not(.fa), h6 span:not(.fa),
h1 span:not(.fas), h2 span:not(.fas), h3 span:not(.fas), h4 span:not(.fas), h5 span:not(.fas), h6 span:not(.fas),
h1.yellow, h2.yellow, h3.yellow, h4.yellow, h5.yellow, h6.yellow,
.woocommerce a.button:hover,
.woocommerce a.button:hover, .button:hover,
.woocommerce-mini-cart__buttons .button:not(.checkout),
.woocommerce ul.products li.product .button:hover::before,
.woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce button.button:hover, .woocommerce a.button:hover, .button:hover,
ul.arrow.arrow li::before
{ color: {$css['main_color']};  }

@media (min-width: 1200px) {
	nav.navbar #navbar ul.navbar-nav > li.menu-item-has-children:hover > a,  
	nav.navbar #navbar ul.navbar-nav .current-menu-ancestor > a, nav.navbar #navbar ul.navbar-nav .current-menu-item > a, nav.navbar #navbar ul.navbar-nav .current-menu-parent > a, nav.navbar #navbar ul.navbar-nav .current_page_parent > a, nav.navbar #navbar ul.navbar-nav .current_page_item > a
		{ color: {$css['main_color']};  }


	nav.navbar #navbar ul.navbar-nav ul.sub-menu li.current_page_item > a
	{ color: {$css['main_color']}; }		
}

.social-icons-list li span,
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a,
#block-footer .widget_nav_menu ul li a:hover,
.homepage-block-2 h2,
#block-footer .social-icons-list .fa,
.taxi-form-full input[type=\"submit\"]:hover,
.vc_message_box.vc_color-info, .alert.vc_color-info,
.vc_message_box.vc_color-info .fa, .alert.vc_color-info .fa,
.homepage-block-1 h2,
.form-taxi-short .wpcf7-submit:hover
{ color: {$css['main_color']} !important; }

.black,
.white,
body,
.top-bar .social-small a,
.top-bar .heading .fa,
nav.navbar #navbar ul.navbar-nav ul.children li,  nav.navbar #navbar ul.navbar-nav ul.sub-menu li,
nav.navbar #navbar ul.navbar-nav ul.children li a,  nav.navbar #navbar ul.navbar-nav ul.sub-menu li a,
nav.navbar #navbar ul.navbar-nav ul.sub-menu li:hover,
nav.navbar #navbar ul.navbar-nav ul.children li:hover a,  nav.navbar #navbar ul.navbar-nav ul.sub-menu li:hover a,
nav.navbar #navbar ul.navbar-nav ul.children li:hover a:after,  nav.navbar #navbar ul.navbar-nav ul.sub-menu li:hover a:after,
nav.navbar ul.navbar-nav > li.menu-item-has-children:after,
nav.navbar ul.navbar-nav a,
nav.navbar ul.navbar-nav a:focus,
nav.navbar ul.navbar-nav > li.show-child ul,
nav.navbar.affix #navbar,
.tariffs-block h2,
.widget-area aside ul li,
.widget-area aside ul li a,
.widget-area aside ul li.current-cat a,
.null-instagram-feed a,
.null-instagram-feed .instagram-pics,
.blog article .description .header,
.blog article .description .header h5,
.blog-post .tags-short strong,
.blog-post .tags-short a:before,
.blog-post .cats-short strong,
.alert.vc_color-warning,
.vc_message_box.vc_color-warning .fa,.alert.vc_color-warning .fa,
.vc_tta-accordion h4:hover,
.vc_tta-accordion .vc_tta-panel-heading:not(:last-child),
.vc_tta-tabs .vc_tta-tabs-list .vc_tta-tab span,
.social-icons-list li a,
.social-icons-list li span,
form input[type=\"submit\"].btn-yellow.btn-bg-dark:hover,
.fw-btn.wpcf7-submit,form.comment-form input[type=\"submit\"].btn-black-bordered,form input[type=\"submit\"].btn-black-bordered,
.fw-btn,input[type=\"submit\"],.btn,.wp-searchform input[type=\"submit\"],form.post-password-form input[type=\"submit\"],form.search-form input[type=\"submit\"],form.wpcf7-form input[type=\"submit\"],form.form input[type=\"submit\"],form.comment-form input[type=\"submit\"],form input[type=\"submit\"],
.page-numbers .next,
.tags a:hover,
.comments-area .comments-title,
.comments-area .comment-list,
.comments-area .comment-reply-link,
.comments-form-wrap h3,
.comments-form-wrap h3:not(.comment-reply-title),
.comment-text h1,
.text-page h1,
.comment-text h2,
.text-page h2,
.comment-text h3,
.text-page h3,
ul.disc li,ul.check li,
.tariffs-block,
.comment-text table thead th, .text-page table thead th,
.fw-btn.btn-black-bordered,
input[type=\"submit\"].btn-black-bordered,
.btn.btn-black-bordered,
.wp-searchform input[type=\"submit\"].btn-black-bordered,
form.post-password-form input[type=\"submit\"].btn-black-bordered,
form.search-form input[type=\"submit\"].btn-black-bordered,
form.wpcf7-form input[type=\"submit\"].btn-black-bordered,
form.form input[type=\"submit\"].btn-black-bordered,
form.comment-form input[type=\"submit\"].btn-black-bordered,
form input[type=\"submit\"].btn-black-bordered,
.paging-navigation .prev, .page-numbers .prev, .paging-navigation .next, .page-numbers .next,
.menu-types a,
span.icon-default:before,
{ color: {$css['secondary_color']}; }

span.icon-default:before { color: #000 !important; }

.vc_message_box.vc_color-warning .fa,
.vc_message_box.vc_color-warning, .alert.vc_color-warning,
.vc_tta-tabs .vc_tta-tabs-list .vc_tta-tab span,
.top-bar .heading .fa
{ color: {$css['secondary_color']} !important; }

.woocommerce #payment #place_order, .woocommerce-page #payment #place_order, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce div.product form.cart .button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce button.button, .woocommerce a.button, .button, .fw-btn, input[type=\"submit\"], .btn, .woocommerce-product-search:not(.halio-form) input[type=\"submit\"], .wp-searchform:not(.halio-form) input[type=\"submit\"], form.post-password-form:not(.halio-form) input[type=\"submit\"], form.search-form:not(.halio-form) input[type=\"submit\"], form.wpcf7-form:not(.halio-form) input[type=\"submit\"], form.form:not(.halio-form) input[type=\"submit\"], form.comment-form:not(.halio-form) input[type=\"submit\"], form:not(.halio-form) input[type=\"submit\"],
nav.navbar #navbar ul.navbar-nav ul.children li:hover,
nav.navbar #navbar ul.navbar-nav ul.sub-menu li:hover,
.woocommerce span.onsale, .woocommerce ul.products li.product .onsale, .woocommerce-page ul.products li.product .onsale,
.woocommerce #payment #place_order, .woocommerce-page #payment #place_order,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
.woocommerce div.product form.cart .button,
.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,
.woocommerce button.button,
.woocommerce a.button,
.button,
.fw-btn, input[type=\"submit\"], .btn, .wp-searchform input[type=\"submit\"], form.post-password-form input[type=\"submit\"], form.search-form input[type=\"submit\"], form.wpcf7-form input[type=\"submit\"], form.form input[type=\"submit\"], form.comment-form input[type=\"submit\"], form input[type=\"submit\"]
.progressBar .bar div,
.slider-zoom .slider-inner form a:hover,
.slider-zoom .slider-inner form a.active,
.bg-color-theme_color.vc_section,
.bg-color-theme_color.vc_column_container .vc_column-inner,
.bg-color-theme_color h2,
.top-bar,
.testimonials-slider .arrow-left,.testimonials-slider .arrow-right,
.homepage-block-1,
.homepage-block-2,
.homepage-block-yellow-3,
.partners-block,
.widget-area aside.widget_calendar #today:before,
.slider-inner .swiper-pagination .swiper-pagination-bullet,
.fw-btn:hover,.taxi-form-full,
.btn.btn-default-bordered:hover,
.header-rounded > *,
.paging-navigation .prev.prev::before, .page-numbers .prev.prev::before, .paging-navigation .next.prev::before, .page-numbers .next.prev::before, .paging-navigation .prev.next::after, .page-numbers .prev.next::after, .paging-navigation .next.next::after, .page-numbers .next.next::after,
.alert.alert-important,
.block-icon.icon-top a, .block-icon.icon-top span,
.block-icon.icon-ht-right a, .block-icon.icon-ht-right span,
.tagcloud a, .tags a,
.woocommerce div.product .woocommerce-tabs ul.tabs li,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.grid-item:nth-child(1),
.grid-item:nth-child(3),
.grid-item:nth-child(5)
{ background-color: {$css['main_color']}; }

.vc_progress_bar .vc_single_bar .vc_bar,
.comment-text table thead th, .text-page table thead th,
.form-taxi-short form,
.vc_tta-tabs:not(.vc_tta-style-flat) .vc_tta-tabs-list .vc_tta-tab:not(.vc_active) a,
.social-big li a:hover,
.social-big li .fa-facebook,
.vc_message_box.vc_color-warning,.alert.vc_color-warning
{ background-color: {$css['main_color']} !important; }
.fw-btn:hover,
input[type=\"submit\"]:hover,
.btn:hover,
.wp-searchform input[type=\"submit\"]:hover,
form.post-password-form input[type=\"submit\"]:hover,
form.search-form input[type=\"submit\"]:hover,
form.wpcf7-form input[type=\"submit\"]:hover,
form.form input[type=\"submit\"]:hover,
form.comment-form input[type=\"submit\"]:hover,
form input[type=\"submit\"]:hover,
.fw-btn.btn-black-bordered:hover,
input[type=\"submit\"].btn-black-bordered:hover,
.btn.btn-black-bordered:hover,
.wp-searchform input[type=\"submit\"].btn-black-bordered:hover,
form.post-password-form input[type=\"submit\"].btn-black-bordered:hover,
form.search-form input[type=\"submit\"].btn-black-bordered:hover,
form.wpcf7-form input[type=\"submit\"].btn-black-bordered:hover,
form.form input[type=\"submit\"].btn-black-bordered:hover,
form.comment-form input[type=\"submit\"].btn-black-bordered:hover,
form input[type=\"submit\"].btn-black-bordered:hover,
.fw-btn.btn-black,
input[type=\"submit\"].btn-black,
.btn.btn-black,
.wp-searchform input[type=\"submit\"].btn-black,
form.post-password-form input[type=\"submit\"].btn-black,
form.search-form input[type=\"submit\"].btn-black,
form.wpcf7-form input[type=\"submit\"].btn-black,
form.form input[type=\"submit\"].btn-black,
form.comment-form input[type=\"submit\"].btn-black,
form input[type=\"submit\"].btn-black,
.bg-color-black.vc_section,
.bg-color-black.vc_column_container .vc_column-inner,
.bg-tone-dark.vc_section,
.bg-tone-dark.vc_column_container .vc_column-inner,
nav.navbar #navbar .navbar-toggle:active .icon-bar,  nav.navbar #navbar .navbar-toggle:hover .icon-bar,
.testimonials-slider .arrow-left:not(.swiper-button-disabled):hover,.testimonials-slider .arrow-right:not(.swiper-button-disabled):hover,
.slider-inner .swiper-pagination .swiper-pagination-bullet-active,
a.video,
.vc_message_box.vc_color-info,.alert.vc_color-info,
form.comment-form input[type=\"submit\"]:hover,form input[type=\"submit\"]:hover,
form.comment-form input[type=\"submit\"].btn-yellow:hover,form input[type=\"submit\"].btn-yellow:hover,
form.comment-form input[type=\"submit\"].btn-red:hover,form input[type=\"submit\"].btn-red:hover,
form input[type=\"submit\"].btn-black,
.fw-btn.btn-black:hover,form.comment-form input[type=\"submit\"].btn-black-bordered:hover,form input[type=\"submit\"].btn-black-bordered:hover,
.taxi-form-full input[type=\"submit\"]:hover,
.form-taxi-short .wpcf7-submit,
.grid-item:nth-child(2),
.grid-item:nth-child(4),
.grid-item:nth-child(6)
{ background-color: {$css['secondary_color']}; }

.form-taxi-short .wpcf7-submit,
.vc_message_box.vc_color-info, .alert.vc_color-info
{ background-color: {$css['secondary_color']} !important; }


nav.navbar {
  background: rgba({$css_rgb['secondary_color'][0]}, {$css_rgb['secondary_color'][1]}, {$css_rgb['secondary_color'][2]}, 0.6);
}

nav.navbar.dark {
  background: rgba({$css_rgb['secondary_color'][0]}, {$css_rgb['secondary_color'][1]}, {$css_rgb['secondary_color'][2]}, 0.94);
}

.navbar-dark-transparent .navbar {
  background: rgba({$css_rgb['secondary_color'][0]}, {$css_rgb['secondary_color'][1]}, {$css_rgb['secondary_color'][2]}, 0.2);
}

.navbar-dark-transparent .navbar.dark {
  background: rgba({$css_rgb['secondary_color'][0]}, {$css_rgb['secondary_color'][1]}, {$css_rgb['secondary_color'][2]}, 0.85);
}

.navbar-gray-yellow-transparent .navbar #navbar,
.vc_tta-tabs.vc_tta-style-flat .vc_tta-tabs-list .vc_active a span,
nav.navbar #navbar ul.navbar-nav > li > a span:after,
nav.navbar #navbar ul.navbar-nav > li > a span:before,
blockquote, .comment-text blockquote, .text-page blockquote,
form textarea:focus,
form input[type=\"search\"]:focus,
form input[type=\"email\"]:focus,
form input[type=\"text\"]:focus,
.tariff-item.vip,
.footer-widget-area .null-instagram-feed .instagram-pics a img:hover,
.tags a:hover,
.tags a,
.tagcloud a,
.btn.btn-default-bordered,
.btn.btn-default-bordered.btn-xs
{ border-color: {$css['main_color']}; }

.fw-btn.btn-black-bordered,
input[type=\"submit\"].btn-black-bordered,
.btn.btn-black-bordered,
.wp-searchform input[type=\"submit\"].btn-black-bordered,
form.post-password-form input[type=\"submit\"].btn-black-bordered,
form.search-form input[type=\"submit\"].btn-black-bordered,
form.wpcf7-form input[type=\"submit\"].btn-black-bordered,
form.form input[type=\"submit\"].btn-black-bordered,
form.comment-form input[type=\"submit\"].btn-black-bordered,
form input[type=\"submit\"].btn-black-bordered,
.fw-btn.btn-black-bordered.btn-xs,
input[type=\"submit\"].btn-black-bordered.btn-xs,
.btn.btn-black-bordered.btn-xs,
.wp-searchform input[type=\"submit\"].btn-black-bordered.btn-xs,
form.post-password-form input[type=\"submit\"].btn-black-bordered.btn-xs,
form.search-form input[type=\"submit\"].btn-black-bordered.btn-xs,
form.wpcf7-form input[type=\"submit\"].btn-black-bordered.btn-xs,
form.form input[type=\"submit\"].btn-black-bordered.btn-xs,
form.comment-form input[type=\"submit\"].btn-black-bordered.btn-xs,
form input[type=\"submit\"].btn-black-bordered.btn-xs
{ border-color: {$css['secondary_color']}; }

.tariff-item.vip:after
{ border-color: transparent {$css['main_color']} transparent; }

@media (max-width: 991px) { .download-block .mob .vc_column-inner { background-color: {$css['main_color']} !important; } }


.bg-tone-dark,
.homepage-block-1 h4,
.download-block
{ color: {$css['gray_lighter_color']}; }

.wp-searchform, form.post-password-form, form.search-form, form.wpcf7-form, form.form, form.comment-form, form,
.testimonials-block, .testimonials,
.homepage-block-yellow-3 .fa,
.slider-zoom .slider-inner,
.comment-text table td,
.text-page table td,
.text-page table tbody th,
.comments-area .comment-list li .comment-single,
form.comment-form,
form,
.widget-area,
.banners-block,
.testimonials,
.bg-color-gray .vc_column-inner,
.progressBar .bar
{ background-color: {$css['gray_lighter_color']}; }


.vc_tta-tabs .vc_tta-tabs-list .vc_active a
{ background-color: {$css['gray_lighter_color']} !important; }

.vc_message_box.vc_color-danger .fa,
.alert.vc_color-danger .fa,
.menu-types a.red
{ color: {$css['red_color']}; }

nav.navbar .cart .count
{ background-color: {$css['red_color']}; }

.taxi-form-full input[type=\"submit\"],
.fw-btn.btn-red,
input[type=\"submit\"].btn-red,
.btn.btn-red,
.wp-searchform input[type=\"submit\"].btn-red,
form.post-password-form input[type=\"submit\"].btn-red,
form.search-form input[type=\"submit\"].btn-red,
form.wpcf7-form input[type=\"submit\"].btn-red,
form.form input[type=\"submit\"].btn-red,
form.comment-form input[type=\"submit\"].btn-red,
form input[type=\"submit\"].btn-red
{ background-color: {$css['red_color']} !important; }


form textarea.wpcf7-not-valid,
form input[type=\"search\"].wpcf7-not-valid,
form input[type=\"email\"].wpcf7-not-valid,
form input[type=\"text\"].wpcf7-not-valid
{ border-color: {$css['red_color']} !important; }

.white,
header.page-header h1,
nav.navbar #navbar ul.navbar-nav ul.children ul a:hover,  nav.navbar #navbar ul.navbar-nav ul.sub-menu ul a:hover,
nav.navbar #navbar ul.navbar-nav ul.children ul ul,
nav.navbar ul.navbar-nav > li.menu-item-has-children:after,
.homepage-block-2 .large-image-center .dialog .fa,
.download-block h2,
.testimonials-slider .arrow-left,.testimonials-slider .arrow-right,
.testimonials-slider .arrow-right:not(.swiper-button-disabled):hover,
.partners-block h2,
.partners-block img,
footer a:hover,
footer .go-top,
.vc_message_box.vc_color-info .fa,.alert.vc_color-info .fa,
.social-small a:hover,
.social-small.social-yellow a,
.social-small.social-yellow a:hover,
.social-big,
.social-big li a,
form.comment-form input[type=\"submit\"].btn-yellow.btn-white,form input[type=\"submit\"].btn-yellow.btn-white,
.fw-btn.btn-yellow:hover,form.comment-form input[type=\"submit\"].btn-red,form input[type=\"submit\"].btn-red,
form.comment-form input[type=\"submit\"].btn-black:hover,form input[type=\"submit\"].btn-black:hover,
.fw-btn.btn-black.btn-white,form.comment-form input[type=\"submit\"].btn-black.btn-white,form input[type=\"submit\"].btn-black.btn-white,
.fw-btn.btn-black.btn-white:hover,.taxi-form-full input[type=\"submit\"],
.form-taxi-short .wpcf7-submit:hover,
.comment-text table thead th a,.text-page table thead th a,
.paging-navigation .prev.prev:before,.page-numbers .prev.prev:before,.paging-navigation .next.prev:before,.page-numbers .next.prev:before,.paging-navigation .prev.next:after,.page-numbers .prev.next:after,.paging-navigation .next.next:after,.page-numbers .next.next:after
{ color: {$css['white_color']}; }

@media (max-width: 1199px) {

	nav.navbar #navbar ul.navbar-nav ul.sub-menu li.current_page_item > a,
	nav.navbar #navbar ul.navbar-nav .current_page_item > a,
	nav.navbar ul.navbar-nav li.current_page_parent > a,  nav.navbar ul.navbar-nav li.current_page_item > a,
	nav.navbar ul.navbar-nav li.current-menu-ancestor ul li.current-menu-ancestor a,  nav.navbar ul.navbar-nav li.current_page_parent ul li.current_page_item a,  nav.navbar ul.navbar-nav li.current_page_item ul li.current_page_item a
	{ color: {$css['white_color']} ; }
}

@media (max-width: 1199px) {

	nav.navbar ul.navbar-nav ul,
	nav.navbar #navbar,
	nav.navbar ul.navbar-nav
	{ background: {$css['main_color']}; }
}

#block-footer .social-small a:hover,
.bg-color-black h1, .bg-tone-dark h1, .bg-color-black h2, .bg-tone-dark h2, .bg-color-black h3, .bg-tone-dark h3
{ color: {$css['white_color']} !important; }


form.comment-form input[type=\"submit\"].btn-yellow.btn-bg-dark:hover,
form input[type=\"submit\"].btn-yellow.btn-bg-dark:hover,
form textarea,
form input[type=\"search\"],
form input[type=\"email\"],
form input[type=\"text\"]
{ background-color: {$css['white_color']}; }

nav.navbar .navbar-toggle .icon-bar,
nav.navbar #navbar .navbar-toggle .icon-bar,
.tariff-item,
.testimonials-list .inner,
.form-taxi-short .menu-types a:hover,.form-taxi-short .menu-types a.active
{ background-color: {$css['white_color']} !important; }

@media (min-width: 1200px) {
	nav.navbar #navbar ul.navbar-nav ul.children,
	nav.navbar #navbar ul.navbar-nav ul.sub-menu
	{ background-color: {$css['white_color']}; }	
}


.homepage-block-2 .wpcf7-submit:hover
{ background-color: {$css['white_color']} !important; }

body {

	background-color: {$css['bg_color']};
}

#block-footer {
	background-color: {$css['block_footer_bg']};
}

footer {
	background-color: {$css['footer_bg']};
}

header.page-header .breadcrumbs li a,
#block-footer,
#block-footer .social-icons-list a:hover,
#block-footer .address li a,
#block-footer .widget_nav_menu ul li a,
.block-descr .date,
.vc_tta-accordion .vc_tta-panel-body,
.wpcf7-form-control-wrap.to.phone:after,
.wpcf7-form-control-wrap.phone.phone:after,
.wpcf7-form-control-wrap.date.phone:after,
.wpcf7-form-control-wrap.cartype.phone:after,
.wpcf7-form-control-wrap.address.phone:after,
.wpcf7-form-control-wrap.to:after,
.wpcf7-form-control-wrap.phone:after,
.wpcf7-form-control-wrap.date:after,
.wpcf7-form-control-wrap.cartype:after,
.wpcf7-form-control-wrap.address:after,
#block-footer .social-icons-list a
{ color: {$css['gray_color']} !important; }


@media (min-width: 1200px) {

    nav.navbar #navbar ul.navbar-nav > li.menu-item-has-children:not(.current-menu-parent):not(.current_page_item):not(:hover) > a::after,
	nav.navbar #navbar ul.navbar-nav a
	{ color: {$css['menu_color']}; }
}

@media (min-width: 1200px) {

	nav.navbar #navbar ul.navbar-nav a:hover,
	nav.navbar #navbar ul.navbar-nav > li.menu-item-has-children:hover > a::after,
	nav.navbar #navbar ul.navbar-nav ul.sub-menu li.current_page_item > a
	{ color: {$css['main_color']}; }		

	nav.navbar #navbar ul.navbar-nav ul.sub-menu li.current_page_item > a:hover
	{ color: {$css['white_color']}; }		
}

body.admin-bar #adminbarsearch { background-color: transparent !important;}
";

	$theme_style = str_replace( array( "\n", "\r" ), '', $theme_style );

	return $theme_style;

	}
}

