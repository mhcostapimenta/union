<!-- Detecta se a página carregada é a front page -->
<?php
if (is_front_page()) { // Se for, carregar o menu para a página home
  $menu = 'footer_menu';
} else { // Se não for, carregar o menu para as páginas internas
  $menu = 'footer_menu_interno';
}
?>
</main>
<footer id="footer">
  <div class="container">
    <div class="row">

      <!-- Logo da empresa -->
      <div class="col-12 col-md-4">
        <img class="img-fluid" src="<?php echo get_template_directory_uri() . '/assets/img/logoUnionBranca.png' ?>"
          alt="Union Engenharia de Telemática - Rodapé" loading="lazy" decoding="async" width="152" height="60">
      </div>

      <!-- Navegação Footer -->
      <div class="col-12 col-md-4">
        <p><strong><?php union_the_string('Conteúdo da Página'); ?></strong></p>

        <!-- Carrega o menu do Footer -->
        <?php
        wp_nav_menu(array(
          'theme_location' => $menu,
          'depth' => 1,
          'container' => false,
          'container_class' => '',
          'container_id' => '',
          'menu_class' => '',
          'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
          'walker' => new WP_Bootstrap_Navwalker(),
        ));
        ?>
      </div>

      <!-- Endereço -->
      <div class="col-12 col-md-4">
        <address>
          <strong>Union Engenharia de Telemática</strong><br>
          Av das Américas 3434, 211 bl 4<br>
          Rio de Janeiro, RJ 22640-102<br>
          Tel.: <a href="tel:+552134313802">+55 21 3431-3802</a><br>
          e-mail: <a href="mailto:contato@union.eng.br">contato@union.eng.br</a>
        </address>
      </div>
    </div>

    <!-- Créditos -->
    <div class="row">
      <div class="col"><span
          class="creditos"><?php union_the_string('Union Engenharia de Telemática - Copyright © 2021 - Todos os direitos reservados'); ?></span>
      </div>
    </div>
  </div>
</footer>

<!-- Elemento Scroll-to-top -->
<a class="cd-top" href="#" aria-label="<?php union_the_string('Voltar ao topo'); ?>"></a>

<!-- Carrega todas as funções do Footer e scripts functions.php -->
<?php wp_footer(); ?>

</body>

</html>