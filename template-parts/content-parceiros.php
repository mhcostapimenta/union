<?php 
	// Carrega a URL da imagem fullsize
	$img_url = get_the_post_thumbnail_url(get_the_ID());
 ?>

<div class="col-12 col-sm-6">
	<div class="cardParceiros">
		<a href="<?php the_permalink(); ?>">
      <h2><?php the_title(); ?></h2>
    </a>
	</div>
</div>