<?php 
	// Carrega a URL da imagem fullsize
	$img_url = get_the_post_thumbnail_url(get_the_ID());

	global $delay;

 ?>

<div class="col-12 col-sm-6 mb-3">
	<div class="cardParceiros animate" data-effect="fade-in" style="animation-delay: <?php echo $delay ?>s">
		<a href="<?php the_permalink(); ?>">
      <h2><?php the_title(); ?></h2>
    </a>
	</div>
</div>