<?php
if ($q = $_GET['q']) {
    $q = explode('/', $q);
    switch ($q[1]) {
		case '':
        case 'mc':
		case 'mrp':
		case 'mr':
        case 'about':
            $router = $q[1];
            break;
        case 'rfwiki':
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
        case 'mabiwiki':
            header('Location: http://www.luoqi.wiki/', true, 301);
            break;
		case 'love':
            header('Location: https://read.douban.com/reader/essay/317897624/', true, 301);
            break;
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
        <title><?php if ($title) echo $title.' - '; ?>雪亚小站</title>
		<link rel="shortcut icon" href="/favicon.ico"/>
		<style>a:visited{color:#009} summary{cursor:pointer} <?php echo $style; ?></style>
    </head>
    <body style="margin:0;font:16px Microsoft YaHei;">
        <a href="/" style="color:<?php echo $router == 'homepage' ? '#000000' : '#ffffff';?>">
			<div style="width: 1em;position: fixed;top:0;background: #eaf4fc;padding: 1rem;height: 100%;font: bold 3em SimSun;">
                雪亚小站
            </div>
		</a>
        <div style="margin:0em 6em">
            <?php view(); ?>
        </div>
        <div style="width: 3em; position: fixed; top:0; right:0; background: #eaf4fc; padding: 1em; height: 100%;">
			<footer style="position:absolute; left:1em; bottom:20rem; color:#ffffff; white-space:nowrap; transform-origin:left center 0; transform:rotate(90deg)">
				<a href="https://beian.miit.gov.cn" style="text-decoration: none"><span style="color:white">皖ICP备2022001590号-1</span></a> Snowy❄&#65038;2022
			</footer>
        </div>
    </body>
</html>
