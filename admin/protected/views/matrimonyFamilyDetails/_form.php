<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'matrimony-family-details-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'MemberCode'); ?>
		<?php echo $form->textField($model,'MemberCode',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'MemberCode'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'FatherName'); ?>
		<?php echo $form->textField($model,'FatherName',array('size'=>45,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'FatherName'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'FatherOccupation'); ?>
		<?php echo $form->textField($model,'FatherOccupation',array('size'=>45,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'FatherOccupation'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'MotherName'); ?>
		<?php echo $form->textField($model,'MotherName',array('size'=>45,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'MotherName'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'MotherOccupation'); ?>
		<?php echo $form->textField($model,'MotherOccupation',array('size'=>45,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'MotherOccupation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UnmarriedBrothers'); ?>
		<?php echo $form->textField($model,'UnmarriedBrothers',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'UnmarriedBrothers'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MarriedBrothers'); ?>
		<?php echo $form->textField($model,'MarriedBrothers',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'MarriedBrothers'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UnmarriedSisters'); ?>
		<?php echo $form->textField($model,'UnmarriedSisters',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'UnmarriedSisters'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MarriedSisters'); ?>
		<?php echo $form->textField($model,'MarriedSisters',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'MarriedSisters'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AboutFamily'); ?>
		<?php echo $form->textArea($model,'AboutFamily',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'AboutFamily'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->