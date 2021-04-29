<?php

	// Carrega a URL da imagem fullsize
	$img_url = get_the_post_thumbnail_url(get_the_ID());

 ?>

<!-- Conteúdo do Thumb -->
<div class="thumbsProject">
    <div>
        <?php the_tags('<span class="categorias">',' | ','</span>'); ?>
        <a href="<?php the_permalink(); ?>">
            <h1><?php the_title(); ?></h1>
        </a>
    </div>
</div>
