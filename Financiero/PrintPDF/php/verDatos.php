<?php

include "../fpdf/fpdf.php";
include "conexion.php";


class  MiPDF extends FPDF {
		
		public function Header(){
			
			$this -> Image( "../img/logo.png" , 10 , 10 , 20 , 20);
			$this -> SetFont ( 'Arial' , 'B' , 20 );
			$this -> Cell( 100, 10 , "           Creado Por Dannyasd" , 0 , 0 , 'C' );
			$this -> Ln( 30 );
			
			
		}
	
}

$cabeceraT = array(
"id_ejercicio " , "nombre" ,"isr");


$mipdf = new MiPDF();

$mipdf -> addPage();

for ($i = 0; $i < count( $cabeceraT ) ; $i++)
{
	$mipdf -> SetFont( 'Courier' , 'B' , 12 );
	$mipdf -> SetTextColor( 255 , 255 , 255);
	$mipdf -> Cell ( 50 , 10 , $cabeceraT[ $i ] , 1 , 0 , 'C' , true );
	
	
}

$mipdf -> Ln( 10);

$consulta = mysql_query( "SELECT * FROM empresa" );

while ( $datos = mysql_fetch_array( $consulta ) )
{
	
	$id_ejercicio = $datos [ 'id_ejercicio' ];
	$nombre = $datos [ 'nombre' ];
	$isr = $datos [ 'isr' ];
	
	$mipdf -> SetFillColor( 100 , 100 , 200 );	
	$mipdf -> Cell( 50, 10 , $id_ejercicio, 1, 0, 'C' , true );
	$mipdf -> Cell( 50, 10 , $nombre , 1, 0, 'C' , true );
	$mipdf -> Cell( 50, 10 , $isr , 1, 0, 'C' , true );
	$mipdf -> Ln( 10);
	
}
 

$mipdf -> Output();


?>


