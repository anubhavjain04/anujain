<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pkCourseId'); ?>
		<?php echo $form->textField($model,'pkCourseId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkCourseGroupId'); ?>
		<?php echo $form->textField($model,'fkCourseGroupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CourseName'); ?>
		<?php echo $form->textField($model,'CourseName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->