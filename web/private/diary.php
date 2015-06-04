<?php

/* 
 * by Snowy YANG
 * for http://snowy.asia/
 */

require 'data.php';

function diary_model()
{
    static $mysqli = null, $result;
    
    if ($mysqli === null)
    {
        $mysqli = db_get();
        $result = mysqli_query($db, 'SELECT * FROM diary');
    }
    if ($model = mysqli_fetch_assoc($result)) str_replace("\n", '<br>', $model['content']);
    else
    {
        mysqli_free_result($result);
        mysqli_close($mysqli);
    }
    return $model;
}

$title = 'Diary';
