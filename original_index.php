<?php

function standard_site() {
echo '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>lost-interrupt.de</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
 body {
  background-color: #000000;
 }
 div.logo {
 margin-top: 10em;
 text-align: center; 
 -webkit-box-reflect: below 1px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(0.5, transparent), to(white));
 }
</style>
</head>
<body>
<div class="logo"><img src="./lostinterrupt_logo.png" alt="lost-interrupt.de"></div>
</body>
</html>';
}

function ls() {
  echo '
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/loose.dtd">
  <html>
  <head>
  <title>ls</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <style type="text/css">
   * {background-color:#E3E3E3;}
  A:link {text-decoration: none;}
  A:visited {text-decoration: none;}
  A:active {text-decoration: none;}
  A:hover {text-decoration: none;}
  A:onclick {text-decoration: none;}
  a img {border: none; } 
 
  .centered-table {
     margin-left: auto;
     margin-right: auto;
     text-align: center;
  }
   
   .lsimage {
   border: 4px solid #CDCDCD;
   border-radius: 4px;
   }
   .lsimage:hover {
   border: 4px solid #5383DF;
   border-radius: 4px;
   }
  </style>
  <body>';


  $dir = "./allmypages/"; //Ordner mit den Thumbnail-Covern
  $spalten=2; //Immer eins weniger, als man haben will
  $array = array();
  if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
      while (($file = readdir($dh)) !== false) {
        if (is_dir($file)==false) { // Dadurch werden . und .. nicht mit ausgegeben
           if ($file !== 'old') {
	  $array[] = $file; 
           }
        }
      }
    closedir($dh);
    }
  }
  usort($array, "strnatcasecmp"); 
  echo '
  <table class="centered-table">
  <tr>';
  $m=0;
  $i=0;
  foreach ($array as $file) {
    $m++;

    $path_parts = pathinfo("$file");
    $filename = $path_parts['filename'] ;

    echo '<td>
            <a href="http://'.$filename.'.lost-interrupt.de" title="'.$filename.'">
              <img class="lsimage" src="'.$dir.$file.'" width="320" height="180" style="margin: 7px;" alt="'.$filename.'">
            </a>';
     #       <br />
     #      '.$filename.'
    echo '
          </td> ';

    if ($i >= $spalten) {
      echo '</tr><tr>';
      $i = 0;
    }
    else {
      $i++;
    }
  }
  echo '
  </tr>
  </table>';


  echo '
  </body>
  </html>';
}


function error_site() {
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>404 - Page not found</title>
<style type="text/css">
* {
  margin, 
  padding: 0; 
}
body {
  background: #474747 url(bg.png);
  margin: 0px;
}
h1 a {
	display: block; text-decoration: none;
	font: 5em Helvetica, Arial, Sans-Serif; letter-spacing: -5px;  
	text-align: center;
	color: #999; text-shadow: 0em 0.05em 0.4em #2a2a2a;
        margin-top: 7%;
 }
 	/*h1 a:hover {
 		color: #a0a0a0; text-shadow: 0px 5px 8px #2a2a2a;
 	}*/
 
h2 {
	font: 5em Tahoma, Helvetica, Arial, Sans-Serif;
	text-align: center;
	
	color: #222; text-shadow: 0em 0.05em 0.1em #555;
}

#rainbow_container {
margin:0px;
padding:0px;
width: 100%; 
height: 0.45em;
background-color: #BAB942;
/* -webkit-box-reflect: below 5px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(0, transparent), to(grey));*/

}
#color1,
#color2,
#color3,
#color4,
#color5,
#color6,
#color7,
#color8,
#color9,
#color10,
#color11,
#color12,
#color13,
#color14,
#color15,
#color16,
#color17,
#color18,
#color19,
#color20,
#color21,
#color22,
#color23,
#color24,
#color25 {
margin:0px;
padding:0px;
height: inherit;
width: 4%;
float: left;
}
#color1:hover,
#color2:hover,
#color3:hover,
#color4:hover,
#color5:hover,
#color6:hover,
#color7:hover,
#color8:hover,
#color9:hover,
#color10:hover,
#color11:hover,
#color12:hover,
#color13:hover,
#color14:hover,
#color15:hover,
#color16:hover,
#color17:hover,
#color18:hover,
#color19:hover,
#color20:hover,
#color21:hover,
#color22:hover,
#color23:hover,
#color24:hover,
#color25:hover {
-moz-transform:scale(2.14);
-webkit-transform:scale(2.14);
-webkit-border-radius: 0.45em;
-moz-border-radius: 0.45em;
-khtml-border-radius: 0.45em;
border-radius: 0.45em;
/*-webkit-transition: all .2s linear;*/ 

}
#color1 {background-color: #F2E34D;}
#color2 {background-color: #B99131;}
#color3 {background-color: #B76F2B;}
#color4 {background-color: #B45525;}
#color5 {background-color: #A0261C;}
#color6 {background-color: #A2112C;}
#color7 {background-color: #B11A37;}
#color8 {background-color: #B00053;}
#color9 {background-color: #B50169;}
#color10 {background-color: #B02B85;}
#color11 {background-color: #6C2C86;}
#color12 {background-color: #00406C;}
#color13 {background-color: #004E7E;}
#color14 {background-color: #0064A6;}
#color15 {background-color: #008ABB;}
#color16 {background-color: #00A6D7;}
#color17 {background-color: #00B9DB;}
#color18 {background-color: #00A6B9;}
#color19 {background-color: #00A398;}
#color20 {background-color: #009C72;}
#color21 {background-color: #00935D;}
#color22 {background-color: #4AA44B;}
#color23 {background-color: #44A663;}
#color24 {background-color: #7EB36A;}
#color25 {background-color: #8CB655;}



</style>
</head>

<body>

<h1><a href="http://www.lost-interrupt.de">404</a></h1>
<h2>Page not found</h2>


<div id="rainbow_container">
<div id="color1"></div>
<div id="color2"></div>
<div id="color3"></div>
<div id="color4"></div>
<div id="color5"></div>
<div id="color6"></div>
<div id="color7"></div>
<div id="color8"></div>
<div id="color9"></div>
<div id="color10"></div>
<div id="color11"></div>
<div id="color12"></div>
<div id="color13"></div>
<div id="color14"></div>
<div id="color15"></div>
<div id="color16"></div>
<div id="color17"></div>
<div id="color18"></div>
<div id="color19"></div>
<div id="color20"></div>
<div id="color21"></div>
<div id="color22"></div>
<div id="color23"></div>
<div id="color24"></div>
<div id="color25"></div>
</div>


</body>
</html>';
}

function forward_to_error_site() {
echo '
<html>
<head>
<meta http-equiv="refresh" content="0; URL=http://404.lost-interrupt.de/">
</head>
<body>
</body>
</html>';
}












if ($_SERVER['HTTP_HOST'] == "lost-interrupt.de" || $_SERVER['HTTP_HOST'] == "www.lost-interrupt.de") {
switch ($_GET['cmd']) {
    case "ls":
        echo ls();
        break;
    case "ip":
        echo @$REMOTE_ADDR;
        break;
    default:
        standard_site();
}

}elseif ($_SERVER['HTTP_HOST'] == "404.lost-interrupt.de") {
error_site();
}else {
forward_to_error_site();
}



?>
