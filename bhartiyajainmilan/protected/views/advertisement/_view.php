<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkAddId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkAddId), array('view', 'id'=>$data->pkAddId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CustomerName')); ?>:</b>
	<?php echo CHtml::encode($data->CustomerName); ?>
	<br />
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('TitleName')); ?>:</b>
	<?php echo CHtml::encode($data->TitleName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FooterDescription')); ?>:</b>
	<?php echo CHtml::encode($data->FooterDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WebPage')); ?>:</b>
	<?php echo CHtml::encode($data->WebPage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateFrom')); ?>:</b>
	<?php echo CHtml::encode($data->DateFrom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateTo')); ?>:</b>
	<?php echo CHtml::encode($data->DateTo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CreatedDate')); ?>:</b>
	<?php echo CHtml::encode($data->CreatedDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ModifiedDate')); ?>:</b>
	<?php echo CHtml::encode($data->ModifiedDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AddImagePath')); ?>:</b>
	<?php echo CHtml::encode($data->AddImagePath); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WebsiteLink')); ?>:</b>
	<?php echo CHtml::encode($data->WebsiteLink); ?>
	<br />

	*/ ?>

</div>