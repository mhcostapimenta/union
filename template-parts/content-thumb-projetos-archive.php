<?php

	// Carrega a URL da imagem fullsize
	$img_url = get_the_post_thumbnail_url(get_the_ID());

    // Monta uma substring com os primeiros 200 caracteres do resumo
    $txt_resumo = get_the_excerpt();
    $resumo = substr($txt_resumo, 0, 200).'[...]';

 ?>

<!-- Conteúdo do Thumb -->
<div class="col-12 col-md-4 mb-4">
    <div class="cardTextHorizontal">
        <!-- <div class="cardTextHorizontal"> -->
            <div class="cardTextHorizontalContent">
                <span class="cardCategoria"><?php the_tags('',' | ',''); ?></span>
                <h1><strong><?php the_title(); ?></strong></h1>
                <p><?php echo $resumo; ?></p>
            </div>
            <div class="text-right"><a class="btn btn-primary btnCard" role="button" href="<?php the_permalink(); ?>">Ler</a></div>
        <!-- </div> -->
    </div>
</div>