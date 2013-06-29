<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkGroupPostId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkGroupPostId), array('view', 'id'=>$data->pkGroupPostId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkGroupId')); ?>:</b>
	<?php echo CHtml::encode($data->fkGroupId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkPostId')); ?>:</b>
	<?php echo CHtml::encode($data->fkPostId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />


</div>