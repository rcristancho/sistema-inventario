/*
$(document).ready(function(){
  $("#estados").change(function(){
    var estados = $(this).val();
    $.get('/srce/centros/'+estados, function(data){
      var centro_select = '<option value="">Seleccione</option>'
      for (var i=0; i<data.length;i++){
        centro_select+='<option value="'+data[i].centro_id+'">'+data[i].centro_nombre+'</option>';
      };
      $("#centros").html(centro_select);
    });
  });
});
*/

$(document).ready(function (){
  $("#cedula").on('change', function (){
    var cedula = $("#cedula").val();
    $.get('?cedula='+cedula, function(data){
      alert(data);
    });
    //alert(cedula);
  });
});