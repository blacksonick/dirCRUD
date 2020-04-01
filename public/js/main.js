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
    $("#select_estados").change(function(){
        var id_estado = $(this).val();
        if(!id_estado){
            $("#select_municipios").html('');
            $("#select_ciudades").html('');
            return;  
        }
        
        // AJAX // 
        $.get('/api/municipio/'+id_estado,function(data){
            var out = '<option value="">Seleccione un municipio</option>';
            for (var i = 0; i < data.length; ++i) {
                out += '<option value="'+ data[i].id +'">'+ data[i].municipio +'</option>';
            }
            $("#select_municipios").html(out);  
        });
        
        // AJAX // 
        $.get('/api/ciudad/'+id_estado,function(data){
            var out = '<option value="">Seleccione una ciudad</option>';
            for (var i = 0; i < data.length; ++i) {
                out += '<option value="'+ data[i].id +'">'+ data[i].ciudad +'</option>';
            }
            $("#select_ciudades").html(out);  
        });
    });
    $("#select_municipios").change(function(){
        var id_estado = $(this).val();
        if(!id_estado){
            $("#select_parroquias").html('');
            return;  
        }
        
        // AJAX // 
        $.get('/api/parroquia/'+id_estado,function(data){
            var out = '<option value="">Seleccione una parroquia</option>';
            for (var i = 0; i < data.length; ++i) {
                out += '<option value="'+ data[i].id +'">'+ data[i].parroquia +'</option>';
            }
            $("#select_parroquias").html(out);  
        });
    });
});
