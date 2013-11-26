<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-master-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are
required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->labelEx($model,'UserId'); ?> <?php echo $form->textField($model,'UserId',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'UserId'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'Password'); ?> <?php echo $form->passwordField($model,'Password',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'Password'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'Type'); ?> <?php echo $form->textField($model,'Type',array('size'=>3,'maxlength'=>3)); ?>
<?php echo $form->error($model,'Type'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'Status'); ?> <?php echo $form->textField($model,'Status'); ?>
<?php echo $form->error($model,'Status'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'CreationDate'); ?> <?php echo $form->textField($model,'CreationDate'); ?>
<?php echo $form->error($model,'CreationDate'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'fkgroupId'); ?> <?php echo $form->textField($model,'fkgroupId',array('size'=>10,'maxlength'=>10)); ?>
<?php echo $form->error($model,'fkgroupId'); ?></div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?></div>
<!-- form -->
