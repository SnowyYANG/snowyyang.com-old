<?php

/* 
 * by Snowy YANG
 * for http://snowy.asia/
 */

require_once('../config.php');

if (!($_SERVER['PHP_AUTH_USER'] === USER && $_SERVER['PHP_AUTH_PW'] === PASSWORD)) {
    header('WWW-Authenticate: Basic');
    header('HTTP/1.0 401 Unauthorized');
    exit;
}

function db_get() {
    return mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
}

function db_add_diary($title, $content) {
    $db = db_get();
    $title = mysqli_real_escape_string($db, $title);
    $content = mysqli_real_escape_string($db, $content);
    mysqli_query($db, "INSERT diary (create_time, title, content) VALUES (NOW(), '$title', '$content')", MYSQLI_USE_RESULT);
    $id = mysqli_insert_id($db);
    mysqli_close($db);
    return $id;
}

function db_get_diary($id) {
    if (is_int($id))     {
        $db = db_get();
        if ($result = mysqli_query($db, "SELECT * FROM diary WHERE id = $id")) {
            $r = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            mysqli_close($db);
            return $r;
        }
    }
}

function db_set_diary($id, $title, $content) {
    if (is_int($id)) {
        $db = db_get();
        $title = mysqli_real_escape_string($db, $title);
        if ($content) {
            $content = mysqli_real_escape_string($db, $content);
            mysqli_query($db, "UPDATE diary SET title = '$title', content = '$content' WHERE id = $id", MYSQLI_USE_RESULT);
        }
        else
            mysqli_query($db, "UPDATE diary SET title = '$title' WHERE id = $id", MYSQLI_USE_RESULT);
        mysqli_close($db);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $title = $_POST['title'];
    $content = $_POST['content'] === '' ? null : str_replace("\r\n", "\n", $_POST['content']);
    if ($id === 0) $id = db_add_diary($title, $content);
    else db_set_diary($id, $title, $content);
}
else {
    $id = intval($_GET['id']);
    if ($id !== 0) {
        if ($r = db_get_diary($id)) {
            $title = $r['title'];
            $content = $r['content'];
        }
        else $id = 0;
    }
}
?>
<!DOCTYPE html>
<!--
by Snowy YANG
for http://snowy.asia/
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Diary</title>
        <script src="/edit.js"></script>
        <script>
        </script>
    </head>
    <body onload="_onload()">
        <form method="POST">
            <?php
            if ($id === 0)
            {
            ?>
            <input name="title" type="text"/>
            <textarea name="content"></textarea>
            <?php
            }
            else
            {
            ?>
            <input name="id" type="hidden" value="<?php echo $id; ?>"/>
            <input name="title" type="text" value="<?php echo htmlspecialchars($title); ?>"/>
            <textarea name="content"><?php echo htmlspecialchars($content); ?></textarea>
            <?php
            }
            ?>
            <input type="submit"/>
        </form>
    </body>
</html>
