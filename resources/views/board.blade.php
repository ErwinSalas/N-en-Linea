<div class="table-responsive">
    <table class="table">
        @for ($i = 0; $i <= ($GameBoard->size/$GameBoard->rows_number)-1; $i++)
            <tr class="board-borders">
                @for ($j = 0; $j <= $GameBoard->rows_number-1; $j++)
                    <td class="board-borders" onclick="userPressTile(this)" id="{{$j}}">
                        @if($GameBoard->tablero[($i*8)+$j]==1)
                            <img src="images/Red.png" class="img-circle img-responsive"  >
                        @elseif($GameBoard->tablero[($i*8)+$j]==2)
                            <img src="images/Yellow.jpg" class="img-circle img-responsive"  >
                        @else
                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-circle img-responsive"  >
                        @endif
                    </td>
                @endfor
            </tr>
        @endfor
    </table>
</div>