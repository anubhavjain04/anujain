<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-master-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are
required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->labelEx($model,'PostName'); ?> <?php echo $form->textField($model,'PostName',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'PostName'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'PostCode'); ?> <?php echo $form->textField($model,'PostCode',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'PostCode'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'PostOrder'); ?> <?php echo $form->textField($model,'PostOrder',array('size'=>10,'maxlength'=>10)); ?>
<?php echo $form->error($model,'PostOrder'); ?></div>

<div class="row">
	<?php echo $form->labelEx($model,'Status'); ?> 
	<?php echo $form->dropDownList($model,'Status',array('1'=>'Published', '0'=>'Un-Published')); ?> 
	<?php echo $form->error($model,'Status'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'LevelCode'); ?> 
	<?php $levelArray = CHtml::listData(LevelMaster::model()->findAll(),'LevelCode','LevelName'); 
		echo $form->dropDownList($model,'LevelCode',$levelArray,array('id'=>'LevelCode')); 
	?> 
	<?php echo $form->error($model,'LevelCode'); ?>
</div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?></div>
<!-- form -->
