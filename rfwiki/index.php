<?php

/* 
 * by Snowy YANG
 * for 符文工房中文百科
 */

require __DIR__.'/config.php';
require __DIR__.'/parser.php';

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if ($mysqli->connect_errno) {
    die($mysqli->connect_errno.$mysqli->connect_error);
}

date_default_timezone_set('Asia/Hong_Kong');
$time = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
$uri = mysqli_real_escape_string($mysqli, $_SERVER['REQUEST_URI']);
$referer = mysqli_real_escape_string($mysqli, $_SERVER['HTTP_REFERER']);
$ip = mysqli_real_escape_string($mysqli, $_SERVER['REMOTE_ADDR']);
$browser = mysqli_real_escape_string($mysqli, $_SERVER['HTTP_USER_AGENT']);
mysqli_query($mysqli, "INSERT rfwiki_requests (time, uri, referer, ip, browser) VALUES ('$time', '$uri', '$referer', '$ip', '$browser')", MYSQLI_USE_RESULT);

$edit = $_REQUEST['a'] === 'edit';
$url = $_REQUEST['q'];
if ($url[0] === '/') $url = substr ($url, 1);
if (!$edit && strtolower($url) === 'toc') $url = ''; //edit...
$special = $url === 'QandA' || $url === 'Logs';
$url = $mysqli->escape_string($url);

if ($edit && $_POST['password'] === EDIT_PASSWORD) {
    $title = $_POST['title'];
    $content = str_replace("\r\n", "\n", $_POST['content']);
    $memo = $_POST['memo'];
    if ($_POST['save']) {
        $t = $mysqli->escape_string($title);
        $c = $mysqli->escape_string($content);
        $html = parse_template($c);
        $fulltext = fulltext($html);
        if ($mysqli->query("INSERT INTO rfwiki_pages(url,title,content,html,`fulltext`) VALUES('$url','$t','$c','$html','$fulltext') ON DUPLICATE KEY UPDATE title='$t',content='$c',html='$html',`fulltext`='$fulltext'") && $mysqli->affected_rows) {
            $page_id = $mysqli->insert_id;
            $action = $mysqli->affected_rows;
            $memo = $mysqli->escape_string($memo);
            $mysqli->query("INSERT INTO rfwiki_logs(action,page,memo) VALUES($action,$page_id,'$memo')");
            $mysqli->query("INSERT INTO rfwiki_history(page_id,content) VALUES($page_id,'$c')");
            $edit = false;
        }
    }
}
else {
    $result = $mysqli->query("SELECT time,title,content FROM rfwiki_pages WHERE url='$url'");
    $page = $result->fetch_assoc();
    if ($page === null) {
        $title = '';
        $content = '<p>符文工房中文百科里没有名为'.htmlspecialchars($url).'的页面。</p>';
        if ($edit) $memo = '创建了页面。';
    }
    else {
        $title = $page['title'];
        $content = $page['content'];
        if ($edit) $memo = '编辑了'.($url === '' ? '主页。' : $title.'页面。');
    }
    $result->close();
    if ($url === 'QandA' && $_POST['phrase'] === '我不是在发广告') {
        $question = trim($_POST['question']);
        if ($question !== '') {
            $question = $mysqli->escape_string($question);
            $qip = mysqli_real_escape_string($mysqli, $_SERVER['REMOTE_ADDR']);
            $mysqli->query("INSERT INTO rfwiki_qanda(question, qip, qtime) VALUES ('$question','$qip', now())");
        }
    }
}

$result = $mysqli->query('SELECT content FROM rfwiki_pages WHERE url = \'toc\'');
if (!$result) {
    die('DB Error...');
}
$toc = $result->fetch_assoc()['content'];
$result->close();
if (!$special) $mysqli->close();

$title = htmlspecialchars($title);
$toc = parse_link($toc);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title === '' ? '符文工房中文百科': $title.' - 符文工房中文百科'; ?></title>
        <link href="<?php echo SITE; ?>/favicon.ico" rel="shortcut icon"/>
        <link href="<?php echo SITE; ?>/rfwiki.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <table style="table-layout: fixed; border-collapse:collapse; height:100%; width:100%">
            <col style="width:10.1em">
            <col style="width:100%">
            <tr>
                <td rowspan="2" style="vertical-align:top; background:#f8e8b8; border-right:dashed 1px rgba(91,75,42,0.3)">
                    <a href="<?php echo SITE; ?>">
                        <h1 style="width:4em;padding:0 0.5em;color:#205010">符文工房中文百科</h1>
                    </a>
                    <div id="toc">
                    <?php 
                    echo $toc;
                    ?>
                    </div>
                </td>
                <td id="con" style="vertical-align:top; padding-left:1em">
                    <?php 
                    if ($edit) {
                    ?>
                        <script>
                            function _onclick() {
                                var pw = document.getElementById('password');
                                localStorage.setItem('password', pw.value);
                            }
                        </script>
                        <form method="POST">
                            <input name="title" type="text" value="<?php echo $title; ?>" style="width:90%">
                            <textarea name="content" style="width:90%" rows="30"><?php echo $content; ?></textarea>
                            <input name="memo" type="text" value="<?php echo $memo;?>" style="width: 90%"><br>
                            <input id="password" name="password" type="password">
                            <input type="submit" name="preview" value="Preview">
                            <input type="submit" name="save" value="Submit" onclick="_onclick()">
                        </form>
                        <script>
                            document.getElementById('password').value = localStorage.getItem('password');
                        </script>
                    <?php
                        if ($_POST['preview']) {
                            echo '<div>';
                            echo parse_link(parse_template($content));
                            echo '</div>';
                        }
                    }
                    else {
                    ?>
                        <div style="font-size:0.7em; float:right">
                            <a href="<?php echo SITE; ?>/index.php?a=edit&q=<?php echo htmlspecialchars($url); ?>" style="color:white">编辑</a>
                        </div>
                    <?php 
                        echo '<div style="padding-right:1em">';
                        echo parse_link(parse_template($content));
                        if ($special) require __DIR__.'/special.php';
                        echo '</div>';
                    } 
                    ?>
                </td>
            </tr>
            <tr style="height:0">
                <td style="height:0">
                    <footer>符文工房中文百科的全部文字在<a href="https://creativecommons.org/licenses/by-sa/3.0/deed.zh">知识共享 署名-相同方式共享 3.0</a>协议之条款下提供。</footer>
                </td>
            </tr>
        </table>
    </body>
</html>
