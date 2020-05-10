<!DOCTYPE html>

<html lang="<?php echo get_locale(); ?>" xmlns="http://www.w3.org/1999/xhtml">

  <head>

    <title><?php echo get_bloginfo('name').( (!is_front_page()) ? ' - '.get_the_title() : '' ); ?></title>

    <meta charset="<?php echo get_bloginfo('charset'); ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="author" content="Wesley Andrade - github.com/wesandradealves">

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <meta name="keywords" content=""> -->

    <meta property="og:type" content="website">

    <meta property="og:title" content="<?php echo get_bloginfo('name'); ?>">

    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>">

    <meta property="og:url" content="<?php echo home_url(); ?>">

    <meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>">

    <meta property="og:image" content="">

    <!-- <meta name="apple-mobile-web-app-capable" content="yes"> -->

    <meta name="HandheldFriendly" content="true">

    <link rel="canonical" href="<?php echo get_permalink(); ?>">

    <!-- <link rel="apple-touch-icon" href=""> -->

    <!-- <link rel="shortcut icon" type="image/png" href=""> -->

    <?php wp_head(); ?>

  </head>

    <body



      <?php



      if (is_front_page()) {



        echo 'class="pg-home"';



      } elseif(is_author()){



        echo 'class="pg-author pg-profile pg-interna"';



      } elseif(is_archive() || is_category() && !isset($_GET['s'])){



        echo 'class="pg-'.( (is_archive()) ? 'archive' : 'category' ).' pg-interna '.((get_queried_object()) ? 'pg-'.get_queried_object()->slug : '').' "';



      } elseif(is_search()){



        echo 'class="pg-search pg-interna"';



      } elseif(is_single()){



        echo 'class="pg-single '.( (get_field('landing_page')) ? 'pg-template-landing-pages' : '' ).' pg-interna post-type-'.get_post_type().'"';



      } elseif(is_404()){



        echo 'class="pg-404 pg-interna"';



      } else {



        echo 'class="pg-interna '.( ($template === 'landing-pages') ? 'pg-template-'.$template : '' ).' pg-'.$post->post_name.' page_id_'.$post->ID.'"';



      }



      ?> data-controller="<?php echo str_replace('-', '_', $post->post_name); ?>">    

    <div id="wrap">

      <header id="header">

        <div class="container">

          <h1 onclick="document.location='<?php echo home_url(); ?>';return false;">

            <?php if(get_theme_mod('logo') || get_theme_mod('logo_negativo')) : ?>

              <picture>



                <?php if(is_front_page()) : ?>



                  <?php if(get_theme_mod('logo')) : ?>



                    <source media="(min-width: 1281px)" srcset="<?php echo get_theme_mod('logo'); ?>">



                  <?php endif; ?>



                  <?php if(get_theme_mod('logo_negativo')) : ?>



                    <source media="(max-width: 1280px)" srcset="<?php echo get_theme_mod('logo_negativo'); ?>">



                  <?php endif; ?>



                <?php endif; ?>



                <?php if(is_front_page()) : ?>

                  <img src="<?php echo get_theme_mod('logo'); ?>" alt="<?php echo get_bloginfo('name'); ?>">

                <?php else : ?>

                  <img src="<?php echo get_theme_mod('logo_negativo'); ?>" alt="<?php echo get_bloginfo('name'); ?>">

                <?php endif; ?>



              </picture>

            <?php else: ?>

                <?php echo get_bloginfo('name'); ?>

            <?php endif; ?>

          </h1>

          <nav id="nav" class="nav" role="navigation">
            <ul class="nav__menu" id="menu" tabindex="-1" aria-label="main navigation" hidden>
              <?php 
                foreach (wp_get_nav_menu_items('header') as $key => $value) :
                  ?>
                  <li class="nav__item"><a href="<?php echo $value->url; ?> " class="nav__link"><?php echo $value->title; ?> </a></li>
                  <?php 
                endforeach;
              ?>                   
            </ul>  
              
            <ul>              

              <?php 

                wp_nav_menu( array( 'container' => false, 'menu' => 'header', 'items_wrap' => '%3$s', 'container_class'=>'' ) ); 

              ?>              

              <li>

                <a href="#nav" class="nav__toggle" role="button" aria-expanded="false" aria-controls="menu">
                  <svg class="menuicon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                    <title>Toggle Menu</title>
                    <g>
                      <line class="menuicon__bar" x1="13" y1="16.5" x2="37" y2="16.5"/>
                      <line class="menuicon__bar" x1="13" y1="24.5" x2="37" y2="24.5"/>
                      <line class="menuicon__bar" x1="13" y1="24.5" x2="37" y2="24.5"/>
                      <line class="menuicon__bar" x1="13" y1="32.5" x2="37" y2="32.5"/>
                      <circle class="menuicon__circle" r="23" cx="25" cy="25" />
                    </g>
                  </svg>
                </a>

              </li>

            </ul>

            <div class="splash"></div> 

          </nav>

        </div>

      </header>

      <main id="main">

