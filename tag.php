<!-- Carrega o cabeçalho -->
<?php get_header(); ?> 

<?php
// Captura o título da página
              $titulo = get_the_archive_title();

              // Localiza o espaço
              $initStr = strpos($titulo, ' ');

              // cria o nome da categoria a partir do caracter seguinte ao espaço
              $post_tag = strtolower(substr($titulo, $initStr));

?>


<section id="conteudo">

  <!-- Lista conteúdo das apresentacoes -->
  <section>
        <div class="row">
          
        	<!-- Breadcrumb -->
          <?php custom_breadcrumbs(); ?>
          
        </div>

        <div class="row">
            <div class="col">
                <div class="container">
                    <h1>Apresentações</h1>
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

                        <!-- Aqui entra o loop Wordpress para mostrar os Thumbs das Apresentações -->
                        <?php

                            query_posts( array( 'post_type' => 'apresentacoes',
                            'tax_query' => array(
                              array(
                                  'taxonomy' => 'post_tag',
                                  'field'    => 'name',
                                  'terms'    => $post_tag,
                              ),
                            ),
                            'orderby' => 'publish_date',
                            'paged' => get_query_var( 'paged' ) ) );

                            if (have_posts(  )) {
                                while ( have_posts() ) : the_post();

                                  // Carrega o template com os thumbs
                                  get_template_part( 'template-parts/content', 'thumb-apresentacoes');

                                endwhile;

                                wp_reset_postdata();

                            } else {
                              ?>
                              <div class="msgBusca">
                                <p>Nenhum item encontrado com a TAG selecionada!</p>
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

    <!-- Lista conteúdo dos artigos -->
    <section>

        <div class="row">
            <div class="col">
                <div class="container">
                    <h1>Artigos</h1>
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

                    <!-- Aqui entra o loop Wordpress para mostrar os Thumbs dos artigos -->
                    <?php

                            query_posts( array( 'post_type' => 'post',
                            'category_name' => 'artigos',
                            'tax_query' => array(
                              array(
                                  'taxonomy' => 'post_tag',
                                  'field'    => 'name',
                                  'terms'    => $post_tag,
                              ),
                            ),
                            'orderby' => 'publish_date', 
                            'paged' => get_query_var( 'paged' ) ) );

                        if (have_posts(  )) {
                          while ( have_posts() ) : the_post();

                            // Carrega o template com os thumbs
                            get_template_part( 'template-parts/content', 'thumb-artigos');

                          endwhile;

                          wp_reset_postdata();
                        
                        } else {
                          ?>
                          <div class="msgBusca">
                            <p>Nenhum item encontrado com a TAG selecionada!</p>
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

      <!-- Lista conteúdo dos projetos -->
      <section>
        
              <div class="row">
                  <div class="col">
                      <div class="container">
                          <h1>Projetos</h1>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <!-- Carrega as tags do artigo -->
                  <div class="col text-center">

                    <!-- Carrega o menu com as tags -->
                    <!-- <?php listTags( 'projetos' ); ?> -->
                  </div>

              </div>
              <div class="row" id="resultados">
                  <div class="col">
                      <div class="container">
                          <div class="row">

                          <!-- Aqui entra o loop Wordpress para mostrar os Thumbs dos artigos -->
                          <?php

                                  query_posts( array( 'post_type' => 'post',
                                  'category_name' => 'projetos',
                                  'tax_query' => array(
                                    array(
                                        'taxonomy' => 'post_tag',
                                        'field'    => 'name',
                                        'terms'    => $post_tag,
                                    ),
                                  ),
                                  'orderby' => 'publish_date', 
                                  'paged' => get_query_var( 'paged' ) ) );

                              if (have_posts(  )) {

                                  while ( have_posts() ) : the_post();

                                    // Carrega o template com os thumbs
                                    get_template_part( 'template-parts/content', 'thumb-projetos');

                                  endwhile;

                                  wp_reset_postdata();
                              
                              } else {
                                  ?>
                                  <div class="msgBusca">
                                    <p>Nenhum item encontrado com a TAG selecionada!</p>
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
