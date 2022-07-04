<?php

/* 
 * by Snowy YANG
 * for 符文工房中文百科
 */

if ($url === 'QandA')
	if (false) {
		if ($question = trim($_POST['question'])) {
			$question = $mysqli->escape_string($question);
			$qip = $mysqli->escape_string($_SERVER['REMOTE_ADDR']);
			$mysqli->query("INSERT INTO rfwiki_qanda(question, qip) VALUES ('$question','$qip')");
			header('Location: '.SITE.'/QandA', true, 303);
			exit;
		}
	}
	else if ($_GET['a']==='check') {
		$row=$mysqli->query('SELECT MAX(id) AS i FROM rfwiki_qanda')->fetch_assoc();
		echo $row['i'];
		exit;
	}

$title=$url === 'QandA' ? '留言板' : ($url === 'Logs' ? '更新日志' : '搜索');

function specialcontent() {
    global $url,$search;
    if ($url === 'QandA') qanda();
    else if ($url === 'Logs') logs();
    else if ($search) search();
}

function qanda() {
    ?>
    <h2>留言板（已关闭</h2>
    <p>为符合个人网站备案相关规定（无UGC），留言板已关闭。<br>
    网站相关事务（如勘误、建议等），可以发送email至<a href="mailto:snowyyang@outlook.com">snowyyang@outlook.com</a>。<br>
    游戏相关问题，推荐去<a href="https://tieba.baidu.com/f?kw=%E7%AC%A6%E6%96%87%E5%B7%A5%E6%88%BF">百度符文工房吧</a>或<a href="https://forum.gamer.com.tw/A.php?bsn=1405">巴哈姆特牧场物语系列哈拉版</a>和网友讨论。</p>    
    <form method="POST" style="display:none">
        <textarea name="question" style="width:100%" type="text" placeholder="输入问题或留言...可以匿名或在末尾 - 附上姓名"><?php echo htmlspecialchars($_POST['question']);?></textarea><br>
        <span style="font-size:80%">主人公的住处原本应该是谁的房间？填入答案（中文）--&gt;</span><input name="phrase" text="text" value="<?php if ($_POST['question']) echo '答案错误'; ?>">
        <input value="提交" type="submit">
    </form>
    <h3>历史留言</h3>
    <?php
    echo '<div>';
    global $mysqli;
	$q = 'SELECT * FROM rfwiki_qanda ORDER BY qtime DESC';
	//if (!($all=$_GET['all'])) $q.=' LIMIT 50';
    if ($result = $mysqli->query($q)) {
        while ($row = $result->fetch_assoc()) {
            $question = htmlspecialchars($row['question']);
            if ($row['answer'] === null) echo "言：$question <span class=\"timestamp\">($row[qtime])</span><br>";
            else {
                echo "问：$question <span class=\"timestamp\">($row[qtime])</span><br>";
                echo "答：$row[answer] <span class=\"timestamp\">($row[atime])</span><br>";
            }
            echo '<br>';
        }
        $result->free();
    }
    else echo '无法加载已有的问题或留言。';
    echo '</div>';
	//if (!$all) echo '<div style="text-align:center"><a href="'.$_SERVER['REQUEST_URI'].'?all=1">查看全部留言</a></div>';
}

function logs() {
    echo '<h2>更新日志</h2><p>';
    global $mysqli;
    if ($result = $mysqli->query('SELECT * FROM rfwiki_logs ORDER BY time DESC LIMIT 100')) {
        while ($row = $result->fetch_assoc()) {
            echo "$row[time] $row[memo]<br>";
        }
        $result->free();
    }
    else echo '无法加载更新日志。';
    echo '</p>';
}

function search() {
    global $search,$mysqli;
    $search_html = htmlspecialchars($search);
    echo "<h2>搜索结果 - $search_html</h2>";
    $s = $mysqli->escape_string($search);
    echo "<p><b>精确搜索：</b><br>";
    if (strpos($search, '%') !== false) echo '不支持搜索半角百分号。';
    else {
        if ($result = $mysqli->query("SELECT url,title,`fulltext` FROM rfwiki_pages WHERE `fulltext` LIKE '%$s%'")) {
            while($row = $result->fetch_assoc()) {
                if ($row['url'] === '') $row['title']='主页';
                ?>
                <a href="<?php echo SITE.'/'.htmlspecialchars($row['url']); ?>"><?php echo $row['title']; ?></a><br>
                <?php
            }
            if (!$result->num_rows) echo '找不到相关页面。';
            $result->free();
        }
    }
    echo '</p>';
    echo "<p><b>模糊搜索：</b><br>";
    if (mb_strlen($search,'UTF-8')<2) echo '搜索关键字至少2个字。';
    else {
        if ($result = $mysqli->query("SELECT url,title,`fulltext` FROM rfwiki_pages WHERE MATCH (`fulltext`) AGAINST ('$s')")) {
            while($row = $result->fetch_assoc()) {
                if ($row['url'] === '') $row['title']='主页';
                ?>
                <a href="<?php echo SITE.'/'.htmlspecialchars($row['url']); ?>"><?php echo $row['title']; ?></a><br>
                <?php
            }
            if (!$result->num_rows) echo '找不到相关页面。';
            $result->free();
        }
    }
    echo '</p>';
}