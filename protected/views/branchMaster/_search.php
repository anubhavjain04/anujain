<div class="wide form"><?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="row"><?php echo $form->label($model,'pkBranchId'); ?> <?php echo $form->textField($model,'pkBranchId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'BranchName'); ?> <?php echo $form->textField($model,'BranchName',array('size'=>60,'maxlength'=>100)); ?>
</div>

<div class="row"><?php echo $form->label($model,'BranchCode'); ?> <?php echo $form->textField($model,'BranchCode',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'City'); ?> <?php echo $form->textField($model,'City',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'District'); ?> <?php echo $form->textField($model,'District',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'State'); ?> <?php echo $form->textField($model,'State',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'Status'); ?> <?php echo $form->textField($model,'Status'); ?>
</div>

<div class="row"><?php echo $form->label($model,'fkZoneId'); ?> <?php echo $form->textField($model,'fkZoneId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row buttons"><?php echo CHtml::submitButton('Search'); ?></div>

<?php $this->endWidget(); ?></div>
<!-- search-form -->
