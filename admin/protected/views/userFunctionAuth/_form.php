<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-function-auth-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are
required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->labelEx($model,'fkuserId'); ?> <?php echo $form->textField($model,'fkuserId',array('size'=>10,'maxlength'=>10)); ?>
<?php echo $form->error($model,'fkuserId'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'fkfunctionId'); ?> <?php echo $form->textField($model,'fkfunctionId',array('size'=>10,'maxlength'=>10)); ?>
<?php echo $form->error($model,'fkfunctionId'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'status'); ?> <?php echo $form->textField($model,'status'); ?>
<?php echo $form->error($model,'status'); ?></div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?></div>
<!-- form -->
