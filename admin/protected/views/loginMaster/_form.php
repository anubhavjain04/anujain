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

<div class="row">
	<?php echo $form->labelEx($model,'Type'); ?> 
    <?php echo $form->dropDownList($model,'Type',array('USR'=>'User', 'PA'=>'Product Admin')); ?> 
	<?php echo $form->error($model,'Type'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'Status'); ?> 
	<?php echo $form->dropDownList($model,'Status',array('1'=>'Published', '0'=>'Un-Published')); ?> 
	<?php echo $form->error($model,'Status'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'fkgroupId'); ?> 
	<?php $groupArray = CHtml::listData(FunctionGroupMaster::model()->findAll(),'pkgroupId','groupName'); 
		echo $form->dropDownList($model,'fkgroupId',$groupArray,array('empty'=>'Select Group','id'=>'pkgroupId'));
	?> 
	<?php echo $form->error($model,'fkgroupId'); ?>   
</div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?></div>
<!-- form -->
