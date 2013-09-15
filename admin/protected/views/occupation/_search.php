<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pkOccupationId'); ?>
		<?php echo $form->textField($model,'pkOccupationId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkOccGroupId'); ?>
		<?php echo $form->textField($model,'fkOccGroupId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OccupationName'); ?>
		<?php echo $form->textField($model,'OccupationName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->