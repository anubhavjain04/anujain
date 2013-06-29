<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkMagTypeId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkMagTypeId), array('view', 'id'=>$data->pkMagTypeId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MagazineType')); ?>:</b>
	<?php echo CHtml::encode($data->MagazineType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TypeCode')); ?>:</b>
	<?php echo CHtml::encode($data->TypeCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />


</div>