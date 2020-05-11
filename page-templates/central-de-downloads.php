<?php /* Template Name: Central de Downloads */ ?>



<?php get_header(); ?>

	<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>

        <section class="downloads">

          <div class="downloads-header">

            <div class="container">

              <form action="<?php the_permalink(); ?>" method="GET">

                <h2 class="section-title">Central de Downloads</h2>

                <div>

                  <input id="filtro" type="text" name="keyword" placeholder="Busca por Documentos">

                  <button class="btn btn-1"><span>Buscar</span> <i class="fas fa-search"></i></button>

                  <?php if(isset($_GET['sort'])) : ?>

                    <input type="hidden" name="sort" value="<?php echo $_GET['sort'];  ?>">

                  <?php endif; ?>

                  <?php if(isset($_GET['cat'])) : ?>

                    <input type="hidden" name="cat" value="<?php echo $_GET['cat'];  ?>">

                  <?php endif; ?>                  

                </div>

              </form>

            </div>

          </div>

          <div class="downloads-content">

            <div class="container">

			        <?php get_sidebar('downloads'); ?>

              <div class="content">

                <div class="filtro">

                  <?php 
                      $filter = '';

                      $terms = get_terms([

                          'taxonomy' => 'downloads_categories',

                          'hide_empty' => false,

                      ]);

                      foreach ($terms as $key => $value) {
                        if(isset($_GET['cat']) && $value->slug === $_GET['cat']) {
                          $filter = $value->name;
                        }
                      }
                  ?>

                  <p><strong>Filtro</strong> <span><?php echo $filter; ?></span></p>

                  <form class="filter" action="<?php the_permalink(); ?>" method="GET">

                    <strong>Ordernar por</strong>

                    <span class="select">

                      <select id="sort">

                        <option <?php if(!isset($_GET['sort']) || $_GET['sort'] === 'DESC') : ?> selected <?php endif; ?> value="DESC">Mais recente</option>

                        <option <?php if(isset($_GET['sort']) && $_GET['sort'] === 'ASC') : ?> selected <?php endif; ?> value="ASC">Mais antigo</option>

                      </select>                    

                      <i class="fas fa-angle-down"></i>

                    </span>

                    <input type="hidden" name="sort" value="<?php echo !isset($_GET['sort']) ? 'DESC' : $_GET['sort'];  ?>">



                    <?php if(isset($_GET['keyword'])) : ?>

                      <input type="hidden" name="keyword" value="<?php echo $_GET['keyword']; ?>">

                    <?php endif; ?>

                    <?php if(isset($_GET['cat'])) : ?>

                      <input type="hidden" name="cat" value="<?php echo $_GET['cat'];  ?>">

                    <?php endif; ?>                      

                  </form>

                </div>

                <div class="results">

                  <ul>

                   <?php 

                      $tax[] = array(

                            array (

                                'taxonomy' => 'downloads_categories',

                                'field' => 'slug',

                                'terms' => isset($_GET['cat']) ? $_GET['cat'] : '',

                            )

                      );



                      $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';



                      $args = array(

                        'post_type' => array( 'downloads' ),

                        'posts_per_page' => -1,

                        'order' => (!isset($_GET['sort'])) ? 'DESC' : $_GET['sort'],

                        'tax_query' => (isset($_GET['cat'])) ? $tax : '',

                        'extend_where' => "(post_title like '%".$keyword."%')"

                      );

                      

                      $downloads = new WP_Query( $args );



                      if($downloads->post_count) : 

                        while ($downloads->have_posts()) : $downloads->the_post(); 

                    ?>                     

                    <li>

                      <h4>

                        <small><?php echo get_the_date(); ?></small>

                        <?php the_title(); ?>

                      </h4>

                      <a class="btn btn-2" href="<?php echo get_field('arquivo'); ?>" download><i class="fas fa-cloud-download-alt"></i> <Span>Download</Span></a>

                    </li>

                    <?php 

                        endwhile; 

                      else :

                        ?>

                          <li>Nenhum download encontrado.</li>

                        <?php  

                      endif;

                      wp_reset_query();

                      wp_reset_postdata();  

                    ?>

                  </ul>

                </div>

              </div>              

            </div>

          </div>

        </section>     		

	<?php endwhile; endif; ?>	

<?php get_footer(); ?>

