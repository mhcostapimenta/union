<?php 
	$linkPost = get_the_permalink();
	$tituloPost = get_the_title();
	$stringWhatsapp = 'whatsapp://send?text='.$linkPost;
	$stringFacebook = 'https://www.facebook.com/sharer/sharer.php?u='.$linkPost;
	$stringTwitter = 'https://twitter.com/home?status='.$linkPost;
	$stringLinkedin = 'https://www.linkedin.com/shareArticle?mini=true&url='.$linkPost.'&title='.$tituloPost;