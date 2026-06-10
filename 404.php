<!-- Carrega o cabeçalho -->
<?php get_header(); ?> 

<section id="conteudo">

    <div id="errorContent">
        <div class="row">
            <div class="col">
                <div class="container">
                    <h1 class="titulo-secao"><?php union_the_string('Erro 404'); ?></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container">
                    <h2><?php union_the_string('Página não encontrada. Por favor, verifique o endereço digitado.'); ?></h2>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- Carrega o footer -->
<?php get_footer(); ?> 
