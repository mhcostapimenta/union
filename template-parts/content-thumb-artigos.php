<?php

	// Carrega a URL da imagem fullsize
	$img_url = get_the_post_thumbnail_url(get_the_ID());

      // Monta uma substring com os primeiros 200 caracteres do resumo
    $txt_resumo = get_the_excerpt();
    $resumo = substr($txt_resumo, 0, 500).'[...]';

    global $delay;

 ?>

<!-- Conteúdo do Thumb -->
<div class="col-12 col-md-6">

    
    <div class="card animate" data-effect="fade-in" style="animation-delay: <?php echo $delay ?>s">
        <div class="cardImg" backimage="<?php  echo $img_url; ?>"></div>
        <div class="cardText">
            <div>
                <span class="cardCategoria"><?php the_tags('',' | ',''); ?></span>
                <h1><strong><?php the_title(); ?></strong></h1>
                <span class="cardData"><?php the_author(); ?> <i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></span>
                <p><?php echo $resumo; ?></p>
            </div>
            <div class="text-right">
                <a class="btn btn-primary btnCard" role="button" href="<?php the_permalink(); ?>">Ler</a>
            </div>
        </div>
    </div>
</div>