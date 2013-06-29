<div class="view"><b><?php echo CHtml::encode($data->getAttributeLabel('pkgroupId')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($data->pkgroupId), array('view', 'id'=>$data->pkgroupId)); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('groupName')); ?>:</b>
<?php echo CHtml::encode($data->groupName); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('shortDesc')); ?>:</b>
<?php echo CHtml::encode($data->shortDesc); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('longDesc')); ?>:</b>
<?php echo CHtml::encode($data->longDesc); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
<?php echo CHtml::encode($data->status); ?> <br />


</div>
