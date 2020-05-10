</main>

    <?php if(is_front_page()) : ?>

      <footer id="footer" class="footer">

        <div class="container">

          <?php 

            $args = array(

              'post_type' => array( 'downloads' ),

              'posts_per_page' => 1,

              'order' => 'DESC',

              'orderby' => 'menu_order'

            );

            $downloads = new WP_Query( $args );

            if($downloads->post_count) :   

              while ($downloads->have_posts()) : $downloads->the_post();           

          ?>

            <div class="file-download">

              <i class="fas fa-file-download"></i>

              <a download target="_self" href="<?php echo get_field('arquivo'); ?>"><?php echo get_the_title(); ?> <small>BAIXAR DOCUMENTO</small></a>

            </div>

          <?php endwhile;

          wp_reset_query();

          wp_reset_postdata();            

          endif; ?>          

        </div>

      </footer>

    <?php endif; ?>    

    </div> 

    <?php if(!is_front_page()) : ?>

      <footer 

        id="footer" 

        class="footer" 

        style="background-image: url(<?php echo (get_theme_mod('fundo')) ? get_theme_mod('fundo') : ''; ?>);">



        <div class="container">

            <div class="footer-top">

              <picture class="logo">

                <img onclick="document.location='<?php echo home_url(); ?>';return false;" src="<?php echo get_theme_mod('logo'); ?>" alt="Supernova Capital">

                <p>

                  <?php echo get_bloginfo('description'); ?>

                </p>

              </picture>

              <nav>

                <strong>Links Úteis</strong>

                <ul>

                  <?php 

                    wp_nav_menu( array( 'container' => false, 'menu' => 'header', 'items_wrap' => '%3$s', 'container_class'=>'' ) ); 

                  ?>  

                </ul>

              </nav>

              <div>

                <strong>Newsletter</strong>

                <a href="javascript:void(0)" onclick="Util._newsletter(this)" class="btn btn-3">Cadastrar</a>

              </div>

              <div>

                <picture>

                  <img src="https://supernovacapital.com.br/newsletter/como-investir.jpg" alt="">

                  <img src="https://ggrc11.com.br/wp-content/uploads/2019/07/anbima.png" alt="">

                </picture>

              </div>

            </div>

            <p>

              <?php echo get_theme_mod('texto'); ?>

            </p>

            <p class="copyright">

              Supernova Capital <?php echo date('Y'); ?> Todos os direitos reservados.

            </p>

        </div>

      </footer>

    <?php endif; ?>

    <?php if(is_front_page() && get_field('video')) : ?>

      <div id="bg">

        <video muted autoplay loop>

          <source src="<?php echo get_field('video'); ?>" type="video/mp4">

          Your browser does not support the video tag.

        </video>      

      </div>

    <?php endif; ?>

	  <?php wp_footer(); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    <div id="newsletter" class="modal">

      <div class="modal-inner">

        <form action="<?php the_permalink(); ?>" method="GET" class="form">

          <h2 class="section-title">Newsletter</h2>

          <p>Receba todos os documentos e comunicados em primeira mão no seu e-mail</p>

          <span class="form-group">

            <label for="Nome">Nome</label>

            <input name="Nome" tabindex="1" type="text" placeholder="Seu nome">

          </span>

          <span class="form-group">

            <label for="Email">E-mail</label>

            <input name="Email" tabindex="2" type="text" placeholder="Seu e-mail">

          </span>

          <button class="btn btn-3">Enviar</button>

        </form>

      </div>

    </div>    

    <script>
      const nav = document.querySelector('#nav');
      const body = document.querySelector('body');
      const menu = document.querySelector('#menu');
      const menuToggle = document.querySelector('.nav__toggle');
      let isMenuOpen = false;


      // TOGGLE MENU ACTIVE STATE
      menuToggle.addEventListener('click', e => {
        e.preventDefault();
        isMenuOpen = !isMenuOpen;
        
        // toggle a11y attributes and active class
        menuToggle.setAttribute('aria-expanded', String(isMenuOpen));
        menu.hidden = !isMenuOpen;
        nav.classList.toggle('nav--open');
        body.classList.toggle('nav--open');
      });


      // TRAP TAB INSIDE NAV WHEN OPEN
      nav.addEventListener('keydown', e => {
        // abort if menu isn't open or modifier keys are pressed
        if (!isMenuOpen || e.ctrlKey || e.metaKey || e.altKey) {
          return;
        }
        
        // listen for tab press and move focus
        // if we're on either end of the navigation
        const menuLinks = menu.querySelectorAll('.nav__link');
        if (e.keyCode === 9) {
          if (e.shiftKey) {
            if (document.activeElement === menuLinks[0]) {
              menuToggle.focus();
              e.preventDefault();
            }
          } else if (document.activeElement === menuToggle) {
            menuLinks[0].focus();
            e.preventDefault();
          }
        }
      });
      
    </script>    

  </body>

</html>