<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link type="text/css" rel="stylesheet" href="../StylesheetHead.css"/>
    <link type="text/css" rel="stylesheet" href="../StylesheetMenu.css"/>
    <link rel="apple-touch-icon" href="../apple-touch-icon.png"/>
    <link rel="shortcut icon" href="../apple-touch-icon.png"/>
    <title>Freds testing</title>
</head>

<body>

    <?php
    $f = fopen("../site-head.txt", "r");
    $text = fread($f, 25000);
    echo "$text";
    fclose($f);
?>
<?php
    $f = fopen("../site-menu.txt", "r");
    $text = fread($f, 25000);
    echo "$text";
    fclose($f);
    
    ?>

    


</body>
</html>