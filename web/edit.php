<?php namespace snowy_asia;

require_once('config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['password'] === PASSWORD)
{
    $id = intval($_POST['id']);
    $title = $_POST['title'];
    $content = $_POST['content'];
    require_once('data.php');
    if ($id === 0) $id = db_add_diary ($title, $content);
    else set_diary ($id, $title, $content);
}
else
{
    $id = intval($_GET['id']);
    if ($id !== 0)
    {
        require_once('data.php');
        if ($r = get_diary($id))
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
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Diary</title>
    </head>
    <body>
        <form method="POST">
            <input name="password" type="password"/>
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
