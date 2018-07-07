<?php

/* 
 * by Snowy YANG
 * for http://snowy.asia/
 */

$title = '雪鸟幻梦之笼';


function view() {
?>
<style>
p {
	line-height:1.5
}
</style>
<h1>雪鸟幻梦之笼</h1>
<?php
$text = <<<'TEXT'
<b>未完结时的前言</b>
定下雪鸟这个游戏 我开始写这篇小说 然后三次删掉了写好的几千字开始重写
现在的这个状态 我也不敢保证会不会有一天又全部砍掉重写 之前写的内容可以在GitHub翻到
只能说写一步是一步 也许写着写着真的写完了呢 等到真的写完了我就会开始做游戏啦

<b>目录</b>
0. 我知道这是梦
1. 对美好的生活视而不见
2. 最初在梦里听见的音色
3. 执着的雪 随意的风
4. 遥遥十年 近在咫尺
5. 混乱场
6. 凝想力
7. 风止雾浓之时
8. 雪鸟幻梦之笼

 
TEXT;
$timestamp = date('Y年n月j日H:i:s', filemtime(__FILE__));
echo "<p>（更新中...最后编辑于${timestamp}）<br><br>";
$lines = explode("\n",$text);
foreach($lines as $l) {
	echo $l;
	echo '<br>';
}
echo "<br>（未完待续...最后编辑于${timestamp}）</p>";
}
