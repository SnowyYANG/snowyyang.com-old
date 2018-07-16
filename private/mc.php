<?php

/* 
 * by Snowy YANG
 * for http://snowy.asia/
 */

$title = '洛奇普染颜色大全';

if ($_REQUEST['s']) {
    $s = $mysqli->escape_string($_SERVER['QUERY_STRING']);
    $mysqli->query("INSERT mc_s(ip,s) VALUES('$ip','$s')");
	exit;
}

function view() {
?>
<style>
.mcblock {
    text-align:center;
    padding-top:0.5em;
    width:10em;
    height:2em;
    display:inline-block;
}
</style>
<h1>洛奇普通染色颜色代码大全</h1>
<p>by 冰之妖夜（国服全服 日常在玛丽服务器）</p>
<p style="color:#005000">广告：欢迎加入工程师的冬柏树群282157732 <b>洛奇攻略索引</b>计划预想中</p>
<p>欢迎使用洛奇普通染色颜色代码大全，这里可以搜索普染和金属普染能染出的精确颜色代码。<br>
下一版更新：推荐颜色。<span style="color:#ff0000">注意：可能不支持QQ浏览器</span>，建议使用最新版Firefox、Chrome。<br>
<br>
<div style="display:flex">
    <div><img id="dye" src="/mabicolor/cloth.png"></div>
    <div style="margin-left:1em">
        <form>
            <input id="r1" type="radio" name="c" value="cloth" checked/><label for="r1">全彩</label>
            <input id="r2" type="radio" name="c" value="cloth_bright" /><label for="r2">淡彩</label>
            <input id="r3" type="radio" name="c" value="leather" /><label for="r3">皮革</label>
            <input id="r4" type="radio" name="c" value="silk" /><label for="r4">丝绸</label>
            <input id="r5" type="radio" name="c" value="metal" /><label for="r5">金属</label>
            <input id="r6" type="radio" name="c" value="weapon" /><label for="r6">武器</label>
            <br>
			<span id="cps" style="position:relative">
				<input id="cp" type="color" style="position:absolute;left:0;opacity:0;width:0" onchange="this.form.s.value=this.value">
				<label for="cp" style="cursor:pointer;text-decoration:underline;color:#0000c0;font-size:80%;font-weight:bold;">点此选色</label>
			</span>
            <input name="s" style="width:21.3em" placeholder="#008000 R&lt;64 B&lt;64" required>
            <button>搜索</button>
        </form>
		<p>“#十六进制颜色代码”查找最相似颜色，如“#FFFF00”搜索近似的亮黄色；<br>
		“R/G/B大于小于等于号十进制数值”筛选颜色，符号半角不要有空格，如“G=0 B=0”搜索纯红色；<br>
		混合使用以上查找，用空格隔开，如“#008000 R&lt;64 B&lt;64”搜索中绿色。<br>
		<br>
		推荐工具：<a target="_blank" href="http://www.yydzh.com/read.php?tid=1402600">染色助手</a>，<a target="_blank" href="http://labo.erinn.biz/cs/index.php?action=changeFramework">纸娃娃模拟器</a>。</p>
    </div>
</div>
<div id="r"></div>
<script src="/mabicolor/cloth.js"></script>
<script src="/mabicolor/cloth_bright.js"></script>
<script src="/mabicolor/leather.js"></script>
<script src="/mabicolor/metal.js"></script>
<script src="/mabicolor/silk.js"></script>
<script src="/mabicolor/weapon.js"></script>
<script>
var cp = document.getElementById('cp');
if (cp.value !== '#000000') {
	document.getElementById('cps').style.display = 'none';
	document.forms[0].s.style.width = '25.3em';
}
var results;
var i;
var colors = 'cloth';
var search;

var radios = document.forms[0].c;
for(var i = 0; i < radios.length; ++i) {
    radios[i].onchange = function() {
		colors = this.value;
        document.getElementById('dye').src = '/mabicolor/'+colors+'.png';
    };
}
delete radios;

function colorBlock(r,g,b,str) {
    var fc = 0.2126*r + 0.7152*g + 0.0722*b>128 ? '#000000' : '#FFFFFF';
    return ['<div class="mcblock" style="background-color:rgb(',r,',',g,',',b,');color:',fc,'">',str,'</div>'].join('');
}

document.forms[0].onsubmit = function() {
    if (!(search = this.s.value)) return false;
    var xhr = new XMLHttpRequest();
    if (xhr) {
        xhr.open('GET','/mc?c='+encodeURIComponent(colors)+'&s='+encodeURIComponent(search));
        xhr.send();
    }
    var ss = search.split(' ');
    results = [];
	var _colors = window[colors];
    for (var ci in _colors) {
        var c = _colors[ci];
        var match = true;
        for (var si in ss) {
            var s = ss[si];
            if (s.match(/^[RGB][<>=]=?[+-0-9]+$/i)) {
                num = parseInt(s.substring(s[2]==='='?3:2));
                a = c[(s[0] === 'R' || s[0] === 'r')?0:(s[0] === 'G' || s[0] === 'g')?1:2];
                match &= (s[1] === '='|| s[2] === '=') ? a === num : s[1] === '<' ? a < num : a > num;
            }
		}
        if (match) {
			c[3] = ci;
			results.push(c);
		}
    }
    for (var si in ss) {
        var s = ss[si];
		var S;
        if (S = s.match(/^#?[0-9a-f]{6,8}/i)) {
			var S = parseInt(s[0] === '#'?S[0].substr(1):S[0],16);
            var R = (S >> 16) & 0xff;
            var G = (S >> 8) & 0xff;
            var B = S & 0xff;
            S = s;
            for (var ci in results) {
                var c = results[ci];
                c[3] = 2*Math.pow(c[0]-R,2)+4*Math.pow(c[1]-G,2)+3*Math.pow(c[2]-B,2);
            }
            results.sort(function(a,b) { return a[3]-b[3]; });
            break;
        }
    }
    var r = [];
    if (S) r.push(colorBlock(R,G,B,'目标颜色'));
    if (results.length) {
		i = 0;
        r.push(morecolor());
    }
	else r.push('<div>没有找到任何颜色</div>');
    document.getElementById('r').innerHTML = r.join('');
    return false;
};

function morecolor() {
    var xhr = new XMLHttpRequest();
    if (xhr) {
        xhr.open('GET','/mc?a=more&c='+encodeURIComponent(colors)+'&s='+encodeURIComponent(search));
        xhr.send();
    }
	var r = [];
    for (num = i; i<results.length && (i<num+100 || results[i][3] === results[i-1][3]); ++i)
        r.push(colorBlock(results[i][0],results[i][1],results[i][2],'#'+(0x1000000 | results[i][2] | (results[i][1] << 8) | (results[i][0] << 16)).toString(16).substr(1)));
    if (i < results.length) r.push('<div onclick="this.outerHTML = morecolor()" class="mcblock" style="background:#f0f0f0;color:#6699cc;cursor:pointer">更多颜色</div>');
    return r.join('');
}
</script>
<?php
}
