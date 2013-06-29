<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkSectId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkSectId), array('view', 'id'=>$data->pkSectId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SectName')); ?>:</b>
	<?php echo CHtml::encode($data->SectName); ?>
	<br />


</div>