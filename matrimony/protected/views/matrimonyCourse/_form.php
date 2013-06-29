<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'matrimony-course-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
    	<?php echo $form->labelEx($model,'fkCourseGroupId'); ?> 
		<?php 
			  $criteria=new CDbCriteria;
			  $criteria->order = 'GroupName ASC';	
			  $countryArray = CHtml::listData(MatrimonyCourseGroup::model()->findAll($criteria),'pkCourseGroupId','GroupName');
			  echo $form->dropDownList($model,'fkCourseGroupId',$countryArray,array('empty'=>'Select Course Group','id'=>'fkCourseGroupId'));
		?> 
		<?php echo $form->error($model,'fkCourseGroupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CourseName'); ?>
		<?php echo $form->textField($model,'CourseName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'CourseName'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->