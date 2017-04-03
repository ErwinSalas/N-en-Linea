/**
 * Created by Pavilion on 5/3/2017.
 */
$(document).ready(function(){
    loadWelcome();
});


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




