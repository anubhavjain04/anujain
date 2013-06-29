<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pkProgramId'); ?>
		<?php echo $form->textField($model,'pkProgramId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'programName'); ?>
		<?php echo $form->textField($model,'programName',array('size'=>60,'maxlength'=>70)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shortDesc'); ?>
		<?php echo $form->textField($model,'shortDesc',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'longDesc'); ?>
		<?php echo $form->textField($model,'longDesc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'venuePlace'); ?>
		<?php echo $form->textField($model,'venuePlace',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'venueDate'); ?>
		<?php echo $form->textField($model,'venueDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkLevelCode'); ?>
		<?php echo $form->textField($model,'fkLevelCode',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkLevelTableId'); ?>
		<?php echo $form->textField($model,'fkLevelTableId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->