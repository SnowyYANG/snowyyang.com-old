<?php

require_once 'config.php'; 
if ($mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE)) {
    $mysqli->set_charset('utf8mb4');
	$uri = $mysqli->escape_string($_SERVER['REQUEST_URI']);
	$referer = $mysqli->escape_string($_SERVER['HTTP_REFERER']);
	$ip = $mysqli->escape_string($_SERVER['REMOTE_ADDR']);
	$browser = $mysqli->escape_string($_SERVER['HTTP_USER_AGENT']);
	$mysqli->query("INSERT requests (uri, referer, ip, browser) VALUES ('$uri', '$referer', '$ip', '$browser')");
}
else {
    http_response_code(503);
    echo '维护中...Maintaining...';
}

if ($q = $_GET['q']) {
    $q = explode('/', $q);
    switch ($q[1]) {
        case 'yydzh':
            $choices = ['/alipay.jpg','http://wx3.sinaimg.cn/large/006poOf4gy1g00kbv9jmyg309w05kgrv.gif','http://wx4.sinaimg.cn/large/006poOf4gy1g00kbtqkolj309705k3z8.jpg'];
            header('Location: '.$choices[rand(0,2)], true, 307);
            exit;
		case '':
        case 'mc':
		case 'mrp':
        case 'about':
		case 'dreamcage':
		case 'nighry':
            $router = $q[1];
            break;
        case 'rfwiki':
        case 'mabiwiki':
		case 'world':
			$skip = strlen($q[1])+1;
            $_GET['q'] = substr($_GET['q'], $skip);
            $_REQUEST['q'] = substr($_REQUEST['q'], $skip);
            require $q[1].'/index.php';
            exit;
        case 'rf4wiki':
            header('Location: /rfwiki',true,301);
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
        <title><?php if ($title) echo $title.' - '; ?>雪亚幻想阵地</title>
		<link rel="shortcut icon" href="/favicon.ico"/>
    </head>
    <body style="margin:0;font:16px Microsoft YaHei;">
        <a href="/" style="color:<?php echo $router == 'homepage' ? '#000000' : '#ffffff';?>">
			<div style="width: 1em;position: fixed;top:0;background: #eaf4fc;padding: 1rem;height: 100%;font: bold 3em SimSun;">
                雪亚幻想阵地
            </div>
		</a>
        <div style="margin:0em 6em"><?php view(); ?></div>
        <div style="width: 3em; position: fixed; top:0; right:0; background: #eaf4fc; padding: 1em; height: 100%;">
          <footer style="position:absolute; left:1em; bottom:8em; color:#ffffff; white-space:nowrap; transform-origin:left center 0; transform:rotate(90deg)">Snowy❄&#65038;2019</footer>
        </div>
    </body>
</html>
