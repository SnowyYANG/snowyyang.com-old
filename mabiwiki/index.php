<!DOCTYPE html>
<!--
by Snowy YANG
for http://snowy.asia/mabiwiki
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>洛奇wiki</title>
        <base href="/mabiwiki/">
        <link href="favicon.ico" rel="shortcut icon"/>
        <link href="main.css" type="text/css" rel="stylesheet"/>
    </head>
    <body style="background:#316745">
        <div style="display:flex;aligen-items:stretch;min-height:100vh;max-width:1024px;margin:auto;background:#ffffff">
            <nav id="toc" style="width:10em;min-width:10em;background:#e1eee8">
                <a href="" style="margin:0;color:#00552e"><h1 style="font-size:2rem">洛奇wiki</h1></a>
                <ul>
                    <li><a href="Start" title="">入坑建议</a></li>
                    <li>养号<ul>
                    <li><a href="Story" title="">做主线</a></li>
                    <li><a href="Lv" title="">升等级</a></li>
                    <li><a href="Skill" title="">练技能</a></li>
                    <li>做宗师</li>
                    <li><a href="Reputation" title="">刷评论</a></li>
                    </ul></li>
                    <li>整装备<ul>
                    <li><a href="Upgrade" title="">装备改造</a></li>
                    <li><a href="Option" title="">魔法释放</a></li>
                    <li><a href="Reforge" title="">鉴定/回音</a></li>
                    <li><a>尔格</a></li>
                    <li><a href="Totem">图腾/徽章</a></li>
                    </ul></li>
                    <li>肝副本<ul>
                    <li><a href="Phantom" title="野外与地下城的怪物和收集品">梦幻拉比</a></li>
                    <li><a href="Recipes/Farming" title="农具配方">净化</a></li>
                    <li>使徒</li>
                    <li><a href="Collectible" title="野外与地下城的怪物和收集品">困高</a></li>
                    <li><a href="Upgrade" title="武器、法杖、防具的强化">训练所</a></li>
                    <li><a href="Collectible" title="野外与地下城的怪物和收集品">影子</a></li>
                    <li><a href="Upgrade" title="武器、法杖、防具的强化">其他</a></li>
                    </ul></li>
                    <li>做生产<ul>
                    <li><a href="Collectible" title="">设计图纸</a></li>
                    <li><a href="Collectible" title="">衣服样本</a></li>
                    <li><a href="Upgrade" title="">工学</a></li>
                    <li><a href="Upgrade" title="">工艺</a></li>
                    <li><a href="Recipes/Farming" title="">药剂制作</a></li>
                    <li><a href="Recipes/Medicine" title="">手工艺</a></li>
                    <li><a href="Cooking" title="">料理</a></li>
                    </ul></li>
                    <li>休闲娱乐<ul>
                    <li><a href="Monsters" title="">时装</a></li>
                    <li><a href="Monsters" title="">农场</a></li>
                    <li><a href="Monsters" title="">钓鱼</a></li>
                    <li><a href="MapHidden">跑商</a></li>
                    <li><a href="MapHidden">时装大赛</a></li>
                    <li><a href="MapHidden">骑士冲锋</a></li>
                    </ul></li>
                    <li>其他<ul>
                    <li>我的骑士团</li>
                    <li><a href="Names">俗称术语表</a></li></ul></li>
                </ul>
                <ul>
                <!--li><a href="/QandA" title="留言与提问区">留言板</a></li-->
                <li><a href="/Logs" title="网站内容更新日志">更新日志</a></li>
                <li><a href="/References" title="友情链接与参考资料">友情链接</a></li>
                </ul>
            </nav>
            <div style="display:flex;flex-direction:column;flex-grow:8;padding-right:2rem">
                <main style="flex-grow:99;margin:0 1rem;word-break:break-all;width:100%;max-width:100%"><?php
                    if (($q = substr($_GET['q'],1)) && $q!=='index' && preg_match("/^[a-zA-Z]+$/",$q) && @include("$q.php")) ;
                    else require 'homepage.php';
                    echo "<h2>$h2 <nav>$nav</nav></h2>";
                    if ($unf) echo '<div class="notice">（这个页面尚未完工）</div>';
                    mainview();
                ?></main>
                <br>
                <footer style="margin-bottom:1em">洛奇wiki的全部文字在<a target="_blank" href="https://creativecommons.org/licenses/by-sa/3.0/deed.zh">知识共享 署名-相同方式共享 3.0</a>协议之条款下提供。</footer>
            </div>
        </div>
    </body>
</html>