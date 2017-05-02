<div class="container" style="padding-left: 279px;">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary" id="sessionsPanel">
                <div class="panel-heading">
                    <h3 class="panel-title">Salas de juego disponibles</h3>
                </div>
                <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID de sala</th>
                                <th>Creador de sala</th>
                                <th>Puntuación del creador</th>
                                <th>Tamaño</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gamesessions as $gamesession)
                                <tr class="board-borders">
                                    <td>
                                        {{$gamesession->boardID}}
                                        <input type="hidden" id="sessionID" value="{{$gamesession->id}}">
                                    </td>
                                    <td class="board-borders" >
                                        {{$gamesession->name}}
                                    </td>
                                    <td class="board-borders" >
                                        {{$gamesession->score}}
                                    </td>
                                    <td class="board-borders" >
                                        {{$gamesession->rows_number}}x{{$gamesession->rows_number}}
                                    </td>
                                    <td>
                                        <button type="button" id="joinBtn" class="btn btn-success">Unirse</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('button').on('click',function () {
        var sessionID = $('#sessionID').val();
        var route = serverRoute + "/joinSession/" + sessionID;
        console.log(route);

        $.ajax({
            url: route,
            type: 'GET',
            success: function(data){
                $("#data_view").html(data);
            }
        });
    });
</script>
