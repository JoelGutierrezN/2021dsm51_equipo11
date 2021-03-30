var url = 'http://dsm.safetydogs.online';
var fecha = new Date();
$(document).ready(function(){
    $('.habitacion-disponible').css('cursor', 'pointer');

    $('.habitacion-disponible').unbind('click').click( function (){

        $.ajax({
            url: url+'//dislike/'+$(this).data('id'),
            type: 'GET',
            success: function(response){
                if(response.like){
                    //paso
                }else{
                    //error
                }
            }
        });

        $(this).addClass('habitacion-no-disponible').removeClass('habitacion-disponible'); 
    });

    $('#today').html('<span> Hoy: </span>'+fecha.getDate()+'/'+(fecha.getMonth()+1)+'/'+fecha.getFullYear());
    fecha.setDate(fecha.getDate()+1);
    $('#tomorrow').html('<span> Mañana: </span>'+fecha.getDate() +'/'+ (fecha.getMonth()+1) +'/'+ fecha.getFullYear());
    fecha.setDate(fecha.getDate()+1);   
    $('#afterTomorrow').html('<span> Pasado: </span>'+fecha.getDate()+'/'+(fecha.getMonth()+1)+'/'+fecha.getFullYear());
});  