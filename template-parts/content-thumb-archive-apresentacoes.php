<?php

	// Carrega a URL da imagem fullsize
	$img_url = get_the_post_thumbnail_url(get_the_ID());

 ?>

<!-- Conteúdo do Thumb -->
<div class="col-12 col-md-4">
    <div class="card">
        <div class="cardImg" backimage="<?php  echo $img_url; ?>"></div>
        <div class="cardText"><span class="cardCategoria"><?php echo the_tags('',' | ',''); ?></span>
            <h1><strong><?php echo the_title(); ?></strong></h1>
            <h2><?php echo rwmb_meta( 'union-nomeEvento' ); ?></h2>
            <span class="cardData"><i class="fa fa-clock-o"></i><?php echo convertToDate(rwmb_meta( 'union-dataEvento' )); ?></span>
            <p><?php echo the_excerpt(); ?></p>
            <div class="text-right"><a class="btn btn-primary btnCard" role="button" href="<?php echo the_permalink(); ?>">Ler</a></div>
        </div>
    </div>
</div>