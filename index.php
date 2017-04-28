<?php

if ($q = $_GET['q']) {
    $q = explode('/', $q);
    switch ($q[1]) {
        case 'mc':
            $router = 'mc';
            break;
        case 'mrp':
            $router = 'mrp';
            break;
        case 'rfwiki':
            $_GET['q'] = substr($_GET['q'], 7);
            $_REQUEST['q'] = substr($_REQUEST['q'], 7);
            require_once 'rfwiki/index.php';
            exit(0);
    }
}

require_once 'private/data.php';
$mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

date_default_timezone_set('Asia/Hong_Kong');
$time = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
$uri = mysqli_real_escape_string($mysqli, $_SERVER['REQUEST_URI']);
$referer = mysqli_real_escape_string($mysqli, $_SERVER['HTTP_REFERER']);
$ip = mysqli_real_escape_string($mysqli, $_SERVER['REMOTE_ADDR']);
$browser = mysqli_real_escape_string($mysqli, $_SERVER['HTTP_USER_AGENT']);
mysqli_query($mysqli, "INSERT requests (time, uri, referer, ip, browser) VALUES ('$time', '$uri', '$referer', '$ip', '$browser')", MYSQLI_USE_RESULT);

if (!isset($router)) $router = 'homepage';

require 'private/'.$router.'.php';

mysqli_close($mysqli);
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
        <a href="<?php echo SITE;?>" style="color:#000000">
            <div style="width: 3em; position: fixed; margin:0; top:0;background: #eaf4fc; padding: 1em; height: 100%;">
                <h style="font:3em SimSun; width:0; font-weight: bold">少女工房</h>
            </div>
        </a>
        <div style="margin:0em 6em"><?php require 'private/'.$router.'_view.php'; ?></div>
        <div style="width: 3em; position: fixed; top:0; right:0; background: #eaf4fc; padding: 1em; height: 100%;">
          <footer style="position:absolute; left:1em; bottom:8em; color:#ffffff; white-space:nowrap; transform-origin:left center 0; transform:rotate(90deg)">Snowy❄2016</footer>
        </div>
    </body>
</html>