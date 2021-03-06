<div class="container" style="margin-top: 10%">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-left: 20%">  <!--cambiar por externo-->
                <div class="panel-heading">Crear Sesion</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/gameSession" >
                    {{ csrf_field() }}

                        <div class="form-group">
                            <label for="boardLevelInput" class="col-md-4 control-label">Tamaño del Tablero:</label>
                            <div class="col-md-6">
                                <select id="boardLevelInput" name="size">
                                    <option value=6>Facil(5x5)</option>
                                    <option value=8>Medio(8x8)</option>
                                    <option value=10>Dificil(10x10)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="NLineInput" class="col-md-4 control-label">Cantidad N Fichas para ganar:</label>
                            <div class="col-md-6">
                                <select id="NLineInput" name="nValue">
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="sendSessionForm()">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>