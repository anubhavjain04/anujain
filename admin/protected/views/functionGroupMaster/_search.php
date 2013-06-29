<div class="wide form"><?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="row"><?php echo $form->label($model,'pkgroupId'); ?> <?php echo $form->textField($model,'pkgroupId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'groupName'); ?> <?php echo $form->textField($model,'groupName',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'shortDesc'); ?> <?php echo $form->textField($model,'shortDesc',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'longDesc'); ?> <?php echo $form->textField($model,'longDesc',array('size'=>60,'maxlength'=>100)); ?>
</div>

<div class="row"><?php echo $form->label($model,'status'); ?> <?php echo $form->textField($model,'status'); ?>
</div>

<div class="row buttons"><?php echo CHtml::submitButton('Search'); ?></div>

<?php $this->endWidget(); ?></div>
<!-- search-form -->
