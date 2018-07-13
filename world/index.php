<?php

/* 
 * by Snowy YANG
 * for 时与空与梦的旅人
 */

require_once __DIR__.'/../config.php';

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if ($mysqli->connect_errno) {
    die($mysqli->connect_errno.$mysqli->connect_error);
}

date_default_timezone_set('Asia/Hong_Kong');
$time = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
$uri = mysqli_real_escape_string($mysqli, $_SERVER['REQUEST_URI']);
$referer = mysqli_real_escape_string($mysqli, $_SERVER['HTTP_REFERER']);
$ip = mysqli_real_escape_string($mysqli, $_SERVER['REMOTE_ADDR']);
$browser = mysqli_real_escape_string($mysqli, $_SERVER['HTTP_USER_AGENT']);
mysqli_query($mysqli, "INSERT world_requests (time, uri, referer, ip, browser) VALUES ('$time', '$uri', '$referer', '$ip', '$browser')", MYSQLI_USE_RESULT);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>时与空与梦的旅人</title>
        <style>
            body {
                font-family: Microsoft YaHei;
            }
        </style>
    </head>
    <body>
		<div style="width:32em; horizontal-align:middle">2019年后启动<br><a href="http://snowy.asia/">返回雪亚幻想境地...</a></div>
    </body>
</html>
