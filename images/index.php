<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link type="text/css" rel="stylesheet" href="../StylesheetHead.css"/>
    <link type="text/css" rel="stylesheet" href="../StylesheetMenu.css"/>
    <link type="text/css" rel="stylesheet" href="../StylesheetCenter.css"/>
    <link type="text/css" rel="stylesheet" href="Stylesheet.css"/>
    <link rel="shortcut icon" href="../apple-touch-icon.png"/>
    <title>Images - Freds testing</title>
</head>

<body>
	<?php
    
    $f = fopen("../site-menu.txt", "r");
    $text = fread($f, 25000);
    echo "$text";
    fclose($f);
    
    ?>
    <div id="Center">
        <div class="CenterTXT">
            <a href="Billeder/FraFly.JPG"><img src="Billeder/FraFly.JPG" class="imgdivimg"></a>
            <p class="imgdivtxt">
                Hey sdfbdjalgj dsjaglbdfjsk jkl gajksl gjdksal jgdksagdjsakg klasgj dsakgjdskla gjksdla gjdskagjdsaklg dskalg jdksalgjdskalg dsjaklgds ajkgldsa jgkdlsagljdskagjdska fjdksafj dsak
            </p>
        </div>
        <div class="CenterTXT">
            <a href="Billeder/v19CvXn.jpg"><img src="Billeder/v19CvXn.jpg" class="imgdivimg"></a>
            <p class="imgdivtxt">
                test 1
            </p>
        </div>

        <div class="CenterTXT">
            <a href="Billeder/EQGtWKC - Imgur.png"><img src="Billeder/EQGtWKC - Imgur.png" class="imgdivimg"></a>
            <p class="imgdivtxt">
                Picture
            </p>
        </div>

        <div class="CenterTXT">
            <a href="Billeder/Dark abstract5.jpg"><img src="Billeder/Dark abstract5.jpg" class="imgdivimg"></a>
            <p class="imgdivtxt">
                Dark abstract5
            </p>
        </div>

<div class="CenterTXT">
            <a href="Billeder/Dark abstract4.jpg"><img src="Billeder/Dark abstract4.jpg" class="imgdivimg"></a>
            <p class="imgdivtxt">
                Dette er en test til eksamen
            </p>
        </div>

<!--element-->
    </div>

</body>
</html>
