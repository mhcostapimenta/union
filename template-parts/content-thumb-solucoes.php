<?php

	// Carrega a URL da imagem fullsize
	$img_url = get_the_post_thumbnail_url(get_the_ID());

 ?>

<!-- Conteúdo do Thumb -->
<div class="col-12 col-sm-6 col-md-4 col-lg-3 solucoes">
    <div class="solucoesIcon" style="background-image: url(<?php echo $img_url; ?>)"></div>
    <h2><?php echo the_title(); ?></h2>
    <p><?php echo rwmb_meta( 'union-txtSolucao' ); ?></p>
</div>