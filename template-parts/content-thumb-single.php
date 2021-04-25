<?php

	// Carrega a URL da imagem fullsize
	$img_url = get_the_post_thumbnail_url(get_the_ID());

 ?>

<!-- Conteúdo do Thumb -->
<div class="thumbs"><img src="<?php  echo $img_url; ?>">
    <div>
        <?php the_tags('<span class="categorias">',' | ','</span>'); ?>
        <a href="<?php the_permalink(); ?>">
            <h1><?php the_title(); ?></h1>
        </a>
        <a href="<?php the_permalink(); ?>">
            <p><i class="fa fa-clock-o"></i> <?php echo get_the_date('d/m/Y'); ?></p>
        </a>
    </div>
</div>
