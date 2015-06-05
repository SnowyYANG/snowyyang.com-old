<!--
by Snowy YANG
for http://snowy.asia/
-->
<p><?php
while($model = diary_model())
{?>
<br>
<?php echo "$model[title] ($model[create_time])"; ?><br>
<br>
<?php echo $model['content']; ?><br>
-----------<br><?php }
?></p>
