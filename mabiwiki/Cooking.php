<?php
$h2 = '料理配方';
$nav = '<b>常用料理</b> | <a href="AllCooking">所有料理</a>';

require 'data/cooking.php';

function mainview() {
    global $recipe2;
    echo '<b>属性料理</b><br>';
    echo '刺身拼盘盖饭 大伤+2 魔攻+2 生命+35 魔法+25<br>';
    Detail($recipe2['刺身拼盘盖饭'], 'open');
    echo '开心点心套餐 大伤+2 保护+1 幸运+30 敏捷+25<br>';
    Detail($recipe2['开心点心套餐'], 'open');
    echo '鲁宾三明治 防御+3 保护+2 魔防+3 魔保+1<br>';
    Detail($recipe2['鲁宾三明治'], 'open');
    echo '酸梅 力量+40 敏捷+25 防御+1<br>';
    Detail($recipe2['酸梅'], 'open');
    echo '蓝莓酸奶 魔法+65 防御+2 敏捷+25<br>';
    Detail($recipe2['蓝莓酸奶'], 'open');
    echo '<br><b>任务料理</b><br>';
    Detail($recipe2['毒蘑菇炖汤']);
    Detail($recipe2['青梅茶']);
    Detail($recipe2['巧克力甜饼']);
    echo '<br><b>温泉猴子喜欢的料理</b><br>';
    Detail($recipe2['虾仁炒饭']);
    Detail($recipe2['蔬菜纤维']);
    echo '<br><b>尔格材料</b><br>';
    Detail($recipe2['炒蔬菜'],'open');
    Detail($recipe2['黄金鱼柳'],'open');
    Detail($recipe2['海鲜意大利细面条'],'open');
    Detail($recipe2['奶油焗龙虾'],'open');
    Detail($recipe2['花生奶油酱'],'open');
    Detail($recipe2['蛤蜊酱'],'open');
    Detail($recipe2['贝尔法斯特鳗鱼盖饭'],'open');
    Detail($recipe2['鲐鱼排'],'open');
    Detail($recipe2['南瓜炖排骨'],'open');
    Detail($recipe2['橙皮马末兰果酱'],'open');
}