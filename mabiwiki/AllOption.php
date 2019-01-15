<?php 

require 'data/option.php';

$h2 = '魔法释放';
$nav = '<a href="Option">常用释放</a> | <b>所有释放</b></nav>';
$unf = true;

function mainview() {
    global $option;
    echo '<div>可以使用Ctrl+F在本页查找，点击左侧的小三角展开详细资料（IE和Edge会自动展开）。</div><br>';
    ListOption($option);
}?>