/**
 * Created by Pavilion on 15/4/2017.
 */
function waitOponent(){
    var textTag = $("#wait");
    var id = $("#session_id").val();

    console.log("entro ciclo");
    textTag.html("Esperando jugador.");
    textTag.html("Esperando jugador..");
    var route = "http://localhost:8000/jsongamessesion/"+id;
    $.ajax({
        url: route,
        type: 'GET',
        success: function(data){
            console.log(data);

            if (data.state!=0){
                loadGameBoard();
            }

        }
    });
    textTag.html("Esperando jugador....");

}
