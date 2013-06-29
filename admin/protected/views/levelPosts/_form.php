<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'level-posts-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are
required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->labelEx($model,'fkLevelId'); ?> <?php echo $form->textField($model,'fkLevelId',array('size'=>10,'maxlength'=>10)); ?>
<?php echo $form->error($model,'fkLevelId'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'fkPostId'); ?> <?php echo $form->textField($model,'fkPostId',array('size'=>10,'maxlength'=>10)); ?>
<?php echo $form->error($model,'fkPostId'); ?></div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?></div>
<!-- form -->
