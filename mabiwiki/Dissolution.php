<?php 

$h2 = "分解";

function mainview() {
    $text = <<<'TEXT'
可分解物品 --> 分解产物（分解1时基础成功率）

打结绳 --> 粗线团 0-1, 细线团 0-1 (42%)
粗线团 --> 羊毛 0-5 (50%)
细线团 --> 蜘蛛丝 0-5 (50%)
最高档皮带 --> 最高档皮革 0-1 (45%)
高档皮带 --> 高档皮革 0-1 (50%)
普通皮带 --> 普通皮革 0-1 (52%)
廉价皮带 --> 廉价皮革 0-1 (53%)
结实的绳子 --> 粗线团 0-5 (42%)
结实的线 --> 细线团 0-5 (42%)
最高档布料 --> 粗线团 0-5 (50%)
高档布料 --> 粗线团 0-5 (45%)
最高档丝绸 --> 细线团 0-5 (50%)
高档丝绸 --> 细线团 0-5 (45%)
普通丝绸 --> 细线团 0-5 (41%)
廉价丝绸 --> 细线团 0-5 (33%)
米斯里块 --> 米斯里矿石, 米斯里矿石碎片 0-5 (48%)
金块 --> 金矿石, 金矿石碎片 0-5 (46%)
银块 --> 银矿石, 银矿石碎片 0-5 (50%)
铜块 --> 铜矿石, 铜矿石碎片 0-5 (53%)
铁块 --> 铁矿石, 铁矿石碎片 0-5 (55%)
铁板 --> 铁块 0-1 (51%)
铜板 --> 铜块 0-1 (46%)
银板 --> 银块 0-1 (42%)
金板 --> 金块 0-1 (39%)
米斯里板 --> 米斯里块 0-1 (37%)
治愈药水 30 点 --> 基础药水 0-1, 黄金药草=25 0-1, 血红药草=65 0-1, 魔法药草=55 0-1, 基础药草 0-1 (53%)
治愈药水 10 点 --> 基础药草 0-1, 黄金药草=35 0-1, 血红药草=70 0-1, 魔法药草=60 0-1 (51%)
生命魔法药水 50 点 --> 基础药水 0-1, 血红药草=65 0-1, 魔法药草=55 0-1, 基础药草 0-1 (53%)
生命魔法药水 30 点 --> 基础药草 0-1, 血红药草=75 0-1, 魔法药草=70 0-1 (51%)
生命药水 300 点 --> 水 0-1, 生命药草 0-1, 0-生命药水100点 0-1 (54%)
生命药水 100 点 --> 基础药水 0-1, 血红药草=65 0-1, 基础药草0-1 (53%)
生命药水 50 点 --> 基础药草 0-1, 血红药草=75 0-1 (52%)
魔法药水 300 点 --> 水 0-1, 魔法药草 0-1, 魔法药水100点 0-1 (54%)
魔法药水 100 点 --> 基础药水 0-1, 魔法药草=55 0-1, 基础药草 0-1 (53%)
魔法药水 50 点 --> 基础药草 0-1, 魔法药草=70 0-1 (52%)
体力药水 300 点 --> 水 0-1, 阳光药草 0-1, 体力药水100点 0-1 (54%)
体力药水 100 点 --> 基础药水 0-1, 阳光药草=60 0-1, 基础药草 0-1 (53%)
体力药水 50 点 --> 基础药草 0-1, 阳光药草=70 0-1 (52%)
毒药水 --> 水 0-1, 基础药草=25 0-1, 毒药草=35 0-1 (40%)
解毒药水 --> 水 0-1, 基础药草=25 0-1, 解毒草=60 0-1 (47%)
生命体力药水 50 点 --> 基础药水 0-1, 基础药草=25 0-1, 曼德拉草=60 0-1 (52%)
生命体力药水 30 点 --> 曼德拉草=60 0-1, 基础药草=25 0-1 (53%)
好感度药水 --> 黄金菇 0-1, 血红药草 0-1, 水 0-1 (47%)
烹饪药水 --> 松菇 0-1, 曼德拉草 0-1, 水 0-1 (48%)
手工箭 --> 木柴 0-5, 短弓用的箭捆 0-1 (54%)
高档手工箭 --> 木柴 0-5, 高档短弓用的箭捆 0-1 (54%)
最高档手工箭 --> 木柴 0-5, 最高档短弓用的箭捆 0-1 (53%)
鱼骨剑 --> 翻车鱼骨头 0-1 (40%)
木板 --> 木柴 0-5, 铁钉 0-5, 铁棒 0-2, 结实的绳子 0-2 (52%)
阿维卡盾牌 --> 木柴 0-3, 阿维卡影子 0-1 (54%)
最高档皮带专用纺织机 --> 木板 0-3, 铁钉 0-8, 结实的线 0-8 (43%)
高档皮带专用纺织机 --> 木板 0-3, 铁钉 0-4, 结实的线 0-4 (46%)
木鸟笼 --> 木板 0-3, 结实的线 0-3, 铁钉 0-5 (49%)
小桌子 --> 木板 0-3, 普通布料 0-3, 铁钉 0-5 (46%)
台灯 --> 木板 0-3, 普通布料 0-3 (49%)
布料专用织布机 --> 木板 0-2, 铁钉 0-6, 结实的线 0-6 (46%)
丝绸专用织布机 --> 木板 0-2, 铁钉 0-4, 结实的线 0-4 (43%)
魔法粉 --> 基础药草 0-1, 蓝色小珠子, 红色小珠子, 银色小珠子 0-1 (42%)
纸鹤 --> 纸 0-1 (51%)
手工绷带 --> 廉价布料 0-1 (54%)
高档手工绷带 --> 普通布料 0-1 (54%)
最高档手工绷带 --> 高档布料 0-1 (48%)
弩炮用手工制弹药 --> 木柴 0-6, 弩箭捆 0-1 (54%)
手工弩箭 --> 木柴 0-4, 弩箭捆 0-1 (54%)
弩炮用高档手工制弹药 --> 木柴 0-6, 高档弩箭捆 0-1 (54%)
高档手工弩箭 --> 木柴 0-4, 高档弩箭捆 0-1 (54%)
弩炮用最高档手工制弹药 --> 木柴 0-6, 最高档弩箭捆 0-1 (51%)
最高档手工弩箭 --> 木柴 0-4, 最高档弩箭捆 0-1 (51%)
钓物品 W22 --> 铁棒 0-1, 结实的线 0-1, 魔法金线 0-1, 魔法银线 0-1 (50%)
物品幻想 T46 --> 铁板 0-2, 木板 0-2, 铁钉 0-2, 食物垃圾 0-5 (48%)
科尔医生正装 --> 普通布料 0-1, 廉价布料 0-1, 廉价皮带 0-1, 最高档收尾线 0-1 (49%)
魔法师帽子 --> 普通皮革 0-1, 廉价收尾线 0-1 (53%)
皮头巾 --> 廉价布料 0-1, 普通皮革 0-1, 普通收尾线 0-1 (52%)
科尔忍者服(男款) --> 普通布料 0-2, 普通丝绸 0-2, 粗线团 0-6, 廉价收尾线 0-1 (50%)
科尔盗贼服(男款) --> 最高档布料 0-5, 最高档丝绸 0-5, 最高档皮带 0-5, 最高档收尾线 0-1, 打结绳 0-1 (35%)
普通丝绸纺织手套 --> 普通布料 0-1, 细线团 0-1 (47%)
专业丝绸纺织手套 --> 高档布料 0-2, 细线团 0-1 (40%)
爱拉迷你裙 --> 最高档皮革 0-5, 高档丝绸 0-5, 最高档皮带 0-5, 最高档收尾线 0-2, 打结绳 0-1 (35%)
无光皮外套 --> 最高档皮革 0-5, 普通丝绸 0-2, 廉价皮带 0-7, 最高档收尾线 0-1, 打结绳 0-1 (46%)
爱拉背心短裙 --> 高档布料 0-6, 廉价丝绸 0-3, 最高档皮带 0-3, 普通收尾线 0-2 (46%)
路易斯高级男装 --> 最高档布料 0-3, 普通丝绸 0-3, 最高档皮带 0-6, 高档收尾线 0-1, 打结绳 0-1 (41%)
羽毛法师帽 --> 高档布料 0-3, 廉价丝绸 0-3, 最高档皮革 0-3, 最高档收尾线 0-1, 高档皮带 0-2 (43%)
托克短舌帽 --> 普通布料 0-2, 粗线团 0-2, 廉价丝绸 0-2, 高档收尾线 0-1 (50%)
神秘长袍 --> 普通布料 0-2, 普通丝绸 0-2, 粗线团 0-2, 高档收尾线 0-1 (52%)
修女服 --> 普通布料 0-2, 普通丝绸 0-2, 高档收尾线 0-1 (49%)
蒙戈高级长袍(男) --> 普通布料 0-4, 普通丝绸 0-2, 高档收尾线 0-1 (49%)
可可迷你水手服 --> 高档丝绸 0-1, 高档皮带 0-2, 普通收尾线 0-1, 黄色儿童药水 0-1 (47%)
科尔蓓蕾帽 --> 最高档丝绸 0-3, 高档皮革 0-1, 打结绳 0-5, 最高档收尾线 0-1 (44%)
可可熊猫长袍 --> 最高档丝绸 0-5, 高档丝绸 0-2, 高档皮带 0-7, 最高档收尾线 0-1, 绿色儿童药水 0-1 (44%)
萨丽娜性感风格 --> 最高档布料 0-6, 最高档丝绸 0-6, 打结绳 0-9, 最高档收尾线 0-1, 红色药水 0-1, 魔法金线 0-1, 水雾丝绸 0-1 (41%)
比安卡内衬裙子 --> 最高档丝绸 0-3, 高档皮革 0-3, 最高档皮带 0-1, 最高档收尾线 0-1, 黑色青春药水 0-1, 魔法银线 0-1 (47%)
萨丽娜连衣裙 --> 最高档布料 0-5, 最高档丝绸 0-2, 最高档皮革 0-2, 最高档收尾线 0-1, 红色药水 0-1, 魔法金线 0-1, 水雾丝绸 0-1 (47%)
男性用剑士学校校服长款 --> 最高档布料 0-8, 最高档丝绸 0-8, 最高档皮革 0-20, 最高档收尾线 0-1, 红色药水 0-1, 魔法金线 0-1, 水雾丝绸 0-1 (38%)
女性用剑士学校校服短款 --> 高档布料 0-25, 高档丝绸 0-25, 最高档皮带 0-25, 最高档收尾线 0-1, 黑色青春药水 0-1, 魔法银线 0-1, 水雾丝绸 0-1 (36%)
别致衣服 --> 最高档布料 0-15, 最高档丝绸 0-15, 最高档皮革 0-25, 最高档收尾线 0-1, 水雾丝绸 0-1 (31%)
高级皮革盔甲 --> 最高档布料 0-10, 最高档丝绸 0-15, 最高档皮革 0-20, 最高档收尾线 0-1, 铁板 0-4 (31%)
中级皮革盔甲 --> 最高档布料 0-7, 高档丝绸 0-4, 高档皮革 0-7, 最高档收尾线 0-1 (38%)
普通皮革盔甲 --> 高档布料 0-6, 高档丝绸 0-6, 普通皮革 0-10, 高档收尾线 0-1 (44%)
鱼骑士盔甲（男性用） --> 普通布料 0-10, 普通丝绸 0-8, 巨螃蟹壳 0-5, 最高档收尾线0-1, 飞鱼鳍 0-1 (36%)
鱼骑士盔甲（女性用） --> 普通布料 0-9, 普通丝绸 0-12, 巨螃蟹壳 0-9, 最高档收尾线0-1, 飞鱼鳍 0-1 (36%)
旗鱼长袍 --> 普通布料 0-4, 高档皮革 0-4, 飞鱼鳍 0-2, 最高档收尾线 0-1, 旗鱼头 0-1 (38%)
马术装 --> 高档丝绸 0-10, 结实的绳子 0-5, 结实的线0-5, 高档收尾线 0-1, 打结绳 0-3 (43%)
泰乐钻石红靴子 --> 高档丝绸 0-11, 高档皮革 0-11, 结实的线 0-11, 高档收尾线 0-1, 打结绳 0-3 (38%)
高肩盔甲 --> 普通布料 0-3, 普通丝绸 0-3, 结实的绳子 0-3, 铁板 0-2, 普通收尾线 0-1, 打结绳 0-3 (44%)
焅伊格子布衣服 --> 普通布料 0-2, 普通丝绸 0-1, 普通收尾线 0-1 (47%)
维托克鲁斯盔甲 --> 高档布料 0-5, 铁板 0-10, 高档皮带 0-7, 高档收尾线 0-1 (40%)
贝克维奇礼服 --> 最高档布料 0-15, 最高档丝绸 0-20, 结实的线 0-15, 高档收尾线 0-2 (35%)
高级巫师外衣 --> 最高档布料 0-7, 最高档丝绸 0-7, 高档收尾线 0-2 (41%)
高级巫师靴 --> 普通布料 0-5, 高档丝绸 0-3, 普通皮革 0-3, 高档收尾线 0-1 (46%)
骷髅金属头盔 --> 铁块 0-18, 普通皮带 0-3, 普通丝绸 0-1, 普通布料 0-1 (47%)
配龙金属头盔 --> 铁块 0-23, 普通皮带 0-3, 高档布料 0-1, 廉价丝绸 0-1 (46%)
角斗士金属头盔 --> 铁块 0-26, 普通皮带 0-3, 高档皮带 0-1 (46%)
鹰嘴金属头盔 --> 铁块 0-20, 廉价皮带 0-4, 粗线团 0-1 (49%)
护胫靴 --> 铁块 0-16, 普通皮带 0-3, 普通布料 0-1 (47%)
平衡盔甲 --> 铁块 0-16, 高档皮带 0-12, 普通布料 0-1, 魔族的纹章 0-1 (46%)
金属手套 --> 铁块 0-16, 高档皮革 0-1, 粗线团 0-1 (46%)
坚固的锁子甲 --> 铁块 0-20, 高档皮带 0-12, 普通丝绸 0-1, 赛连猫面具 0-1 (44%)
银光金属鞋 --> 铁块 0-35, 高档皮带 0-15, 高档丝绸 0-1 (44%)
金属板甲 --> 铁块 0-16, 高档皮带 0-12, 打结绳 0-8, 高档布料 0-1, 赛连蝙蝠面具 0-1 (43%)
复合型燕型盾牌 --> 铁块 0-21, 高档皮带 0-10, 木柴 0-5, 打结绳 0-1 (43%)
巴伦斯亚绚丽十字铠（男性用） --> 铁块 0-45, 最高档皮带 0-13, 打结绳 0-13, 高档布料 0-3, 赛连翅膀面具 0-1 (38%)
巴伦斯亚绚丽十字铠（女性用） --> 铁块 0-36, 最高档皮带 0-18, 打结绳 0-18, 高档丝绸 0-3, 赛连羽翼面具 0-1 (37%)
轻锁子甲 --> 铁块 0-10, 普通皮带 0-10, 普通布料 0-1 (46%)
巴伦斯亚绚丽十字手套 --> 铁块 0-15, 高档皮带 0-11, 普通布料 0-1, 高档丝绸 0-1 (40%)
巴伦斯亚绚丽十字长靴 --> 铁块 0-20, 高档皮带 0-12, 高档布料 0-1, 高档丝绸 0-1 (38%)
金块用炉 --> 城建筑用石材 0-4, 铁棒 0-4, 米斯里棒 0-4 (41%)
银块用炉 --> 城建筑用石材 0-3, 铁棒 0-2, 米斯里棒 0-2 (46%)
铜块用炉 --> 城建筑用石材 0-2, 铁棒 0-1, 米斯里棒 0-1 (50%)
最高级 铁砧 --> 城建筑用石材 0-5, 铁板 0-7, 米斯里板 0-7 (38%)
高级铁砧 --> 城建筑用石材 0-4, 铁板 0-3, 米斯里板 0-3 (44%)
龙盾 --> 铁块 0-6, 米斯里块 0-6, 沙漠龙的鳞片 0-2, 结实的绳子 0-3, 沙漠龙的眼睛 0-1 (38%)
维托克鲁斯护胫 --> 铁块 0-3, 铜块 0-6, 高档皮革 0-2, 打结绳 0-5 (47%)
扇型盾 --> 铁板 0-6, 米斯里板 0-6, 高档皮革 0-2, 打结绳 0-5 (40%)
古代黄金结晶 --> 神圣的魔法粉 0-1 (12%)
古代魔力结晶 --> 神圣的魔法粉 0-1 (12%)
被净化的金属碎片 --> 神圣的魔法粉 0-2 (20%)
闪烁的金属碎片 --> 神圣的魔法粉 0-2 (20%)
勇气印章 --> 神圣的魔法粉 0-3 (25%)
胜利印章 --> 神圣的魔法粉 0-3 (25%)
破碎守护者的盔甲 --> 神圣的魔法粉 0-4 (36%)
破碎守护者的手套 --> 神圣的魔法粉 0-4 (36%)
破碎守护者之靴 --> 神圣的魔法粉 0-4 (36%)
破碎守护者的骑士枪 --> 神圣的魔法粉 0-4 (36%)
破碎守护者的魔杖 --> 神圣的魔法粉 0-4 (36%)
破碎守护者的盾牌 --> 神圣的魔法粉 0-4 (36%)
破碎守护者的剑 --> 神圣的魔法粉 0-4 (36%)
破碎守护者的变形剑 --> 神圣的魔法粉 0-4 (36%)
破碎守护者的十字弓 --> 神圣的魔法粉 0-4 (36%)
名誉印章 --> 神圣的魔法粉 0-3 (25%)
守护印章 --> 神圣的魔法粉 0-3 (25%)
智慧印章 --> 神圣的魔法粉 0-3 (25%)
矜持印章 --> 神圣的魔法粉 0-3 (25%)
意志印章 --> 神圣的魔法粉 0-3 (25%)
被粉碎的黑金属 --> 高纯度强化剂 1-3 (45%)
龟裂的黑金属 --> 高纯度强化剂 1-3 (45%)
不完整的封印的徽章 --> 高纯度强化剂 1-3 (45%)
觉醒之力碎片 --> 高纯度强化剂 3-5 (55%)
被净化的魔法师宝石 --> 高纯度强化剂 3-5 (55%)
被磨损的武器碎片 --> 高纯度强化剂 3-5 (55%)
被破坏的封印锁链 --> 高纯度强化剂 3-5 (55%)
发光的结晶碎片 --> 高纯度强化剂 3-5 (55%)
魔力精华 --> 高纯度强化剂 5-7 (65%)
混沌之轮 --> 高纯度强化剂 5-7 (65%)
魔力黄金线 --> 高纯度强化剂 5-7 (65%)
噩梦守望者的遗物 --> 高纯度强化剂 7-10 (75%)
变形的构型构造体 --> 高纯度强化剂 7-10 (75%)
冷酷的标志 --> 高纯度强化剂 7-10 (75%)
锐利的刀刃碎片 --> 高纯度强化剂 7-10 (75%)
增幅的炼金术结晶 --> 高纯度强化剂 7-10 (75%)
觉醒之力结晶 --> 高纯度强化剂 7-10 (75%)
崩坏的魔力精华 --> 高纯度强化剂 10-20 (90%)
凝缩的混沌之轮 --> 高纯度强化剂 10-20 (90%)
满月石 --> 高纯度强化剂 10-20 (90%)
太阳石 --> 高纯度强化剂 10-20 (90%)
不详的命运碎片 --> 高纯度强化剂 15-25 (90%)
黄昏之剑 --> 高纯度强化剂 20-30 (90%)
黎明之剑 --> 高纯度强化剂 20-30 (90%)
沉睡之志符文石 --> 高纯度强化剂 3-5 (55%)
黑化的刀片 --> 高纯度强化剂 7-10 (75%)
破碎守护者的枪 --> 神圣的魔法粉  4 (36%)
破碎守护者的魔法书 --> 神圣的魔法粉  4 (36%)
古代怪物核 --> 神圣矿物碎片 5-15 (36%)
破损的圣物残骸 --> 神圣矿物碎片 15-25 (36%)
龟裂的巨大背壳 --> 神圣矿物碎片 10-20 (36%)
蓝色刺链 --> 神圣矿物碎片 10-20 (36%)
魔法石板 --> 神圣矿物碎片 10-20 (36%)
撕破的羊皮纸 --> 神圣矿物碎片 45-55 (36%)
腐化的使徒皮革 --> 神圣矿物碎片 25-35 (36%)
使徒精髓 --> 神圣矿物碎片 45-55 (36%)
增幅的催化剂 --> 神圣矿物碎片 5-15 (36%)
增幅的高级催化剂 --> 神圣矿物碎片 10-20 (36%)
增幅的最高级催化剂 --> 神圣矿物碎片 15-25 (36%)
转移之催化剂 --> 神圣矿物碎片 35-45 (36%)
生命药水500点 --> 水 0-1, 四叶幸运草 0-1, 生命药水300点0-1 (52%)
魔法药水500点 --> 水0-1, 四叶幸运草0-1, 魔法药水300点0-1 (52%)
体力药水500点 --> 水0-1, 四叶幸运草0-1, 体力药水300点0-1 (52%)
流浪者的护身符 --> 高级玛瑙石0-1 (36%)    
TEXT;
    echo nl2br($text);
}

?>