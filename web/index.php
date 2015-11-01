<?php

if ($q = $_GET['q']) {
    $q = explode('/', $q);
    switch ($q[1]) {
        case 'diary':
            $router = 'diary';
            break;
    }
}

if (!isset($router)) $router = 'homepage';

require 'private/'.$router.'.php';
?>
<!DOCTYPE html>
<!--
by Snowy YANG
for http://snowy.asia/
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title ?> - 少女工房</title>
        <style>
body{
    margin: 0;
    padding: 0;
    font: 16px Microsoft YaHei
}
        </style>
    </head>
    <body>
        <?php require 'private/'.$router.'_view.php'; ?>
    </body>
</html>