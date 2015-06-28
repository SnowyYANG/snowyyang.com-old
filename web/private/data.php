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
