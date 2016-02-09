<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link type="text/css" rel="stylesheet" href="Stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="StylesheetMobile.css" media="(max-width: 1025px)"/>
    <link type="text/css" rel="stylesheet" href="StylesheetBig.css" media="(min-width: 1026px)"/>
    <link type="text/css" rel="stylesheet" href="../StylesheetHead.css"/>
    <link rel="shortcut icon" href="../apple-touch-icon.png"/>
    <title> Links page </title>
</head>
<body>
	<div id="Head">
    	<h1 id="Headtxt"><a href="http://fredstesting.dk" id="Headtxt2">Freds testing</a></h1>
	</div>
    
    <?php

        $filename = 'links.txt';
        $contents = file($filename);

        foreach($contents as $line) {
            
            $num = strripos($line, "|");
            $link = substr($line, 0, $num);
            $image = substr($line, $num+1);
            echo '<a href="' . $link . '"><img src="Billeder/' . $image . '" class="img"></a>' . "\n";
        };
        echo "\n\n\n";
    ?>
    <?php
        function endswith($string, $test) {
            $strlen = strlen($string);
            $testlen = strlen($test);
            if ($testlen > $strlen) return false;
            return substr_compare($string, $test, $strlen - $testlen, $testlen) === 0;
        }
        if ($handle = opendir('.')) {
            echo '<div id="LinksContainer">' . "\n";
            while (false !== ($entry = readdir($handle))) {
                
                if ($entry != "." && $entry != ".." && $entry != "links.txt" && endswith($entry, ".txt")) {
                    
                    $contents = file($entry);
                    $num = strripos($entry, ".");
                    $name = substr($entry, 2, $num-2);
                    echo '<div class="Category">' . "\n";
                    echo '<p class="CategoryTXT">' . $name . '</p>' . "\n";
                    foreach($contents as $line) {
                        $num = strripos($line, "|");
                        $link = substr($line, 0, $num);
                        $name = substr($line, $num+1);
                        echo '<a href="' . $link . '" class="TableLink">' . $name . '</a>' . "\n";
                    }

                    echo "</div>\n\n\n";

                }
                
            }
            closedir($handle);
            echo "</div>\n";
        }
    ?>
	   
    <img src="Billeder/dangerous science2.png" id="standback">
    <img src="Billeder/Show me all the links.png" id="showme">


</body>
</html>
