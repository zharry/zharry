			<hr/>
			<div>
				<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
				<div id="footer-widgets" class="widget-area">
					<ul class="xoxo">
						<?php dynamic_sidebar( 'footer-widget-area' ); ?>
					</ul>
				</div>
				<?php endif; ?>
			</div>
			<div id="copyright" class="row">
				<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'blankslate' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?>
				&nbsp;<a href="#" style="text-decoration: none;">(To Top)</a>
			</div>
		</div>
		<script src="<?php echo get_bloginfo( 'template_directory' ); ?>/script.js"></script>
		<script src="<?php echo get_bloginfo( 'template_directory' ); ?>/src/jquery.js"></script>
		<script src="<?php echo get_bloginfo( 'template_directory' ); ?>/src/bootstrap.min.js"></script>
		
		<?php wp_footer(); ?>
	</body>
</html>