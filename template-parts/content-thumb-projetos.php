<?php

	// Carrega a URL da imagem fullsize
	$img_url = get_the_post_thumbnail_url(get_the_ID());

    // Monta uma substring com os primeiros 200 caracteres do resumo
    $txt_resumo = get_the_excerpt();
    $resumo = substr($txt_resumo, 0, 200).'[...]';

    // Carrega o delay da animação
    global $delay;

 ?>

<!-- Conteúdo do Thumb -->
<div class="col-12 col-md-4 mb-4">
    <div class="cardTextHorizontal animate" data-effect="fade-in" style="animation-delay: <?php echo $delay ?>s">
        <!-- <div class="cardTextHorizontal"> -->
            <div class="cardTextHorizontalContent">
                <span class="cardCategoria"><?php the_tags('',' | ',''); ?></span>
                <h3><strong><?php the_title(); ?></strong></h3>
                <p><?php echo $resumo; ?></p>
            </div>
            <div class="text-end"><a class="btn btn-primary btnCard" role="button" href="<?php the_permalink(); ?>"><?php union_the_string('Ler'); ?></a></div>
        <!-- </div> -->
    </div>
</div>