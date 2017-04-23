/**
 * Created by Pavilion on 5/3/2017.
 */

function loadWait(){
    var route2 = "http://localhost:8000/waitSection";
    $.ajax({
        url: route2,
        type: 'GET',
        success: function(data){
            $("#data_view").html(data);
        }
    });
}

function loadSessions(){
    var route2 = "http://localhost:8000/gameSession";
    $.ajax({
        url: route2,
        type: 'GET',
        success: function(data){
            $("#data_view").html(data);
        }
    });



}
function loadWelcome(){
    var route = "http://localhost:8000/homeSection";
    $.ajax({
        url: route,
        type: 'GET',
        success: function(data){
            $("#data_view").html(data);
        }
    });
}
function loadCreateSession(){
    var route = "http://localhost:8000/sessionCreateView";
    $.ajax({
        url: route,
        type: 'GET',
        success: function(data){
            $("#data_view").html(data);
        }
    });
}

function loadGameBoard(){
    var route = "http://localhost:8000/loadGameBoard";
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

    console.log("columna",col);
    var route = "http://localhost:8000/loadGameBoard";
    $.ajax({
        url: route,
        type: 'GET',
        dataType: 'json',
        data: {
            column : col
        },
        success: function(data){
            $("#data_view").html(data);
        }
    });
}






