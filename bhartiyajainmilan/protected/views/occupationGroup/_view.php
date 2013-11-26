<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkOccGroupId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkOccGroupId), array('view', 'id'=>$data->pkOccGroupId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GroupName')); ?>:</b>
	<?php echo CHtml::encode($data->GroupName); ?>
	<br />


</div>