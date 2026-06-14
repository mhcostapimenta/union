<?php /* Template Name: Página de Início */ ?>
<!-- Carrega o cabeçalho -->
<?php get_header(); ?>

<!-- Sessão do Topo -->
<section id="topo" class="bg-pan-right">
    <div class="container">
        <div class="row" id="topContent">
            <div class="col-12 col-md-6">
                <h1 class="slide-in-left delay-500">
                    <?php echo trim(union_get_string(get_theme_mod('set_titulo_home'))); ?></h1>
                <p class="slide-in-left delay-200">
                    <?php echo trim(union_get_string(get_theme_mod('set_texto_empresa'))); ?></p>
                <a class="btn btn-primary scale-in-center delay-1000" role="button"
                    href="<?php echo esc_url(home_url('/')) . union_get_string('empresa') . '/' ?>"><?php union_the_string('Sobre a empresa'); ?><img
                        width="23" height="23"
                        src="<?php echo get_template_directory_uri() . '/assets/img/iconeUnion.svg' ?>"
                        alt="Ícone Union"></a>
            </div>
            <div class="col d-none d-md-block">
                <div class="slide-in-elliptic-right-bck delay-1000">
                    <img class="img-fluid d-xl-flex justify-content-xl-center"
                        src="<?php echo get_template_directory_uri() . '/assets/img/iconeUnionTop.png' ?>"
                        alt="Símbolo Union Engenharia" width="426" height="442">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sessão Soluções -->
<section id="solucoes">
    <div class="container">
        <h2 class="animate" data-effect="scale-in-center">
            <?php union_the_string('Soluções em Telecomunicações e Telemática Industrial'); ?></h2>
        <div class="row g-4">

            <!-- Aqui entra o loop Wordpress para mostrar os Thumbs das Solucoes -->
            <?php

            $args = array(
                'posts_per_page' => 8,
                'post_type' => 'solucoes',              // Tipo de post
                'orderby' => 'title',				// Ordenar pelo titulo da Solução
                'order' => 'ASC', 						// Ordem Ascendente
                'lang' => pll_current_language()        // Filtra pelo idioma atual
            );

            $loop = new WP_Query($args);

            if ($loop->have_posts()):

                $delay = 0.5;
                $interval = 0.25;

                while ($loop->have_posts()):
                    $loop->the_post();

                    // Carrega o template com os thumbs
                    get_template_part('template-parts/content', 'thumb-solucoes');

                    $delay = $delay + $interval;

                endwhile;
                wp_reset_postdata();
                // Aqui termina o loop Wordpress
            
            else:
                ?>

                <p><?php union_the_string('Nada encontrado ainda ...'); ?></p>

                <?php
                // Fim do if do loop Wordpress
            endif;
            ?>
        </div>

    </div>
</section>

<!-- Sessão Artigos -->
<section id="artigos">
    <div class="container">
        <h2 class="animate" data-effect="scale-in-center">
            <?php union_the_string('Artigos Técnicos e Tendências em Telecom'); ?></h2>
        <div class="row">

            <!-- Aqui entra o loop Wordpress para mostrar os Thumbs dos Artigos -->
            <?php

            $args = array(
                'posts_per_page' => 2,
                'post_type' => 'post',              // Tipo de post
                'category_name' => union_get_cat_slug('artigos')
            );

            $loop = new WP_Query($args);

            if ($loop->have_posts()):

                $delay = 0.25;
                $interval = 0.5;

                while ($loop->have_posts()):
                    $loop->the_post();

                    // Carrega o template com os thumbs
                    get_template_part('template-parts/content', 'thumb-artigos');

                    $delay = $delay + $interval;

                endwhile;
                wp_reset_postdata();
                // Aqui termina o loop Wordpress
            
            else:
                ?>

                <p><?php union_the_string('Nada encontrado ainda ...'); ?></p>

                <?php
                // Fim do if do loop Wordpress
            endif;
            ?>
        </div>

        <div class="row">
            <div class="col text-center">
                <a class="btn btn-primary btnSection" role="button"
                    href="<?php echo esc_url(home_url('/')) . union_get_cat_slug('artigos') . '/'; ?>"><?php union_the_string('Todos os Artigos'); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Sessão Apresentações -->
<section id="apresentacoes">
    <div class="container">
        <h2 class="animate" data-effect="scale-in-center">
            <?php union_the_string('Apresentações Técnicas e Debates do Setor'); ?></h2>
        <div class="row">

            <!-- Aqui entra o loop Wordpress para mostrar os Thumbs das Apresentações -->
            <?php

            $args = array(
                'posts_per_page' => 3,
                'post_type' => 'apresentacoes',              // Tipo de post
                'lang' => pll_current_language()        // Filtra pelo idioma atual
            );

            $loop = new WP_Query($args);

            if ($loop->have_posts()):

                $delay = 0.25;
                $interval = 0.5;

                while ($loop->have_posts()):
                    $loop->the_post();

                    // Carrega o template com os thumbs
                    get_template_part('template-parts/content', 'thumb-apresentacoes');

                    $delay = $delay + $interval;

                endwhile;
                wp_reset_postdata();
                // Aqui termina o loop Wordpress
            
            else:
                ?>

                <p><?php union_the_string('Nada encontrado ainda ...'); ?></p>

                <?php
                // Fim do if do loop Wordpress
            endif;
            ?>
        </div>

        <div class="row">
            <div class="col text-center">
                <a class="btn btn-primary btnSection" role="button"
                    href="<?php echo esc_url(home_url('/')) . union_get_string('apresentacoes') . '/'; ?>"><?php union_the_string('Todas as Apresentações'); ?></a>
            </div>
        </div>

    </div>
</section>

<!-- Sessão Projetos -->
<section id="projetos">
    <div class="container">
        <h2 class="animate" data-effect="scale-in-center">
            <?php union_the_string('Projetos de Telecomunicações e Infraestrutura de Rede'); ?></h2>
        <div class="row">

            <!-- Aqui entra o loop Wordpress para mostrar os Thumbs dos Projetos -->
            <?php

            $args = array(
                'posts_per_page' => 6,
                'post_type' => 'post',              // Tipo de post
                'category_name' => union_get_cat_slug('projetos'),
                'orderby' => 'menu_order'
            );

            $loop = new WP_Query($args);

            if ($loop->have_posts()):

                $delay = 0.25;
                $interval = 0.25;

                while ($loop->have_posts()):
                    $loop->the_post();

                    // Carrega o template com os thumbs
                    get_template_part('template-parts/content', 'thumb-projetos');

                    $delay = $delay + $interval;

                endwhile;
                wp_reset_postdata();
                // Aqui termina o loop Wordpress
            
            else:
                ?>

                <p><?php union_the_string('Nada encontrado ainda ...'); ?></p>

                <?php
                // Fim do if do loop Wordpress
            endif;
            ?>
        </div>

        <div class="row">
            <div class="col text-center">
                <a class="btn btn-primary btnSection" role="button"
                    href="<?php echo esc_url(home_url('/')) . union_get_cat_slug('projetos') . '/'; ?>"><?php union_the_string('Todos os Projetos'); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Sessão Parceiros -->
<section id="parceiros">
    <div class="container">
        <h2 class="animate" data-effect="scale-in-center">
            <?php union_the_string('Parceiros de Tecnologia e Engenharia'); ?></h2>
        <div class="row">

            <!-- Aqui entra o loop Wordpress para mostrar as logos dos Parceiros -->
            <?php

            $args = array(
                'posts_per_page' => -1,				// Mostrar qtde padrão de posts
                'post_type' => 'post',              // Tipo de post
                'category_name' => union_get_cat_slug('parceiros'),     // Categoria
                'orderby' => 'title',				// Ordenar pelo titulo do Cliente
                'order' => 'ASC' 					// Ordem Ascendente
            );

            $loop = new WP_Query($args);

            if ($loop->have_posts()):

                $delay = 0;
                $interval = 0.25;

                while ($loop->have_posts()):
                    $loop->the_post();

                    // Carrega o template com os thumbs
                    get_template_part('template-parts/content', 'parceiros');

                    $delay = $delay + $interval;

                endwhile;
                wp_reset_postdata();
                // Aqui termina o loop Wordpress
            
            else:
                ?>

                <p><?php union_the_string('Nada encontrado ainda ...'); ?></p>

                <?php
                // Fim do if do loop Wordpress
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Sessão Contato -->
<section id="contato">
    <div class="container">
        <h2 class="animate" data-effect="scale-in-center">
            <?php union_the_string('Fale com Nossos Especialistas em Telemática'); ?></h2>
        <div class="row">
            <!-- <div class="col-12 col-md-6" id="mapa">
                <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.701710924375!2d-43.348273084589685!3d-22.99799384691455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9bda14588c617f%3A0xca5b4254ee632883!2sAv.%20das%20Am%C3%A9ricas%2C%203434%20-%204%20-%20Barra%20da%20Tijuca%2C%20Rio%20de%20Janeiro%20-%20RJ%2C%2022640-102!5e0!3m2!1spt-BR!2sbr!4v1600742148881!5m2!1spt-BR!2sbr" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
            </div> -->
            <div class="col-12 col-md-6 offset-0 offset-md-3">
                <!-- Carrega o Widget com o Formulário de Contato -->
                <?php
                if (is_active_sidebar('form-contato')) {
                    ?>
                    <div id="formContato">

                        <?php

                        dynamic_sidebar('form-contato');

                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Carrega o footer -->
<?php get_footer(); ?>