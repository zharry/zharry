<aside role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-widget-area' ) ) : ?>
	<div id="sidebar-widgets" class="widget-area">
		<ul class="xoxo">
			<?php dynamic_sidebar( 'sidebar-widget-area' ); ?>
		</ul>
	</div>
	<?php endif; ?>
</aside>