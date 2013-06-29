<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkSubSectId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkSubSectId), array('view', 'id'=>$data->pkSubSectId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkSectId')); ?>:</b>
	<?php echo CHtml::encode($data->fkSectId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SubSectName')); ?>:</b>
	<?php echo CHtml::encode($data->SubSectName); ?>
	<br />


</div>