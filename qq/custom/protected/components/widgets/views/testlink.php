<div class="list-group">
    
    <?php foreach ($data as $item):?>
	    <a href="javascript:;" class="list-group-item active"><?php echo $item['title'];?></a>
	    <?php foreach ($item['child'] as $child):?>
	    <a href="<?php echo Yii::app()->createUrl($child[1]);?>" class="list-group-item"><?php echo $child[0];?></a>
	    <?php endforeach;?>
	<?php endforeach;?>	    
   
</div>