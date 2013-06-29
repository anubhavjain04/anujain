<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkPackageId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkPackageId), array('view', 'id'=>$data->pkPackageId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PackageName')); ?>:</b>
	<?php echo CHtml::encode($data->PackageName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PackageType')); ?>:</b>
	<?php echo CHtml::encode($data->PackageType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cost')); ?>:</b>
	<?php echo CHtml::encode($data->Cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PackageDate')); ?>:</b>
	<?php echo CHtml::encode($data->PackageDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Days')); ?>:</b>
	<?php echo CHtml::encode($data->Days); ?>
	<br />


</div>