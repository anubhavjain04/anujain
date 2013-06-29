<div class="view"><b><?php echo CHtml::encode($data->getAttributeLabel('pkBranchId')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($data->pkBranchId), array('view', 'id'=>$data->pkBranchId)); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('BranchName')); ?>:</b>
<?php echo CHtml::encode($data->BranchName); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('BranchCode')); ?>:</b>
<?php echo CHtml::encode($data->BranchCode); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('City')); ?>:</b> <?php echo CHtml::encode($data->City); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('District')); ?>:</b>
<?php echo CHtml::encode($data->District); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('State')); ?>:</b>
<?php echo CHtml::encode($data->State); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
<?php echo CHtml::encode($data->Status); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('fkZoneId')); ?>:</b>
<?php echo CHtml::encode($data->fkZone->ZoneName); ?> <br />

</div>
