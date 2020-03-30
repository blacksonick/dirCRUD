/* Ingresa tus script propios aqui*/

var server = window.location.hostname+':'+location.port;
var URL = 'http://'+server+'/direccion/';

$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".fixed-top").addClass("top-nav-collapse");
    } else {
        $(".fixed-top").removeClass("top-nav-collapse");
    }
});
     $(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

$(document).ready(function(){
  $('.toast').toast('show');
});

 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

/*---------- Listar Estados/Municipios/Ciudades/Parroquias ----------*/
$(document).ready(function(){
    $("#id_direccion").change(function(){
        $.get(URL+'/',"id_estado="+$("#id_estado").val(), function(respuesta){
            $("#id_municipio").html(respuesta);
        });
    });
    $("#id_estado").change(function(){
        $.get(URL+'jQuery/ciudad',"id_estado="+$("#id_estado").val(), function(respuesta){
            $("#id_ciudad").html(respuesta);
        });
    });
    $("#id_municipio").change(function(){
        $.get(URL+'jQuery/parroquia',"id_municipio="+$("#id_municipio").val(), function(respuesta){
            $("#id_parroquia").html(respuesta);
        });
    });
});
