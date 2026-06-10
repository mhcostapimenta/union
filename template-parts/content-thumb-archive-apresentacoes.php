<?php

	// Carrega a URL da imagem fullsize
	$img_url = get_the_post_thumbnail_url(get_the_ID());

    // Monta uma substring com os primeiros 200 caracteres do resumo
    $txt_resumo = get_the_excerpt();
    $resumo = substr($txt_resumo, 0, 200).'[...]';

 ?>

<!-- Conteúdo do Thumb -->
<div class="col-12 col-md-4">
    <div class="card">
        <div class="cardImg" backimage="<?php  echo $img_url; ?>"></div>
        <div class="cardText cardTextArchive">
            <div>
                <span class="cardCategoria"><?php echo the_tags('',' | ',''); ?></span>
                <h3><strong><?php echo the_title(); ?></strong></h3>
                <?php
                $nome_evento = rwmb_meta( 'union-nomeEvento' );
                if ( ! empty( $nome_evento ) ) {
                    echo '<h4>' . esc_html( $nome_evento ) . '</h4>';
                }
                
                $data_evento = rwmb_meta( 'union-dataEvento' );
                $data_exibicao = ! empty( $data_evento ) ? convertToDate( $data_evento ) : get_the_date( 'd/m/Y' );
                ?>
                <span class="cardData"><i class="fa fa-calendar"></i><?php echo $data_exibicao; ?></span>
                <p><?php echo $resumo; ?></p>
            </div>
            <div class="text-end"><a class="btn btn-primary btnCard" role="button" href="<?php echo the_permalink(); ?>"><?php union_the_string('Ler'); ?></a></div>
        </div>
    </div>
</div>