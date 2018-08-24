<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo( 'template_directory' ); ?>/src/bootstrap.min.css" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="navbar">
			<div id="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
					title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" 
					rel="home"><img id="logo-img" src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/Logo.png" alt="East Edmonton Mall Logo">
				</a>
			</div>
			<div id="menu-open" onclick="$('#menu').slideToggle();">
				&equiv;
			</div>
			<div id="menu">
				<?php wp_list_pages('&title_li=&sort_colum="ID"'); ?>
			</div>
		</div>
		
		<?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { ?>
			<div id="banner">
				<img class="bannerImg" width="100%" height="100%" src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/ice-palace.jpg" alt="Ice Palace at East Edmonton Mall">
				<img class="bannerImg" width="100%" height="100%" src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/bowling.jpg" alt="Bowling at East Edmonton Mall">
				<img class="bannerImg" width="100%" height="100%" src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/mall.jpg" alt="Visit the spectacular pirate ship">
				<img class="bannerImg" width="100%" height="100%" src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/mini-golf.jpg" alt="Play Mini Gold at the East Edmonton Mall">
				<div id="bannerIndicators">
					<div class="moveIndicator indicator" onclick="moveBanner(-1);">&lt;</div>
					<div class="bannerIndicator indicator" onclick="setBanner(0);"></div>
					<div class="bannerIndicator indicator" onclick="setBanner(1);"></div>
					<div class="bannerIndicator indicator" onclick="setBanner(2);"></div>
					<div class="bannerIndicator indicator" onclick="setBanner(3);"></div>
					<div class="moveIndicator indicator" onclick="moveBanner(1);">&gt;</div>
				</div>
				<div id="bannerText">
					<a class="bannerDesc" href="https://zharry.ca/projects/others/skills2018/canada/ModuleA/stores/">Attractions</a>
					<a class="bannerDesc" href="https://zharry.ca/projects/others/skills2018/canada/ModuleA/contact-us/">Contact Us</a>
					<a class="bannerDesc" href="https://zharry.ca/projects/others/skills2018/canada/ModuleA/2018/06/04/sea-life-caverns/">Sea Life Caverns</a>
					<a class="bannerDesc" href="https://zharry.ca/projects/others/skills2018/canada/ModuleA/2018/06/04/dragons-tale-blacklight-mini-golf-crystal-labyrinth-mirror-maze/">Dragon's Tale</a>
				</div>
			</div>
		<?php } else { ?>
			<div style="height: 12px"></div>
		<?php } ?>
		
		<div id="social">
			<a href="https://twitter.com" title="Follow Us On Twitter!">
				<img class="social-icon" src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/social/Twitter.png">
			</a>
			<a href="https://facebook.com" title="Find Us On Facebook!">
				<img class="social-icon" src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/social/Facebook.png">
			</a>
			<a href="https://instagram.com" title="Find Us On Instagram!">
				<img class="social-icon" src="<?php echo get_bloginfo( 'template_directory' ); ?>/img/social/Instagram.png">
			</a>
		</div>
		<div class="container"><hr style="margin-top: 0"/></div>
		
		<div id="body" class="container">