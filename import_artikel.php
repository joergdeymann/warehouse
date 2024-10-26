<?php
/*
import Allgemein artikelnummer

1. Eingabe der Spalten
Dateifeld - Spalte

update versuch über 
1. Shopnummer
2. EAN
3. Realnamen / Shopnamen

Danach import
*/
include "class/dbconnect.php";
include "class/class_database.php";
include "class/class_menu.php";
include "class/class_output.php";
include "class/class_import.php";
include "class/class_artikel.php";

$menu=new Menu();
$out=new Output();

echo $out->header("Artikel import");
echo $menu->out();
if (!empty($_FILES["filename"]["tmp_name"]) and !empty($_POST['import_log'])) {
	$im=new Import($_FILES["filename"]["tmp_name"]);
	$im->open();
	$artikel=new Artikel($db);
	
	// $im->readHeadline();
	while($im->readline()) {
		$row=array();
		$row['nr']      =$im->row[0]; // Artikelnummer im Shop

/*
$str=$row['nr'];
for ( $pos=0; $pos < strlen($str); $pos ++ ) {
 $byte = substr($str, $pos);
 echo 'Byte ' . $pos . ' von $str hat den Wert ' . ord($byte) . PHP_EOL;
}
exit;
*/
		$row['gewicht'] =$im->row[1]; // ist eigentlich leer
		$row['ean']     =$im->row[2]; // EAN
		$row['realname']=$im->row[3]; //Echter Name des Bodens für Packer angegeben
		$where=array();
		$where['nr']=$row['nr'];
		
		$artikel->update($row,$where);
		if ($artikel->matched() == 0) {
			$artikel->insert($row);
		}
	}
}

if (!empty($_FILES["filename"]["tmp_name"]) and !empty($_POST['import_inf'])) {
	$im=new Import($_FILES["filename"]["tmp_name"]);
	$im->open();
	$artikel=new Artikel($db);

	// $im->readHeadline();
	while($im->readline()) {
		$row=array();
		$row['nr']      =$im->row[0]; // Artikelnummer im Shop
		$row['gewicht'] =$im->row[1]; // ist eigentlich leer
		$row['ean']     =$im->row[2]; // EAN
		// $row['realname']=$im->row[3]; //Veränderter Text, nicht relevant 
		$row['realname']=$im->row[4]; //Echter Name des Bodens für Packer angegeben
		$where=array();
		$where['nr']=$row['nr'];
		$artikel->update($row,$where);
		if ($artikel->matched() == 0) {
			$artikel->insert($row);
		}
	}
}
if (!isset($_FILES["datei"]["tmp_name"])) {
	$filename="";
} else {
	$filename=$_FILES["datei"]["tmp_name"];
}

$html="";
$html.='<h2>Import der Artikel</h2>';
$html.='<form method="POST" action="import_artikel.php" enctype="multipart/form-data">';
$html.='<table>';
$html.='<tr><th>Dateiname:</th>';
$html.='<td><input type="file" name="filename" value="'.$filename.'"></td></tr>';
$html.='</table>';

$html.='<h2>1. aus der Log Datei der Packliste.log</h2>';
$html.='<input type="submit" value = "Import" name="import_log">';
$html.='<h2>2. aus der Log Datei der Packliste.inf</h2>';
$html.='<input type="submit" value = "Import" name="import_inf">';

$html.='<table id="pos">';
$html.='<tr><td colspan=2><h2>3. aus einer offenen Datei mit Angaben</h2></td></tr>';
$html.='<tr><th>Feld</th><th>Spalte</th></tr>';
$html.='<tr><th>Shop Artikelnummer:</th>     	   	 <td><input type="number" name="ls24_nr">             </td></tr>';
$html.='<tr><th>EAN-Code:</th>               	   	 <td><input type="number" name="ls24_ean">            </td></tr>';
$html.='<tr><th>Original Name:</th>          	   	 <td><input type="number" name="ls24_realname">       </td></tr>';
$html.='<tr><th>Verkaufs Name:</th>          	   	 <td><input type="number" name="ls24_shopname">       </td></tr>';
$html.='<tr><th>Kennzeichennr (zb 010011)</th>     	 <td><input type="number" name="ls24_kennzeichennr">  </td></tr>';
$html.='<tr><th>Plankenzahl pro Paket:</th>        	 <td><input type="number" name="ls24_plankenzahl">    </td></tr>';
$html.='<tr><th>Musterzahl pro Paket:</th>         	 <td><input type="number" name="ls24_musterzahl">     </td></tr>';
$html.='<tr><th>Gewicht pro Paket:</th>       	   	 <td><input type="number" name="ls24_gewicht">        </td></tr>';
$html.='<tr><th>m² pro Paket:</th>                 	 <td><input type="number" name="ls24_qm">             </td></tr>';
$html.='<tr><th>Art (Venyl/Laminat/Klebe):</th>    	 <td><input type="number" name="ls24_art">            </td></tr>';
$html.='<tr><th>Paket Länge:</th>                  	 <td><input type="number" name="ls24_paketlaenge">    </td></tr>';
$html.='<tr><th>Paket Breite:</th>                 	 <td><input type="number" name="ls24_paketbreite">    </td></tr>';
$html.='<tr><th>Paket Höhe:</th>                     <td><input type="number" name="ls24_pakethoehe">     </td></tr>';
$html.='<tr><th>Hersteller:</th>                     <td><input type="number" name="ls24_hersteller">     </td></tr>';
$html.='<tr><th>Modell (Unique, Ultimate, Home):</th><td><input type="number" name="ls24_model">          </td></tr>';


$html.='</table>';
$html.='<input type="submit" value = "Import" name="import_ls24">';
$html.='</form>';


echo $html;


?>
