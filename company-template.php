<?php /* Template Name: Company Template */ ?>

<!-- Carrega o cabeçalho -->
<?php get_header(); ?>

<!-- Loop do Wordpress -->
<?php

    // Se houver algum conteúdo
    if (have_posts()) :

        // Enquanto houver posts, mostre-os para gente
        while (have_posts() ) : the_post();

        // Carrega a URL da imagem fullsize
	      $img_url = get_the_post_thumbnail_url(get_the_ID());

?>

<!-- Conteúdo da página -->
<div id="parallax-image" style="background-image: url(<?php echo $img_url ?>)">
  <h1 class="tracking-in-expand-fwd-bottom"><?php the_title(); ?></h1>
</div>

<section id="conteudoTemplate">
    <article>
        <div class="container">

              <!-- Conteúdo -->
              <?php the_content(); ?>

        </div>
    </article>

</section>

<?php
  endwhile;

  else:
?>
<!-- Fim Loop do Wordpress -->

<!-- Caso não haja conteúdo na página mostrar mensagem -->
<p>Nada a ser mostrado - Nothing to show'</p>

<?php 
  endif;
?>

<!-- Carrega o footer -->
<?php get_footer(); ?> 