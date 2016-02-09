<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link type="text/css" rel="stylesheet" href="../StylesheetHead.css"/>
    <link type="text/css" rel="stylesheet" href="../StylesheetMenu.css"/>
    <link type="text/css" rel="stylesheet" href="../StylesheetCenter.css"/>
    <link type="text/css" rel="stylesheet" href="Stylesheet.css"/>
    <link rel="shortcut icon" href="../apple-touch-icon.png"/>
    <title>About me</title>
</head>

<body>
	
    <?php
    
    $f = fopen("../site-menu.txt", "r");
    $text = fread($f, 25000);
    echo "$text";
    fclose($f);
    
    ?>
    <div id="Center">
    
        <?php
        $current = time();
        $birth = strtotime('1994-03-02 00:00:00');
        $age = floor(($current - $birth)/31536000);
        function endswith($string, $test) {
            $strlen = strlen($string);
            $testlen = strlen($test);
            if ($testlen > $strlen) return false;
            return substr_compare($string, $test, $strlen - $testlen, $testlen) === 0;
        }
        if ($handle = opendir('.')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != ".." && endswith($entry, ".txt")) {
                    $f = fopen($entry, "r");
                    $text = fread($f, 25000);
                    $text2 = str_replace('!age', $age, $text);
                    echo '<p class="CenterTXT">Hi stranger <br />';
                    echo nl2br("$text2");
                    echo " </p>\n";
                    fclose($f);
                }
            }
            closedir($handle);
        }
        ?>
    </div>
</body>
</html>
