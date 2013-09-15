<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'occupation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fkOccGroupId'); ?>
		<?php 
			  $criteria=new CDbCriteria;
			  $criteria->order = 'GroupName ASC';	
			  $data = CHtml::listData(OccupationGroup::model()->findAll($criteria),'pkOccGroupId','GroupName');
			  echo $form->dropDownList($model,'fkOccGroupId',$data,array('empty'=>'Select Occupation Group','id'=>'pkOccGroupId'));
		?>
		<?php echo $form->error($model,'fkOccGroupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'OccupationName'); ?>
		<?php echo $form->textField($model,'OccupationName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'OccupationName'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->