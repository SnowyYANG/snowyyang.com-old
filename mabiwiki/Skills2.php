<?php
$h2 = '需要练的技能';
$nav = '技能属性表 | 读书等方式升级的技能 | <a href="Skills2">需要练的技能</a>';

require 'data/cooking.php';

function mainview() {
    global $recipe2; ?>
G20以前的技能修炼方法参考<a href="http://www.yydzh.com/read.php?tid=1849114">洛奇表关通关+全系技能修炼攻略（更新G20新技能+卡鸟方法） </a><br>
<br>
<b>链刃系技能</b><br>
AOE技能可以去影子世界的硫黄蜘蛛<br>
有暴击修炼的技能可以用诱惑演奏把怪拉到一起一次技能可以修复数次暴击修炼项目<br>
<br>
<b>料理</b><br>
8级以后，可以堆叠技能修练值倍率（200级2倍，修炼鉴定10工具2倍，农场或烹饪修炼训练所1.5倍）<br>
准备好足够的面粉，带上餐车（如果没有餐车，需要准备足够的水和篝火箱）<br>
需要做的料理：<br>
<?php
Detail($recipe2['炒洋葱']);
Detail($recipe2['香蒜意大利面'], 'open');
Detail($recipe2['南瓜酱']);
Detail($recipe2['南瓜派'], 'open');
Detail($recipe2['白色打糕']);
Detail($recipe2['佛卡夏面包'],'open');
Detail($recipe2['原味酸奶']);
Detail($recipe2['手打牛里脊火腿']);
?>
<?php }