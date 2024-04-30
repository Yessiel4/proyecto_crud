$(document).ready(function(){
    $(document).on('change','#pais',function(){

        var seleccion = $(this).val();
            if(seleccion == "venezuela"){
                $("#departamento").hide();
                $("#departamentoS").hide();
                $("#departamentoS").val('');
                $("#ciudad").hide();
                $("#ciudadS").hide();
                $("#ciudadS").val('');
            }else{
                $("#departamento").show();
                $("#departamentoS").show();
                $("#ciudad").show();
                $("#ciudadS").show();
            }
        });
    $(document).on('change','#departamentoS',function(){

        var valor = $(this).val();
        var token = $('#token').val();
        var url = $('#url-ciudad').val();
        $.post(url,{'_token':token,'id':valor}, function(data){
            let cadena = "<option value=''>Seleccione...</option>";
            let cont=0;
            for (let val of data) {
                cadena+="<option value='"+data[cont]['idciudad']+"'>"+data[cont]['nombre']+"</option>";
                cont++;
            }
            $('#ciudadS').html(cadena);
        });
        });
});
