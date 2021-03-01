<?php

/* 
 * by Snowy YANG
 * for 符文工房中文百科
 */

function specialtitle() {
    global $url;
    return $url === 'QandA' ? '留言板' : ($url === 'Logs' ? '更新日志' : '搜索');
}

function specialcontent() {
    global $url,$search;
    if ($url === 'QandA') qanda();
    else if ($url === 'Logs') logs();
    else if ($search) search();
}

function qanda() {
    ?>
    <h2>留言板</h2>
    <p>如果对游戏或网站内容有任何问题，可以在这里留言，也可以发送email至snowyyang(a)outlook.com。</b></p>    
    <form method="POST" style="text-align:right; padding-right:1em">
        <textarea name="question" style="width:100%" type="text" placeholder="输入问题或留言...可以匿名或在末尾 - 附上姓名"><?php echo htmlspecialchars($_POST['question']);?></textarea><br>
        <span style="font-size:80%">主人公的住处原本应该是谁的房间？填入答案（中文）--&gt;</span><input name="phrase" text="text" value="<?php if ($_POST['question']) echo '答案错误'; ?>">
        <input value="提交" type="submit">
    </form><br>
    <?php
    echo '<div>';
    global $mysqli;
	$q = 'SELECT * FROM rfwiki_qanda ORDER BY qtime DESC';
	if (!($all=$_GET['all'])) $q.=' LIMIT 50';
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
	if (!$all) echo '<div style="text-align:center"><a href="'.$_SERVER['REQUEST_URI'].'?all=1">查看全部留言</a></div>';
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
    echo "<h2>搜索结果 - $search</h2>";
    $search = $mysqli->escape_string($search);
    if ($result = $mysqli->query("SELECT url,title,`fulltext` FROM rfwiki_pages WHERE MATCH (`fulltext`) AGAINST ('$search')")) {
    //if ($result = $mysqli->query("SELECT url,title,`fulltext` FROM rfwiki_pages WHERE `fulltext` LIKE '%$search%'")) {
        while($row = $result->fetch_assoc()) {
            ?>
    <div>
        <a href="<?php echo SITE.'/'.htmlspecialchars($row['url']); ?>"><?php echo $row['title']; ?></a>
        
    </div>
            <?php
        }
        $search = htmlspecialchars($search);
        if (!$result->num_rows) echo "<p>找不到包含{$search}的页面。</p>";
        $result->free();
    }
}