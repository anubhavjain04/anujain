<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkGalleryId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkGalleryId), array('view', 'id'=>$data->pkGalleryId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shortDesc')); ?>:</b>
	<?php echo CHtml::encode($data->shortDesc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longDesc')); ?>:</b>
	<?php echo CHtml::encode($data->longDesc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

</div>