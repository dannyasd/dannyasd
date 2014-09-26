<?php

include "../fpdf/fpdf.php";
include "conexion.php";


class  MiPDF extends FPDF {
		
		public function Header(){
			
			$this -> Image( "../img/logo.png" , 10 , 10 , 20 , 20);
			$this -> SetFont ( 'Arial' , 'B' , 20 );
			$this -> Cell( 100, 10 , "           Creado SisCon" , 0 , 0 , 'C' );
			$this -> Ln( 30 );
			
			
		}
	
}

$cabeceraT = array(
"id " , "nombre" ,"RFC","direccion","telefono","Fecha");


$mipdf = new MiPDF();

$mipdf -> addPage();

for ($i = 0; $i < count( $cabeceraT ) ; $i++)
{
	$mipdf -> SetFont( 'Courier' , 'B' , 12 );
	$mipdf -> SetTextColor( 255 , 255 , 255);
	$mipdf -> Cell (50 , 10 , $cabeceraT[ $i ] , 1 , 0 , 'C' , true );
	
	
}

$mipdf -> Ln( 10);

$consulta = mysql_query( "SELECT * FROM ejercicio" );

while ( $datos = mysql_fetch_array( $consulta ) )
{
	
	$id_ejercicio = $datos [ 'id_ejercicio' ];
	$nom_empresa = $datos [ 'nom_empresa' ];
	
	$RFC = $datos [ 'RFC' ];
	$direccion = $datos [ 'direccion' ];
	$telefono = $datos [ 'telefono' ];
	$f_ejercicio = $datos [ 'f_ejercicio' ];
	
	$mipdf -> SetFillColor( 100 , 100 , 200 );	
	$mipdf -> Cell( 50, 10 , $id_ejercicio, 1, 0, 'C' , true );
	$mipdf -> Cell( 50, 10 , $nom_empresa , 1, 0, 'C' , true );
	
	$mipdf -> Cell( 50, 10 , $RFC , 1, 0, 'C' , true );
	$mipdf -> Cell( 50, 10 , $direccion , 1, 0, 'C' , true );
	$mipdf -> Cell( 50, 10 , $telefono , 1, 0, 'C' , true );
	$mipdf -> Cell( 50, 10 , $f_ejercicio , 1, 0, 'C' , true );
	$mipdf -> Ln( 10);
	
}
 

$mipdf -> Output();


?>


