<?php
$title=$url === 'QandA' ? '留言板' : ($url === 'Logs' ? '更新日志' : '搜索');

function specialcontent() {
    global $url,$search;
    if ($url === 'QandA') qanda();
    else if ($url === 'Logs') logs();
    else if ($search) search();
}

function utc2local($time) {
    $dt=new DateTime($time, new DateTimeZone('UTC'));
    $dt->setTimezone(new DateTimeZone(date_default_timezone_get()));
    return $dt->format('Y-m-d H:i:s');
}

function qanda() { ?>
    <h2>留言板（已关闭</h2>
    <p>为符合个人网站备案相关规定（无UGC），留言板已关闭。<br>
    网站相关事务（如勘误、建议等），可以发送email至<a href="mailto:snowyyang@outlook.com">snowyyang@outlook.com</a>。<br>
    游戏相关问题，推荐去<a href="https://tieba.baidu.com/f?kw=%E7%AC%A6%E6%96%87%E5%B7%A5%E6%88%BF">百度符文工房吧</a>或<a href="https://forum.gamer.com.tw/A.php?bsn=1405">巴哈姆特牧场物语系列哈拉版</a>和网友讨论。</p>    
    <form method="POST" style="display:none">
        <textarea name="question" style="width:100%" type="text" placeholder="输入问题或留言...可以匿名或在末尾 - 附上姓名"><?php echo htmlspecialchars($_POST['question']);?></textarea><br>
        <span style="font-size:80%">主人公的住处原本应该是谁的房间？填入答案（中文）--&gt;</span><input name="phrase" text="text" value="<?php if ($_POST['question']) echo '答案错误'; ?>">
        <input value="提交" type="submit">
    </form>
    <h3>历史留言</h3><?php
    echo '<div>';
    global $db;
    if ($result = $db->query('SELECT * FROM qa ORDER BY qtime DESC')) {
        while ($row = $result->fetchArray()) {
            $question = htmlspecialchars($row['question']);
            $qtime=utc2local($row['qtime']);
            if ($row['answer'] === null) echo "言：$question <span class=\"timestamp\">($qtime)</span><br>";
            else {
                $atime=utc2local($row['atime']);
                echo "问：$question <span class=\"timestamp\">($qtime)</span><br>";
                echo "答：$row[answer] <span class=\"timestamp\">($atime)</span><br>";
            }
            echo '<br>';
        }
    }
    else echo '无法加载已有的问题或留言。';
    echo '</div>';
}

function logs() {
    echo '<h2>更新日志</h2><p>';
    global $db;
    if ($result = $db->query('SELECT * FROM logs ORDER BY time DESC LIMIT 100')) {
        while ($row = $result->fetchArray()) {
            $time=utc2local($row['time']);
            echo "$time $row[memo]<br>";
        }
    }
    else echo '无法加载更新日志。';
    echo '</p>';
}

function search() {
    global $search,$db;
    echo '<h2>搜索结果 - '.htmlspecialchars($search).'</h2>';
    $s = SQLite3::escapeString($search);
    if ($result = $db->query("SELECT url,title,`fulltext` FROM pages WHERE `fulltext` LIKE '%$s%'")) {
        while($row = $result->fetchArray()) {
            $found=true;
            if ($row['url'] === '') $row['title']='主页'; ?>
            <a href="<?php echo SITE.'/'.htmlspecialchars($row['url']); ?>"><?php echo $row['title']; ?></a><br><?php
        }
        if (!$found) echo '找不到相关页面。';
    }
}