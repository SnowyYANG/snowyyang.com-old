<?php
require __DIR__.'/config.php';
$db = new SQLite3(__DIR__.'/rfwiki.db');

if ($edit = $_REQUEST['a'] === 'edit') require __DIR__.'/parser.php';
$search = $_GET['s'];
$url = $_REQUEST['q'];
if ($url[0] === '/') $url = substr ($url, 1);
if ($special = $url === 'QandA' || $url === 'Logs' || $search) require __DIR__.'/special.php';
else {
	$url = SQLite3::escapeString($url);
	if ($edit && $_POST['password'] === EDIT_PASSWORD) {
		$title = $_POST['title'];
		$content = str_replace("\r\n", "\n", $_POST['content']);
		$memo = $_POST['memo'];
		if ($_POST['save']) {
			$t = SQLite3::escapeString($title);
			$html = SQLite3::escapeString(parse_link(parse_template($content)));
			$c = SQLite3::escapeString($content);
			$fulltext = fulltext($html);
			if ($db->exec("INSERT OR IGNORE INTO pages(url) VALUES('$url')")) {
				$db->exec("UPDATE pages SET title='$t',content='$c',html='$html',`fulltext`='$fulltext',`time`=CURRENT_TIMESTAMP WHERE url='$url'");
                $page = $db->lastInsertRowID();
				$memo = SQLite3::escapeString($memo);
				$db->exec("INSERT INTO logs(page,memo) VALUES($page,'$memo')");
				$db->exec("INSERT INTO history(page,content) VALUES($page,'$c')");
				header('Location: '.SITE."/$url", true, 303);
				exit;
			}
		}
	}
	else {
		$c = $edit?'content':'html';
		if ($page = $db->querySingle("SELECT title,$c FROM pages WHERE url='$url'", true)) {
			$title = htmlspecialchars($page['title']);
			if ($edit) {
				$memo = '编辑了'.($url === '' ? '主页。' : $title.'页面。');
				$content = $page['content'];
			}
			else $html = $page['html'];
		}
        else if ($edit) $memo = '创建了页面。';
        else {
            http_response_code(404);
            $html = '<p>符文工房中文百科里没有名为'.htmlspecialchars($url).'的页面。</p>';
        }
	}
} ?>
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
            <nav>
                <div class="title-l">
                    <a href="/" class="xyxz" style="text-align:center">雪亚小站旗下</a>
                    <a href="/rfwiki">
                        <h1 style="font-size:200%;width:4.5em;padding:0 0.5rem 0 1rem;color:#205010">符文工房<sup style="font-size:50%">4</sup>中文百科</h1>
                    </a>
                </div>    
                <form action="/rfwiki" onsubmit="return !!this.s.value"><input name="s" style="width: 80%; margin:0 1em" placeholder="搜索 输入文本后回车" value="<?php echo htmlspecialchars($search); ?>"></form>
                <div id="toc"><?php echo $db->querySingle("SELECT html FROM pages WHERE url='toc'");?></div>
            </nav>
            <div id="con" style="display:flex;flex-direction:column;flex-grow:8">
                <div class="title-s" style="background:#f8e8b8;">
                    <a href="/" class="xyxz" style="padding:0.2rem 0.8rem">雪亚小站旗下</a>
                    <a href="/rfwiki"><h1 style="display:inline-block;line-height:1;color:#205010;margin:0.4em">符文工房4中文百科</h1>
                </a>
                <div style="float:right;padding:1em;color:rgb(91,75,42)"
                onclick="var nav = document.querySelector('nav');nav.style.display=nav.style.display==='block'?'none':'block'">目录</div></div>
                <main style="flex-grow:99;padding:0 1rem;word-break:break-all;width:100%;max-width:100%;box-sizing:border-box;line-height:1.5"><?php 
                    if ($edit) { ?>
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
                        </script><?php
                        if ($_POST['preview']) {
                            echo '<div>';
                            echo parse_link(parse_template($content));
                            echo '</div>';
                        }
                    }
                    else { ?>
						<a href="/rfwiki/Ad" class="ad" style="color:red;text-decoration:underline;">捐助本站</a>
                        <div style="padding-right:1em"><?php
                        if ($special) specialcontent();
                        else echo $html; ?>
                        </div><?php 
                    } ?>
                </main>
                <footer>
					<br>符文工房4中文百科的全部文字在<a href="https://creativecommons.org/licenses/by-sa/3.0/deed.zh">知识共享 署名-相同方式共享 3.0协议之条款</a>下提供。
					<br><a href="https://beian.miit.gov.cn" target="_blank">皖ICP备2022001590号-1</a>
				</footer>
            </div>
            <script>
                window.onresize = function() {
                    if (document.body.offsetWidth>=500) document.querySelector('nav').style.display='block';
                }
            </script>
    </body>
</html>