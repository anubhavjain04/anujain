<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkProgramId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkProgramId), array('view', 'id'=>$data->pkProgramId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('programName')); ?>:</b>
	<?php echo CHtml::encode($data->programName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shortDesc')); ?>:</b>
	<?php echo CHtml::encode($data->shortDesc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longDesc')); ?>:</b>
	<?php echo CHtml::encode($data->longDesc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('venuePlace')); ?>:</b>
	<?php echo CHtml::encode($data->venuePlace); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('venueDate')); ?>:</b>
	<?php echo CHtml::encode($data->venueDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkLevelCode')); ?>:</b>
	<?php echo CHtml::encode($data->fkLevelCode); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fkLevelTableId')); ?>:</b>
	<?php echo CHtml::encode($data->fkLevelTableId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	*/ ?>

</div>