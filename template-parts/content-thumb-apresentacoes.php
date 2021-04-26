<?php

	// Carrega a URL da imagem fullsize
	$img_url = get_the_post_thumbnail_url(get_the_ID());

  global $delay;

 ?>

<!-- Conteúdo do Thumb -->
<div class="col-12 col-md-6 col-lg-4">
  <div class="card animate" data-effect="fade-in" style="animation-delay: <?php echo $delay ?>s">
      <div class="cardImg" backimage="<?php  echo $img_url; ?>"></div>
      <div class="cardText">
        <div>
          <span class="cardCategoria"><?php echo the_tags('',' | ',''); ?></span>
          <h1><strong><?php echo the_title(); ?></strong></h1>
          <h2><?php echo rwmb_meta( 'union-nomeEvento' ); ?></h2>
          <span class="cardData"><i class="fa fa-clock-o"></i><?php echo convertToDate(rwmb_meta( 'union-dataEvento' )); ?></span>
          <p><?php echo the_excerpt(); ?></p>
        </div>
        <div class="text-right">
          <a class="btn btn-primary btnCard" role="button" href="<?php echo the_permalink(); ?>">Ler</a>
        </div>
      </div>
  </div>
</div>