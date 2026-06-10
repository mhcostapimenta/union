<!-- Conteúdo do Thumb -->

<div class="cardTextBusca">
    <span class="cardCategoria"><?php the_tags('<span class="categorias">',' | ','</span>'); ?></span>
    <a href="<?php the_permalink(); ?>"><h3><strong><?php the_title(); ?></strong></h3></a>

    <?php
        if (has_category('artigos',$post->ID)) {
    ?>
        <h4><?php the_author(); ?></h4>
        <span class="cardData"><i class="fa fa-calendar"></i><?php echo get_the_date('d/m/Y'); ?></span>
    <?php
        } else if (has_category('projetos',$post->ID)) {
    ?>
        <span class="cardData"><i class="fa fa-calendar"></i><?php echo get_the_date('d/m/Y'); ?></span>           
    <?php
        } else {       
    ?> 
        <h4><?php echo rwmb_meta( 'union-nomeEvento' ); ?></h4>
        <span class="cardData"><i class="fa fa-calendar"></i> <?php echo convertToDate(rwmb_meta( 'union-dataEvento' )); ?></span>           
    <?php
        }
    ?>
    <p><?php the_excerpt(); ?></p>
</div>