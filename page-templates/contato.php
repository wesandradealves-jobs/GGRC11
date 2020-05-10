<?php /* Template Name: Contato */ ?>



<?php get_header(); ?>

	<?php if ( have_posts () ) : while (have_posts()) : the_post(); ?>

        <section class="contato">

          <div class="container">

            <form action="<?php the_permalink(); ?>" method="GET" class="form">

              <h2 class="section-title">Contato</h2>

              <p>Utilize o formulário abaixo para entrar em contato com nossa equipe</p>

              <span class="form-group">

                <label for="Nome">Nome</label>

                <input tabindex="1" name="Nome" type="text" placeholder="Seu nome">

              </span>

              <span class="form-group">

                <label for="Email">E-mail</label>

                <input tabindex="2" name="Email" type="text" placeholder="Seu e-mail">

              </span>

              <span class="form-group">

                <label for="Telefone">Telefone</label>

                <input tabindex="3" name="Telefone" type="text" placeholder="Seu telefone">

              </span>

              <span class="form-group">

                <label for="Assunto">Assunto</label>

                <ul class="input-list">
                  <li>
                    <div class="custom-input">
                      <input checked="checked" type="radio" name="Assunto" value="Equipe de relacionamento com investidores">
                      <label for="Assunto">
                        Equipe de relacionamento com investidores
                      </label>
                    </div>
                  </li>
                  <li>
                    <div class="custom-input">
                      <input type="radio" name="Assunto" value="Ouvidoria">
                      <label for="Assunto">
                        Ouvidoria
                      </label>
                    </div>
                  </li>
                </ul>

                <!-- <input tabindex="4" name="Assunto" type="text" placeholder="Digite um assunto"> -->

              </span>

              <span class="form-group">

                <label for="Mensagem">Mensagem</label>

                <textarea tabindex="5" name="Mensagem" placeholder="Sua mensagem" name="" id="" cols="30" rows="10"></textarea>

              </span>

              <div class="form-group">

                <button class="btn btn-3">Enviar</button>

              </div>

            </form>

            <aside class="sidebar">

              <h2 class="section-title">Gestora</h2>

              <p>

               	<?php echo get_bloginfo('description'); ?>



                <br/><br/>

                <strong>Supernova Capital</strong>

                <br/><br/>

                <?php echo get_theme_mod('endereco'); ?>



                <?php echo get_theme_mod('telefone'); ?><br/>



                <a href="mailto:<?php echo get_theme_mod('email'); ?>"><?php echo get_theme_mod('email'); ?></a><br/>



                <a href="<?php echo home_url(); ?>"><?php echo home_url(); ?></a>                 

              </p>

              <?php if(get_theme_mod('instagram') || get_theme_mod('twitter') || get_theme_mod('linkedin')) : ?>

              <ul class="social">

                <?php if(get_theme_mod('instagram')) : ?>

                <li>

                  <a target="_blank" href="<?php echo get_theme_mod('instagram'); ?>" class="instagram"><i class="fab fa-instagram-square"></i></a>

                </li>

                <?php endif; ?>

                <?php if(get_theme_mod('twitter')) : ?>

                <li>

                  <a target="_blank" href="<?php echo get_theme_mod('twitter'); ?>" class="twitter"><i class="fab fa-twitter"></i></a>

                </li>

                <?php endif; ?>

                <?php if(get_theme_mod('linkedin')) : ?>

                <li>

                  <a target="_blank" href="<?php echo get_theme_mod('linkedin'); ?>" class="linkedin"><i class="fab fa-linkedin"></i></a>

                </li>

                <?php endif; ?>

              </ul>

              <?php endif; ?>

            </aside>

          </div>

        </section>

	<?php endwhile; endif; ?>	

<?php get_footer(); ?>

