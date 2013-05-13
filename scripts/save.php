<?php
    if($_POST && sizeof($_POST) == 88) {

    $code = md5(md5(mt_rand()) . md5("scribscrab" + mt_rand(0, mt_rand())));
    $code = substr($code, mt_rand(0, 20), 5);
    
    foreach($_POST as $value) {
        $output .= $value . "\n";
    }
    
    $fh = fopen("../saves/".$code.".txt", 'w') or die("error");
    fwrite($fh, $output);
    fclose($fh);
    
    echo $code;
    
    } else {
        echo "error";
    }
?>