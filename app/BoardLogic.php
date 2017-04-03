<?php
namespace App;

use phpDocumentor\Reflection\Types\Null_;
use phpDocumentor\Reflection\Types\This;

class BoardLogic
{
    var $tamañoTablero;
    var $tamañoFila;
    var $tamañoColumna;
    var $numeroGanar;

    var $tablero = array();

    var $rows = array();
    var $columns = array();

    function __construct()
    {
        $this->tamañoFila = 5;
        $this->tamañoColumna = 7;
        $this->tamañoTablero = 35;
        $this->numeroGanar = 4;
    }
    function __construct2($row,$colum)
    {
        $this->tamañoFila = $row;
        $this->tamañoColumna = $colum;
        $this->tamañoTablero = $this->tamañoFila * $this->tamañoColumna;
        $this->numeroGanar = 4;
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
            //echo "\n";
            $rowCounter2++;
            $contador++;

            if ($contador == $this->tamañoFila) {// si se llego al limite de fila entonces
                $contador = 0; // reinicia contador
                $rowCounter2 = 0;// reinicia contador de la fila
                $rowCounter++;// avanza a la siguiente fila.

                //echo '/ \n';
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
            }while( $x < $this->tamañoFila );
            //echo "\n";


        }



    }



    function checkWinner($column, $coin, $rowNumber, $columnNumber){
        //n fila, m columna
        $fila = $this->rows[$rowNumber];

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


        //Horizontal
        $encontrado = false;
        $total = 0;
        $long = count($fila);

        for ($x = $long-1; $x >= 0; $x--) {

            if($encontrado == true){
                if($this->tablero[$fila[$x]] == '1'){

                    $total+=1;
                    // echo $this->tablero[$fila[$x]];

                }else{
                    $encontrado = false;
                    $total=0;
                }
            }
            if($this->tablero[$fila[$x]] == $coin && !$encontrado){

                //      echo $this->tablero[$fila[$x]];
                $encontrado = true;
                $total+=1;
            }
            if($total==4){
                echo "El jugador ".$coin." GANA con Horizontal <br />\r\n";
            }

        }
        // echo " "."<b /> \n";

        //Diagonal <-

        /*   $encontrado = false;

           $long = count($column); // se obtiene la cantidad de objetos dentro de la lista de columna
           $newRow = count($fila);
           $newColumn = count($column);


           while(($newRow != 0 || $newColumn != 0)) {
               $newRow-=1;
               $newColumn-=1;
             //  echo "nueva Fila: " . $newRow . " nueva Columna: " . $newColumn . "<b />\n";
               if ($newRow == 0 || $newColumn == 0) {

                   break;
               }
           }
               do{
               //    echo "nueva Fila: ".$newRow." nueva Columna: ".$newColumn."<b />\n";
                   if($newRow >= $this->tamañoFila ){break;}

                   if($encontrado){
                       if($this->tablero[$column[$newColumn]] == $coin && $this->tablero[$fila[$newRow]]){

                           $total++;
                       }else{
                           $encontrado = false;
                           $total = 0;
                       }
                   }
                   if($this->tablero[$column[$newColumn]] == $coin && !$encontrado ){
                       echo $this->tablero[$column[$newColumn]];
                       $encontrado = true;
                       $total+=1;
                   }
                   if($total == 4){
                       echo "El jugador ".$coin." GANA con Diagonal -> "."<b /> \n";

                   }
                       $newRow++;
                       $newColumn++;
               }while($newRow < $this->tamañoFila);



          //Diagonal <-

           $encontrado = false;

       // se obtiene la cantidad de objetos dentro de la lista de columna
           $newRow = $rowNumber;
           $newColumn = $columnNumber;
           $total = 0;
          // echo " Coin: ".$columnNumber."<br />\r\n";
           echo "Primer Fila: ".$newRow." "." primer Columna: ".$newColumn."   ".$column[$newColumn]."<br />\r\n";
           while(($newRow != 0 || $newColumn != $this->tamañoColumna)) {

               $newRow-=1;
               $newColumn+=1;
               echo "nueva Fila: ".$newRow."<br />\r\n"." nueva Columna: ".$newColumn."<br />\r\n";
               if ($newRow == 0 || $newColumn == $this->tamañoColumna - 1) {
                   //echo "nueva Fila: ".$newRow."<br />\r\n"." nueva Columna: ".$newColumn."<br />\r\n";
                       echo "primer while"."<br /> \r\n";
                   break;
               }
           }
               do{

                   if($newRow >= $this->tamañoFila){
                       echo "Segundo while"."<br />\r\n";
                       break;}
                 //  echo "nueva Fila: ".$newRow."<br />\r\n"." nueva Columna: ".$newColumn."<br />\r\n";
                   if($encontrado){
                       if($this->tablero[$column[$newColumn]] == $coin && $this->tablero[$fila[$newRow]]){
                           $total+=1;
                       }else{
                           $encontrado = false;
                           $total = 0;
                       }
                   }
                 //  echo "nueva Fila: ".$newRow."<br />\r\n"." nueva Columna: ".$newColumn."<br />\r\n";
                   if($this->tablero[$column[$newColumn]] == $coin && !$encontrado ){
                       echo $this->tablero[$column[$newColumn]];
                       $encontrado = true;
                       $total+=1;
                   }
                   if($total == 4){
                       echo "El jugador ".$coin." GANA con Diagonal <- "."<b />\r \n";

                   }
                   $newRow+=1;
                   $newColumn-=1;
               }while($newRow < $this->tamañoFila);
   */

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
                $numRow = $i;
                //  echo $column[$i];
                //   echo "<b />\r\n";
                //   echo "fila ".$fila." <br />\r\n";
                break;
            }

            if ($i == 0) {
                echo 'LLeno!'; // si no hay espacios entonces mostrar mensaje
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