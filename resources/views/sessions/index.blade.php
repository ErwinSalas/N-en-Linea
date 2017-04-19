<div class="container">
    <h1>Click the filter icon <small>(<i class="glyphicon glyphicon-filter"></i>)</small></h1>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Salas de juego disponibles</h3>
                    <div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
                    </div>
                </div>
                <div class="panel-body">
                    <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Jugador</th>
                            <th>Tamaño</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($gamesessions as $gamesession)
                            <tr class="board-borders">
                                <td class="board-borders" >
                                    {{$gamesession->player_1->email}}
                                </td>
                                <td class="board-borders" >
                                    {{$gamesession->state}}
                                </td>
                                <td class="board-borders" >
                                    {{$gamesession->gameboard->number_rows}}
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
