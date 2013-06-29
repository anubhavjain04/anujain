<div class="view"><b><?php echo CHtml::encode($data->getAttributeLabel('pkgroupAuthId')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($data->pkgroupAuthId), array('view', 'id'=>$data->pkgroupAuthId)); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('fkgroupId')); ?>:</b>
<?php echo CHtml::encode($data->fkgroup->groupName); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('fkfunctionId')); ?>:</b>
<?php echo CHtml::encode($data->fkfunction->functionName); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
<?php echo CHtml::encode($data->status); ?> <br />


</div>
