<?php

/* 
 * by Snowy YANG
 * for 时与空与梦的旅人
 */

require __DIR__.'/config.php';

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
        <h1>时与空与梦的旅人</h1>
        <h2>序章 所谓游戏是在追求数值吗？</h2>
        <p>
            如今的很多手游，可能是一种赌博机。<br>
            “我再去买几个水晶，你乖乖的呆在卡池里，不要走动。”<br>
            这内在的数值，是一个迷一样的概率。<br>
            我们这个游戏，大约不会有类似的模式，但它也有一个迷一样的概率——<br>
            跳票概率<br>
            当前跳票概率：<span style="color:blue">100%</span><br>
            游戏做完开服后我会给注册用户的QQ邮箱发送邮件（有共同群的会临时对话通知，工期无法预计）。
        </p>
        <footer>
            by 若雪爱丽丝（QQ 368487858）<br>
            for 时与空与梦的旅人
        </footer>
    </body>
</html>
