<?php

	// Carrega a URL da imagem fullsize
	$img_url = get_the_post_thumbnail_url(get_the_ID());

 ?>

<!-- Conteúdo do Thumb -->
<div class="col-12 col-md-6">
    <div class="card">
        <div class="cardImg" backimage="<?php  echo $img_url; ?>"></div>
        <div class="cardText">
            <div>
                <span class="cardCategoria"><?php the_tags('',' | ',''); ?></span>
                <h1><strong><?php the_title(); ?></strong></h1>
                <span class="cardData"><?php the_author(); ?> <i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></span>
                <p><?php the_excerpt(); ?></p>
            </div>
            <div class="text-right">
                <a class="btn btn-primary btnCard" role="button" href="<?php the_permalink(); ?>">Ler</a>
            </div>
        </div>
    </div>
</div>