<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pkAddId'); ?>
		<?php echo $form->textField($model,'pkAddId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CustomerName'); ?>
		<?php echo $form->textField($model,'CustomerName',array('size'=>45,'maxlength'=>45)); ?>
	</div>
    
	<div class="row">
		<?php echo $form->label($model,'TitleName'); ?>
		<?php echo $form->textField($model,'TitleName',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Description'); ?>
		<?php echo $form->textField($model,'Description',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FooterDescription'); ?>
		<?php echo $form->textField($model,'FooterDescription',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WebPage'); ?>
		<?php echo $form->textArea($model,'WebPage',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateFrom'); ?>
		<?php echo $form->textField($model,'DateFrom'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateTo'); ?>
		<?php echo $form->textField($model,'DateTo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CreatedDate'); ?>
		<?php echo $form->textField($model,'CreatedDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ModifiedDate'); ?>
		<?php echo $form->textField($model,'ModifiedDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AddImagePath'); ?>
		<?php echo $form->textField($model,'AddImagePath',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WebsiteLink'); ?>
		<?php echo $form->textField($model,'WebsiteLink',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->