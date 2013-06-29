<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'matrimony-sub-sect-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
    	<?php echo $form->labelEx($model,'fkSectId'); ?> 
		<?php 
			  $criteria=new CDbCriteria;
			  $criteria->order = 'SectName ASC';	
			  $countryArray = CHtml::listData(MatrimonySect::model()->findAll($criteria),'pkSectId','SectName');
			  echo $form->dropDownList($model,'fkSectId',$countryArray,array('empty'=>'Select Sect','id'=>'fkSectId'));
		?> 
		<?php echo $form->error($model,'fkSectId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SubSectName'); ?>
		<?php echo $form->textField($model,'SubSectName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'SubSectName'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->