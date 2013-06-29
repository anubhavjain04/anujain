<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'function-group-master-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are
required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->labelEx($model,'groupName'); ?> <?php echo $form->textField($model,'groupName',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'groupName'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'shortDesc'); ?> <?php echo $form->textField($model,'shortDesc',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'shortDesc'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'longDesc'); ?> <?php echo $form->textField($model,'longDesc',array('size'=>60,'maxlength'=>100)); ?>
<?php echo $form->error($model,'longDesc'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'status'); ?> <?php
echo $form->dropDownList($model,'status',array('1'=>'Published', '0'=>'Un-Published'));
?> <?php echo $form->error($model,'status'); ?></div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?></div>
<!-- form -->
