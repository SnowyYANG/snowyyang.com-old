<?php

/* 
 * by Snowy YANG
 * for http://snowy.asia/
 */
$title = 'Snowy';

function view() {
?>
<div>
<span style="color:blue;font-weight:bold">Snowy</span> YANG<br>
若<span style="color:blue;font-weight:bold">雪</span><br>
<br>
出生于安徽省芜湖市<br>
不知名城市隐居中<br>
事业感情均已稳定 谢绝各类猎头<br>
人生梦想成为全能天才美少女<br>
实际天天吃吃睡睡<br>
<br>
<span onmouseenter="yin(this)" onmouseleave="yang(this)">八面玲珑百灵鸟 嘤嘤楚楚笼中傲<br>经风经雨生不毁 历霜历雪尽妖娆<br>机关算尽不误命 露财露色也平安<br>耐得春宵萧寒夜 平步青云又一朝</span>​<br>
<br>
E-mail: <b>snowyyang(a)outlook.com</b><br>
LinkedIn: <a target="_blank" href="https://www.linkedin.com/in/snowyyang/">Fei YANG</a><br>
GitHub: <a target="_blank" href="https://github.com/SnowyYANG">SnowyYANG</a><br>
豆瓣：<a target="_blank" href="https://www.douban.com/people/snowyyang/">Snowy</a><br>
Pixiv：<a target="_blank" href="https://www.pixiv.net/member.php?id=15972970">大正８年８月の東京ユリカ</a><br>
</div>
<script>
var yin = function(e) {
	e.innerHTML = '八面玲珑百灵鸟 嘤嘤楚楚笼中傲<br>经枫经雨生不悔 若霜若雪竞妖娆<br>机关算尽不误命 露才露色也平安<br>耐得春宵萧寒夜 平步青云又一朝​';
};
var yang = function(e) {
	e.innerHTML = '八面玲珑百灵鸟 嘤嘤楚楚笼中傲<br>经风经雨生不毁 历霜历雪尽妖娆<br>机关算尽不误命 露财露色也平安<br>耐得春宵萧寒夜 平步青云又一朝​';
};
</script>
<?php
}
