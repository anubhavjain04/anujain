<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-post-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are
required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->labelEx($model,'fkMemberId'); ?> <?php echo $form->textField($model,'fkMemberId',array('size'=>10,'maxlength'=>10)); ?>
<?php echo $form->error($model,'fkMemberId'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'fkPostId'); ?> <?php echo $form->textField($model,'fkPostId',array('size'=>10,'maxlength'=>10)); ?>
<?php echo $form->error($model,'fkPostId'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'Status'); ?> <?php echo $form->textField($model,'Status'); ?>
<?php echo $form->error($model,'Status'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'AssignDate'); ?> <?php echo $form->textField($model,'AssignDate'); ?>
<?php echo $form->error($model,'AssignDate'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'TillDate'); ?> <?php echo $form->textField($model,'TillDate'); ?>
<?php echo $form->error($model,'TillDate'); ?></div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?></div>
<!-- form -->
