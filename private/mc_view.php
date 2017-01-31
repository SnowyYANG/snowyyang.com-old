<?php

/* 
 * by Snowy YANG
 * for http://snowy.asia/
 */
?>
<h1>洛奇普染颜色大全</h1>
<p>by 冰之妖夜（玛丽服务器）</p>
<p>请使用Firefox浏览器打开本网页，IE浏览器似乎不能正常使用。以后会修复这个问题，陆续增加网站留言功能，热门搜索色、常用色推荐功能。<br>
目前只有全彩，共13522种颜色，皮革、淡彩、浓彩的数据没有（因为我没有相关的衣服）。下载所有颜色列表：<a href="<?php echo SITE;?>mc.txt">mc.txt</a>，<a href="<?php echo SITE; ?>mc.xlsx">mc.xlsx</a>。</p>

<form id="f"><input name="s" style="width:80%" type="text"><input type="submit" value="搜索"></form><br>
<div>“#十六进制颜色代码(数量)”查找指定数量的最相似颜色，注意请使用半角#()，如“#FFFF00(100)”搜索近似的100种亮黄色；<br>
“R/G/B大于小于等于号十进制数值”查找符合要求的颜色，注意字母大写符号半角单条语句不要有空格，如“G=0 B=0”搜索纯红色；<br>
混合使用以上查找，直接用空格隔开，如“#008000(100) R&lt;64 B&lt;64”搜索近似纯绿的100种中绿色。<br>
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
    
    document.getElementById('f').onsubmit = function() {
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
            if (s[0] === '#' && s.length > 7) {
                var R = parseInt("0x" + s.substring(1,3));
                var G = parseInt("0x" + s.substring(3,5));
                var B = parseInt("0x" + s.substring(5,7));
                var S = s.substring(0,7);
                var N = parseInt(s.substring(8,s.length-1));
                for (var c of colors) c[4] = 2*Math.pow(c[0]-R,2)+4*Math.pow(c[1]-G,2)+3*Math.pow(c[2]-B,2);
                results.sort(compare);
                break;
            }
        }
        var r = document.getElementById('r');
        r.innerHTML = '';
        if (S) r.innerHTML += colorBlock(R,G,B,S,'目标颜色');
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