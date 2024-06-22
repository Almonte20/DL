$(document).on('change', '#region_sede',(function(event)
{
    var dirConsultaDependiente = "/getFechabyRegion/" + event.target.value;
    obtenerDependientes(dirConsultaDependiente, "#fecha");
}));

$(document).on('change', '#fecha',(function(event)
{
    var dirConsultaDependiente = "/getHorabyFecha/"+$("#region_sede").val()+"/"+ event.target.value;
    obtenerDependientesHora(dirConsultaDependiente, "#hora");
}));

function obtenerDependientes(dirConsultaDependiente, selectDependiente)
{
     $.ajax({
        url: dirConsultaDependiente,
        success: function(data)
        {
          console.log(data);
          $(selectDependiente).empty();
          $(selectDependiente).append('<option value="0">Seleccione una fecha</option>');
          $.each(data, function(index,dato)
          {
              $(selectDependiente).append('<option value="'+dato.Fecha+'">'+dato.FechaFormat+'</option>');
          });
        }
    });
}

function obtenerDependientesHora(dirConsultaDependiente, selectDependiente)
{
     $.ajax({
        url: dirConsultaDependiente,
        success: function(data)
        {
          var hora="";
          $('#hora').empty();
          $('#hora').append('<option value="0">Seleccione una hora</option>');
          $.each(data, function(index,dato)
          {
              hora=dato.Hora.split(":");
              $("#hora").append('<option value="'+dato.Hora+'">'+hora[0]+":"+hora[1]+'</option>');
          });
        }
    });
}
