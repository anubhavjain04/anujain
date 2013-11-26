<div class="wide form"><?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="row"><?php echo $form->label($model,'pkZoneId'); ?> <?php echo $form->textField($model,'pkZoneId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'ZoneName'); ?> <?php echo $form->textField($model,'ZoneName',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'ZoneCode'); ?> <?php echo $form->textField($model,'ZoneCode',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'Status'); ?> <?php echo $form->textField($model,'Status'); ?>
</div>

<div class="row buttons"><?php echo CHtml::submitButton('Search'); ?></div>

<?php $this->endWidget(); ?></div>
<!-- search-form -->
