<?php

/* 
 * by Snowy YANG
 * for http://snowy.asia/
 */
$title = 'Snowy';

function view() {
?>
<p style="float:left">
<span style="color:blue;font-weight:bold">Snowy</span> YANG<br>
<span style="color:blue;font-weight:bold">雪</span>桠<br>
<br>
出生于安徽省芜湖市<br>
安徽广东两地居住<br>
事业感情均已稳定 谢绝各类猎头<br>
人生梦想成为全能天才美少女<br>
实际天天吃吃睡睡<br>
<br>
<span onmouseenter="yin(this)" onmouseleave="yang(this)">八面玲珑百灵鸟 嘤嘤楚楚笼中傲<br>经风经雨生不毁 历霜历雪尽妖娆<br>机关算尽不误命 露财露色也平安<br>耐得春宵萧寒夜 平步青云又一朝</span>​<br>
<br>
E-mail: <b>snowyyang@outlook.com</b><br>
LinkedIn: <a target="_blank" href="https://www.linkedin.com/in/snowyyang/">Fei YANG</a><br>
Steam开发者: <a target="_blank" href="https://store.steampowered.com/developer/Snowy">Snowy</a><br>
GitHub: <a target="_blank" href="https://github.com/SnowyYANG">SnowyYANG</a><br>
豆瓣阅读：<a target="_blank" href="https://read.douban.com/author/63749418/">Snowy</a><br>
Pixiv：<a target="_blank" href="https://www.pixiv.net/users/15972970">大正８年８月の東京ユリカ</a><br>
Twitter: Snowy <a target="_blank" href="https://twitter.com/Aug1919">@Aug1919</a><br>
微博：<a target="_blank" href="https://weibo.com/August1919">@Snowy雪桠</a>
</p>
<img style="float:left;width:32rem;max-width:100%" src="/snowy.jpg">
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
