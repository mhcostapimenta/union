<!DOCTYPE html>
<html <?php language_attributes(); ?>> <!-- Carrega os atributos de língua da página -->

<head>
  <!-- Google Tag Manager - Delayed Load for Performance -->
<script>
  // Inicializa o dataLayer imediatamente para permitir filas de eventos antes do carregamento do GTM
  window.dataLayer = window.dataLayer || [];
  
  (function() {
    var gtmLoaded = false;
    
    // ESTA FOI A FUNÇÃO ALTERADA (Adicionado o gtm_lazy_loaded)
    function loadGTM() {
      if (gtmLoaded) return;
      gtmLoaded = true;
      (function (w, d, s, l, i) {
        w[l] = w[l] || []; w[l].push({
          'gtm.start': new Date().getTime(), event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
        
        // CRUCIAL: Envia o evento personalizado assim que o GTM é injetado
        w[l].push({'event': 'gtm_lazy_loaded'}); 
        
      })(window, document, 'script', 'dataLayer', 'GTM-KHBHTLVF');
    }
          
    // O restante do seu controle de tempo e interação continua igual
    window.addEventListener('load', function() {
      setTimeout(loadGTM, 3500);
    });
    window.addEventListener('scroll', loadGTM, {once: true, passive: true});
    window.addEventListener('mousemove', loadGTM, {once: true, passive: true});
    window.addEventListener('touchstart', loadGTM, {once: true, passive: true});
          
    window.addEventListener('submit', loadGTM, {once: true, capture: true});
    window.addEventListener('click', function(e) {
      if (e.target && (e.target.tagName === 'A' || e.target.tagName === 'BUTTON' || e.target.type === 'submit')) {
        loadGTM();
      }
    }, {once: true, capture: true});
  })();
</script>
  <!-- End Google Tag Manager -->

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <!-- Preloads e Preconnects para Performance -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://www.googletagmanager.com">
  <link rel="preconnect" href="https://www.google.com">
  <link rel="preconnect" href="https://www.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://connect.facebook.net">

  <?php
  // Preload do Logo e Banner para melhorar o LCP
  $img_logo_home = get_theme_mod('set_imagem_logo_home');
  if ($img_logo_home) {
      echo '<link rel="preload" as="image" href="' . esc_url($img_logo_home) . '">' . "\n";
  }
  ?>
  <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/assets/img/backgroundTopo.jpg">
  <link rel="dns-prefetch" href="https://www.googletagmanager.com">

  <?php if (is_front_page()): ?>
    <!-- Preload da imagem de LCP (Mobile e Desktop) -->
    <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/assets/img/backgroundTopoMobile.webp"
      media="(max-width: 767px)">
    <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/assets/img/backgroundTopo.webp"
      media="(min-width: 768px)">
  <?php endif; ?>

  <!-- Carrega todas as nossas funções, folhas de estilo e scripts functions.php -->
  <?php wp_head(); ?>

  <!-- SEO e Social Meta Tags Dinâmicas -->
  <?php if (function_exists('union_seo_meta_tags'))
    union_seo_meta_tags(); ?>

  <!-- Favicon e touchicon -->
  <link rel="icon" type="image/png" sizes="17x17"
    href="<?php echo get_template_directory_uri() . '/assets/img/favicon16x16.png' ?>">
  <link rel="icon" type="image/png" sizes="33x33"
    href="<?php echo get_template_directory_uri() . '/assets/img/favcion32x32.png' ?>">
  <link rel="apple-touch-icon-precomposed" sizes="32x32"
    href="<?php echo get_template_directory_uri() . '/assets/img/favcion32x32.png' ?>">

</head>

<body <?php body_class(); ?>> <!-- Carrega as classes do body -->
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KHBHTLVF" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

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
      <a class="navbar-brand scrollSlow" href="<?php echo home_url() ?>">
        <img src="<?php echo $img_logo; ?>" alt="Union Engenharia de Telemática" width="152" height="60"
          decoding="async">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navcol-1" aria-label="<?php union_the_string('Alternar navegação'); ?>">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navcol-1">

        <!-- Carrega o Menu de Navegação -->
        <?php
        wp_nav_menu(array(
          'theme_location' => $menu,
          'depth' => 1,
          'container' => false,
          'container_class' => 'collapse navbar-collapse',
          'container_id' => 'navcol-1',
          'menu_class' => 'nav navbar-nav mx-auto',
          'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
          'walker' => new WP_Bootstrap_Navwalker(),
        ));
        ?>

        <!-- Seletor de Idiomas -->
        <ul class="nav navbar-nav languages-menu ms-auto me-2 flex-row align-items-center">
          <?php
          if (function_exists('pll_the_languages')) {
            pll_the_languages(array('show_flags' => 1, 'show_names' => 0, 'hide_current' => 0));
          }
          ?>
        </ul>

        <!-- Formulário de busca - Alterar com código do Wordpress -->
        <ul id="formSearch" class="nav navbar-nav">
          <li class="nav-item">

            <!-- Carrega o formulário de busca personalizado -->
            <?php get_search_form(); ?>

          </li>
        </ul>
      </div>
    </div>
  </nav>
  </header>

  <main id="main-content" role="main">