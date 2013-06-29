<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkTongueId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkTongueId), array('view', 'id'=>$data->pkTongueId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TongueName')); ?>:</b>
	<?php echo CHtml::encode($data->TongueName); ?>
	<br />


</div>