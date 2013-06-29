<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'magazine-type-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'MagazineType'); ?>
		<?php echo $form->textField($model,'MagazineType',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'MagazineType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TypeCode'); ?>
		<?php echo $form->textField($model,'TypeCode',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'TypeCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->dropDownList($model,'Status',array('1'=>'Published', '0'=>'Un-Published')); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->