<?php
class Menu {
	public function out($info="",$show_menu=true) {
		$html= '
			<h1 id="menu">Musterverwaltung</h1>
		';
		if ($show_menu) {
			$html.="			
			<table cellspacing=0 cellpadding=0 width="100%"><tr><td>
			<nav id='menu'>
			  <input type='checkbox' checked id='responsive-menu'><!--label>XXXX</label-->
			  <ul>
				<li><a class='dropdown-arrow' href='http://'>Im und Export</a>
				  <ul class='sub-menus'>
					<li><a href='http://'>Import von Rebike</a></li>
					<li><a href='http://'>Export für Multiroute</a></li>
					<li><a href='http://'>Import von Multiroute</a></li>
				  </ul>
				</li>
				<li><a class='dropdown-arrow' href='http://'>Terminplanung</a>
				  <ul class='sub-menus'>
				   <li><a href='http://'>Zeitplanung</a></li>
					<li><a href='http://'>Bestätigungsmail versenden</a></li>
					<li><a href='http://'>Errinnerungsmail versenden</a></li>
					<li><a href='http://'>Mail mit Uhrzeit versenden</a></li>
				  </ul>
				</li>
				<li><a class='dropdown-arrow' href='http://'>Auswertung</a>
				  <ul class='sub-menus'>
					<li><a href='http://'>Kundenrückmeldungen</a></li>
				  </ul>
				</li>
				<li><a class='dropdown-arrow' href='http://'>Abholungen</a>
				  <ul class='sub-menus'>
					<li><a href='http://'>Abholscheine drucken</a></li>
					<li><a href='http://'>Liste für den Fahrer</a></li>
					<li><a href='http://'>Übersicht Abholungen</a></li>
				  </ul>
				</li>
				<li><a class='dropdown-arrow' href='http://'>Lager</a>
				  <ul class='sub-menus'>
					<li><a href='http://'>Lagerbestand aufnehmen</a></li>
					<li><a href='http://'>Rückgabe der Bikes</a></li>
				  </ul>
				</li>
				<li><a  href='http://'>?</a>
				  <ul class='sub-menus' id="help">
					$help_html
				  </ul>
				</li>
				
			  </ul>
			  <img style='position:absolute; top:-10; right:10px;' src='img/logo.png'>
			</nav>
			</td><td style='text-align:right;'>test</td></tr></table>
			<!-- /div -->
			
			<br>
			<b style='width:100%;margin-left:20%;font-size: 1.5em;'>Herzlich Willkommen!</b><br>
			<br style='margin-top:30px'>
			";
			






/*			
			$html.='
				<div id="menu">
				<a href="musterbestand.php">Bestandsliste Muster</a><br>
				<a href="musterbestellen.php">Bestelliste Muster</a><br>
					<!-- Anzeigen der benötigten Muster
						 mit Haken
						 mit Anzhal der Pakete
					-->	 
					
				<a href="bestellliste.php">Bestellte Muster</a><br>	
					<!-- Datum (klick, zeige Liste an)
						 "Vorbereitet" Datum
						 "Bestellt"    Datum
						 "Zurückgekommen" Datum
						 "Beklebt und einsortiert" Datum
							->entweder alle oder nach sorte
					-->
				<a href="import_musternamen.php">Importiere Namen und Info für Muster</a><br>
				<a href="import_verkauf.php">Importiere die Verkaufszahlen und aktualisiere den den Bestand</a><br>
				</div>
			';
		}
*/		
		$html.='<h1 id="menu">'.$info.'</h1>';
		return $html;
	
	}
}
	
	
	