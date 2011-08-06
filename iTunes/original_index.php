<?php 
require_once('JpegMeta.php');
ini_set('default_charset','utf-8');
$dir = "./thumbs/"; //Ordner mit den Thumbnail-Covern
$fulldir = "./images/cover/";
$spalten=7; //Anzahl der Spalten, die man haben will.
$coverwidth="80px";
$coverheight="80px"; 
$space=' ';
$urlspace='%20';
echo '
<html>
<head>
<title>iTunes Cover</title>
<link rel="shortcut icon" href="./itunes_favicon.png">
<style type="text/css">'; 
include("./normal.css");
echo '
</style>
</head>
<body>
';




$colspan = $spalten; //nicht die reihenfolge ändern ;-) 
$spalten=$spalten - 1; //Nur so funktioniert der Counter richtig.
$i=0;
$m=0;
$k=0;
$anzahl=array();
if (substr($dir, -1)=="/") {
	$dir = substr_replace($dir ,"",-1); //Sichergehen, dass der Ordnerpfad nicht auf "/" endet.
} 
if (substr($fulldir, -1)=="/") {
	$fulldir = substr_replace($fulldir ,"",-1); //Sichergehen, dass der Ordnerpfad nicht auf "/" endet.
}

$old_firstletter=zz;


$array = array();
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
			if (is_dir($file)==false) { // Dadurch werden . und .. nicht mit ausgegeben
				$array[] = $file;
			}
        }
        closedir($dh);
    }
}
usort($array, "strnatcasecmp");
$maxwidth=$coverwidth*2*$colspan;
echo '
<table align="center" border="0" cellpadding="0" cellspacing="0" width="'.$maxwidth.'px ">
<tr>
<td colspan="'.$colspan.'" class="alphabet_td" >';
foreach ($array as $file) {
				 
				$firstletter=$file{0};
				if ( $firstletter != $old_firstletter
				&& $firstletter != strtoupper($old_firstletter) 
				&& $firstletter != strtolower($old_firstletter)) {
				
					echo '<a href="#'.strtoupper($firstletter).'" class="alphabet" >'.strtoupper($firstletter).'</a>';
					echo '&nbsp;';
					$old_firstletter = $firstletter;
					$k=0;
				}
				$k++;
				$anzahl[strtoupper($firstletter)] = $k;				
}


echo '
</td>
</tr><tr>
';

$old_firstletter=zz; //wird wieder initialisiert
foreach ($array as $file) {
			
			$firstletter=$file{0};
			$filename = basename($file, substr(strrchr($file, '.'), 0)); 
			if ( $firstletter != $old_firstletter
				&& $firstletter != strtoupper($old_firstletter) 
				&& $firstletter != strtolower($old_firstletter)) {
			
			echo '</tr>'; //schließen der bisherigen tabellenzeile
			echo '<tr>'; //öffnen einer neuen tabellenzeile
			echo '<td colspan="'.$colspan.'" class="letter">'; //beginn einer neuen zeile (für den Buchstaben)
			echo '
			<table border="0" width="100%">
				<tr>
				<td id="'.strtoupper($firstletter).'" class="letter" >	&nbsp;	&nbsp;	&nbsp;'.strtoupper($firstletter).'</td>
				<td class="anzahl" >'.$anzahl[strtoupper($firstletter)].'';
				if ($anzahl[strtoupper($firstletter)] == 1 ) {
				echo ' Album&nbsp;&nbsp;&nbsp;'; 
				}
				else {
				echo ' Alben&nbsp;&nbsp;&nbsp;'; 
				}
				echo '
				</td>
				</tr>
			</table>';
			echo '</td>'; 
			echo '</tr>'; 
			
			
			echo '
			<tr>'; //also neue tabellenzeile beginnen
			$i = 0; // counter zurücksetzen
			}
			
				$m++;
				$replace=urldecode($file);
				echo '
				<td align="center" valign="top">
';
$meta = new JpegMeta($dir.'/'.$file);
$title= $meta->getField('simple.title');  
echo $t;
echo '				

<!-- <a href="'.$fulldir.'/'.$replace.'" class="albumlink"> -->
				
						<div class="albumimg" style="background: url(\''.$dir.'/'.$file.'\'); 
													  background-repeat: no-repeat; 
													  background-position: top center; 
													  background-size: auto;  ">						  
						<div class="iphone-glow"></div></div>
			<!--	</a>   -->
				
					<div class="albumname">'.$title.'</div>
				</td>
				';
				
				

				if ($i >= $spalten) {
				echo '</tr><tr>';
				$i = 0;
				}
				else {
				$i++;	
				}
				$old_firstletter = $firstletter;
			}
		echo '
		</tr>
		</table>';

echo '
</body>
</html>'; 
?>
