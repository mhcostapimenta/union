<!-- Carrega o cabeçalho -->
<?php get_header(); ?>

<!-- Conteúdo da página -->
<section id="conteudo">
    <div class="row">
        <div class="col">
            <!-- Breadcrumb -->
            <?php custom_breadcrumbs(); ?>
        </div>
    </div>

        <!-- Conteúdo do Artigo -->
        <?php while( have_posts() ): the_post(); ?>

        <!-- Detecta conteúdo da página e faz todas as adaptações -->
        <?php
            // Detecta o nome da categoria do post
            $cat = get_the_category()[0]->cat_name;

            // Determina o conteúdo da página de acordo com a categoria do post
            switch ($cat) {
                case "Artigos" :
                    $subtitle = '<h2>'.get_the_author( ).'</h2>';
                    $date = '<i class="fa fa-clock-o"></i><span>Data da publicação: '.get_the_date('d/m/Y').'</span>';
                    $subtitleBox = 'Últimos Artigos';
                    $post_type = 'post';
                    $orderby = 'publish_date';
                    $order = 'DESC';
                    $category_name = 'artigos';
                    $template_parts = 'thumb-single';
                    break;               
                case "Projetos" :
                    $subtitle = '';
                    $date = '';
                    $subtitleBox = 'Últimos Projetos';
                    $post_type = 'post';
                    $orderby = 'publish_date';
                    $order = 'DESC';
                    $category_name = 'projetos';
                    $template_parts = 'thumb-single-projetos';
                    break;
                case "Parceiros" :
                    $subtitle = '';
                    $date = '';
                    $subtitleBox = 'Parceiros';
                    $post_type = 'post';
                    $orderby = 'publish_date';
                    $order = 'DESC';
                    $category_name = 'parceiros';
                    $template_parts = 'thumb-single-projetos';
                    break;
                default: 
                    $subtitle = '<h2>'.rwmb_meta( 'union-nomeEvento' ).'</h2>';
                    $date = '<i class="fa fa-clock-o"></i><span>Data do evento: '.convertToDate(rwmb_meta( 'union-dataEvento' )).'</span>'; 
                    $subtitleBox = 'Últimas Apresentações';
                    $post_type = 'apresentacoes';
                    $orderby = 'publish_date';
                    $order = 'DESC';
                    $category_name = '';
                    $template_parts = 'thumb-single-apresentacoes'; 
            }

            // Compartilhamento Redes Sociais
            require('inc/socialshare.php');
        ?>

    <!-- Conteúdo da página -->
    <?php 
        if ($category_name == 'projetos' ||  $category_name == 'parceiros') {
    ?>

        <article>
            <div class="container">
                <h1 class="tracking-in-expand-fwd-bottom mb-3"><?php the_title(); ?></h1>

    <?php 
        } else {
    ?>

        <div id="parallax-image" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
                    <h1 class="tracking-in-expand-fwd-bottom"><?php the_title(); ?></h1>
                </div>

                <article>
                    <div class="container">
    
    <?php
        }
    ?>

            <!-- Conteúdo em duas colunas -->
            <div class="row">

                <!-- Coluna da esquerda -->
                <div class="col-12 col-md-7 order-2 order-md-1">

                    <!-- Mostra o subtítulo <h2> de acordo com o conteúdo da página -->
                    <?php echo $subtitle; ?>

                    <div class="flex-row barraArtigo">
                        <!-- Mostra a data de acordo com o conteúdo da página -->
                        <div class="data">                     
                            <?php echo $date ?>
                        </div>

                        <?php 
                            if ($category_name !== 'projetos' &&  $category_name !== 'parceiros' ) {
                        ?>

                        <!-- Compartilhamento Redes Sociais -->
                        <div class="shareSocial text-right">
                            <a href="<?php echo $stringFacebook; ?>"><i class="fa fa-facebook-square"></i></a>
                            <a href="<?php echo $stringTwitter; ?>"><i class="fa fa-twitter-square"></i></a>
                            <a href="<?php echo $stringLinkedin; ?>"><i class="fa fa-linkedin-square"></i></a>
                        </div>
                        <hr>

                        <?php
                                }
                        ?>

                    </div>

                    <!-- Conteúdo do Post -->
                    <?php the_content(); ?>

                    <div>
                        <!-- Carrega as tags do artigo -->
                        <?php echo get_the_tag_list('<div class="botaoCategoria">','','</div>'); ?>
                    </div>

                    <!-- Fim do conteudo do artigo -->
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    ?>
                    
                </div>

                <!-- Coluna da direita -->
                <div class="col-12 col-md-5 order-1 order-md-2">
                    <div class="lastSingles">

                        <!-- Carrega o subtitítulo h3 de acordo com o conteúdo da página -->
                        <h3><?php echo $subtitleBox; ?></h3>

                        <!-- Thumbs dos posts -->
                        <div class="row">
                            <div class="col">

			                <!-- Aqui entra o loop Wordpress para mostrar os 5 últimos posts -->
			                <?php

			                    $args = array(
			                        'posts_per_page'=> 5,
                                    'post_type' => $post_type,
                                    'category_name' => $category_name,             
                                    'orderby' => $orderby,
                                    'order' => $order
			                    );

			                    $loop = new WP_Query( $args );

			                        if ( $loop->have_posts() ):

			                            while ( $loop->have_posts() ): 
			                            	$loop->the_post();
			              
			                                // Carrega o template com os thumbs
			                                get_template_part( 'template-parts/content', $template_parts);

			                    endwhile;
			                    wp_reset_postdata();
			                    // Aqui termina o loop Wordpress

                                else:
			                 ?>

			                 <p>Nada encontratdo ainda ...</p>
			                 
			                 <?php
			                    // Fim do if do loop Wordpress
			                   endif;
			                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </article>
</section>

<!-- Carrega o footer -->
<?php get_footer(); ?> 