		</div>
		<div id="footer">
			<div id="footer-content">
				<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
					<div class="widget-area container">
						<ul class="row" id="footer-widget-row">
							<?php dynamic_sidebar( 'footer-widget-area' ); ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
			<div class="container" id="copyright">
				<div class="row">
					<div class="col-md-12">
						<p class="text-center">
							<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'blankslate' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); echo sprintf( __( ' Theme By: %1$s.', 'blankslate' ), '<a href="http://tidythemes.com/">TidyThemes</a>' ); ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo get_bloginfo('template_directory'); ?>/lib/jquery.min.js"></script>
		<script src="<?php echo get_bloginfo('template_directory'); ?>/lib/bootstrap.min.js"></script>
		<script>
			// Footer Alignment
			var footerElems = document.getElementById("footer-widget-row").children;
			for (i = 0; i < footerElems.length; i++) {
				footerElems[i].classList.add("col-sm-4");
				footerElems[i].classList.add("text-center");
			}
			
			// Search Styling
			var searchForm = document.getElementById("searchform").children[0];
			searchForm.classList.add("form-inline");
			searchForm.children[1].classList.add("form-control");
			searchForm.children[2].classList.add("btn");
			searchForm.children[2].classList.add("btn-primary");
			
			// Rotating Banner
			<?php
				if ( is_front_page() || is_home() || is_front_page() && is_home() ) {
			?>
			var banners = document.getElementsByClassName("bannerImg");
			var bannerIndicators = document.getElementsByClassName("bannerIndicator");
			var currentBanner = 0;
			setBanner(currentBanner);
			function moveBanner(amount) {
				currentBanner += amount;
				displayBanner(currentBanner);
			}
			function setBanner(bannerID) {
				currentBanner = bannerID;
				displayBanner(currentBanner);
			}
			function displayBanner(curBanner) {
				if (curBanner > banners.length - 1) {
					currentBanner = 0;
				} else if (curBanner < 0) {
					currentBanner = banners.length - 1;
				}
				for (i = 0; i < banners.length; i++) {
					banners[i].style.display = "none";
					bannerIndicators[i].classList.remove("bannerIndicatorActive");
				}
				banners[currentBanner].style.display = "block";
				bannerIndicators[currentBanner].classList.add("bannerIndicatorActive");
			}
				<?php } ?>
		</script>
		<?php wp_footer(); ?>
	</body>
</html>