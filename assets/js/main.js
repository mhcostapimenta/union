$(document).ready(function($){
    
    $('.cardImg').each(function(index, value){
        var atributo = $(value).attr('backimage');
        $(value).css("background-image", "url('" + atributo + "')");
    });

    $('.cardImgHorizontal').each(function(index, value){
        var atributo = $(value).attr('backimage');
        $(value).css("background-image", "url('" + atributo + "')");
    });

    // function ativaNoScroll() { 
    //     $('.animate').each(function(index, value){
    //         var size = window.innerHeight;
    //         var coordY = $(value).offset().top;
    //         if (coordY < size) {
    //             $(value).addClass("intro");
    //         }
    //     });
    // };

});

// Função para ativar animação pelo Scroll
// Colocar o classe animate no elemento a ser animado e efeito criado no CSS no atributo data-effect
function ativaNoScroll() {
    document.querySelectorAll('.animate').forEach((objeto,index)=>{
        if (objeto.getBoundingClientRect().top < window.innerHeight) {
            objeto.classList.add(objeto.dataset.effect);
        } else {
            objeto.classList.remove(objeto.dataset.effect);
            objeto.style.opacity = '0';
        }
    })
}

window.addEventListener('scroll',ativaNoScroll);