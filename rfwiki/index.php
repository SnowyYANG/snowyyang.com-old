<?php

/* 
 * by Snowy YANG
 * for 符文工房中文百科
 */
require __DIR__.'/config.php';

if (!$mysqli) 
    if ($mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE)) $mysqli->set_charset('utf8mb4');
    else {
        http_response_code(503);
        echo '符文工房4中文百科 维护中。Maintaining...';
        exit;
    }

if ($edit = $_REQUEST['a'] === 'edit') require __DIR__.'/parser.php';
$search = $_GET['s'];
$url = $_REQUEST['q'];
if ($url[0] === '/') $url = substr ($url, 1);
if ($special = $url === 'QandA' || $url === 'Logs' || $search) require __DIR__.'/special.php';
else {
	$url = $mysqli->escape_string($url);
	if ($edit && $_POST['password'] === EDIT_PASSWORD) {
		$title = $_POST['title'];
		$content = str_replace("\r\n", "\n", $_POST['content']);
		$memo = $_POST['memo'];
		if ($_POST['save']) {
			$t = $mysqli->escape_string($title);
			$html = $mysqli->escape_string(parse_link(parse_template($content)));
			$c = $mysqli->escape_string($content);
			$fulltext = fulltext($html);
			if ($mysqli->query("INSERT INTO rfwiki_pages(url,title,content,html,`fulltext`) VALUES('$url','$t','$c','$html','$fulltext') ON DUPLICATE KEY UPDATE title='$t',content='$c',html='$html',`fulltext`='$fulltext'") && $mysqli->affected_rows) {
				$page_id = $mysqli->insert_id;
				$action = $mysqli->affected_rows;
				$memo = $mysqli->escape_string($memo);
				$mysqli->query("INSERT INTO rfwiki_logs(action,page,memo) VALUES($action,$page_id,'$memo')");
				$mysqli->query("INSERT INTO rfwiki_history(page_id,content) VALUES($page_id,'$c')");
				header('Location: '.SITE."/$url", true, 303);
				exit;
			}
		}
	}
	else {
		$c = $edit?'content':'html';
		$result = $mysqli->query("SELECT title,$c FROM rfwiki_pages WHERE url='$url'");
		$page = $result->fetch_assoc();
		if ($page === null) {
			if ($edit) $memo = '创建了页面。';
			else {
				http_response_code(404);
				$html = '<p>符文工房中文百科里没有名为'.htmlspecialchars($url).'的页面。</p>';
			}
		}
		else {
			$title = htmlspecialchars($page['title']);
			if ($edit) {
				$memo = '编辑了'.($url === '' ? '主页。' : $title.'页面。');
				$content = $page['content'];
			}
			else $html = $page['html'];
		}
		$result->free();
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title ? $title.' - 符文工房4中文百科':'符文工房4中文百科'; ?></title>
        <link href="/rfwiki/favicon.ico" rel="shortcut icon"/>
        <link href="/rfwiki/rfwiki.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <div style="display:flex;aligen-items:stretch;min-height:100vh">
            <nav style="width:10em;min-width:10em;background:#f8e8b8;border-right:dashed 1px rgba(91,75,42,0.3);min-height:100vh">
                <a class="title-l" href="/rfwiki">
                    <h1 style="font-size:200%;width:4.5em;padding:0 0.5em;color:#205010">符文工房<sup style="font-size:50%">4</sup>中文百科</h1>
                </a>
                <form action="/rfwiki" onsubmit="return !!this.s.value"><input name="s" style="width: 80%; margin:0 1em" placeholder="搜索 输入文本后回车" value="<?php echo htmlspecialchars($search); ?>"></form>
                <div id="toc">
                <?php 
                if ($result = $mysqli->query("SELECT html FROM rfwiki_pages WHERE url = 'toc'")) {
                    echo $result->fetch_assoc()['html'];
                    $result->free();
                }
                ?>
                </div>
            </nav>
            <div id="con" style="display:flex;flex-direction:column;flex-grow:8">
                <div class="title-s" style="background:#f8e8b8;"><a href="/rfwiki"><h1 style="display:inline-block;line-height:1;color:#205010;margin:0.4em">符文工房4中文百科</h1></a>
                <div style="float:right;padding:1em;color:rgb(91,75,42)"
                onclick="var nav = document.querySelector('nav');nav.style.display=nav.style.display==='block'?'none':'block'">目录</div></div>
                <main style="flex-grow:99;padding:0 1rem;word-break:break-all;width:100%;max-width:100%;box-sizing:border-box;line-height:1.5">
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
                            编辑密码：<input id="password" name="password" type="password">
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
						echo '<a href="/rfwiki/Ad" class="ad" style="color:red;text-decoration:underline;">捐助本站</a>';
                        echo '<div style="padding-right:1em">';
						if ($special) specialcontent();
                        else echo $html;
                        $mysqli->close();
                        echo '</div>';
                    } 
                    ?>
                </main>
                <footer><br>符文工房4中文百科的全部文字在<a href="https://creativecommons.org/licenses/by-sa/3.0/deed.zh">知识共享 署名-相同方式共享 3.0协议之条款</a>下提供。<br>皖ICP备2022001590号-1</footer>
            </div>
    </body>
</html>
