<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkUserId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkUserId), array('view', 'id'=>$data->pkUserId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EmailID')); ?>:</b>
	<?php echo CHtml::encode($data->EmailID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Password')); ?>:</b>
	<?php echo CHtml::encode($data->Password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Type')); ?>:</b>
	<?php echo CHtml::encode($data->Type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ActivationCode')); ?>:</b>
	<?php echo CHtml::encode($data->ActivationCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreatedDate')); ?>:</b>
	<?php echo CHtml::encode($data->CreatedDate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ModifiedDate')); ?>:</b>
	<?php echo CHtml::encode($data->ModifiedDate); ?>
	<br />

	*/ ?>

</div>