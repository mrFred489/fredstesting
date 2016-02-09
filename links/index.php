<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link type="text/css" rel="stylesheet" href="../StylesheetHead.css"/>
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
            echo '<link type="text/css" rel="stylesheet" href="StylesheetBig.css" media="(min-width: 1401px)"/>';
            echo '<link type="text/css" rel="stylesheet" href="StylesheetMedium.css" media="(max-width: 1400px)"/>';
            $columns = 6;
        }
    ?>
    
    
    <link rel="shortcut icon" href="../apple-touch-icon.png"/>
    <title> Links page </title>
</head>
<body>
	<div id="Head">
    	<h1 id="Headtxt"><a href="../" id="Headtxt2">Freds testing</a></h1>
	</div>
    
    <?php
        $filename = 'links.txt'; // navnet på links i toppen
        $contents = file($filename); // Får ting fra filen

        foreach($contents as $line) { // for hver ting i filen
            
            $num = strripos($line, "|"); // finder ud af hvor langt linket er
            $link = substr($line, 0, $num); // får linket i linjen
            $image = substr($line, $num+1, -1); // får billedet
            echo '<a href="' . $link . '"><img src="Billeder/' . $image . '" class="img"></a>' . "\n"; // laver html billedeet
        };
        echo "\n\n\n";
        
        function endswith($string, $test) { // laver funktion til at finde ud af hvad linje ender med
            $strlen = strlen($string); // finder længen af strengen
            $testlen = strlen($test); // finder længen af det der skal testes
            if ($testlen > $strlen) return false; // hvis det der skal testes er længere end strengen returneres false
            return substr_compare($string, $test, $strlen - $testlen, $testlen) === 0; // bruger substr_compare til at sammenligen strengen med det der skal testes
        }
        if ($handle = opendir('.')) { // forsøger at åbne den aktuelle mappe
            echo '<div id="LinksContainer">' . "\n"; // laver html starten af links container
            
            $files = array(); // laver et blankt array
            while (false !== ($entry = readdir($handle))) { // så længe der er flere filer i mappen
                $files[] = $entry; // tilføjer hver fil til det array vi lige har lavet 
            }
            sort($files); // sorterer arrayet med filer så det står alfabetisk
            $categories = array(); // laver blankt array til kategorier
            foreach($files as $entry) { // for loop for hver fil
                if ($entry != "." && $entry != ".." && $entry != "links.txt" && endswith($entry, ".txt")) { // udelukker filer vi ikke bruger
                    $category = "";
                    $contents = file($entry); // får filen til en variabel
                    $num = strripos($entry, "."); // finder længen af kategori navnet
                    $name = substr($entry, 2, $num-2); // får kategori navnet
                    $category = $category . '<div class="Category">' . "\n"; // tilføjer html til kategori streng så der står Category før navnet på kategorien
                    $category = $category . '<p class="categoryIndex">Category</p>'; 

                    if ($ismobile){ // tilføjer en linje ryk hvis det er på mobil
                        $category = $category . "<br/>";
                    }
                    if ($name == "Cooking"){
                        $category = $category . '<p class="CategoryTXT">' . '<a href="Cooking/">' . $name . '</a>' . '</p><div class="TableLinkContainer">' . "\n";
                    }
	            else if ($name == "Entertainment"){
                        $category = $category . '<p class="CategoryTXT">' . '<a href="Entertainment/">' . $name . '</a>' . '</p><div class="TableLinkContainer">' . "\n";
                    }
                    else{
                    $category = $category . '<p class="CategoryTXT">' . $name . '</p><div class="TableLinkContainer">' . "\n"; // tilføjer html der sætter navnet af kategorien ind
                    }

                    foreach($contents as $line) { // for hver linje i filen
                        $num = strripos($line, "|"); // fårlængen af linket
                        $link = substr($line, 0, $num); // får linket
                        $name = substr($line, $num+1, -1); // får navnet fra linjen
                        $category = $category . '<a href="' . $link . '" class="TableLink"><p class="linkIndex">Link</p>' . $name . '</a><br/>' . "\n"; // indsætter linket
                    }

                    // nu er alle links for kategorien indsat

                    $category = $category . "</div></div>\n\n\n"; // indsætter html afslutningen 
                    $categories[] = $category; // tilføjer katogierien til listen af kategorier
                }
                
            }

            $numcate = count($categories); // finder antallet af kategorier
            $numextra = $numcate - $columns; // finder hvor mange kategorier der er flere end antal kolonner
            if ($numextra > $columns){ // hvis der er flere kategorier end kolonner
                $intall = floor($numextra / $columns); // find ud af hvor mange kategorier der skal være per kolonne
                $intextra = $numextra - ($intall*$columns); // finder ud af hvor mange kolonner der skal have en ekstra
            }
            else{
                $intextra = $numextra; // hvis der kun skal være en ekstra række, så skal intextra være det samme som numextra
                $intall = 0; // intall skal være nul hvis det kun er en række der er fælles for alle kolonner
            }
            //$n = 0;
            for ($i = 0; $i < $columns; $i++){ // for hver kolonne 
                echo '<div class="columns">'; // indsætter html for kolonne
                for ($m = 0; $m <= $intall; $m++){ // for hver række i kolonnen
                    echo $categories[$i + $m * $columns]; // tilføjer en kategori
                    //$n++;
                }
                if ($i < $intextra){ // hvis kolonnen skal have en ekstra kategori end det den sidste skal have
                    echo $categories[$columns*($intall+1)+$i]; // tilføjer kategori
                    //$n++;
                }
                
                echo '</div>';
            }
            echo "</div>\n";
        }

    ?>


</body>
</html>
