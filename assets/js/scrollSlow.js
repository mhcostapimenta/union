var $doc = jQuery('html, body');
jQuery('.scrollSlow').click(function() {
    $doc.animate({
        scrollTop: jQuery( jQuery.attr(this, 'href') ).offset().top
    }, 500);
    return false;
});

jQuery(document).ready(function(){    
    //pego a url e verifico se tem ancora
    var url = window.location.href.toString();
    //console.log(url);
    //testo se existe ancora na url    

    if(url.indexOf('#') != -1) {
        //extraio a ancora
        var ancora = url.substring(url.indexOf('#'));
        //console.log(ancora);
        altura = 110;
        $target = jQuery(ancora);
        //console.log($target);
        jQuery('html, body').animate({        
            'scrollTop': ($target.offset().top-altura)
        }, 0, 'swing', function () {
            //console.log($target.offset().top-altura);
            window.location.hash = $target.offset().top-altura;

        });
    }
}); //fim do ready()