<div class="container" style="margin-top: 10%">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary" style="margin-left: 20%">  <!--cambiar por externo-->
                <div class="panel-heading">
                    <h5 id="sessionIDHeader"></h5>
                </div>
                <div class="panel-body">
                    <div class="playersInfo">
                        <div id="player1">
                            <b>Jugador 1:</b>
                            <span></span>
                        </div>
                        <div id="player2">
                            <b>Jugador 2:</b>
                            <span>Sin fijar</span>
                        </div>
                    </div>
                    <h5 id="wait"></h5>
                    <div id="createdSessionButtons">
                        <button type="button" class="btn btn-success disabled">Jugar</button>
                        <button type="button" class="btn btn-danger" id="cancelSessionBtn">Cancelar Sesion</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#cancelSessionBtn').on('click',function () {
        var sessionID = $('#session_id').val();
        var route = serverRoute+"/deleteSession/"+sessionID;

        $.ajax({
            url: route,
            type: 'GET',
            success: function(data){
                alert(data.msg);
                window.location.assign(serverRoute+"/home");
            }
        });
    });
</script>