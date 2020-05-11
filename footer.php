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

                <a id="register" href="javascript:void(0)" onclick="Util._newsletter(this)" class="btn btn-3">Cadastrar</a>

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

        <a href="javascript:void(0)" onclick="Util._closeModal()">Prosseguir para o site GGRC11 >></a>

        <style>.sp-force-hide { display: none;}.sp-form[sp-id="132472"] { display: block; background: #ffffff; padding: 15px; width: 450px; max-width: 100%; border-radius: 8px; -moz-border-radius: 8px; -webkit-border-radius: 8px; font-family: Arial, "Helvetica Neue", sans-serif; background-repeat: no-repeat; background-position: center; background-size: auto;}.sp-form[sp-id="132472"] input[type="checkbox"] { display: inline-block; opacity: 1; visibility: visible;}.sp-form[sp-id="132472"] .sp-form-fields-wrapper { margin: 0 auto; width: 420px;}.sp-form[sp-id="132472"] .sp-form-control { background: #ffffff; border-color: #cccccc; border-style: solid; border-width: 1px; font-size: 15px; padding-left: 8.75px; padding-right: 8.75px; border-radius: 4px; -moz-border-radius: 4px; -webkit-border-radius: 4px; height: 35px; width: 100%;}.sp-form[sp-id="132472"] .sp-field label { color: #444444; font-size: 13px; font-style: normal; font-weight: bold;}.sp-form[sp-id="132472"] .sp-button { border-radius: 4px; -moz-border-radius: 4px; -webkit-border-radius: 4px; background-color: #8A3721; color: #ffffff; width: auto; font-weight: 700; font-style: normal; font-family: Arial, sans-serif; box-shadow: none; -moz-box-shadow: none; -webkit-box-shadow: none;}.sp-form[sp-id="132472"] .sp-button-container { text-align: left;}</style>
        <div class="sp-form-outer">
          <div id="sp-form-132472" class="sp-form sp-form-regular sp-form-embed">
            <div class="sp-form-fields-wrapper">
              <div class="sp-message">
                <div></div>
              </div>
              <form class="sp-element-container ui-sortable ui-droppable " novalidate="" class="form">
                <h2 class="section-title">Newsletter</h2>
                <p>Receba todos os documentos e comunicados em primeira mão no seu e-mail.</p>

                <span class="sp-field form-group"><label class="sp-control-label">Nome</label><input class="sp-form-control " name="sform[Tm9tZQ==]" type="text" placeholder="Seu nome" /></span>
                <span class="sp-field form-group"><label class="sp-control-label">E-mail<strong>*</strong></label><input class="sp-form-control " name="sform[email]" required="required" type="email" placeholder="Seu e-mail" /></span>
                <button id="sp-9b454c18-58b7-40ed-802b-d269c4a942e5" class="sp-button btn btn-3">Cadastrar </button>
                <!-- <div class="sp-field sp-button-container "><button id="sp-9b454c18-58b7-40ed-802b-d269c4a942e5" class="sp-button">Cadastrar </button></div> -->
              </form>
              <div class="sp-link-wrapper sp-brandname__left"></div>
            </div>
          </div>
        </div>
        <script type="text/javascript" src="//static-login.sendpulse.com/apps/fc3/build/default-handler.js?1563881343353"></script>

<!--         <form action="<?php the_permalink(); ?>" method="GET" class="form">

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

        </form> -->

      </div>

    </div>  

    <script>
      function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
      }      

      function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
      }      

      function hash(length) {
         var result           = '';
         var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
         var charactersLength = characters.length;
         for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
         }
         return result;
      }

      function checkCookie() {
        var token = getCookie("token");

        if (token != "") {
          console.log('Seu token é: ' + token);
        } else {
          setCookie("token", hash(60), 365);
          document.getElementById("newsletter").classList.add('toggle','firstAccess');
        }
      }    

      checkCookie();  
    </script>  

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

    <script src="//static-login.sendpulse.com/apps/fc3/build/loader.js" sp-form-id="f72356ad5f6845a48ba3d54cec11608f5a8f059c60fcbc08175b8303d986daa3"></script>

  </body>

</html>