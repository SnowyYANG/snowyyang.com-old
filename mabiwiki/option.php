<?php require 'optiondata.php';

function cat($name, $list) {
    echo "<table><tr><th style=\"padding-right:1em;\">$name</th><th>接头</th><th>接尾</th></tr>";
    foreach($list as $w=>$v) echo "<tr><td>$w</td><td>$v[0]</td><td>$v[1]</td></tr>";
    echo '</table><br>';
}

function mainview() {
    $nlist = explode(' ',
    '野生 黎明 猎狮者 骷髅死尸 凶恶 吉尔迦斯 超新星 黑雾 冰渣 征服者 尊贵 光荣 矛盾的/诡论的 狙击 刻印/镌刻 艺人/皮埃萝 巨像/克罗修斯'.
    ' 征服者 填满 鳄鱼 激烈 精神性的 直观 不可思议的 白日梦 大合唱 节制 轻快 代号 华彩乐段 奏鸣曲 重演 歌剧 合唱 独唱家 伊卡鲁斯 灵感 磨刀'.
    ' 沸腾 持久 有义气 遗忘 反侵略 手艺 小丑剧 吃力 伪装 记号 觉醒 继承者 幻影 昏睡状态 漠然 天才 魔法锤子 农场 魔女'.
    ' 自动 蜂鸟 侯爵 圆脸猫头鹰 挂钩 自制 钥匙 学者 分解 三脚架 碎片 分配 小浣熊 瘦 不便 小 海的 不怀好心 阻碍 深海 断箭 亚克_理奇'.
    ' 珍贵 孤独 诱惑');
    $list = [];
    foreach($nlist as $n) $list[] = FindOption($n);
    $weapon = [
        '链刃'=>['骷髅死尸 野生','吉尔迦斯 凶恶'],
        '单手剑'=>['黎明 猎狮者','超新星 黑雾 冰渣'],
        '双手剑'=>['征服者','孤独(非凡剑)'],
        '远距'=>['珍贵(非凡弩) 尊贵 光荣','矛盾/诡论 狙击'],
        '操纵杆'=>['刻印/镌刻','艺人/皮埃萝 巨像/克罗修斯'],
        '手里剑'=>['征服者 骷髅死尸 野生 填满','吉尔迦斯 鳄鱼 激烈'],
        '双枪'=>['征服者 骷髅死尸 野生','诱惑(非凡L2) 吉尔迦斯 凶恶 鳄鱼'],
        '单手魔杖'=>['精神性的','直观'],
        '双手魔杖'=>['不可思议的','白日梦'],
        '铳炮'=>['',''],
    ];
    $music = [
        '琴'=>['大合唱 轻快 节制','代号'],
        '首饰'=>['渐慢(蛋出首饰)','华彩乐段'],
        '衣'=>['奏鸣曲 重演','歌剧'],
        '头'=>['','合唱'],
        '手/脚'=>['独唱',''],
        '翅膀'=>['伊卡鲁斯',''],
    ];
    $damage=[
        '首饰'=>['灵感 磨刀','凶恶(蛋出首饰) 沸腾'],
        '衣'=>['持久','有义气'],
        '头'=>['磨刀 遗忘','反侵略 手艺'],
        '手'=>['小丑剧 独唱','吃力 伪装'],
        '脚'=>['小丑剧 独唱','记号 伪装'],
    ];
    $mdamage=[
        '首饰'=>['觉醒','继承者'],
        '衣'=>['幻影',''],
        '头'=>['昏睡状态 漠然','天才'],
        '手'=>['魔法锤子','农场'],
        '脚'=>['昏睡状态','魔女'],
    ];
    $speed=[
        '双枪'=>['','自动'],
        '头'=>['','蜂鸟'],
        '手'=>['侯爵','圆脸猫头鹰'],
        '脚'=>['','挂钩 自制'],
    ];
    $diss=[
        '衣'=>['钥匙','学者'],
        '头'=>['','分解'],
        '手'=>['三脚架','碎片'],
        '脚'=>['三脚架 分配','碎片'],
    ];
    $week=[
        '衣'=>['','小浣熊(蛋出衣服)'],
        '首饰'=>['','小浣熊(蛋出首饰)'],
        '头'=>['瘦','小浣熊(蛋出大蝴蝶结) 不便'],
        '手'=>['小','海'],
        '脚'=>['不怀好心','阻碍'],
        '盾牌'=>['','深海'],
        '远距'=>['','断箭'],
        '武器'=>['亚克理奇 半旧(蛋出单手斧)','']
    ];
?>
    <h2>魔法释放 <nav>常用释放 | <a href="AllOption">所有释放</a></nav></h2>
    <p>本页面列出了常用释放，包括释放详情、出处、垫卷。
    <?php
    cat('武器', $weapon);
    cat('通伤', $damage);
    cat('魔攻', $mdamage);
    cat('攻速', $speed);
    cat('演奏', $music);
    cat('分解', $diss);
    cat('减战', $week);
    ?>
    </p>
    <hr>
    <h3>释放卷详情、出处、垫卷</h3>
    <?php ListOption($list); ?>
<?php
}
?>
