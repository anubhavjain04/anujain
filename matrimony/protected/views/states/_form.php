<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'states-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
    	<?php echo $form->labelEx($model,'fkCountryId'); ?> 
		<?php 
			  $criteria=new CDbCriteria;
			  $criteria->order = 'CountryName ASC';	
			  $countryArray = CHtml::listData(Country::model()->findAll($criteria),'pkCountryId','CountryName');
			  echo $form->dropDownList($model,'fkCountryId',$countryArray,array('empty'=>'Select Country','id'=>'fkCountryId'));
		?> 
		<?php echo $form->error($model,'fkCountryId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StateName'); ?>
		<?php echo $form->textField($model,'StateName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'StateName'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->