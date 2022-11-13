      document.addEventListener('DOMContentLoaded', function() {
    

        let formulario = document.getElementById("form1");

        var calendarEl = document.getElementById('agenda');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          
          initialView: 'dayGridMonth',
          
          locale:"es",
          displayEventTime:false,
          headerToolbar: {
            left:'prev,next today',
            center: 'title',
            right:'dayGridMonth,timeGridWeek,listWeek'
          },
        //  events: baseURL + "/Calendario/mostrar",

        eventSources:{
          url: baseURL + "/Calendario/mostrar",
          method:"POST",
          extraParams: {
            _token: formulario._token.value,
          }
        },

          dateClick:function(info) {
            formulario.reset();
            formulario.start.value=info.dateStr;
            formulario.end.value=info.dateStr;
            $("#evento").modal("show");

          },

          eventClick: function(info){
            var evento= info.event;
            console.log(evento);
            axios.post(baseURL+'/Calendario/editar/' + info.event.id).
            then(
              (response) => {
                formulario.id.value= response.data.id;
                formulario.title.value= response.data.title;
                formulario.descripcion.value= response.data.descripcion;
                formulario.start.value= response.data.start;
                formulario.end.value= response.data.end;
                $("#evento").modal("show");
              }
            ).catch(
              error=>{
                if(error.response){
                  console.log(error.response.data);
  
                }
              }
            )
          }

        });
        calendar.render();

        document.getElementById("btnGuardar").addEventListener("click", function(){
          enviarDatos("/Calendario/agregar")
        });
        document.getElementById("btnEliminar").addEventListener("click", function(){
          enviarDatos("/Calendario/borrar/" + formulario.id.value)
        });
        document.getElementById("btnModificar").addEventListener("click", function(){
          enviarDatos("/Calendario/actualizar/" + formulario.id.value)
        });
      
        function enviarDatos(url) {
          
          const datos = new FormData(formulario);

          const nuevaURL = baseURL+url;

          axios.post(nuevaURL, datos).
          then(
            (response) => {
              calendar.refetchEvents();
              $("#evento").modal("hide");
            }
          ).catch(error=>{
            if(error.response){
                console.log(error.response.data);

              }
            }
          )

        }

      });
