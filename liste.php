<?php
include "class/dbconnect.php";
include "class/class_database.php";
include "class/class_menu.php";
include "class/class_output.php";
include "class/class_musterlager.php";

$menu=new Menu();
$out=new Output();

echo $out->header("Musterbestände");
echo $menu->out();

$html="";

// $xy="ABCDEABC";
// echo preg_replace("/[AB]/","",$xy);
// exit;

// $this->row[0]=preg_replace("\[\0-\31]?*","",$this->row[0]);

// Einschränkungen
// Sorte: Venyl,Parkett,Laminat
// Modell:Unique, Ultimate, Home,  Timberfloor Ultimate, Timberwalls
// Hersteller: Barth, Repak, Timber

//  

$html.='<table id="liste"><tr><th>Shop Nummer</th><th>EAN</th><th>Realname</th><th>Shop-Name</th><th>Bestand<br>Bereit</th><th>Bestellt<br>bei Schreinerei</th><th>Angekommen<br>(unbeklebt)</th><th>Anfordern<br>(benötigt)</th></tr>';
$lager=new Musterlager($db);

$lager->load();

while ($row=$lager->next()) {
	$html.='<tr><td>'.$row['artikelnr'].'</td><td>'.$row['ean'].'</td><td>'.$row['ek_name'].'</td><td>'.$row['vk_name'].'</td><td>'.$row['bestand'].'</td><td>'.$row['bestellt'].'</td><td>'.$row['unbearbeitet'].'</td><td>'.$needed.'</td></tr>';	
}
$html.='</table>';

echo $html;

?>
