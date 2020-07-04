function actividadesSeleccionadas(idUsuario){
    $("#btnEnviar").click(function(e) {
      var arrTodo = new Array();

      $('input[name="CheckListTarea"]').each(function(element) {
        var item = {};
        item.id = this.value;
        item.status = this.checked;
        arrTodo.push(item);
        /*ajax fun */
      });
      /*
        Aquí convendría lanzar una petición Ajax al servidor
        enviándole la variabel toPost
        En el servidor desglosamos esa variable
        obteniendo cada id y cada estatus y procesamos los datos
      */

     $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

     $.ajax({
        url: "/actividades/listas/" + idUsuario,
        type:"PUT",
        //dataType: "json",
        data:{
            resultado:arrTodo,
            id:idUsuario
        },
        success:function(response){
             location.reload();
        },
       });
    
    });
  }