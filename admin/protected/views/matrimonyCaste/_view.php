<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkCasteId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkCasteId), array('view', 'id'=>$data->pkCasteId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CasteName')); ?>:</b>
	<?php echo CHtml::encode($data->CasteName); ?>
	<br />


</div>