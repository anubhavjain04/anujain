<div class="view"><b><?php echo CHtml::encode($data->getAttributeLabel('pkfunctionId')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($data->pkfunctionId), array('view', 'id'=>$data->pkfunctionId)); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('functionName')); ?>:</b>
<?php echo CHtml::encode($data->functionName); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('shortDesc')); ?>:</b>
<?php echo CHtml::encode($data->shortDesc); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('longDesc')); ?>:</b>
<?php echo CHtml::encode($data->longDesc); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
<?php echo CHtml::encode($data->status); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('functionCode')); ?>:</b>
<?php echo CHtml::encode($data->functionCode); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('parentFunctionId')); ?>:</b>
<?php echo CHtml::encode($data->parentFunctionId); ?> <br />


</div>
