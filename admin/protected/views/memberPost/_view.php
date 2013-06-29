<div class="view"><b><?php echo CHtml::encode($data->getAttributeLabel('pkMemPostId')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($data->pkMemPostId), array('view', 'id'=>$data->pkMemPostId)); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('fkMemberId')); ?>:</b>
<?php echo CHtml::encode($data->fkMemberId); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('fkPostId')); ?>:</b>
<?php echo CHtml::encode($data->fkPostId); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
<?php echo CHtml::encode($data->Status); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('AssignDate')); ?>:</b>
<?php echo CHtml::encode($data->AssignDate); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('TillDate')); ?>:</b>
<?php echo CHtml::encode($data->TillDate); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('Order')); ?>:</b>
<?php echo CHtml::encode($data->Order); ?> <br />

</div>
