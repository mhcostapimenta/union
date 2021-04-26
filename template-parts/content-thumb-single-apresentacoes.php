<?php

	// Carrega a URL da imagem fullsize
	$img_url = get_the_post_thumbnail_url(get_the_ID());

    global $delay;

 ?>

<!-- Conteúdo do Thumb -->
<div class="thumbs">
   
    <img src="<?php  echo $img_url; ?>">
    <div>
        <?php the_tags('<span class="categorias">',' | ','</span>'); ?>
        <a href="<?php the_permalink(); ?>">
            <h1><?php the_title(); ?></h1>
        </a>
        <a href="<?php the_permalink(); ?>">
            <h2><?php echo rwmb_meta( 'union-nomeEvento' ); ?></h2>
            <p><i class="fa fa-clock-o"></i> <?php echo convertToDate(rwmb_meta( 'union-dataEvento' )); ?></p>
        </a>
    </div>
</div>
