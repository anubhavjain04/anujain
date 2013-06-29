<div class="view"><b><?php echo CHtml::encode($data->getAttributeLabel('pkLevelPostId')); ?>:</b>
<?php echo CHtml::link(CHtml::encode($data->pkLevelPostId), array('view', 'id'=>$data->pkLevelPostId)); ?>
<br />

<b><?php echo CHtml::encode($data->getAttributeLabel('fkLevelId')); ?>:</b>
<?php echo CHtml::encode($data->fkLevelId); ?> <br />

<b><?php echo CHtml::encode($data->getAttributeLabel('fkPostId')); ?>:</b>
<?php echo CHtml::encode($data->fkPostId); ?> <br />


</div>
