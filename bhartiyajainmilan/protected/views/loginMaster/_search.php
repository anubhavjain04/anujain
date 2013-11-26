<div class="wide form"><?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="row"><?php echo $form->label($model,'pkLoginId'); ?> <?php echo $form->textField($model,'pkLoginId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'UserId'); ?> <?php echo $form->textField($model,'UserId',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'Password'); ?> <?php echo $form->passwordField($model,'Password',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'Type'); ?> <?php echo $form->textField($model,'Type',array('size'=>3,'maxlength'=>3)); ?>
</div>

<div class="row"><?php echo $form->label($model,'Status'); ?> <?php echo $form->textField($model,'Status'); ?>
</div>

<div class="row"><?php echo $form->label($model,'CreationDate'); ?> <?php echo $form->textField($model,'CreationDate'); ?>
</div>

<div class="row"><?php echo $form->label($model,'fkgroupId'); ?> <?php echo $form->textField($model,'fkgroupId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row buttons"><?php echo CHtml::submitButton('Search'); ?></div>

<?php $this->endWidget(); ?></div>
<!-- search-form -->
