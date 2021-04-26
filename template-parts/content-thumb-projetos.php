<?php

	// Carrega a URL da imagem fullsize
	$img_url = get_the_post_thumbnail_url(get_the_ID());

    global $delay;

 ?>

<!-- Conteúdo do Thumb -->
<div class="col-12 col-lg-6">
    <div class="cardHorizontal  animate" data-effect="fade-in" style="animation-delay: <?php echo $delay ?>s">
        <div class="d-none d-sm-block cardImgHorizontal" backimage="<?php  echo $img_url; ?>"></div>
        <div class="d-flex flex-column justify-content-between cardTextHorizontal">
            <div class="cardTextHorizontalContent"><span class="cardCategoria"><?php the_tags('',' | ',''); ?></span>
                <h1><strong><?php the_title(); ?></strong></h1>
                <p><?php the_excerpt(); ?></p>
            </div>
            <div class="text-right"><a class="btn btn-primary btnCard" role="button" href="<?php the_permalink(); ?>">Ler</a></div>
        </div>
    </div>
</div>