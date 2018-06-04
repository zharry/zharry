<?php get_header(); ?>

<div class="row">
	<div class="col-lg-8">
		<section id="content" role="main">
		Recent Events
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'entry' ); ?>
			<?php comments_template(); ?>
			<?php endwhile; endif; ?>
			<?php get_template_part( 'nav', 'below' ); ?>
		</section>
	</div>
	<div class="col-lg-4">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>