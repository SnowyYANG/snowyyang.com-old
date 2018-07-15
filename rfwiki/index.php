<?php

/* 
 * by Snowy YANG
 * for 符文工房中文百科
 */

require __DIR__.'/config.php';

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
if ($mysqli->connect_errno) {
    die($mysqli->connect_errno.$mysqli->connect_error);
}

$time = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
$uri = mysqli_real_escape_string($mysqli, $_SERVER['REQUEST_URI']);
$referer = mysqli_real_escape_string($mysqli, $_SERVER['HTTP_REFERER']);
$ip = mysqli_real_escape_string($mysqli, $_SERVER['REMOTE_ADDR']);
$browser = mysqli_real_escape_string($mysqli, $_SERVER['HTTP_USER_AGENT']);
mysqli_query($mysqli, "INSERT rfwiki_requests (time, uri, referer, ip, browser) VALUES ('$time', '$uri', '$referer', '$ip', '$browser')", MYSQLI_USE_RESULT);

require __DIR__.'/parser.php';
$edit = $_REQUEST['a'] === 'edit';
$search = $_REQUEST['s'];
$url = $_REQUEST['q'];
if ($url[0] === '/') $url = substr ($url, 1);
$url = $mysqli->escape_string($url);
if ($special = $url === 'QandA' || $url === 'Logs' || $search) require __DIR__.'/special.php';

if ($edit && $_POST['password'] === EDIT_PASSWORD) {
    $title = $_POST['title'];
    $content = str_replace("\r\n", "\n", $_POST['content']);
    $memo = $_POST['memo'];
    if ($_POST['save']) {
        $t = $mysqli->escape_string($title);
        $html = $mysqli->escape_string(parse_template($content));
        $c = $mysqli->escape_string($content);
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
else if (!$special) {
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
    $result->free();
    $title = htmlspecialchars($title);
}
else if ($url === 'QandA' && $_POST['phrase'] === '我不是在发广告') {
    $question = trim($_POST['question']);
    if ($question !== '') {
        $question = $mysqli->escape_string($question);
        $qip = mysqli_real_escape_string($mysqli, $_SERVER['REMOTE_ADDR']);
        $mysqli->query("INSERT INTO rfwiki_qanda(question, qip) VALUES ('$question','$qip')");
		if (($result=$mysqli->query('SELECT * FROM meta WHERE name="mailed" AND value!=""')) && !$result->num_rows) {
			$value = mail(CS_EMAIL,'SA updated','New user feedback in rfwiki QandA.');
			$mysqli->query("UPDATE meta SET value='$value' WHERE name='mailed' LIMIT 1");
		}
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title === '' ? '符文工房中文百科': ($title ?? specialtitle()).' - 符文工房中文百科'; ?></title>
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
                    <form action="<?php echo SITE;?>" onsubmit="return !!this.s.value"><input name="s" style="width: 80%; margin:0 1em" placeholder="搜索" value="<?php echo htmlspecialchars($search); ?>"></form>
                    <div id="toc">
                    <?php 
                    if ($result = $mysqli->query("SELECT html FROM rfwiki_pages WHERE url = 'toc'")) {
                        echo parse_link($result->fetch_assoc()['html']);
                        $result->free();
                    }
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
                        if (!$special) {
                        ?>
                            <div style="font-size:0.7em; float:right">
                                <a href="<?php echo SITE; ?>/?a=edit&q=<?php echo htmlspecialchars($url); ?>" style="color:white">编辑</a>
                            </div>
                        <?php 
                        }
                        echo '<div style="padding-right:1em">';
                        if ($special) specialcontent();
                        else echo parse_link(parse_template($content));
                        $mysqli->close();
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
