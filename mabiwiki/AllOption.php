<?php 

require 'optiondata.php';

function mainview() {
    global $option;
?>
    <h2>魔法释放 <nav><a href="Option">常用释放</a> | 所有释放</nav></h2>
    <div class="notice">（这个页面尚未完工）</div>
    <?php ListOption($option);
}?>