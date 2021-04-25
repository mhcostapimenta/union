<?php 
	// Carrega a URL da imagem fullsize
	$img_url = get_the_post_thumbnail_url(get_the_ID());
 ?>

<div class="col-12 col-sm-6 col-md-4 col-lg-3">
	<div class="logo"><img src="<?php echo $img_url; ?>"></div>
</div>