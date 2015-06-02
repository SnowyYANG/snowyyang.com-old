<?php

/* 
 * by Snowy YANG
 * for http://snowy.asia/
 */

require_once('../config.php');
require_once('../data.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['password'] === PASSWORD)
{
    $id = intval($_POST['id']);
    $title = $_POST['title'];
    $content = str_replace("\r\n", "\n", $_POST['content']);
    if ($id === 0) $id = db_add_diary($title, $content);
    else db_set_diary($id, $title, $content);
}
else
{
    $id = intval($_GET['id']);
    if ($id !== 0)
    {
        if ($r = db_get_diary($id))
        {
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
            var pe;
            
            function _onload() {
                pe = document.getElementById('password');
                pe.value = getPassword();
            }
        </script>
    </head>
    <body onload="_onload()">
        <form method="POST">
            <input name="password" id="password" type="password" onchange="setPassword(pe.value)"/>
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
