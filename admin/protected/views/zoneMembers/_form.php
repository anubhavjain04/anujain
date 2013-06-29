<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'zone-members-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php /* 
	<div class="row">
		<?php echo $form->labelEx($model,'fkZoneId'); ?>
		<?php echo $form->textField($model,'fkZoneId',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'fkZoneId'); ?>
	</div>
    */ ?>
    <div class="row">
		<?php echo $form->labelEx($model,'fkZoneId'); ?>
        <?php 
			$zoneCodeArray = array();
			if(isset($allZones)){
				$zoneCodeArray = $allZones;
			}
			 ?>
		<?php echo $form->dropDownList($model,'fkZoneId',$zoneCodeArray,array('prompt'=>'[Select Zone]')); ?>        
		<?php echo $form->error($model,'fkZoneId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fkMemberId'); ?>
        <?php 
			$memberArray = array();
			if(isset($allMembers)){
				$memberArray = $allMembers;
			}
			 ?>
		<?php echo $form->dropDownList($model,'fkMemberId',$memberArray,array('prompt'=>'[Select Member]')); ?>        
		<?php echo $form->error($model,'fkMemberId'); ?>
	</div>	

	<div class="row">
    	<?php echo $form->labelEx($model,'Status'); ?> 
		<?php echo $form->dropDownList($model,'Status',array('1'=>'Published', '0'=>'Un-Published')); ?> 
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->