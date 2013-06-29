<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'country-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CountryName'); ?>
		<?php echo $form->textField($model,'CountryName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'CountryName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CountryCode'); ?>
		<?php echo $form->textField($model,'CountryCode',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'CountryCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Currency'); ?>
		<?php echo $form->textField($model,'Currency',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Currency'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->