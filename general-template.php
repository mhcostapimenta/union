<?php /* Template Name: General Template */ ?>

<!-- Carrega o cabeçalho -->
<?php get_header(); ?>

<!-- Conteúdo da página -->
<section id="conteudo">

    <article>
        <div class="container">

            <h1><?php the_title(); ?></h1>

              <!-- Loop do Wordpress -->
              <?php

                  // Se houver algum post
                  if (have_posts()) :

                      // Enquanto houver posts, mostre-os para gente
                      while (have_posts() ) : the_post();
    
                        the_content();

                      endwhile;

                else:

              ?>

              <!-- Caso não haja conteúdo na página mostrar mensagem -->
              <p>Nada a ser mostrado - Nothing to show'</p>

              <?php 
                endif;
              ?>

        </div>
    </article>

</section>

<!-- Carrega o footer -->
<?php get_footer(); ?> 