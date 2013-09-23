<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pkFamilyId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pkFamilyId), array('view', 'id'=>$data->pkFamilyId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MemberCode')); ?>:</b>
	<?php echo CHtml::encode($data->MemberCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FatherName')); ?>:</b>
	<?php echo CHtml::encode($data->FatherName); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('FatherOccupation')); ?>:</b>
	<?php echo CHtml::encode($data->FatherOccupation); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('MotherName')); ?>:</b>
	<?php echo CHtml::encode($data->MotherName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MotherOccupation')); ?>:</b>
	<?php echo CHtml::encode($data->MotherOccupation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UnmarriedBrothers')); ?>:</b>
	<?php echo CHtml::encode($data->UnmarriedBrothers); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MarriedBrothers')); ?>:</b>
	<?php echo CHtml::encode($data->MarriedBrothers); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UnmarriedSisters')); ?>:</b>
	<?php echo CHtml::encode($data->UnmarriedSisters); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('MarriedSisters')); ?>:</b>
	<?php echo CHtml::encode($data->MarriedSisters); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AboutFamily')); ?>:</b>
	<?php echo CHtml::encode($data->AboutFamily); ?>
	<br />

	*/ ?>

</div>