<?php

/* 
 * by Snowy YANG
 * for http://snowy.asia/
 */

$title = '洛奇普染颜色大全';

if ($_REQUEST['s']) {
    $s = $mysqli->escape_string($_REQUEST['s']);
    $mysqli->query("INSERT mc_s(ip,s) VALUES('$ip','$s')");
}
