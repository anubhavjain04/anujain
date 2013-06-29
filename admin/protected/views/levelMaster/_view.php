<div class="view"><b><?php echo CHtml::encode($data->getAttributeLabel('pkLevel')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($data->pkLevel), array('view', 'id'=>$data->pkLevel)); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('LevelName')); ?>:</b>
<?php echo CHtml::encode($data->LevelName); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('LevelCode')); ?>:</b>
<?php echo CHtml::encode($data->LevelCode); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('LevelOrder')); ?>:</b>
<?php echo CHtml::encode($data->LevelOrder); ?> <br />


</div>
