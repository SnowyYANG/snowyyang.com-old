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
    <body>
        <div style="display:flex;min-height:100vh;">
            <div id="toc">
                <h1>洛奇wiki</h1>
                <ul>
                <li><a href="start" title="">入坑建议</a></li>
                <li>养号<ul>
                <li><a href="story" title="">做主线</a></li>
                <li><a href="Farming" title="">升等级</a></li>
                <li><a href="Fishing" title="">练技能</a></li>
                <li><a href="Taming" title="">刷评论</a></li>
                </ul></li>
                <li>整装备<ul>
                <li><a href="Equip" title="">常用装备</a></li>
                <li><a href="Upgrade" title="">武器改造</a></li>
                <li><a href="option" title="">魔法释放</a></li>
                <li><a href="Reforge" title="">鉴定/回音</a></li>
                <li><a href="Totem">图腾/徽章</a></li>
                </ul></li>
                <li>肝副本<ul>
                <li><a href="Collectible" title="野外与地下城的怪物和收集品">佑拉地下</a></li>
                <li><a href="Collectible" title="野外与地下城的怪物和收集品">影子世界</a></li>
                <li><a href="Upgrade" title="武器、法杖、防具的强化">训练所</a></li>
                <li><a href="Upgrade" title="武器、法杖、防具的强化">遗迹</a></li>
                <li><a href="Recipes/Farming" title="农具配方">净化</a></li>
                </ul></li>
                <li>做生产<ul>
                <li><a href="Collectible" title="野外与地下城的怪物和收集品">设计图纸</a></li>
                <li><a href="Collectible" title="野外与地下城的怪物和收集品">衣服样本</a></li>
                <li><a href="Upgrade" title="武器、法杖、防具的强化">工学</a></li>
                <li><a href="Upgrade" title="武器、法杖、防具的强化">工艺</a></li>
                <li><a href="Recipes/Farming" title="农具配方">药剂制作</a></li>
                <li><a href="Recipes/Medicine" title="药学配方">手工艺</a></li>
                <li><a href="Recipes/Cooking" title="料理配方">料理配方</a></li>
                </ul></li>
                <li>休闲娱乐<ul>
                <li><a href="Monsters" title="怪掉物品一览">钓鱼</a></li>
                <li><a href="MapHidden">跑商</a></li>
                <li><a href="MapHidden">时装大赛</a></li>
                <li><a href="MapHidden">骑士冲锋</a></li>
                </ul></li>
                </ul>
                <ul>
                <!--li><a href="/QandA" title="留言与提问区">留言板</a></li-->
                <li><a href="/Logs" title="网站内容更新日志">更新日志</a></li>
                <li><a href="/References" title="友情链接与参考资料">友情链接</a></li>
                </ul>
            </div>
            <div style="flex-grow:8">
                <main style="height:calc(100% - 1rem);margin-left:1rem"><?php
                    switch ($_GET['q']) {
                        case '/option':
                        case '/story':
                            require substr($_GET['q'],1).'.php';
                            break;
                        default:
                            require 'homepage.php';
                            break;
                    };
                    mainview();
                ?></main>
                <footer>洛奇wiki的全部文字在<a target="_blank" href="https://creativecommons.org/licenses/by-sa/3.0/deed.zh">知识共享 署名-相同方式共享 3.0</a>协议之条款下提供。</footer>
            </div>
        </div>
    </body>
</html>