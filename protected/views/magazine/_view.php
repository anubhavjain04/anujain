<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkMagazineId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkMagazineId), array('view', 'id'=>$data->pkMagazineId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MagazineName')); ?>:</b>
	<?php echo CHtml::encode($data->MagazineName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MagzineDate')); ?>:</b>
	<?php echo CHtml::encode($data->MagzineDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Path')); ?>:</b>
	<?php echo CHtml::encode($data->Path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkMagTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->fkMagTypeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Type')); ?>:</b>
	<?php echo CHtml::encode($data->Type); ?>
	<br />


</div>