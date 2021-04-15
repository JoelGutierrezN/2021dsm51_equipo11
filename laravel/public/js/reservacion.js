 $(document).ready(function(){

    var fecha = new Date();

    $('#contenedor-fechas').toggle();
    $('#contenedor-mascotas').toggle();
    $('#contenedor-servicios').toggle();
    $('#contenedor-direcciones').toggle();
    $('#selc_direccion').toggle();

    $('input[type="checkbox"]').prop('hidden', true);

    //fechas
    $('#fechas').click(function(){
        $('#contenedor-fechas').toggle();
    });

    $('#today').html('<span> Hoy: </span>'+fecha.getDate()+'/'+(fecha.getMonth()+1)+'/'+fecha.getFullYear());
    $('#hoy').attr('value', fecha.getFullYear()+'-'+(fecha.getMonth()+1)+'-'+fecha.getDate());
    fecha.setDate(fecha.getDate()+1);
    $('#tomorrow').html('<span> Mañana: </span>'+fecha.getDate() +'/'+ (fecha.getMonth()+1) +'/'+ fecha.getFullYear());
    $('#mañana').attr('value', fecha.getFullYear()+'-'+(fecha.getMonth()+1)+'-'+fecha.getDate());   
    fecha.setDate(fecha.getDate()+1);
    $('#afterTomorrow').html('<span> Pasado: </span>'+fecha.getDate()+'/'+(fecha.getMonth()+1)+'/'+fecha.getFullYear());
    $('#pasado').attr('value', fecha.getFullYear()+'-'+(fecha.getMonth()+1)+'-'+fecha.getDate());

    $('#today').click(function(){
        if($('#hoy').is(':checked'))
            $('#hoy').prop('checked', false);
        else
            $('#hoy').prop('checked', true);
    });

    $('#tomorrow').click(function(){
        if($('#mañana').is(':checked'))
            $('#mañana').prop('checked', false);
        else
            $('#mañana').prop('checked', true);
    });

    $('#afterTomorrow').click(function(){
        if($('#pasado').is(':checked'))
            $('#pasado').prop('checked', false);
        else
            $('#pasado').prop('checked', true);
    });

    //mascotas
    $('#servicios').click(function(){
        $('#contenedor-servicios').toggle();
    });

    //servicios

    $('#mascotas').click(function(){
        $('#contenedor-mascotas').toggle();
    });

    $('#direcciones').click(function(){
        $('#contenedor-direcciones').toggle();
    });

    $('#facturacion').click(function(){
        $('#contenedor-facturacion').toggle();
    });


    //Calcular

    $('#calcular').click(function(){
        if($('#hoy').prop('checked') || $('#mañana').prop('checked') || $('#pasado').prop('checked') ){}
        else{
        alert('debes elegir una fecha como minimo');
        }   
    });
    var IVA = 0;
    var subtotal = 0;
    var total = 0;
    var total_servicios = 0;
    var total_habitacion = 0;
    var total_domicilio = 0;

    $('input[name="services[]"]').change(function(e){
        $('.servicios').empty();
        total_servicios = 0;
        var servicios = $('input[name="services[]"]:checked'); 
        servicios.each((index, item) => {
            var servicio = $(item);
            $('.servicios').append("<div class='item-compra'>"+servicio.data('name') +' <span>$'+servicio.data('cost')+"</span></div>");
            total_servicios += parseInt(servicio.data('cost'));
        });
        totalcalculo(total_servicios,total_habitacion,total_domicilio); 
    });

    $('input[name="dates[]"]').change(function(e){
        $('.fechas').empty();
        total_habitacion = 0;
        var fechas = $('input[name="dates[]"]:checked'); 
        fechas.each((index, item) => {
            var fecha = $(item);
            $('.fechas').append("<div class='item-compra'>"+fecha.val() +' <span>$'+fecha.data('cost')+"</span></div>");
            total_habitacion += parseInt(fecha.data('cost'));
        });
        totalcalculo(total_servicios,total_habitacion,total_domicilio);  
    });

    $('input[name="homeservice"]').change(function(e){
        $('.domicilio').empty();
        total_domicilio = 0;
        var fechas = $('input[name="homeservice"]:checked'); 
        fechas.each((index, item) => {
            var fecha = $(item);
            $('.domicilio').append("<div class='item-compra'>Servicio a Domicilio <span>100</span></div>");
            total_domicilio += parseInt('100');
        });
        totalcalculo(total_servicios,total_habitacion,total_domicilio);  
    });

    $('input[name="homeservice"]').change(function (e){
        $('#selc_direccion').toggle();
    });


    
    function totalcalculo(total_servicios, total_habitacion, total_domicilio){
        subtotal = 0;
        total = 0;
        IVA = 0;
    
        subtotal += total_servicios + total_habitacion + total_domicilio;
        
        IVA = subtotal * 0.16;

        total = subtotal + IVA;

        $('#subtotal').val(subtotal);
        $('#IVA').val(IVA);
        $('#total').val(total);
    }  
});
