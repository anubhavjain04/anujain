<div class="view"><b><?php echo CHtml::encode($data->getAttributeLabel('pkLoginId')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($data->pkLoginId), array('view', 'id'=>$data->pkLoginId)); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('UserId')); ?>:</b>
<?php echo CHtml::encode($data->UserId); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('Password')); ?>:</b>
<?php echo CHtml::encode($data->Password); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('Type')); ?>:</b> <?php echo CHtml::encode($data->Type); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
<?php echo CHtml::encode($data->Status); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('CreationDate')); ?>:</b>
<?php echo CHtml::encode($data->CreationDate); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('fkgroupId')); ?>:</b>
<?php echo CHtml::encode($data->fkgroupId); ?> <br />


</div>
