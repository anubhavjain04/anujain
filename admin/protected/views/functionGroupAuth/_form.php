<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'function-group-auth-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are
required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->labelEx($model,'Group Name'); ?> <?php
$zoneArray = CHtml::listData(FunctionGroupMaster::model()->findAll(),'pkgroupId','groupName');
echo $form->dropDownList($model,'fkgroupId',$zoneArray,array('id'=>'fkgroupId'));
?> <?php echo $form->error($model,'fkgroupId'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'Function Name'); ?> <?php
$zoneArray = CHtml::listData(FunctionMaster::model()->findAll(),'pkfunctionId','functionName');
echo $form->dropDownList($model,'fkfunctionId',$zoneArray,array('id'=>'fkfunctionId'));
?> <?php echo $form->error($model,'fkfunctionId'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'status'); ?> <?php
echo $form->dropDownList($model,'status',array('1'=>'Published', '0'=>'Un-Published'));
?> <?php echo $form->error($model,'status'); ?></div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?></div>
<!-- form -->
