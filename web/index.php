<?php namespace snowy_asia;

require_once('config.php');
require_once('data.php');

function diary_content($content)
{
    return str_replace("\n", '<br>', $content);
}

if ($q = $_GET['q'])
{
    $q = explode('/', $q);
    switch ($q[1])
    {
        case 'diary':
            $id = intval($q[2]);
            if ($id !== 0)
            {
                if ($model = get_diary($id))
                {
                    $title = $model['title'];
                    $content = diary_content($model['content']);
                    $done = TRUE;
                }
            }
            if (!$done)
            {
                $title = 'Diary';
                $model = db_get_diaries();
                $content = '';
                while($r = db_fetch_row($model))
                {
                    $d = diary_content($r['content']);
                    $content.=
"<br>
$r[title] ($r[create_time])<br>
<br>
$d<br>
-----------<br>";
                }
                $done = TRUE;
            }
            break;
    }
}

if (!$done)
{
    $title = 'Snowy';
    $model = db_get_homepage();
    $diary = $model['diary'];
    $d = diary_content($diary['content']);
    $content =
"少女工房<br>
-----------<br>
<br>
<a href=\"/diary\">Diary</a><br>
<br>
$diary[title] ($diary[create_time])<br>
<br>
$d<br>
-----------<br>
<br/>
未完待续...";
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
        <title><?php echo $title ?> - 少女工房</title>
    </head>
    <body>
        <p><?php echo $content ?></p>
    </body>
</html>