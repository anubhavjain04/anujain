<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'matrimony-member-payment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fkMemberId'); ?>
		<?php echo $form->textField($model,'fkMemberId',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'fkMemberId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fkPackageId'); ?>
		<?php echo $form->textField($model,'fkPackageId',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'fkPackageId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StartDate'); ?>
		<?php echo $form->textField($model,'StartDate'); ?>
		<?php echo $form->error($model,'StartDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EndDate'); ?>
		<?php echo $form->textField($model,'EndDate'); ?>
		<?php echo $form->error($model,'EndDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AmountPaid'); ?>
		<?php echo $form->textField($model,'AmountPaid',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'AmountPaid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PaymentMode'); ?>
		<?php echo $form->textField($model,'PaymentMode'); ?>
		<?php echo $form->error($model,'PaymentMode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Comments'); ?>
		<?php echo $form->textField($model,'Comments',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Comments'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->