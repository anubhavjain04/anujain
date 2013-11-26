<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkStateId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkStateId), array('view', 'id'=>$data->pkStateId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkCountryId')); ?>:</b>
	<?php echo CHtml::encode($data->fkCountryId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StateName')); ?>:</b>
	<?php echo CHtml::encode($data->StateName); ?>
	<br />


</div>