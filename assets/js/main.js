jQuery(document).ready(function($){
    
    jQuery('.cardImg').each(function(index, value){
        var atributo = $(value).attr('backimage');
        jQuery(value).css("background-image", "url('" + atributo + "')");
    });

    jQuery('.cardImgHorizontal').each(function(index, value){
        var atributo = $(value).attr('backimage');
        jQuery(value).css("background-image", "url('" + atributo + "')");
    });

});