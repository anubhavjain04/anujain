<div class="wide form"><?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="row"><?php echo $form->label($model,'pkRecId'); ?> <?php echo $form->textField($model,'pkRecId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'fkMemberId'); ?> <?php echo $form->textField($model,'fkMemberId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'fkBranchId'); ?> <?php echo $form->textField($model,'fkBranchId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row buttons"><?php echo CHtml::submitButton('Search'); ?></div>

<?php $this->endWidget(); ?></div>
<!-- search-form -->
