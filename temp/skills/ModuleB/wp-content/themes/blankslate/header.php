<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
		
		<link href="<?php echo get_bloginfo('template_directory'); ?>/lib/bootstrap.min.css" rel="stylesheet">
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="navbar">
			<div id="nav-home">
				<a  href="<?php echo esc_url( home_url( '/' ) ); ?>" 
					title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" 
					rel="home">
					<img id="nav-logo" src="<?php echo get_bloginfo('template_directory'); ?>/img/logo.png" height="100%" >
				</a>
			</div>
			<div id="nav-open" onclick="$('#nav-menu').slideToggle()">
				&equiv;
			</div>
			<div id="nav-menu">
				<?php wp_list_pages( '&title_li=' ); ?>
			</div>
		</div>
		
		<?php
			if ( is_front_page() || is_home() || is_front_page() && is_home() ) {
		?>
			<div id="banner">
				<img class="bannerImg" width="100%" height="100%" src="<?php echo get_bloginfo('template_directory'); ?>/img/img_nature_wide.jpg">
				<img class="bannerImg" width="100%" height="100%" src="<?php echo get_bloginfo('template_directory'); ?>/img/img_fjords_wide.jpg">
				<img class="bannerImg" width="100%" height="100%" src="<?php echo get_bloginfo('template_directory'); ?>/img/img_mountains_wide.jpg">
				<img class="bannerImg" width="100%" height="100%" src="<?php echo get_bloginfo('template_directory'); ?>/img/img_paris.jpg">
				<div id="bannerIndicators">
					<div id="dots">
						<div class="moveBanner bannerLeft" onclick="moveBanner(-1)">&lt;</div>
						<div class="bannerIndicator" onclick="setBanner(0)"></div>
						<div class="bannerIndicator" onclick="setBanner(1)"></div>
						<div class="bannerIndicator" onclick="setBanner(2)"></div>
						<div class="bannerIndicator" onclick="setBanner(3)"></div>
						<div class="moveBanner bannerRight" onclick="moveBanner(1)">&gt;</div>
					</div>
				</div>
			</div>
			<div id="md-social" class="div-center">
				FB, TW, IG			
			</div>
		<?php } ?>
		
		<div class="container" id="body">