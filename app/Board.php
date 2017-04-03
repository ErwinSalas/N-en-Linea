<?php
namespace App;

use phpDocumentor\Reflection\Types\Null_;
use phpDocumentor\Reflection\Types\This;

class Board
{
    var $tamañoTablero;
    var $tamañoFila;
    var $numeroGanar;

    var $tablero = array();

    var $rows = array();
    var $columns = array();

    function __construct()
    {
        $this->tamañoFila = 8;
        $this->tamañoTablero = 64;
        $this->numeroGanar = 4;


    }
    public function getBoard(){
        return $this->tablero;
    }
    function crearTablero()
    {
      $contador = 0;
      $rowCounter = 0;// variable para crear las filas
      $rowCounter2 = 0; // variable que lleva el contador de cada fila

        for ($i = 0; $i <= $this->tamañoTablero - 1; $i++) {

            $this->tablero[$i] = '0'; // se le asigna al tablero los numeros 0 en la posicion $i
            $this->rows[$rowCounter][$rowCounter2] = $i; // se asinan las posiciones que seran filas
           // echo $this->rows[$rowCounter][$i];
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

            }while($rowCount < $this->tamañoFila);

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
            echo $this->columns[$r][$x];
            $x++;
        }while( $x < $this->tamañoFila );
        echo '/';


     }



    }

    private function pullCoin($column,$player)
    {
        if ($player) {
            $coin = '1';
        } else {
            $coin = '2';
        }


        $long = count($column); // se obtiene la cantidad de objetos dentro de la lista de columna

        for ($i = $long - 1; $i >= 0; $i--) { // recorre la columna buscando el espacio vacio.

            if ($this->tablero[$column[$i]] == '0') { // si encuentra espacio vacio , coloque la ficha,
                $this->tablero[$column[$i]] = $coin;

                break;
            }

            if ($i == 0) {
                echo 'LLeno!'; // si no hay espacios entonces mostrar mensaje
            }

        }





    }


    function checkWinner(){

        $diagonal = $this->tamañoFila * 2;
        $f1 = [4,13,22,31];
        $f2 = [3,12,21,30,39];
        $f3 = [2,11,20,29,38,47];
        $f4 = [1,10,19,28,37,46,55];
        $d5 = [];
    }

    public function imprimeTablero(){
        foreach($this->tablero as $space){
            echo $space;
        }
    }







}




?>