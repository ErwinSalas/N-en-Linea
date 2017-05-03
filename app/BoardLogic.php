<?php
namespace App;


class BoardLogic
{

    var $tamañoTablero;
    var $tamañoFila;
    var $tamañoColumna;
    var $numeroGanar;

    var $freeSpaces = array();
    var $tablero = array();
    var $movesControl = array(); # para guardar los movimientos de cada jugador para hacer el vs compu.
    var $rows = array();
    var $columns = array();


    /*function __construct()
    {
        $this->tamañoFila = 5;
        $this->tamañoColumna = 7;
        $this->tamañoTablero = 35;
        $this->numeroGanar = 4;
    }*/
    function __construct($row,$colum)
    {
        $this->tamañoFila = $row;
        $this->tamañoColumna = $colum;
        $this->tamañoTablero = $this->tamañoFila * $this->tamañoColumna;
        $this->numeroGanar = 4;

        $this->crearTablero();
    }

    function crearTablero()
    {
        $contador = 0;
        $rowCounter = 0;// variable para crear las filas
        $rowCounter2 = 0; // variable que lleva el contador de cada fila

        for ($i = 0; $i <= $this->tamañoTablero - 1; $i++) {

            $this->tablero[$i] = '0'; // se le asigna al tablero los numeros 0 en la posicion $i
            $this->rows[$rowCounter][$rowCounter2] = $i; // se asinan las posiciones que seran filas
            // echo $this->rows[$rowCounter][$rowCounter2];

            $rowCounter2++;
            $contador++;

            if ($contador == $this->tamañoFila) {// si se llego al limite de fila entonces
                $contador = 0; // reinicia contador
                $rowCounter2 = 0;// reinicia contador de la fila
                $rowCounter++;// avanza a la siguiente fila.

                //    echo " "."<br />\r\n";
            }

        }//echo $rowCounter;
    }


    function fillColums()
    {

        $colCounter = 0;
        $colCounter2 = 0;
        for($c = 0; $c < $this->tamañoFila;$c++){ // for para recorrer el array de columnas
            $rowCount = 0;
            $colCounter = 0;
            do{

                $this->columns[$c][$colCounter] = $this->rows[$rowCount][$c]; // copia en la primer columna todos las primeras posiciones
                $rowCount++;                                                    // de cada fila, luego aumenta a la segunda y asi sucesibamente hasta n filas , dejando como resultado n columnas
                $colCounter++;

            }while($rowCount < $this->tamañoColumna);

        }

    }


    function checkEmpty()
    {

        /*   for ($c = 0; $c <= $this->tamañoFila - 1; $c++) {

               if ($columna[$c] != '0') {
                   echo 'Hay espacio.!';
               }
           }*/
        for($r = 0; $r<$this->tamañoFila;$r++){
            $x = 0;
            do{
                //echo  $this->columns[$r][$x];
                //echo -e "X";
                $x++;
            }while( $x < $this->tamañoColumna );
            //echo "\n";


        }



    }



    function checkWinner($column, $coin, $rowNumber, $columnNumber){
        //n fila, m columna


        //Vertical
        $encontrado = false;

        $long = count($column); // se obtiene la cantidad de objetos dentro de la lista de columna
        $total = 0;

        for ($i = $long - 1; $i >= 0; $i--) { // recorre la columna buscando el espacio vacio.
            if($encontrado){

                if ($this->tablero[$column[$i]] == $coin) {

                    $total++;


                }else{
                    $encontrado = false;
                    $total=0;
                }
            }
            if($this->tablero[$column[$i]] == $coin && !$encontrado){
                $encontrado = true;
                $total++;
            }

            if($total == 4){
                echo "El jugador ".$coin." GANA vertical <br />\r\n";
            }
        }
        $fila = $this->rows[$rowNumber];

        //Horizontal
        $encontrado = false;
        $total = 0;
        $long = count($fila);

        for ($x = $long-1; $x >= 0; $x--) {

            if($encontrado == true){
                if($this->tablero[$fila[$x]] == $coin){

                    $total+=1;
                    //echo $fila[$x]."\r\n";

                }else{
                    $encontrado = false;
                    $total=0;
                }
            }
            if($this->tablero[$fila[$x]] == $coin && !$encontrado){
                // echo $fila[$x];
                //      echo $this->tablero[$fila[$x]];
                $encontrado = true;
                $total+=1;
            }
            if($total==4){
                echo "El jugador ".$coin." GANA con Horizontal <br />\r\n";
            }

        }
        //   $this->checkDiagRight($rowNumber,$columnNumber);
        // echo " "."<b /> \n";

        //Diagonal <-

        $encontrado = false;
        $fila = $this->rows[$rowNumber];

        $newRow = $rowNumber;
        $newColumn = $columnNumber;
        $total =0;
        // echo ""."<br />\n";
        while(($newRow != 0 || $newColumn != 0)) {

            // echo "nueva Fila: " . $newRow . " nueva Columna: " . $newColumn . "<br />\n";
            if ($newRow == 0 || $newColumn == 0) {

                break;
            }
            $newRow-=1;
            $newColumn-=1;
        }
        do{

            //    echo "nueva Fila: ".$newRow." nueva Columna: ".$newColumn."<b />\n";
            if($newRow >= $this->tamañoFila || $newColumn >= $this->tamañoColumna ){break;}

            $newTempCol = $this->columns[$newColumn];

            if($encontrado == true){
                //  echo $this->tablero[$newTempCol[$newRow]];
                if($this->tablero[$newTempCol[$newRow]] == $coin ){

                    $total++;
                }else{
                    $encontrado = false;
                    $total = 0;
                    //  echo "<br /> \n";
                    break;
                }
            }
            if($this->tablero[$newTempCol[$newRow]] == $coin && !$encontrado ){
                //  echo $this->tablero[$newTempCol[$newRow]];
                $encontrado = true;
                $total+=1;
            }
            if($total == 4){
                echo "El jugador ".$coin." GANA con Diagonal -> "."<br /> \n";

            }
            $newRow++;
            $newColumn++;
        }while($newRow < $this->tamañoFila || $newColumn < $this->tamañoColumna);

        //Diagonal <-
        /*
                $encontrado = false;

            // se obtiene la cantidad de objetos dentro de la lista de columna
                $newRow = $rowNumber;
                $newColumn = $columnNumber;
                $total = 0;
               // echo " Coin: ".$columnNumber."<br />\r\n";
               // echo "Primer Fila: ".$newRow." "." primer Columna: ".$newColumn."   ".$column[$newColumn]."<br />\r\n";
                while(($newRow != 0 || $newColumn != $this->tamañoColumna)) {

                    $newRow-=1;
                    $newColumn+=1;
                   // echo "nueva Fila: ".$newRow."<br />\r\n"." nueva Columna: ".$newColumn."<br />\r\n";
                    if ($newRow == 0 || $newColumn == $this->tamañoColumna - 1) {
                        //echo "nueva Fila: ".$newRow."<br />\r\n"." nueva Columna: ".$newColumn."<br />\r\n";
                           //echo "primer while"."<br /> \r\n";
                        break;
                    }
                }
                    do{

                        if($newRow >= $this->tamañoFila || $newColumn >= $this->tamañoColumna ){break;}
                        $newTempCol = $this->columns[$newColumn];
                      //  echo "nueva Fila: ".$newRow."<br />\r\n"." nueva Columna: ".$newColumn."<br />\r\n";
                        if($encontrado){
                            if($this->tablero[$newTempCol[$newRow]] == $coin ){
                                $total+=1;
                            }else{
                                $encontrado = false;
                                $total = 0;
                            }
                        }
                      //  echo "nueva Fila: ".$newRow."<br />\r\n"." nueva Columna: ".$newColumn."<br />\r\n";
                        if($this->tablero[$newTempCol[$newRow]] == $coin && !$encontrado ){
                         //   echo $this->tablero[$column[$newColumn]];
                            $encontrado = true;
                            $total+=1;
                        }
                        if($total == 4){
                            echo "El jugador ".$coin." GANA con Diagonal <- "."<b />\r \n";

                        }
                        $newRow+=1;
                        $newColumn-=1;
                    }while($newRow < $this->tamañoFila || $newColumn < $this->tamañoColumna);


        */



    }

    function getTheFreeSpace($numColumn){

        $column = $this->columns[$numColumn];

        $long = count($column); // se obtiene la cantidad de objetos dentro de la lista de columna

        for ($i = $long - 1; $i >= 0; $i--) { // recorre la columna buscando el espacio vacio.

            if ($this->tablero[$column[$i]] == '0'){ // si encuentra espacio vacio , coloque la ficha,
                array_push($this->freeSpaces,$numColumn,$i);
                break;
            }

            if ($i == 0) {
                return 'LLeno'; // si no hay espacios entonces mostrar mensaje
            }

        }
    }
    function getFreeSpaces(){

        #de ultimo esta la fila y primero esta la columna en moveControl
        $numRow = 0;
        $column = $this->columns;


        $long = count($column); // se obtiene la cantidad de objetos dentro de la lista de columna

        for ($i = $long - 1; $i >= 0; $i--) { // recorre la columna buscando el espacio vacio.


            $this->getTheFreeSpace($i);


        }

    }
    function easyModePC(){
        $this->getFreeSpaces();
        $numTemp = rand(0,((count($this->freeSpaces)/2)-1));
        echo (count($this->freeSpaces)/2);
        $col = 0;
        for ($i = $numTemp - 1; $i >= 0; $i--) {

            $col =  array_pop($this->freeSpaces[$i]);
            array_pop($this->freeSpaces[$i]);

        }


        $this->pullCoin($col,'Red'); ## llamamos el metodo meter ficha.

    }








    function medModePC(){

        #de ultimo esta la fila y primero esta la columna en moveControl

        $row = array_pop($this->movesControl);#se toma la fila de la ultima jugada hecha por el jugador
        $col = array_pop($this->movesControl);#se toma la columna de la ultima jugada por el jugador

        $coords = $this->getCoordenates($row,$col);#obtiene las 4 posibles posiciones

        foreach ($coords as $space){

            if($space[1] == -1 || $space[0] == -1 || $space[1] > ($this->tamañoFila-1) || $space[0] > ($this->tamañoColumna-1)){ #elimina los espacios que no existen en la matriz

                $this->array_delete($coords,$space); // elimina esa coordenada inexistente de las cuatro posibles

            }else{

                if($this->tablero[$this->columns[$space[1]][$space[0]]] != '0'){ # si existe la coordenada verifique que esté vacio si no quitelo de la lista de coordenadas

                    $this->array_delete($coords,$space); # elimna la coordenada si no esta vacia ( ocn 0)

                }
            }

        }

        $tmList = count($coords); # sacamos la cantidad de posiciones

        $getCol = rand(0,($tmList-1)); # hacemos un random para eliegir una posicion
        $tmpCol = $coords[$getCol];

        $newCol = $tmpCol[1];
        #echo  $newCol;

        echo " num posibles: ".$tmList;
        echo " de los espacios se eligio: ".$newCol."<br />\r\n";
        $this->pullCoin($newCol,'Red'); ## llamamos el metodo meter ficha.

    }
    function array_delete(&$array, $value, $strict = TRUE) {
        $count = 0;
        if ($strict) {
            foreach ($array as $key => $item) {
                if ($item === $value) {
                    $count++;
                    unset($array[$key]);
                }
            }
        } else {
            foreach ($array as $key => $item) {
                if ($item == $value) {
                    $count++;
                    unset($array[$key]);
                }
            }
        }
        return $count;
    }
    function getCoordenates($row,$col)
    {

        #echo "Fila: ".$row. " Columna: ".$col;
        $lista = array();
        $up = [$row,$col - 1];
        echo "Fila: ".$row. " Columna: ".($col-1);
        $izq = [$row -1 ,$col];
        echo "Fila: ".($row - 1)." Columna: ".$col;
        $der = [$row +1 ,$col];
        echo "Fila: ".($row + 1)." Columna: ".$col;
        $dwn = [$row,$col + 1];
        echo "Fila: ".$row." Columna: ".($col+1);
        array_push($lista,$up,$izq,$der,$dwn);

        return $lista;
    }

    function pullCoin($numColumn,$player)
    {
        $numRow = 0;
        $column = $this->columns[$numColumn];

        if ($player == 'Blue') {
            $coin = '1';
        } else {
            $coin = '2';
        }


        $long = count($column); // se obtiene la cantidad de objetos dentro de la lista de columna

        for ($i = $long - 1; $i >= 0; $i--) { // recorre la columna buscando el espacio vacio.

            if ($this->tablero[$column[$i]] == '0') { // si encuentra espacio vacio , coloque la ficha,
                $this->tablero[$column[$i]] = $coin;

                array_push($this->movesControl,$numColumn,$i);
                #echo $numColumn." Columna";
                #echo $i." Fila";;
                $numRow = $i;
                //  echo $column[$i];
                //   echo "<b />\r\n";
                //   echo "fila ".$fila." <br />\r\n";
                break;
            }

            if ($i == 0) {
                return 'LLeno'; // si no hay espacios entonces mostrar mensaje
            }

        }

        $this->checkWinner($column,$coin,$numRow,$numColumn);





    }



    public function imprimeTablero(){
        $counter = 0;
        foreach($this->tablero as $space){

            if($counter == $this->tamañoFila){
                $counter = 0;
                echo " / "."<br />\r\n";}
            $counter+=1;
            echo $space;
        }
    }

}





?>