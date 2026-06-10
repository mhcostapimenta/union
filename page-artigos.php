<?php /* Template Name: Página Artigos */ ?>
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
                    <h1 class="titulo-secao"><?php union_the_string('Artigos'); ?></h1>
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

                            $artigos_query = new WP_Query( array( 'post_type' => 'post',
                            'category_name' => union_get_cat_slug('artigos'),
                            'paged' => get_query_var( 'paged' ) ) );
		             
	                    	while ( $artigos_query->have_posts() ) : $artigos_query->the_post();

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
                    <?php if(function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $artigos_query ) ); } ?>               
                </div>
        </div>

</section>

<!-- Carrega o footer -->
<?php get_footer(); ?> 
