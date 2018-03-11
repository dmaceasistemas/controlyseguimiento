<?php echo CHtml::beginForm($action,'post',array("id"=>"searchform".$id)); ?>
<div> 
	<label for="search_term<?php echo $id;?>">Search name or CUI/CIF</label> 
	<input type="text" name="search_term" id="search_term<?php echo $id;?>" />
</div> 
<?php echo CHtml::endForm(); ?>