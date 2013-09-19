<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pkFamilyId'); ?>
		<?php echo $form->textField($model,'pkFamilyId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MemberCode'); ?>
		<?php echo $form->textField($model,'MemberCode',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FatherOccupation'); ?>
		<?php echo $form->textField($model,'FatherOccupation',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MotherOccupation'); ?>
		<?php echo $form->textField($model,'MotherOccupation',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UnmarriedBrothers'); ?>
		<?php echo $form->textField($model,'UnmarriedBrothers',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MarriedBrothers'); ?>
		<?php echo $form->textField($model,'MarriedBrothers',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UnmarriedSisters'); ?>
		<?php echo $form->textField($model,'UnmarriedSisters',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MarriedSisters'); ?>
		<?php echo $form->textField($model,'MarriedSisters',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AboutFamily'); ?>
		<?php echo $form->textArea($model,'AboutFamily',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->