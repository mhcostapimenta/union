<!-- Carrega o cabeçalho -->
<?php get_header(); ?>
    
<?php
    /* Captura as informações sobre a categoria selecionada */
    $cat = get_the_category()[0]->cat_name;
    $catslug = get_the_category()[0]->slug;

    // Determina o conteúdo da página de acordo com a categoria do post
    switch ($cat) {
        case "Artigos" :
            $subtitle = '<h2>'.get_the_author( ).'</h2>';
            $date = '<i class="fa fa-clock-o"></i><span>Data da publicação: '.get_the_date('d/m/Y').'</span>';
            $subtitleBox = 'Últimos Artigos';
            $post_type = 'post';
            $category_name = 'artigos';
            $template_parts = 'thumb-archive-apresentacoes';
            break;               
        case "Projetos" :
            $subtitle = '';
            $date = '';
            $subtitleBox = 'Últimos Projetos';
            $post_type = 'post';
            $category_name = 'projetos';
            $template_parts = 'thumb-projetos-archive';
            break;
        case "Parceiros" :
            $subtitle = '';
            $date = '';
            $subtitleBox = 'Últimos Parceiros';
            $post_type = 'post';
            $category_name = 'parceiros';
            $template_parts = 'parceiros-archive';
            break;
        default: 
            $subtitle = '<h2>'.rwmb_meta( 'union-nomeEvento' ).'</h2>';
            $date = '<i class="fa fa-clock-o"></i><span>Data do evento: '.convertToDate(rwmb_meta( 'union-dataEvento' )).'</span>'; 
            $subtitleBox = 'Últimas Apresentações';
            $post_type = 'apresentacoes'; 
            $category_name = '';
            $template_parts = 'thumb-single-apresentacoes'; 
    }



?>

<section id="conteudo">

        <div class="row">
          
        	<!-- Breadcrumb -->
          <?php custom_breadcrumbs(); ?>
          
        </div>

        <div class="row">
            <div class="col">
                <div class="container">
                    <h1><?php echo $cat; ?></h1>
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
                            'category_name' => $catslug,
                            'posts_per_page'=> 9,
                            'orderby' => 'publish_date', 
                            'paged' => get_query_var( 'paged' ) ) );
                    
                            while ( have_posts() ) : the_post();

                              // Carrega o template com os thumbs
                              get_template_part( 'template-parts/content', $template_parts);

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
