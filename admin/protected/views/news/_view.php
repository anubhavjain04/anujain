<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkNewsId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkNewsId), array('view', 'id'=>$data->pkNewsId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news')); ?>:</b>
	<?php echo CHtml::encode($data->news); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('newsDate')); ?>:</b>
	<?php echo CHtml::encode($data->newsDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('newsOrder')); ?>:</b>
	<?php echo CHtml::encode($data->newsOrder); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('newsType')); ?>:</b>
	<?php echo CHtml::encode($data->newsType); ?>
	<br />
    
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	*/ ?>

</div>