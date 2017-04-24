<?php

/* 
 * by Snowy YANG
 * for http://snowy.asia/
 */
?>
<h1>洛奇普染颜色大全</h1>
<p>by 冰之妖夜（玛丽服务器）</p>
<p>请使用Firefox浏览器打开本网页，IE浏览器似乎不能正常使用。以后会修复这个问题，陆续增加网站留言功能，热门搜索色、常用色推荐功能。<br>
目前只有全彩，共13537种颜色（上一个版本13522没有统计被黑边遮住的部分），皮革、淡彩、浓彩的数据目前没有（因为我太懒了）。<br>
下载所有颜色列表：<a href="<?php echo SITE;?>mc.txt">mc.txt</a>，<a href="<?php echo SITE; ?>mc.xlsx">mc.xlsx</a>。</p>

<form id="f"><input name="s" style="width:80%" type="text" placeholder="#008000(100) R&lt;64 B&lt;64"><input type="submit" value="搜索"></form><br>
<div>“#十六进制颜色代码(数量)”查找指定数量的最相似颜色，注意请使用半角#()，如“#FFFF00(100)”搜索近似的100种亮黄色；<br>
“R/G/B大于小于等于号十进制数值”查找符合要求的颜色，注意字母大写符号半角单条语句不要有空格，如“G=0 B=0”搜索纯红色；<br>
混合使用以上查找，直接用空格隔开，如“#008000(100) R&lt;64 B&lt;64”搜索近似纯绿的100种中绿色。<br>
太多人不喜欢打“#”，现在可以省略这个符号了。颜色对比算法有限，有时搜出来的颜色怪怪的，不怕浏览器卡的话建议#XXXXXX(500)。<br>
推荐纸娃娃网址：<a href="http://labo.erinn.biz/cs/index.php?action=changeFramework">http://labo.erinn.biz/cs/index.php?action=changeFramework<a><br><br>
</div>
<div id="r"></div>
<script src="<?php echo SITE;?>mccolors.js"></script>
<script>
    function compare(a,b) {
        return a[4]-b[4];
    }
    
    function colorBlock(r,g,b,color, str) {
        var fc = 0.2126*r + 0.7152*g + 0.0722*b>128 ? '#000000' : '#FFFFFF';
        return '<div style="text-align:center;vertical-align: middle;padding-top:0.5em;width:10em;height:2em;display:inline-block;background:'+color+';color:'+fc+'">'+str+'</div>';
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

    document.getElementById('f').onsubmit = function() {
		if (!this.s.value) return false;
        var xhr = new XMLHttpRequest();
        if (xhr) {
            xhr.open('GET','<?php echo SITE;?>mc?s='+encodeURIComponent(this.s.value));
            xhr.send();
        }
        var ss = this.s.value.split(' ');
        var results = [];
        for (var c of colors) {
            var match = true;
            for (var s of ss)
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
        for (var s of ss) {
			if (s[0] !== '#' && s.substring(0,6).match(/^[0-9a-f]{6}/i)) s='#'+s;
            if (s[0] === '#') {
				if (s.length===7) s=s+'(100)';
                var R = parseInt("0x" + s.substring(1,3));
                var G = parseInt("0x" + s.substring(3,5));
                var B = parseInt("0x" + s.substring(5,7));
                var S = s.substring(0,7);
                var N = parseInt(s.substring(8,s.length-1));
                for (var c of colors) {
					c[4] = 2*Math.pow(c[0]-R,2)+4*Math.pow(c[1]-G,2)+3*Math.pow(c[2]-B,2);
					//c[4]=deltaE(rgb2lab(c),rgb2lab([R,G,B]));
				}
                results.sort(compare);
                break;
            }
        }
        var r = document.getElementById('r');
        r.innerHTML = '';
        if (S) r.innerHTML += colorBlock(R,G,B,S,'目标颜色');
		if (!N) N=100;
        if (results.length === 0) r.innerHTML += '<div>没有找到任何颜色</div>';
        else {
            for (var i=0;i<results.length;++i) {
                if (i>=N && results[i][4] !== results[N-1][4]) break;
                r.innerHTML += colorBlock(results[i][0],results[i][1],results[i][2],results[i][3],results[i][3]);
            }
        }
        return false;
    };
</script>