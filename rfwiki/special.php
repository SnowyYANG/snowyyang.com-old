<?php

/* 
 * by Snowy YANG
 * for 符文工房中文百科
 */

function specialtitle() {
    global $url;
    return $url === 'QandA' ? '留言板' : $url === 'Logs' ? '更新日志' : '搜索';
}

function specialcontent() {
    global $url;
    if ($url === 'QandA') qanda();
    else if ($url === 'Logs') logs();
    else if ($search) search();
}

function qanda() {
    ?>
    <h2>留言板</h2>
    <p>如果对游戏或网站内容有任何问题，可以在这里留言，也欢迎留下个人建议。</p>    
    <form method="POST" style="text-align:right; padding-right:1em">
        <input name="question" style="width:100%" type="text" placeholder="输入问题或留言...可以匿名或在末尾 - 附上姓名"><br>
        <span style="font-size:80%">输入我不是在发广告--&gt;</span><input name="phrase" text="text">
        <input value="提交" type="submit">
    </form>
    <?php
    echo '<p>';
    global $mysqli;
    if ($result = $mysqli->query('SELECT * FROM rfwiki_qanda')) {
        while ($row = $result->fetch_assoc()) {
            $question = htmlspecialchars($row['question']);
            if ($row['answer'] === null) echo "言：$question <span class=\"timestamp\">($row[qtime])</span><br>";
            else {
                echo "问：$question <span class=\"timestamp\">($row[qtime])</span><br>";
                echo "答：$row[answer] <span class=\"timestamp\">($row[atime])</span><br>";
            }
            echo '<br>';
        }
        $result->close();
    }
    else echo '无法加载已有的问题或留言。';
    $mysqli->close();
    echo '</p>';
}

function logs() {
    echo '<h2>更新日志</h2><p>';
    global $mysqli;
    if ($result = $mysqli->query('SELECT * FROM rfwiki_logs ORDER BY time DESC LIMIT 100')) {
        while ($row = $result->fetch_assoc()) {
            echo "$row[time] $row[memo]<br>";
        }
        $result->close();
    }
    else echo '无法加载更新日志。';
    $mysqli->close();
    echo '</p>';
}

function search() {
    if ($result = $mysqli->query("SELECT * FROM rfwiki_pages WHERE MATCH (fulltext) AGAINST ('$search')")) {
        
    }
}