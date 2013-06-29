<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'function-master-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are
required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->labelEx($model,'functionName'); ?> <?php echo $form->textField($model,'functionName',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'functionName'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'shortDesc'); ?> <?php echo $form->textField($model,'shortDesc',array('size'=>50,'maxlength'=>50)); ?>
<?php echo $form->error($model,'shortDesc'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'longDesc'); ?> <?php echo $form->textField($model,'longDesc',array('size'=>60,'maxlength'=>100)); ?>
<?php echo $form->error($model,'longDesc'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'status'); ?> <?php
echo $form->dropDownList($model,'status',array('1'=>'Published', '0'=>'Un-Published'));
?> <?php echo $form->error($model,'status'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'functionCode'); ?> <?php echo $form->textField($model,'functionCode',array('size'=>20,'maxlength'=>20)); ?>
<?php echo $form->error($model,'functionCode'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'Parent Right'); ?> <?php
$tempArray[0]= 'Root';
$functionArray = CHtml::listData(FunctionMaster::model()->findAll(),'pkfunctionId','functionName');
$mergeArray = array_merge($tempArray, $functionArray);

echo $form->dropDownList($model,'parentFunctionId',$mergeArray,array('id'=>'pkfunctionId'));
?> <?php echo $form->error($model,'parentFunctionId'); ?></div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?></div>
<!-- form -->
