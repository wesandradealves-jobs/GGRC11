<?php /* Template Name: Home */ ?>

<?php get_header(); ?>
	<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
		<?php if(get_field('banner')) : ?>
		    <section class="banner">
		      <div class="container">
		        <div>
		          <h2>
		          	<?php if(get_field('banner_small_text')) : ?>
			            <small><?php echo get_field('banner_small_text'); ?></small>
			        <?php endif; ?>
			        
		            <?php echo get_field('banner_titulo'); ?>
		          </h2>
		          <h3><?php echo get_field('banner_subtitulo'); ?></h3>
		        </div>
		      </div>
		    </section>
		<?php endif; ?>
	<?php endwhile; endif; ?>	
<?php get_footer(); ?>
