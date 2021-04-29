$(document).ready(function($){
    
    $('.cardImg').each(function(index, value){
        var atributo = $(value).attr('backimage');
        $(value).css("background-image", "url('" + atributo + "')");
    });

    $('.cardImgHorizontal').each(function(index, value){
        var atributo = $(value).attr('backimage');
        $(value).css("background-image", "url('" + atributo + "')");
    });

    // Remove better-nav quando clicar em um link
    $('#side-menu').on('click', '.nav-link', function () {

        var body = $('body');
        var overlay = $('.side-menu-overlay');
        var sideMenu = $('#side-menu');
        
        function slideOut() {
            body.removeClass('side-menu-visible');
            overlay.fadeOut();
            setTimeout(function() {
                sideMenu.hide();
                body.removeClass('overflow-hidden');
            }, 400);
        }
    
        slideOut();
    
    });

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