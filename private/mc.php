<?php

/* 
 * by Snowy YANG
 * for http://snowy.asia/
 */

$title = '洛奇普染颜色大全';

$style = '
.mcblock {
    text-align:center;
    vertical-align: middle;
    padding-top:0.5em;
    width:10em;
    height:2em;
    display:inline-block;
}';

if ($_REQUEST['s']) {
    $s = $mysqli->escape_string($_SERVER['QUERY_STRING']);
    $mysqli->query("INSERT mc_s(ip,s) VALUES('$ip','$s')");
}

function view() {
?>
<h1>洛奇普通染色颜色代码大全</h1>
<p>by 冰之妖夜（国服全服 日常在玛丽服务器）</p>
<p>欢迎使用洛奇普通染色颜色代码大全，这里可以搜索普染和金属普染能染出的精确颜色代码。<br>
<span style="color:red">本页面最近几天正在更新中，内容可能不稳定。</span>下一版更新：推荐颜色、留言板。<br>请使用Firefox、Chrome浏览器打开本网页，IE浏览器目前不能正常使用。<br>
<br>
<table>
    <tr>
    <td><img id="dye" src="<?php echo SITE;?>mabicolor/cloth.png"></td>
    <td style="margin-left:1em">
        <form>
            <input type="radio" name="c" value="cloth" checked/>全彩
            <input type="radio" name="c" value="cloth_bright" />淡彩
            <input type="radio" name="c" value="leather" />皮革
            <input type="radio" name="c" value="silk" />丝绸
            <input type="radio" name="c" value="metal" />金属
            <input type="radio" name="c" value="weapon" />武器
            <br>
            <input name="s" style="width:25.3em" type="text" placeholder="#008000 R&lt;64 B&lt;64">
            <input type="submit" value="搜索">
        </form>
    <p>“#十六进制颜色代码”查找最相似颜色，如“#FFFF00”搜索近似的亮黄色；<br>
    “R/G/B大于小于等于号十进制数值”筛选颜色，字母大写符号半角不要有空格，如“G=0 B=0”搜索纯红色；<br>
    混合使用以上查找，用空格隔开，如“#008000 R&lt;64 B&lt;64”搜索中绿色。<br>
    颜色对比算法正在调整中。<br>
    <br>
    推荐染色助手：<a href="http://www.yydzh.com/read.php?tid=1402600">http://www.yydzh.com/read.php?tid=1402600</a><br>
    推荐纸娃娃模拟器：<a href="http://labo.erinn.biz/cs/index.php?action=changeFramework">http://labo.erinn.biz/cs/index.php?action=changeFramework</a><br></p>
    </td>
    </tr>
</table>
<div id="r"></div>
<script src="<?php echo SITE;?>mabicolor/cloth.js"></script>
<script src="<?php echo SITE;?>mabicolor/cloth_bright.js"></script>
<script src="<?php echo SITE;?>mabicolor/leather.js"></script>
<script src="<?php echo SITE;?>mabicolor/metal.js"></script>
<script src="<?php echo SITE;?>mabicolor/silk.js"></script>
<script src="<?php echo SITE;?>mabicolor/weapon.js"></script>
<script>
function compare(a,b) {
    return a[4]-b[4];
}

function RGB2HTML(red, green, blue) {
    var decColor =0x1000000 | blue | (green << 8) | (red << 16);
    return '#'+decColor.toString(16).substr(1);
}
function colorBlock(r,g,b,color,str) {
    var fc = 0.2126*r + 0.7152*g + 0.0722*b>128 ? '#000000' : '#FFFFFF';
    return '<div class="mcblock" style="background:'+color+';color:'+fc+'">'+str+'</div>';
}
    
function rgb2lab(rgb){
  var r = rgb[0] / 255,
      g = rgb[1] / 255,
      b = rgb[2] / 255,
      x, y, z;

  r = (r > 0.04045) ? Math.pow((r + 0.055) / 1.055, 2.4) : r / 12.92;
  g = (g > 0.04045) ? Math.pow((g + 0.055) / 1.055, 2.4) : g / 12.92;
  b = (b > 0.04045) ? Math.pow((b + 0.055) / 1.055, 2.4) : b / 12.92;

  x = (r * 0.4124 + g * 0.3576 + b * 0.1805) / 0.95047;
  y = (r * 0.2126 + g * 0.7152 + b * 0.0722) / 1.00000;
  z = (r * 0.0193 + g * 0.1192 + b * 0.9505) / 1.08883;

  x = (x > 0.008856) ? Math.pow(x, 1/3) : (7.787 * x) + 16/116;
  y = (y > 0.008856) ? Math.pow(y, 1/3) : (7.787 * y) + 16/116;
  z = (z > 0.008856) ? Math.pow(z, 1/3) : (7.787 * z) + 16/116;

  return [(116 * y) - 16, 500 * (x - y), 200 * (y - z)]
}

// calculate the perceptual distance between colors in CIELAB
// https://github.com/THEjoezack/ColorMine/blob/master/ColorMine/ColorSpaces/Comparisons/Cie94Comparison.cs

function deltaE(labA, labB){
    var deltaL = labA[0] - labB[0];
    var deltaA = labA[1] - labB[1];
    var deltaB = labA[2] - labB[2];
    var c1 = Math.sqrt(labA[1] * labA[1] + labA[2] * labA[2]);
    var c2 = Math.sqrt(labB[1] * labB[1] + labB[2] * labB[2]);
    var deltaC = c1 - c2;
    var deltaH = deltaA * deltaA + deltaB * deltaB - deltaC * deltaC;
    deltaH = deltaH < 0 ? 0 : Math.sqrt(deltaH);
    var sc = 1.0 + 0.045 * c1;
    var sh = 1.0 + 0.015 * c1;
    var deltaLKlsl = deltaL / (1.0);
    var deltaCkcsc = deltaC / (sc);
    var deltaHkhsh = deltaH / (sh);
    var i = deltaLKlsl * deltaLKlsl + deltaCkcsc * deltaCkcsc + deltaHkhsh * deltaHkhsh;
    return i < 0 ? 0 : Math.sqrt(i);
}

var radios = document.forms[0].c;
for(var i = 0; i < radios.length; ++i) {
    radios[i].onchange = function() {
        document.getElementById('dye').src = '<?php echo SITE;?>mabicolor/'+this.value+'.png';
    };
}

var results = [];
document.forms[0].onsubmit = function() {
    if (!this.s.value) return false;
    var xhr = new XMLHttpRequest();
    if (xhr) {
        xhr.open('GET','<?php echo SITE;?>mc?c='+encodeURIComponent(this.c.value)+'&s='+encodeURIComponent(this.s.value));
        xhr.send();
    }
    var ss = this.s.value.split(' ');
    results = [];
    var colors = window[this.c.value];
    for (var ci in colors) {
        var c = colors[ci];
        var match = true;
        for (var si in ss)
            var s = ss[si];
            if (s[0] === 'R' || s[0] === 'G' || s[0] === 'B') {
                num = parseInt(s.substring(2));
                if (s[0] === 'R') a = c[0];
                else if (s[0] === 'G') a = c[1];
                else a = c[2];
                match &= s[1] === '=' ? a === num : s[1] === '<' ? a < num : a > num;
            }
        if (match) {
            results.push(c);
        }
    }
    for (var si in ss) {
        var s = ss[si];
        if (s[0] !== '#' && s.substring(0,6).match(/^[0-9a-f]{6}/i)) s='#'+s;
        if (s[0] === '#') {
            var R = parseInt("0x" + s.substring(1,3));
            var G = parseInt("0x" + s.substring(3,5));
            var B = parseInt("0x" + s.substring(5,7));
            var S = s;
            for (var ci in results) {
                var c = results[ci];
                c[4] = 2*Math.pow(c[0]-R,2)+4*Math.pow(c[1]-G,2)+3*Math.pow(c[2]-B,2);
                //c[4]=deltaE(rgb2lab(c),rgb2lab([R,G,B]));
            }
            results.sort(compare);
            break;
        }
    }
    var r = [];
    if (S) r.push(colorBlock(R,G,B,S,'目标颜色'));
    if (results.length === 0) r.push('<div>没有找到任何颜色</div>');
    else {
        var i = 0;
        while (i < results.length) {
            if (i >= 100 && results[i][4] !== results[i-1][4]) break;
            var code = RGB2HTML(results[i][0],results[i][1],results[i][2]);
            r.push(colorBlock(results[i][0],results[i][1],results[i][2],code,code));
            ++i;
        }
        if (i < results.length) r.push('<div id="more" onclick="morecolor(' + i + ')" class="mcblock" style="background:#f0f0f0;color:#6699cc;cursor:pointer">更多颜色</div>');
        document.getElementById('r').innerHTML = r.join('');
    }
    return false;
};

function morecolor(num) {
    var more = document.getElementById('more');
    var r = [];
    for (var i = num; i < results.length; ++i) {
        if (i >= num + 100 && results[i][4] !== results[i-1][4]) break;
        var code = RGB2HTML(results[i][0],results[i][1],results[i][2]);
        r.push(colorBlock(results[i][0],results[i][1],results[i][2],code,code));
    }
    if (i < results.length) r.push('<div id="more" onclick="morecolor(' + i + ')" class="mcblock" style="background:#f0f0f0;color:#6699cc;cursor:pointer">更多颜色</div>');
    more.outerHTML = r.join('');
}
</script>
<?php
}
