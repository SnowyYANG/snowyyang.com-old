<?php

/* 
 * by Snowy YANG
 * for http://snowy.asia/
 */

require 'private/data.php';

function diary_model()
{
    static $mysqli, $result;
    
    if (!$mysqli)
    {
        $mysqli = db_get();
        $result = mysqli_query($mysqli, 'SELECT * FROM diary');
    }
    if ($model = mysqli_fetch_assoc($result)) $model['content'] = str_replace("\n", '<br>', $model['content']);
    else
    {
        mysqli_free_result($result);
        mysqli_close($mysqli);
    }
    return $model;
}

$title = 'Diary';
