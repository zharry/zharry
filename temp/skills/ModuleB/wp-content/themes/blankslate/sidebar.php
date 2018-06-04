<aside id="sidebar" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-widget-area' ) ) : ?>
		<div class="widget-area container">
			<ul id="sidebar-widgets">
				<li id="sidebar-social" class="widget-container widget_recent_entries">		
					<h3 class="widget-title">Social</h3>		
					<ul><li>
						<a href="https://facebook.com">FB</a>
						<a href="https://facebook.com">TW</a>
						<a href="https://facebook.com">IG</a>
					</li></ul>
				</li>
				<?php dynamic_sidebar( 'sidebar-widget-area' ); ?>
			</ul>
		</div>
	<?php endif; ?>
</aside>