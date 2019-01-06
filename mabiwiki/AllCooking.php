<?php
$h2 = '料理配方';
$nav = '<a href="Cooking">常用料理</a> | 所有料理';
$cf = true;

require 'data/cooking.php';

function mainview() {
    echo '<div>可以使用Ctrl+F在本页查找，点击左侧的小三角展开材料配方（IE和Edge会自动展开）。</div><br>';
    global $recipe;
    foreach($recipe as $r) Detail($r);
}