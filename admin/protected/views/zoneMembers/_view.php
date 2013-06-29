<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkZoneMember')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkZoneMember), array('view', 'id'=>$data->pkZoneMember)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkZoneId')); ?>:</b>
	<?php echo CHtml::encode($data->fkZoneId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkMemberId')); ?>:</b>
	<?php echo CHtml::encode($data->fkMemberId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />


</div>