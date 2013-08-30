<?php
/*
Template Name: Sample Template
Description: This template can be used as a guide for creating your own page templates. It still uses Skematik's templating engine for it's layout, but we have added a message box at the top of the page as well as custom action hooks before and after the content.
*/
?>
<?php get_header();?>
<?php do_action('before_sample_template');?>
	<div id="primary" class="site-content <?php skematik_content_span(); ?>">
		<div id="content" role="main">
		<?php if ( have_posts() ) : ?>
			<?php do_action( 'skematik_before_content_page' );?>
			<?php while ( have_posts() ) : the_post();?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<?php skematik_page_title();?>
					
					<div class="entry-content">
					  <?php skematik_single_thumbnail(800);?>
						<div class="alert">
						  <strong><?php _e( 'Sample Page Template!</strong> This sample page template has this nice little alert at the top AND if you add a featured image to it, it will appear at the top of the page.', 'skematik' );?>
						</div>
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'skematik' ), 'after' => '</div>' ) ); ?>
					</div><!-- /.entry-content -->
				
				</article><!-- /#post-<?php the_ID(); ?> -->
				
			<?php endwhile; // end of the loop. ?>
		<?php else : ?>
		<?php get_template_part( 'no-results', 'content' ); ?>
		<?php endif; ?>
		</div><!-- #content -->
	</div><!-- #primary .site-content -->
<?php do_action('after_sample_template');?>
<?php get_footer(); ?>