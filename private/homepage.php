<?php

/* 
 * by Snowy YANG
 * for http://snowy.asia/
 */

require_once 'private/data.php';

function homepage_model()
{
    $result = mysqli_query($mysqli, 'SELECT create_time, title FROM diary ORDER BY create_time DESC LIMIT 1');
    $diary = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return ['diary_time' => $diary['create_time'], 'diary' => $diary['title']];
}

$title = 'Snowy';
$model = homepage_model();