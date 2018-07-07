<?php

if ($q = $_GET['q']) {
    $q = explode('/', $q);
    switch ($q[1]) {
		case '':
        case 'mc':
		case 'mrp':
        case 'about':
		case 'dreamcage':
            $router = $q[1];
            break;
        case 'rfwiki':
            $_GET['q'] = substr($_GET['q'], 7);
            $_REQUEST['q'] = substr($_REQUEST['q'], 7);
            require_once 'rfwiki/index.php';
            exit;
		case 'mc.txt':
		case 'mc.xlsx':
			header('Location: /mc', true, 301);
			exit;
		default:
			http_response_code(404);
			break;
    }
}

require 'config.php'; 
if ($mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE)) {
$time = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
$uri = mysqli_real_escape_string($mysqli, $_SERVER['REQUEST_URI']);
$referer = mysqli_real_escape_string($mysqli, $_SERVER['HTTP_REFERER']);
$ip = mysqli_real_escape_string($mysqli, $_SERVER['REMOTE_ADDR']);
$browser = mysqli_real_escape_string($mysqli, $_SERVER['HTTP_USER_AGENT']);
mysqli_query($mysqli, "INSERT requests (time, uri, referer, ip, browser) VALUES ('$time', '$uri', '$referer', '$ip', '$browser')", MYSQLI_USE_RESULT);
}
if (!$router) $router = 'homepage';

require 'private/'.$router.'.php';

if ($mysqli) mysqli_close($mysqli);
?>
<!DOCTYPE html>
<!--
by Snowy YANG
for http://snowy.asia/
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php if ($title) echo $title.' - '; ?>雪亚幻想境地</title>
		<link rel="shortcut icon" href="/favicon.ico"/>
    </head>
    <body style="margin:0;font:16px Microsoft YaHei;">
        <a href="<?php echo SITE;?>" style="color:<?php echo $router == 'homepage' ? '#000000' : '#ffffff';?>">
			<div style="width: 1em;position: fixed;top:0;background: #eaf4fc;padding: 1rem;height: 100%;font: bold 3em SimSun;">
                雪亚幻想境地
            </div>
		</a>
        <div style="margin:0em 6em"><?php view(); ?></div>
        <div style="width: 3em; position: fixed; top:0; right:0; background: #eaf4fc; padding: 1em; height: 100%;">
          <footer style="position:absolute; left:1em; bottom:8em; color:#ffffff; white-space:nowrap; transform-origin:left center 0; transform:rotate(90deg)">Snowy❄&#65038;2018</footer>
        </div>
    </body>
</html>
