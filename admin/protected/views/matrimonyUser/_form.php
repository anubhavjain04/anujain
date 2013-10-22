<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'matrimony-user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'EmailID'); ?>
		<?php echo $form->textField($model,'EmailID',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'EmailID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Type'); ?>
		<?php echo $form->textField($model,'Type',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'Type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ActivationCode'); ?>
		<?php echo $form->textField($model,'ActivationCode',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ActivationCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CreatedDate'); ?>
		<?php echo $form->textField($model,'CreatedDate'); ?>
		<?php echo $form->error($model,'CreatedDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ModifiedDate'); ?>
		<?php echo $form->textField($model,'ModifiedDate'); ?>
		<?php echo $form->error($model,'ModifiedDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->