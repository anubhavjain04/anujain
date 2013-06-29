<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'level-master-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are
required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->labelEx($model,'LevelName'); ?> <?php echo $form->textField($model,'LevelName',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'LevelName'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'LevelCode'); ?> <?php echo $form->textField($model,'LevelCode',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'LevelCode'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'LevelOrder'); ?> <?php echo $form->textField($model,'LevelOrder',array('size'=>10,'maxlength'=>10)); ?>
<?php echo $form->error($model,'LevelOrder'); ?></div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?></div>
<!-- form -->
