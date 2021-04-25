<!-- Carrega o cabeçalho -->
<?php get_header(); ?>

<!-- Conteúdo da página -->
<section id="conteudo">

    <section>
        <div class="row">
          
        	<!-- Breadcrumb -->
          <?php custom_breadcrumbs(); ?>
          
        </div>

        <div class="row">
            <div class="col">
                <div class="container">
                    <h1>Resultados</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Carrega as tags do artigo -->
            <div class="col text-center">

              <!-- Carrega o menu com as tags -->
              <!-- <?php listTags( 'apresentacoes' ); ?> -->
            </div>

        </div>
        <div class="row" id="resultados">
            <div class="col">
                <div class="container">
                    <div class="row">

                        <!-- Aqui entra o loop Wordpress para mostrar os Thumbs da Busca -->
                        <?php

                            if (have_posts(  )) {
                                while ( have_posts() ) : the_post();

                                  // Carrega o template com os thumbs
                                  get_template_part( 'template-parts/content', 'search');

                                endwhile;

                                wp_reset_postdata();

                            } else {
                              ?>
                              <div class="msgBusca">
                                <p>Nenhum item encontrado!</p>
                              </div>
                              <?php
                            }	                    
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <!-- Paginação feita com o plugin wp-pagenavi -->
        <div class="row paginacao">
            <div class="col">
                <div class="wp-pagenavi text-center" role="navigation">
                    <!-- Carregar paginação caso haja necessidade -->
                    <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>               
                </div>
        </div>
    </section>
</section>

<!-- Carrega o footer -->
<?php get_footer(); ?> 