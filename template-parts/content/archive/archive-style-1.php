<?php atlast_business_breadcrumb(); ?>
<?php if ( have_posts() ): ?>
	<?php while ( have_posts() ): the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item archive-style-1'); ?>>

			<!-- Featured Image container -->
			<?php get_template_part('template-parts/content/content-elements/featured-image');?>
			<!-- Meta -->
			<?php get_template_part('template-parts/content/content-elements/meta');?>
			<!-- Blog Item Title -->
			<?php get_template_part('template-parts/content/content-elements/blog-item-title');?>

			<p><?php the_excerpt(); ?></p>

			<a href="<?php the_permalink(); ?>" class="read-more-link">
				<?php echo apply_filters('atlast_business_readmore_txt',esc_html__('Continue Reading','atlast-business')); ?>
			</a>

		</article>


	<?php endwhile; ?>
	<?php get_template_part('template-parts/content/content-elements/pagination/nav-below'); ?>
<?php endif; ?>