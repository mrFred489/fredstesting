<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link type="text/css" rel="stylesheet" href="StylesheetHead.css"/>
    <link type="text/css" rel="stylesheet" href="Stylesheet.css"/>
    <?php
        require_once '../Mobile_Detect.php';
        $detect = new Mobile_Detect;
        $ismobile = ($detect->isMobile());
        if ($ismobile){
            echo '<link type="text/css" rel="stylesheet" href="StylesheetMobile.css" />';
            $columns = 3;
        }
        else{
            echo '<link type="text/css" rel="stylesheet" href="StylesheetBig.css"/>';
            $columns = 6;
        }
    ?>
    
    
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
            echo '<a href="' . $link . '"><img src="Billeder/' . $image . '" class="img"></a>';
        };
        
        
        function endswith($string, $test) {
            $strlen = strlen($string);
            $testlen = strlen($test);
            if ($testlen > $strlen) return false;
            return substr_compare($string, $test, $strlen - $testlen, $testlen) === 0;
        }
        if ($handle = opendir('.')) {
            echo '<div id="LinksContainer">';
            
            $files = array();
            while (false !== ($entry = readdir($handle))) {
                $files[] = $entry;
            }
            sort($files);
            $categories = array();
            foreach($files as $entry) {
                if ($entry != "." && $entry != ".." && $entry != "links.txt" && endswith($entry, ".txt")) {
                    $category = "";
                    $contents = file($entry);
                    $num = strripos($entry, ".");
                    $name = substr($entry, 2, $num-2);
                    $category = $category . '<div class="Category">';
                    $category = $category . '<p class="categoryIndex">Category</p>';
                    if ($ismobile){
                        $category = $category . "<br/>";
                    }
                    $category = $category . '<p class="CategoryTXT">' . $name . '</p><div class="TableLinkContainer">';
                    foreach($contents as $line) {
                        $num = strripos($line, "|");
                        $link = substr($line, 0, $num);
                        $name = substr($line, $num+1);
                        $category = $category . '<a href="' . $link . '" class="TableLink"><p class="linkIndex">Link</p>' . $name . '</a><br/>';
                    }


                    $category = $category . "</div></div>";
                    $categories[] = $category;
                }
                
            }
            $numcate = count($categories);
            $numextra = $numcate - $columns;
            if ($numextra > $columns){
                $intall = floor($numextra / $columns);
                $intextra = $numextra - ($intall*$columns);
            }
            else{
                $intextra = $numextra;
            }
            $n = 0;
            for ($i = 0; $i < $columns; $i++){
                echo '<div class="columns">';
                for ($m = 0; $m <= $intall; $m++){
                    echo $categories[$i + $m * $columns];
                    $n++;
                }
                if ($i < $intextra){
                    echo $categories[$columns*($intall+1)+$i];
                    $n++;
                }
                
                echo '</div>';
            }
            echo "</div>";
        }

    ?>


</body>
</html>
