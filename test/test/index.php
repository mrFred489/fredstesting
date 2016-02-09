<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link type="text/css" rel="stylesheet" href="StylesheetHead.css"/>
    <link type="text/css" rel="stylesheet" href="StylesheetMenu.css"/>
    <link type="text/css" rel="stylesheet" href="StylesheetCenter.css"/>
    <title>Freds testing</title>
</head>

<body>

    <?php
    $f = fopen("site-head.txt", "r");
    $text = fread($f, 25000);
    echo "$text";
    fclose($f);
?>
<?php
    $f = fopen("site-menu.txt", "r");
    $text = fread($f, 25000);
    echo "$text";
    fclose($f);
    
    ?>

    <div id="Center">
        <?php
        function endswith($string, $test) {
            $strlen = strlen($string);
            $testlen = strlen($test);
            if ($testlen > $strlen) return false;
            return substr_compare($string, $test, $strlen - $testlen, $testlen) === 0;
        }
        if ($handle = opendir('.')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != ".." && $entry != "site-menu.txt" && endswith($entry, ".txt")) {
                    $f = fopen($entry, "r");
                    echo '<p class="CenterTXT">Hi stranger ';
                    $text = fread($f, 25000);
                    echo "$text";
                    echo ' </p>';
                    fclose($f);
                }
            }
            closedir($handle);
        }
        ?>
        
		<p class="CenterTXT">Hi stranger123		23/12/2013<br><br>
        <?php
            $f = fopen("about_domain.txt", "r");
            // Read line from the text file and write the contents to the client
            $text = fread($f, 25000);
            echo "$text";
            fclose($f);
        ?>
        </p>

        <p class="CenterTXT">Hi stranger		01/01/2014<br><br>
		<?php
            $f = fopen("about_linkspage.txt", "r");
            // Read line from the text file and write the contents to the client
            $text = fread($f, 25000);
            echo "$text";; 
            fclose($f);
        ?>
		</p>
    </div>
</body>
</html>
