<?php
if ($q = $_GET['q']) {
    $q = explode('/', $q);
    switch ($q[1]) {
		case '':
        case 'love':
            $router = $q[1];
            break;
        case 'rfwiki':
            header('Location: https://rf4wiki.allie.tw'.$_GET['q'], true, 301);
            exit;
        case 'rf4wiki':
            header('Location: /rfwiki',true,301);
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
<!--
by Snowy YANG
for http://snowy.asia/
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php if ($title) echo $title.' | '; ?>雪亚小站</title>
		<link rel="shortcut icon" href="/favicon.ico"/>
		<style>a:visited{color:#009} summary{cursor:pointer} <?php echo $style; ?></style>
    </head>
    <body style="margin:0;font:16px Microsoft YaHei;">
        <a href="/" style="color:#fff">
			<div style="width: 1em;position: fixed;top:0;background: #eaf4fc;padding: 1rem;height: 100%;font: bold 3em SimSun;">
                雪亚小站
            </div>
		</a>
        <div style="margin:0em 6em">
            <?php view(); ?>
        </div>
        <div style="width: 3em; position: fixed; top:0; right:0; background: #eaf4fc; padding: 1em; height: 100%;">
			<footer style="position:absolute; left:1em; bottom:8rem; color:#ffffff; white-space:nowrap; transform-origin:left center 0; transform:rotate(90deg)">
				Snowy❄&#65038;2023
			</footer>
        </div>
    </body>
</html>
