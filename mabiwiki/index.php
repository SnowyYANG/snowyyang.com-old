<?php 
    if (($q = substr($_GET['q'],1)) && $q!=='index' && preg_match("/^[a-zA-Z0-9]+$/",$q) && @include("$q.php")) ;
    else require 'homepage.php';
?>
<!DOCTYPE html>
<!--
by Snowy YANG
for http://snowy.asia/mabiwiki
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $h2;?> - 洛奇wiki</title>
        <base href="/mabiwiki/">
        <link href="main.css" type="text/css" rel="stylesheet"/>
    </head>
    <body style="background:#316745">
        <div style="display:flex;aligen-items:stretch;min-height:100vh;max-width:1024px;margin:auto;background:#ffffff">
            <nav id="toc" style="width:10em;min-width:10em;background:#e1eee8">
                <a href="" style="margin:0;color:#00552e"><h1 style="font-size:2rem">洛奇wiki</h1></a>
                <ul>
                    <li>入坑建议</li>
                    <li>养号<ul>
                    <li><a href="Story" title="">主线</a></li>
                    <li><a href="Lv" title="">等级</a></li>
                    <li><a href="Skills1" title="">技能</a></li>
                    <li>宗师</li>
                    <li>头衔</li>
                    <li><a href="Reputation" title="">评论</a></li>
                    </ul></li>
                    <li>整装备<ul>
                    <li><a href="Upgrade" title="">装备改造</a></li>
                    <li><a href="Option" title="">魔法释放</a></li>
                    <li><a href="Reforge" title="">鉴定/回音</a></li>
                    <li>尔格</li>
                    <li>图腾/徽章</li>
                    </ul></li>
                    <li>肝副本<ul>
                    <li>梦幻拉比</li>
                    <li>净化</li>
                    <li>使徒</li>
                    <li>困高</li>
                    <li>训练所</li>
                    <li>影子</li>
                    <li>其他</li>
                    </ul></li>
                    <li>做生产<ul>
                    <li>设计图纸</li>
                    <li>衣服样本</li>
                    <li>工学</li>
                    <li>工艺</li>
                    <li>药剂制作</li>
                    <li>手工艺</li>
                    <li>合成</li>
                    <li>分解</li>
                    <li><a href="Cooking" title="">料理</a></li>
                    </ul></li>
                    <li>休闲娱乐<ul>
                    <li>时装</li>
                    <li><a href="Farm">农场</a></li>
                    <li>钓鱼</li>
                    <li>跑商</li>
                    <li>时装大赛</li>
                    <li>骑士冲锋</li>
                    </ul></li>
                    <li>其他<ul>
                    <li>我的骑士团</li>
                    <li>俗称术语表</li></ul></li>
                </ul>
                <ul>
                <li>留言板</li>
                <li>更新日志</li>
                <li>友情链接</li>
                </ul>
            </nav>
            <div style="display:flex;flex-direction:column;flex-grow:8;padding-right:2rem">
                <main style="flex-grow:99;margin:0 1rem;word-break:break-all;width:100%;max-width:100%"><?php
                    echo "<h2>$h2</h2>";
                    if ($nav) echo "<div>相关页面：<nav>$nav</nav></div><br>";
                    if ($unf) echo '<div class="notice">（这个页面尚未完工）</div>';
                    mainview();
                ?></main>
                <br>
                <footer style="margin-bottom:1em">洛奇wiki的全部文字在<a target="_blank" href="https://creativecommons.org/licenses/by-sa/3.0/deed.zh">知识共享 署名-相同方式共享 3.0</a>协议之条款下提供。</footer>
            </div>
        </div>
    </body>
</html>