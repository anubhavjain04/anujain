<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pkStateId'); ?>
		<?php echo $form->textField($model,'pkStateId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkCountryId'); ?>
		<?php echo $form->textField($model,'fkCountryId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StateName'); ?>
		<?php echo $form->textField($model,'StateName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->