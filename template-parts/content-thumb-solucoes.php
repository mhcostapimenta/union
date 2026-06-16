<?php

// Carrega a URL da imagem thumb
$img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

global $delay;

?>

<!-- Conteúdo do Thumb -->
<div class="col-12 col-sm-6 col-md-4 mb-2">
    <div class="cardSolucoes animate" data-effect="fade-in" style="animation-delay: <?php echo $delay ?>s">
        <div class="solucoes">
            <div class="solucoesIcon" backimage="<?php echo $img_url; ?>">
                <h3><?php echo the_title(); ?></h3>
            </div>
        </div>
        <div class="solucoesBack">
            <p><?php echo rwmb_meta('union-txtSolucaoBack'); ?></p>
        </div>
    </div>
</div>