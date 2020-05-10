<?php /* Template Name: Políticas de Investimento */ ?>

<?php get_header(); ?>
	<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>
        <section class="politica-de-investimentos">
          <!--  -->
          <div class="container content">
            <div class="active">
              <h2 class="section-title">Política de Investimento</h2>
              <?php the_content(); ?>
            </div>
            <div>
              <h2 class="section-title">Características do Fundo</h2>
              <?php the_field('caracteristicas_do_fundo'); ?>          
            </div>            
          </div>
        </section>    
	<?php endwhile; endif; ?>	
<?php get_footer(); ?>
