<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkGroupId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkGroupId), array('view', 'id'=>$data->pkGroupId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GroupName')); ?>:</b>
	<?php echo CHtml::encode($data->GroupName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GroupCode')); ?>:</b>
	<?php echo CHtml::encode($data->GroupCode); ?>
	<br />


</div>