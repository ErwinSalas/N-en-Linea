/**
 * Created by Pavilion on 5/3/2017.
 */

var serverRoute = "http://172.24.41.168:8000";

function loadWait(){
    var route2 = serverRoute+"/waitSection";

    $.ajax({
        url: route2,
        type: 'GET',
        success: function(data){
            $("#data_view").html(data);
        }
    });
}

function getCurrentSession(){
    var sessionID = $('#session_id').val();
    var route = serverRoute+"/sessionInfo/"+sessionID;

    $.ajax({
        url: route,
        type: 'GET',
        success: function(data){
            var object = data[0];
            $('#sessionIDHeader').text("Numero de sesion: "+object.sessionID);
            $('#player1 span').text(object.name);
            console.log(data);
            console.log("despues de");
        }
    });
}


function loadSessions(){
    var route2 = serverRoute+"/gameSession";
    $.ajax({
        url: route2,
        type: 'GET',
        success: function(data){
            $("#data_view").html(data);
        }
    });
}

function loadWelcome(){
    var route = serverRoute+"/homeSection";
    $.ajax({
        url: route,
        type: 'GET',
        success: function(data){
            $("#data_view").html(data);
        }
    });
}
function loadCreateSession(){
    var route = serverRoute+"/sessionCreateView";
    $.ajax({
        url: route,
        type: 'GET',
        success: function(data){
            $("#data_view").html(data);
        }
    });
}

function loadGameBoard(){
    var route = serverRoute+"/loadGameBoard";
    $.ajax({
        url: route,
        type: 'GET',
        success: function(data){
            $("#data_view").html(data);
        }
    });
}

function userPressTile(tile){
    var col=parseInt(tile.id);

    console.log("columna",col,"turno",turn);
    var route = serverRoute+"/loadGameBoard";
    $.ajax({
        url: route,
        type: 'GET',
        dataType: 'json',
        data: {
            column : col,
            turn : turn
        },
        success: function(data){
            $("#data_view").html(data);
        }
    });
}


function pcPressTile(){


    console.log("columna",col,"turno",turn);
    var route = serverRoute+"/loadGameBoard";

    $.ajax({
        url: route,
        type: 'GET',
        dataType: 'json',
        data: {
            column : col,
            turn : turn
        },
        success: function(data){
            $("#data_view").html(data);
        }
    });
}






