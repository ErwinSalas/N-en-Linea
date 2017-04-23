/**
 * Created by Pavilion on 15/4/2017.
 */
function waitOponent(){
    var textTag = $("#wait");
    var id = $("#session_id").val();

    console.log("entra ciclo");
    var icon = "<i class=\"fa fa-spinner fa-pulse fa-3x fa-fw\"></i><span id=\"hintSpan\">Esperando a jugador 2...</span>";
    textTag.html(icon);
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
}
