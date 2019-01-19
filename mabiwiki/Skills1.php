<?php
$h2 = "读书等方式升级的技能";
$nav = '技能属性表 | 读书等方式升级的技能 | <a href="Skills2">需要练的技能</a>';

function mainview() {
$text = <<<'TXT'
部分昂贵的技能书或道具，可考虑使用饼干（技能修炼印章）代替。

打开秘密商店的方法：对话“私人交谈”“附近的消息”，送礼，不断循环，如送好感度药水，一般5个可以开启秘密商店（有时需要等待一段时间）。

<details open><summary><b>休息</b><br></summary>新手任务获得
F.敦治疗所兼职3次后对话关于技能
E.《休息指南》（村劳拉的秘密商店购买，劳拉喜欢面包）
D.普莱达一定好感度之后（普莱达喜欢礼品用戒指，敦伊文贩卖），对话得到关键字拉伯的项链，在村铁匠使用该关键字购买图纸制作链条项链（材料5铁块收尾1铁钉），完成后交给普莱达获得马纽斯特殊商品使用券，可在马纽斯处购买《精神上的休息价值》（另有休息3书和治愈书可同时购买）
C.《为了休息的时间》（探险任务素描黑尾猫鼬）
B.《永远的休息》（卡鲁森林普通遗迹）
A.体力值低于50%时与克拉营地艾菲对话关于技能，收集椰子和榛菇，获得《乐园与休息》，另斯卡哈洞穴鱼头怪武士/法师也掉落此书
9.休息姿势改变。与凯利达营地凯菲对话关于技能，收集温泉猴子的毛，赠送一般食物给温泉猴子有一定概率获得毛
8.《用案例了解健康生活的秘诀》（伊比低级魔族地下城最终宝箱）
7.与敦巴伦杂货店沃尔特对话关于技能领取任务，在克丽尔普通地下最终宝箱获得《森林中的恋人》（不可交易）带给蕾拉
6.与艾明马恰酒吧卢卡斯对话关于技能领取任务，需要准备100cm以上的拉诺产鲑鱼
5.休息可以恢复魔法。《特殊的休息方法 -上-》（埃文剧场，这本书不能挂拍卖）
4.梦之碎片（完成《克拉格发掘手册第8本》）
3.《特殊的休息方法 -下-》（用马纽斯的特殊商品券购买，具体方法同D级）
2.与班格，需要准备少量最高档布料、结实的线、打结绳、高档皮革、粗线团
1.休息可以缓解药水中毒</details>
<details open><summary><b>篝火</b><br></summary>获得：敦书店购买《篝火指南》
练习.准备5个木柴使用技能
F.《篝火备忘录》（敦书店）
E.《用工具无法替代的，篝火技能》（敦书店）
D.《篝火的好伴侣，帐篷工具》（敦书店）
C.拿着伐木用斧与克拉营地艾菲对话关于技能，砍10个木柴
B.与克拉营地埃丽克斯对话关于技能，传递5个魔法药草和圣水
A.与克拉营地埃丽克斯对话关于技能，传递3个木板
9.与克拉营地埃丽克斯对话，在艾菲的秘密商店购买质量好的木头，艾菲喜欢世界名诗选，建议使用好感度药水
8.与克拉营地埃丽克斯对话，在艾菲的秘密商店购买质量好的木板（15w）
7.与班格的艾琳对话关于技能，准备5种金属块各20个
6.与班格的艾琳对话关于技能，准备30个蜜蜡
5.可以燃烧迷你香，探险任务击败沙罗曼蛇奖励，永不熄灭的火花，火蛇在精灵村蚂蚁洞，宗师4人也有概率出现
4.熔岩燧石（周二凯利达营地贝利塔处贩卖）
3.可以燃烧高级香，神秘的树枝（赛高）
2.与班格的艾琳对话关于技能，制作最高级香
1.可以燃烧最高级香</details>
<details open><summary><b>治愈</b><br></summary>获得：在村子接受治疗，祝福才能教程
练习.使用技能，需要绷带
F.《为了更快速有效的治愈》（艾明马恰治疗所艾格尼丝秘密商店，艾格尼丝喜欢世界名诗选，展望台噶尔文出售）
E.《利用夹板治愈》（用马纽斯的特殊商品券购买，具体参考休息D级）
D.与克拉营地赫富琳对话关于技能，采集20个羊毛
C.与克拉营地赫富琳对话关于技能，准备大肚蜘蛛的门牙
B.与克拉营地赫富琳对话关于技能，治愈10次
A.与克拉营地赫富琳对话关于技能，收集30个硫磺
9.与克拉营地赫富琳对话关于技能，准备水豚的毛10个、火山蜥蜴的鳞10个、双足飞龙的爪子10个
8.地狱犬的头骨（玛斯高）
7.马纽斯的消毒药水（完成《克拉格发掘手册第13本》）
6.与村子迪莉斯对话关于技能，准备高档手工绷带20个，一束蓝色玫瑰（周三水城购买），青梅茶（烧 青梅汁（做果酱 青梅59% 糖41%）14% 水86%）5个，高档布料40个
5.增加绷带使用速度，便携式医疗工具（阿布内尔伊莲娜，30万杜卡特）
4.治愈碎片（回音副本）
3.《治疗与恢复的书》（深渊皮卡）
2.G3完成后，与敦伊文对话关于技能，制作守护戒指：娜儿送的戒指（描述文字要有“很满意简单的风格”）、圣水、再生粉末，制作守护之链：米斯里绳（班吉尔默出售图纸）、被遗忘的魔法师宝石，准备精灵之泪
1.一次可以治愈多个目标</details>
<details open><summary><b>料理</b><br></summary>因为交货章昂贵，料理大赛需要等周六，料理技能9级以前读书，9级以后做料理而不读书。
获得：敦食品店格莉纳斯对话关于技能，料理才能教程，格斗技能任务（直接F）
以下直接读书需要2倍技能修炼经验值（200级、修炼鉴定10工具或与农场、烹饪训练所搭配）
练习.《杰夫的料理讲座：烤篇》（敦书店，下同）
F.《杰夫的料理讲座：蒸篇》
E.《关于制作面团》
D.《煮：加热烹饪法的基础》
C.《关于制作面》（戈登秘密商店，下同，戈登喜欢礼品用戒指，敦伊文贩卖）
B.《杰夫的料理讲座：炸篇》
A.《杰夫的料理讲座：炒篇》
9.《制作意大利面》（料理大赛）
8级开始到2级需要交货单，书在王城料理师克鲁阿斯的秘密商店，克鲁阿斯喜欢葡萄酒（礼物），敦食品店出售
可以切换到<a href="Skills2">需要练的技能</a>看料理技能修炼升级方法，2倍以上修炼经验可以不读书，以下是需要读的书
8.《某个孝子的故事》（交货单1*10 2*15 3*20，埃文钓鱼也出）
7.《派的故事第1部:关于派》（交货单2*20 3*30）
6.《厨师长的料理讲座 : 蒸煮篇》（交货单1*30 2*35）
5.《厨师长的料理讲座 : 披萨篇》（交货单1*40 2*30）
4.《厨师长的料理讲座 : 发酵篇》（交货单1*40 3*30）
3.《水浴法 ： 烹饪的科学法》（交货单1*30 2*35 3*30）
2.《青年与海》（料理大赛）</details>
<details open><summary><b>制造红酒</b><br></summary>所有书籍敦有售，如果角色100级以上则F升E不需要等待，否则需要等待一天。</details>
<details open><summary><b>冥想</b><br></summary>获得：拥有初级元素师头衔的情况下与敦魔法学校斯图尔特对话关于技能
F.《冥想的境界》（敦魔法学校）
E.《有效的冥想法》（敦书店）
D.《我的诺贝思式冥想方式》（卡鲁森林普通遗迹）
C.《卡鲁森林的秘密》（探险任务素描人与花坛的柱子）
B.魔法值低于50%时与斯图尔特对话关于技能，需要准备三种大容量的自然力各5个，斯图尔特出售任务兑换大容量自然力，可以在凯欧岛拿特拉伊魔杖（或对应属性魔杖）右键采集三种光羽获得自然力
A.《库拉冥想法研究- 初级 -》（巴低，埃文钓鱼）
9.《库拉冥想法研究 - 中级 -》（巴高，斯卡哈钓鱼）</details>
<details open><summary><b>作曲</b><br></summary>获得：《作曲技能入门》（敦书店）
练习.使用技能
F.《提高作曲技能》（敦书店）
E.《跟着海琳练习作曲 (1)》（敦书店）
D.《什么是合奏?》（水城纳乐，无需秘密商店，下同）
C.《作曲之路》（水城纳乐）
B.《乐器的音域》（水城纳乐）
A.《为了成为伟大的作曲家而做准备》（水城纳乐）
9.《纯情鲁特琴》（卡鲁森林普通遗迹）
8.与克拉营地艾菲对话关于技能，准备黑白无翼鸟羽毛各10个，黑白无翼鸟在卡鲁森林西南边的小峡谷中
7.《制作休止符》（完成《克拉格发掘手册第11本》）
6.《乐器的音色》（完成《克拉格发掘手册第12本》）
5.《作曲的陷阱》（阿布内尔伊莲娜，15万杜卡特）
4.《一个作曲家的人生》（阿布内尔伊莲娜，25万杜卡特）
3.《不明作者之歌 -上-》（阿布内尔伊莲娜，50万杜卡特）
2.《不明作者之歌 -下-》（温泉猴子，送虾仁炒饭（炒 饭72% 虾28%））
</details>
<details open><summary><b>音乐知识</b><br></summary>获得.《音乐概论》（敦书店）
F.《爱琳音乐的历史(1)》（敦书店）
E.《爱琳音乐的历史 (2)》（敦书店）
D.《用我的气息编织的乐曲， 管乐器》（水城纳乐，无需秘密商店）
C.《爱琳音乐的历史(3)》（敦书店）
B.《爱琳音乐的历史(4)》（带着熊掉落的空宝箱和普莱达对话获得关键字，分别与水城的戈登、詹姆斯、代尔对话关键字，再与普莱达对话获得蕾拉的特别商品使用券）
A.技能任务完成获得关键字，用关键字与纳乐对话
9.与克拉营地的艾菲对话，准备土笛子，土笛子可以探险宝箱获得
8.《迈兹平原的巨大图案》（探险任务收集鬃毛食蚁兽的爪子5个，需要有服务才能让野怪长期掉落物品）
7.与精灵村或巨人村杂货店NPC对话关于技能，在伦迦沙漠南部海滩寻找口哨音石，准备不同的音瓶若干
6.《乐器的心脏，共鸣器》（巴高，卡普钓鱼，拍卖）
5.《双手创作的旋律，弦乐器》（完成《克拉格发掘手册第14本》，王城宴会）
4.与阿布内尔伊莲娜对话关于技能，在贸易所小鬼处制造耶兰斯克鲁交给伊莲娜
3.与塔拉爱莉妮朵对话关于技能，在骑士冲锋战胜阿代尔
2.与阿布内尔伊莲娜对话关于技能，完成宝石收藏，需要3cm以上各种宝石</details>
TXT;
echo nl2br($text);
}