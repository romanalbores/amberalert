/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(".rel_vict_sospechoso_sospechoso").click(function(e){
    var victima = $(this).data("victima");
    $.ajax({
        type: "POST",
        url:  yii_profile.urls.verImagen,
        data: {'id_usuario':victima},
        beforeSend: function() {            
            console.log('buscando iamgen');
        },
        success:function(data){
            $("#imagen_victima").css("display","table");
            $("#imagen_victima").html(data);
    },
    error: function(e){
        console.log(e.message);
    }
    });
});


/**
 * Botones para visualizar/ocultar contenedores de visuliazcion y ubicacion de reporte
 */
$("#visualizacion-btn-continuar").click(function(e){
    e.preventDefault();
    /**
     * Validar que hayan seleccionado al menos una visualizacion
     */
    var acceso = true;
    if($(".chk-visulizacion").is(':checked')){
        acceso = true;
    }else{
        acceso = false;
    }
    if(acceso === true){
        $("#container-visualizacion").css("display",'none');
        $("#container-ubicacion").css("display",'block');
        $("#visualizacion-label-error").css("display",'none');
    }else{
        $("#visualizacion-label-error").css("display",'block');
    }
    
});

$("#ubicacion-btn-continuar").click(function(e){
    e.preventDefault();
    console.log("casi finalizar");
     /**
     * Validar que hayan seleccionado al menos una ubicacion
     */
    var acceso = true;
    if($(".chk-ubicacion").is(':checked')){
        acceso = true;
    }else{
        acceso = false;
    }
    if(acceso === true){
        $("#container-finalizar").css("display",'block');
        $("#container-ubicacion").css("display",'none');
        $("#ubicacion-label-error").css("display",'none');
        
        /**
         * Verificamos cuales han sido las horas y las ubicaciones seleccionadas para poder hcaer  visualizar los datos
         */
        
        var horarios_id = new Array();
        var horarios_dia = new Array();
        var horarios_hora_inicio = new Array();
        var horarios_hora_fin = new Array();
        $(".chk-visulizacion:checked").each(function(){
            horarios_id.push($(this).data("id"));
            horarios_dia.push($(this).data("dia"));
            horarios_hora_inicio.push($(this).data("hora_inicio"));
            horarios_hora_fin.push($(this).data("hora_fin"));
        });
              
        
        var ubicaciones_id = new Array();
        var ubicaciones_poste = new Array();
        var ubicaciones_calle = new Array();
        var ubicaciones_colonia = new Array();
        var ubicaciones_localidad = new Array();
        var ubicaciones_zona = new Array();
        $(".chk-ubicacion:checked").each(function(){
            ubicaciones_id.push($(this).data("id"));
            ubicaciones_poste.push($(this).data("poste"));
            ubicaciones_calle.push($(this).data("calle"));
            ubicaciones_colonia.push($(this).data("colonia"));
            ubicaciones_localidad.push($(this).data("localidad"));
            ubicaciones_zona.push($(this).data("zona"));
        });
            
        
        $("#table-finalizar-ubicacion tbody").remove();
        $("#table-finalizar-horario tbody").remove();
        
        /**
         * Funciones para que nos regresen los datos seleccionados
         */
        var contador = 0;
        $(ubicaciones_id).each(function(){
            var tmp_poste = ubicaciones_poste[contador];
            var tmp_calle = ubicaciones_calle[contador];
            var tmp_colonia = ubicaciones_colonia[contador];
            var tmp_localidad = ubicaciones_localidad[contador];
            var tmp_zona = ubicaciones_zona[contador];
            var tmp_contador = contador + 1;
            $("#table-finalizar-ubicacion").append("<tr><td>"+tmp_contador+"</td><td>"+tmp_poste+"</td><td>"+tmp_calle+"</td><td>"+tmp_colonia+"</td><td>"+tmp_localidad+"</td><td>"+tmp_zona+"</td></tr>");
            contador = contador + 1;
        });
        
        
        contador = 0;
        $(horarios_id).each(function(){
            var tmp_dia = horarios_dia[contador];
            var tmp_hora_inicio = horarios_hora_inicio[contador];
            var tmp_hora_fin = horarios_hora_fin[contador];            
            var tmp_contador = contador + 1;
            $("#table-finalizar-horario").append("<tr><td>"+tmp_contador+"</td>\n\
                                                        <td>"+tmp_dia+"</td>\n\
                                                        <td>"+tmp_hora_inicio+"</td>\n\
                                                        <td>"+tmp_hora_fin+"</td></tr>");
            contador = contador + 1;
        });
        
        
        
        var horarios_id = new Array();
        $(".chk-visulizacion:checked").each(function(){
            horarios_id.push($(this).data("id"));
        });
        console.log("pre ajax");
        $.ajax({            
            type: "POST",
            url:  yii_profile.urls.detalleSemana,
            data: {'id_usuario':horarios_id},
            beforeSend: function() {            
                console.log('entro ajax');
            },
            success:function(data){
                $("#finalizar-horario").html(data);
            console.log("regreso ajax");
        },
        error: function(e){
            console.log(e.message);
        }
        });
        
        
    }else{
        $("#ubicacion-label-error").css("display",'block');
    }
});

$("#ubicacion-btn-atras").click(function(e){
    e.preventDefault();
    $("#container-visualizacion").css("display",'block');
    $("#container-ubicacion").css("display",'none');
});

$("#finalizar-btn-atras").click(function(e){
    e.preventDefault();
    $("#container-finalizar").css("display",'none');
    $("#container-ubicacion").css("display",'block');
});

$("#finalizar-btn-continuar").click(function(e){
    e.preventDefault();
       
    var horarios_id = new Array();        
    $(".chk-visulizacion:checked").each(function(){
        horarios_id.push($(this).data("id"));
    });
    var ubicaciones_id = new Array();        
    $(".chk-ubicacion:checked").each(function(){
        ubicaciones_id.push($(this).data("id"));
    });
    var incidencia = $("#finalizar-btn-continuar").data("incidencia");
    $.ajax({
        type: "POST",
        url:  yii_profile.urls.guardarConfiguracionPoste,
        data: {'configuracion':horarios_id, 'poste':ubicaciones_id, 'incidencia':incidencia},
        beforeSend: function() {            
            console.log('buscando iamgen');
        },
        success:function(){
            $("#contenedor-vista-previa").css("display","none");
            $("#boton-nueva-configuracion").css("display","inline");
    },
    error: function(e){
        console.log(e.message);
    }
    });
        
    
    
   
});