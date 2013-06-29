<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'occupation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fkOccGroupId'); ?>
		<?php echo $form->textField($model,'fkOccGroupId',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'fkOccGroupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'OccupationName'); ?>
		<?php echo $form->textField($model,'OccupationName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'OccupationName'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->