<!-- Carrega o cabeçalho -->
<?php get_header(); ?> 

<section id="conteudo">

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

                        <!-- Aqui entra o loop Wordpress para mostrar os Thumbs dos artigos -->
                        <?php

                            query_posts( array( 'post_type' => 'apresentacoes',
                            'orderby' => 'publish_date', 
                            'paged' => get_query_var( 'paged' ) ) );
                    
                            while ( have_posts() ) : the_post();

                              // Carrega o template com os thumbs
                              get_template_part( 'template-parts/content', 'thumb-archive-apresentacoes');

                            endwhile;

                            wp_reset_postdata();
		                    
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

<!-- Carrega o footer -->
<?php get_footer(); ?> 
