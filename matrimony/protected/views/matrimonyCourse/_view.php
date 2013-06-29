<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkCourseId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkCourseId), array('view', 'id'=>$data->pkCourseId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fkCourseGroupId')); ?>:</b>
	<?php echo CHtml::encode($data->fkCourseGroupId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CourseName')); ?>:</b>
	<?php echo CHtml::encode($data->CourseName); ?>
	<br />


</div>