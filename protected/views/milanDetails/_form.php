<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'milan-details-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are
required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->labelEx($model,'fkMemberId'); ?> <?php echo $form->textField($model,'fkMemberId',array('size'=>10,'maxlength'=>10)); ?>
<?php echo $form->error($model,'fkMemberId'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'fkBranchId'); ?> <?php echo $form->textField($model,'fkBranchId',array('size'=>10,'maxlength'=>10)); ?>
<?php echo $form->error($model,'fkBranchId'); ?></div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?></div>
<!-- form -->
