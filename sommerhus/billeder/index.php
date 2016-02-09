<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--/sommerhus/billeder-->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link type="text/css" rel="stylesheet" href="../stylesheetMenu.css"/>
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    <link rel="apple-touch-icon" href="apple-touch-icon.png"/>
    <link rel="shortcut icon" href="apple-touch-icon.png"/>
    <title>Gitte og Lars' sommerhus</title>
</head>

<body>

    <div id="menu">
        <div class="menuPointOuter">
            <div class="menuPointInner">
                <a href="http://fredstesting.dk/sommerhus/" class="menuPointLink">
                    <p class="menuPointTXT" >
                        Om huset 
                    </p> 
                </a>
            </div>
        </div>
        <div class="menuPointOuter">
            <div class="menuPointInner">
                <a href="http://fredstesting.dk/sommerhus/billeder/" class="menuPointLink">
                    <p class="menuPointTXT" >
                        Billeder 
                    </p> 
                </a>
            </div>
        </div>
        <div class="menuPointOuter">
            <div class="menuPointInner">
                <a href="http://fredstesting.dk/sommerhus/kalender/" class="menuPointLink">
                    <p class="menuPointTXT" >
                        Kalender 
                    </p> 
                </a>
            </div>
        </div>
    </div>

    <div id="main">
        <?php

        $images = scandir('images');
        foreach ($images as $entry) {
            if ($entry != "." && $entry != ".."){
                echo '<a href="http://fredstesting.dk/sommerhus/billeder/bigimages/' . $entry . '"><img src="images/' . $entry . '" class="img"></a>' . "\n";
            }
            
        }

        ?>
        
        
    </div>

</body>
</html>
