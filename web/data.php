<?php

/* 
 * by Snowy YANG
 * for http://snowy.asia/
 */
require_once 'config.php';

function db_get()
{
    return mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
}

function db_fetch_row($rows)
{
    $r = mysqli_fetch_assoc($rows);
    if ($r === NULL) mysql_free_result($rows);
    return $r;
}

function db_get_homepage()
{
    $db = db_get();
    $result = mysqli_query($db, 'SELECT * FROM diary ORDER BY create_time DESC LIMIT 1');
    $diary = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($db);
    return ['diary' => $diary];
}

function db_get_diaries()
{
    $db = db_get();
    return mysqli_query($db, 'SELECT * FROM diary');
}

function db_add_diary($title, $content)
{
    $db = db_get();
    $title = mysqli_real_escape_string($db, $title);
    $content = mysqli_real_escape_string($db, $content);
    mysqli_query($db, "INSERT diary (create_time, title, content) VALUES (NOW(), '$title', '$content')", MYSQLI_USE_RESULT);
    $id = mysqli_insert_id($db);
    mysqli_close($db);
    return $id;
}

function db_get_diary($id)
{
    if (is_int($id))
    {
        $db = db_get();
        if ($result = mysqli_query($db, "SELECT * FROM diary WHERE id = $id"))
        {
            $r = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            mysqli_close($db);
            return $r;
        }
    }
}

function db_set_diary($id, $title, $content)
{
    if (is_int($id))
    {
        $db = db_get();
        $title = mysqli_real_escape_string($db, $title);
        $content = mysqli_real_escape_string($db, $content);
        mysqli_query($db, "UPDATE diary SET title = '$title', content = '$content' WHERE id = $id", MYSQLI_USE_RESULT);
        mysqli_close($db);
    }
}
