<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pkMessageId'); ?>
		<?php echo $form->textField($model,'pkMessageId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Message'); ?>
		<?php echo $form->textField($model,'Message',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LineNo'); ?>
		<?php echo $form->textField($model,'LineNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MessageOrder'); ?>
		<?php echo $form->textField($model,'MessageOrder'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->label($model,'MessageType'); ?>
		<?php echo $form->textField($model,'MessageType'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->