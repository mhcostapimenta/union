<?php

	// Carrega a URL da imagem thumb
	$img_url = get_the_post_thumbnail_url(get_the_ID(), 'thumb');

  // Monta uma substring com os primeiros 200 caracteres do resumo
  $txt_resumo = get_the_excerpt();
  $resumo = substr($txt_resumo, 0, 200).'[...]';

  global $delay;

 ?>

<!-- Conteúdo do Thumb -->
<div class="col-12 col-md-6 col-lg-4">
  <div class="card animate" data-effect="fade-in" style="animation-delay: <?php echo $delay ?>s">
      <div class="cardImg" backimage="<?php  echo $img_url; ?>"></div>
      <div class="cardText cardApresMain">
        <div>
          <span class="cardCategoria"><?php echo the_tags('',' | ',''); ?></span>
          <h3><strong><?php echo the_title(); ?></strong></h3>
          <h4><?php echo rwmb_meta( 'union-nomeEvento' ); ?></h4>
          <span class="cardData"><i class="fa fa-calendar"></i><?php echo convertToDate(rwmb_meta( 'union-dataEvento' )); ?></span>
          <p><?php echo $resumo; ?></p>
        </div>
        <div class="text-end">
          <a class="btn btn-primary btnCard" role="button" href="<?php echo the_permalink(); ?>"><?php union_the_string('Ler'); ?></a>
        </div>
      </div>
  </div>
</div>