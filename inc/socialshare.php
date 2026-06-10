<?php 
	$linkPost = urlencode(get_the_permalink());
	$tituloPost = urlencode(get_the_title());
    
    // Modern sharing URLs and Instagram profile link
	$stringWhatsapp = 'https://api.whatsapp.com/send?text=' . $tituloPost . '%20' . $linkPost;
	$stringFacebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $linkPost;
	$stringLinkedin = 'https://www.linkedin.com/sharing/share-offsite/?url=' . $linkPost;