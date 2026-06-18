<!-- Carrega o cabeçalho -->
<?php get_header(); ?>
    
<?php
    /* Captura as informações sobre a categoria selecionada */
    $cat = get_the_category()[0]->cat_name;
    $catslug = get_the_category()[0]->slug;

    // Determina o conteúdo da página de acordo com o slug da categoria para melhor compatibilidade com Polylang
    switch ($catslug) {
        case "artigos" :
        case "papers" :
            $subtitle = '<h2>'.get_the_author( ).'</h2>';
            $date = '<i class="fa fa-calendar"></i><span>'.get_the_date('d/m/Y').'</span>';
            $subtitleBox = union_get_string('Últimos Artigos');
            $post_type = 'post';
            $category_name = 'artigos';
            $template_parts = 'thumb-archive-apresentacoes';
            break;               
        case "projetos" :
        case "projects" :
            $subtitle = '';
            $date = '';
            $subtitleBox = union_get_string('Últimos Projetos');
            $post_type = 'post';
            $category_name = 'projetos';
            $template_parts = 'thumb-projetos-archive';
            break;
        case "parceiros" :
        case "partners" :
            $subtitle = '';
            $date = '';
            $subtitleBox = union_get_string('Parceiros');
            $post_type = 'post';
            $category_name = 'parceiros';
            $template_parts = 'parceiros-archive';
            break;
        default: 
            $subtitle = '<h2>'.rwmb_meta( 'union-nomeEvento' ).'</h2>';
            $date = '<i class="fa fa-calendar"></i><span>'.convertToDate(rwmb_meta( 'union-dataEvento' )).'</span>'; 
            $subtitleBox = union_get_string('Últimas Apresentações');
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
                    <h1 class="titulo-secao"><?php echo single_cat_title('', false); ?></h1>
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

                            $categoria_query = new WP_Query( array( 'post_type' => 'post',
                            'posts_per_page'=> 12,
                            'category_name' => $catslug,
                            'orderby' => 'publish_date',
                            'order' => 'DESC',
                            'paged' => get_query_var( 'paged' ) ) );

                            while ( $categoria_query->have_posts() ) : $categoria_query->the_post();

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
                    <?php if(function_exists('wp_pagenavi')) { wp_pagenavi( array( 'query' => $categoria_query ) ); } ?>               
                </div>
        </div>

</section>

<!-- Carrega o footer -->
<?php get_footer(); ?> 
