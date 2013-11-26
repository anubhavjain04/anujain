<div class="view"><b><?php echo CHtml::encode($data->getAttributeLabel('pkZoneId')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($data->pkZoneId), array('view', 'id'=>$data->pkZoneId)); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('ZoneName')); ?>:</b>
<?php echo CHtml::encode($data->ZoneName); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('ZoneCode')); ?>:</b>
<?php echo CHtml::encode($data->ZoneCode); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
<?php echo CHtml::encode($data->Status); ?> <br />


</div>
