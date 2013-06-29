<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'magazine-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'MagazineName'); ?>
		<?php echo $form->textField($model,'MagazineName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'MagazineName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MagzineDate'); ?>
		<?php echo $form->textField($model,'MagzineDate'); ?>
		<?php echo $form->error($model,'MagzineDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Path'); ?>
		<?php echo $form->textField($model,'Path',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fkMagTypeId'); ?>
		<?php echo $form->textField($model,'fkMagTypeId',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'fkMagTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Type'); ?>
		<?php echo $form->textField($model,'Type',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->