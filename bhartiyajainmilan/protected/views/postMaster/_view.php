<div class="view"><b><?php echo CHtml::encode($data->getAttributeLabel('pkPostId')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($data->pkPostId), array('view', 'id'=>$data->pkPostId)); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('PostName')); ?>:</b>
<?php echo CHtml::encode($data->PostName); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('PostCode')); ?>:</b>
<?php echo CHtml::encode($data->PostCode); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
<?php echo CHtml::encode($data->Status); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('LevelCode')); ?>:</b>
<?php echo CHtml::encode($data->LevelCode); ?> <br />

</div>
