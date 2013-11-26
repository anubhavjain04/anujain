<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkCountryId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkCountryId), array('view', 'id'=>$data->pkCountryId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CountryName')); ?>:</b>
	<?php echo CHtml::encode($data->CountryName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CountryCode')); ?>:</b>
	<?php echo CHtml::encode($data->CountryCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Currency')); ?>:</b>
	<?php echo CHtml::encode($data->Currency); ?>
	<br />


</div>