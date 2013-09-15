<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pkCourseGroupId'); ?>
		<?php echo $form->textField($model,'pkCourseGroupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GroupName'); ?>
		<?php echo $form->textField($model,'GroupName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->