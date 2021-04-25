<!DOCTYPE html>
<html <?php language_attributes(); ?>> <!-- Carrega os atributos de língua da página -->

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- Carrega todas as nossas funções, folhas de estilo e scripts functions.php -->
    <?php  wp_head(); ?>

    <!-- Favicon e touchicon -->
    <link rel="icon" type="image/png" sizes="17x17" href="<?php echo get_template_directory_uri().'/assets/img/favicon16x16.png'?>">
    <link rel="icon" type="image/png" sizes="33x33" href="<?php echo get_template_directory_uri().'/assets/img/favcion32x32.png'?>">
    <link rel="apple-touch-icon-precomposed" sizes="32x32" href="<?php echo get_template_directory_uri().'/assets/img/favcion32x32.png'?>">

</head>

<body <?php body_class(); ?> > <!-- Carrega as classes do body -->

<!-- Detecta se a página carregada é a front page -->
<?php
  if (is_front_page()) { // Se for, carregar logo e id da Home
    $id_navbar = 'id="barraHome"';
    $img_logo = get_theme_mod('set_imagem_logo_home');
    $menu = 'my_main_menu';
  } else { // Se não for, carregar logo e id da Página Interna
    $id_navbar = 'id="barraInterna"';
    $img_logo = get_theme_mod('set_imagem_logo_interna');
    $menu = 'my_main_menu_interno';
  }
?>

<!-- Barra de Navegação -->
  <nav class="navbar navbar-light navbar-expand-lg" <?php echo $id_navbar; ?>>
      <div class="container">
        <a class="navbar-brand scrollSlow" href="<?php  echo get_bloginfo('url') ?>">
          <img src="<?php echo $img_logo; ?>">
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navcol-1">

          <!-- Carrega o Menu de Navegação -->
          <?php
            wp_nav_menu( array(
                'theme_location'    => $menu,
                'depth'             => 1,
                'container'         => false,
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'navcol-1',
                'menu_class'        => 'nav navbar-nav mx-auto',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ) );
          ?>

          <!-- Formulário de busca - Alterar com código do Wordpress -->
          <ul id="formSearch" class="nav navbar-nav ml-auto">
              <li class="nav-item" role="presentation">

                <!-- Carrega o formulário de busca personalizado -->
                <?php get_search_form(); ?>

              </li>
          </ul>
        </div>
    </div>
  </nav>