<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkMemPayId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkMemPayId), array('view', 'id'=>$data->pkMemPayId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkMemberId')); ?>:</b>
	<?php echo CHtml::encode($data->fkMemberId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkPackageId')); ?>:</b>
	<?php echo CHtml::encode($data->fkPackageId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StartDate')); ?>:</b>
	<?php echo CHtml::encode($data->StartDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EndDate')); ?>:</b>
	<?php echo CHtml::encode($data->EndDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AmountPaid')); ?>:</b>
	<?php echo CHtml::encode($data->AmountPaid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PaymentMode')); ?>:</b>
	<?php echo CHtml::encode($data->PaymentMode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Comments')); ?>:</b>
	<?php echo CHtml::encode($data->Comments); ?>
	<br />

	*/ ?>

</div>