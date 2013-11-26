<div class="view"><b><?php echo CHtml::encode($data->getAttributeLabel('pkRecId')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($data->pkRecId), array('view', 'id'=>$data->pkRecId)); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('fkMemberId')); ?>:</b>
<?php echo CHtml::encode($data->fkMemberId); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('fkBranchId')); ?>:</b>
<?php echo CHtml::encode($data->fkBranchId); ?> <br />


</div>
