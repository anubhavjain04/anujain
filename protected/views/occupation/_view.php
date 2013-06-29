<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkOccupationId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkOccupationId), array('view', 'id'=>$data->pkOccupationId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkOccGroupId')); ?>:</b>
	<?php echo CHtml::encode($data->fkOccGroupId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OccupationName')); ?>:</b>
	<?php echo CHtml::encode($data->OccupationName); ?>
	<br />


</div>