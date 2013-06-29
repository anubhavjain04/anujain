<div class="view"><b><?php echo CHtml::encode($data->getAttributeLabel('pkuserAuthId')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($data->pkuserAuthId), array('view', 'id'=>$data->pkuserAuthId)); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('fkuserId')); ?>:</b>
<?php echo CHtml::encode($data->fkuserId); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('fkfunctionId')); ?>:</b>
<?php echo CHtml::encode($data->fkfunctionId); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
<?php echo CHtml::encode($data->status); ?> <br />


</div>
