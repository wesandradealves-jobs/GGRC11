<?php /* Template Name: Ativos Imobiliários */ ?>



<?php get_header(); ?>

	<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>

    <?php 

      $args = array(

        'post_type' => array( 'ativos-imobiliarios' ),

        'posts_per_page' => -1,

        'order' => 'DESC',

        'orderby' => 'menu_order'

      );

      $relatorios = new WP_Query( $args );

      if($relatorios->post_count) :   

    ?>    

    <section class="ativos-imobiliarios">

        <div class="container">

          <div>

            <h3>100% Contratos Atípicos</h3>

            <p>Selecione um Ativo para visualizar as informações</p>

            <div>

              <ul class="tab-nav">

              <?php 

                $i = 0;

                while ($relatorios->have_posts()) : 

                  $relatorios->the_post(); 

                  $i++;



                  if($i===1) {

                    $title = get_the_title();

                    $local = get_field('local');

                    $img = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full');

                    $aquisicao = get_field('valor_da_aquisicao');

                    $laudo = get_field('valor_do_laudo');

                    $aluguel_validade = get_field('validade_do_contrato_de_aluguel');

                    $aluguel_valor = get_field('valor_mensal_de_aluguel');

                    $rodape = get_field('rodape');

                    $thumbnail = get_field('thumbnail');

                  }

              ?>

                <li>

                  <a href="javascript:void(0)"

                    data-title="<?php echo get_the_title(); ?>"

                    data-locale="<?php echo get_field('local'); ?>"

                    data-maps="<?php echo get_field('maps'); ?>"

                    data-img="<?php echo (get_field('thumbnail')) ? get_field('thumbnail') : wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>"

                    data-aquisicao="<?php echo get_field('valor_da_aquisicao'); ?>"

                    data-laudo="<?php echo get_field('valor_do_laudo'); ?>"

                    data-aluguel-validade="<?php echo get_field('validade_do_contrato_de_aluguel'); ?>"

                    data-aluguel-valor="<?php echo get_field('valor_mensal_de_aluguel'); ?>"

                    data-reajuste="<?php echo get_field('rodape'); ?>">

                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>" alt="<?php echo get_the_title(); ?>">

                  </a>

                </li>

              <?php endwhile; ?>

              </ul>

            </div>

          </div>

          <div>

            <div class="tab-content">

              <div id="loader">
                <div class="loader">Loading...</div>
              </div>

              <h4 class="data-title"><?php echo $title; ?></h4>

              <h5><a class="data-maps" href="javascript:void(0)"><i class="fas fa-map-marker-alt"></i> <span class="data-locale"><?php echo $local; ?></span></a></h5>

              <img class="data-img" src="<?php echo ($thumbnail) ? $thumbnail : $img; ?>" alt="<?php echo $title; ?>">

              <ul>

                <li>

                  <span>Valor da Aquisição</span>

                  <span class="data-aquisicao"><?php echo $aquisicao; ?></span>

                </li>

                <li>

                  <span>Valor do Laudo</span>

                  <span class="data-laudo"><?php echo $laudo; ?></span>

                </li>

                <li>

                  <span>Validade do Contrato de Aluguel</span>

                  <span class="data-aluguel-validade"><?php echo $aluguel_validade; ?></span>

                </li>

                <li>

                  <span>Valor Mensal de Aluguel</span>

                  <span class="data-aluguel-valor"><?php echo $aluguel_valor; ?></span>

                </li>

              </ul>

              <p class="data-reajuste"><?php echo $rodape; ?></p>

              <a class="close-modal" href="javascript:void(0)" onclick="Util._closeModal(this)"><i class="fas fa-reply"></i> Ver Todos</a>

            </div>

          </div>

        </div>

      </section>

    <?php endif; ?>

	<?php endwhile; endif; ?>	

<?php get_footer(); ?>

