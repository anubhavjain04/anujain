<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkMessageId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkMessageId), array('view', 'id'=>$data->pkMessageId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Message')); ?>:</b>
	<?php echo CHtml::encode($data->Message); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LineNo')); ?>:</b>
	<?php echo CHtml::encode($data->LineNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageOrder')); ?>:</b>
	<?php echo CHtml::encode($data->MessageOrder); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MessageType')); ?>:</b>
	<?php echo CHtml::encode($data->MessageType); ?>
	<br />
</div>