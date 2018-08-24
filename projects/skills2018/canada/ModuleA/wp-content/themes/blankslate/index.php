<?php get_header(); ?>

	<div class="row">
		<div class="col-lg-8" id="content">
			<h1 id="body-title">Recent Events and Attractions</h1>
			<section id="content" role="main">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'entry' ); ?>
				<?php comments_template(); ?>
				<?php endwhile; endif; ?>
				<?php get_template_part( 'nav', 'below' ); ?>
			</section>
			<hr id="breaker"/>
		</div>
		<div class="col-lg-4" id="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
	
<?php get_footer(); ?>