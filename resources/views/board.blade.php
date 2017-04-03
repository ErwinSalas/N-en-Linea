<div class="table-responsive">
    <table class="table">

        @for ($i = 0; $i <= ($GameBoard->tamañoTablero/$GameBoard->tamañoFila)-1; $i++)
            <tr class="board-borders">
                @for ($j = 0; $j <= $GameBoard->tamañoFila-1; $j++)

                    <td class="board-borders" onclick="userPressTile(this)" id="{{$j}}">
                        @if($GameBoard->tablero[($i*8)+$j]==1)
                            <img src="images/Red.png" width="200" height="200" class=" img-circle img-responsive"  >
                        @elseif($GameBoard->tablero[($i*8)+$j]==2)
                            <img src="images/Yellow.jpg" width="200" height="200" class=" img-circle img-responsive"  >
                        @else
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class=" img-circle img-responsive"  >

                        @endif

                    </td>
                @endfor
            </tr>
        @endfor


    </table>
</div>