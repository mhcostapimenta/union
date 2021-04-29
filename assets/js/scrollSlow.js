var $doc = $('html, body');
$('.scrollSlow').click(function() {
    $doc.animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 500);
    return false;
});

$(document).ready(function(){    
    //pego a url e transformo em String
    var url = window.location.href.toString();

    //testo se existe alguma ancora na url    
    if(url.indexOf('#') != -1) {
        //se houver, extraio a ancora
        var ancora = url.substring(url.indexOf('#'));
        // referencio o elemento da ancora
        $target = $(ancora);
        // faço o scroll para a ancora.
        $('html, body').animate({'scrollTop': ($target.offset().top)}, 500, 'swing');
    } else {
        $('body,html').scrollTop(0);
    }
});