<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'branch-master-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are
required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->labelEx($model,'BranchName'); ?> <?php echo $form->textField($model,'BranchName',array('size'=>60,'maxlength'=>100)); ?>
<?php echo $form->error($model,'BranchName'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'BranchCode'); ?> <?php echo $form->textField($model,'BranchCode',array('size'=>10,'maxlength'=>10)); ?>
<?php echo $form->error($model,'BranchCode'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'City'); ?> <?php echo $form->textField($model,'City',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'City'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'District'); ?> <?php echo $form->textField($model,'District',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'District'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'State'); ?> <?php echo $form->textField($model,'State',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'State'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'Status'); ?> <?php
echo $form->dropDownList($model,'Status',array('1'=>'Published', '0'=>'Un-Published'));
?> <?php echo $form->error($model,'Status'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'Zone'); ?> <?php
$zoneArray = CHtml::listData(ZoneMaster::model()->findAll(),'pkZoneId','ZoneName');
echo $form->dropDownList($model,'fkZoneId',$zoneArray,array('empty'=>'Select Zone','id'=>'zone_master_id'));
?> <?php echo $form->error($model,'fkZoneId'); ?></div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?></div>
<!-- form -->
