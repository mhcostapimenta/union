$(document).ready(function($){
    
    // Lazy Loading para imagens de fundo (background-image)
    const lazyBackgrounds = document.querySelectorAll('.cardImg, .cardImgHorizontal, .solucoesIcon');

    if ('IntersectionObserver' in window) {
        let lazyBackgroundObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    let lazyBackground = entry.target;
                    let imgUrl = lazyBackground.getAttribute('backimage');
                    
                    // Se não tiver backimage (caso das soluções), tenta pegar de outro lugar ou já está no style
                    if (!imgUrl && lazyBackground.classList.contains('solucoesIcon')) {
                        // Para soluções, o WP já injetou no style, mas poderíamos mover para cá se quiséssemos
                        // Por ora, vamos focar nos que usam o atributo 'backimage'
                    }

                    if (imgUrl) {
                        lazyBackground.style.backgroundImage = 'url(' + imgUrl + ')';
                    }
                    
                    lazyBackgroundObserver.unobserve(lazyBackground);
                }
            });
        });

        lazyBackgrounds.forEach(function(lazyBackground) {
            lazyBackgroundObserver.observe(lazyBackground);
        });
    } else {
        // Fallback para navegadores antigos
        $('.cardImg, .cardImgHorizontal').each(function(index, value){
            var atributo = $(value).attr('backimage');
            $(value).css("background-image", "url('" + atributo + "')");
        });
    }

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