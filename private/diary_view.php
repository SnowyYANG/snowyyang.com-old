<!--
by Snowy YANG
for http://snowy.asia/
-->
<div style="width:5em; height:100%; position:fixed">
    <a style="color:black; text-decoration:none" href="http://snowy.asia/">
        <p style="font:3em SimSun; width:1em; margin:0.33em">少女工房</p>
    </a>
</div>
<p style="width: 32em; margin-left: 5em"><?php
while($model = diary_model()) {
    if ($nonfirst) {
        ?>-----------<br>
<?php
    }
    $nonfirst = true;
?><br>
<?php echo "$model[title] ($model[create_time])"; ?><br>
<br>
<?php echo $model['content']; ?><br>
<?php
}
?></p>
