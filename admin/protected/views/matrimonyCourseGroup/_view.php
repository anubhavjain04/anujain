<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkCourseGroupId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkCourseGroupId), array('view', 'id'=>$data->pkCourseGroupId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GroupName')); ?>:</b>
	<?php echo CHtml::encode($data->GroupName); ?>
	<br />


</div>