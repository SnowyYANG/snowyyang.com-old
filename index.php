<?php
if ($q = $_GET['q']) {
    $q = explode('/', $q);
    switch ($q[1]) {
		case '':
        case 'love':
            $router = $q[1];
            break;
        case 'rfwiki':
        case 'rf4wiki':
            header('Location: https://rf4wiki.allie.tw'.$_GET['q'], true, 301);
            exit;
		case 'mc.txt':
		case 'mc.xlsx':
        case 'mc':
			header('Location: https://luoqi.wiki/dye-colors', true, 301);
			exit;
		case 'mrp':
            header('Location: https://luoqi.wiki/rabbie', true, 301);
            exit;
		case 'mr':
            header('Location: https://luoqi.wiki/metalware-old', true, 301);
            exit;
		default:
			http_response_code(404);
			break;
    }
}
if (!$router) $router = 'homepage';

require 'private/'.$router.'.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php if ($title) echo $title.' | '; ?>雪亚小站</title>
		<link rel="shortcut icon" href="/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="/main.css">
    </head>
    <body>
        <header><a href="/" style="color:#fff"><h1>雪亚小站</h1></a></header>
        <main><?php view(); ?></main>
        <footer><div class="footer">Snowy❄&#65038;2023</div></footer>
    </body>
</html>
