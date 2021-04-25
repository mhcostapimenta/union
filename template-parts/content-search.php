<!-- Conteúdo do Thumb -->

<div class="cardTextBusca">
    <span class="cardCategoria"><?php the_tags('<span class="categorias">',' | ','</span>'); ?></span>
    <a href="<?php the_permalink(); ?>"><h1><strong><?php the_title(); ?></strong></h1></a>

    <?php
        if (has_category('artigos',$post->ID)) {
    ?>
        <h2><?php the_author(); ?></h2>
        <span class="cardData"><i class="fa fa-clock-o"></i><?php echo get_the_date('d/m/Y'); ?></span>
    <?php
        } else if (has_category('projetos',$post->ID)) {
    ?>
        <span class="cardData"><i class="fa fa-clock-o"></i><?php echo get_the_date('d/m/Y'); ?></span>           
    <?php
        } else {       
    ?> 
        <h2><?php echo rwmb_meta( 'union-nomeEvento' ); ?></h2>
        <span class="cardData"><i class="fa fa-clock-o"></i> <?php echo convertToDate(rwmb_meta( 'union-dataEvento' )); ?></span>           
    <?php
        }
    ?>
    <p><?php the_excerpt(); ?></p>
</div>