<div class="wide form"><?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="row"><?php echo $form->label($model,'pkMemPostId'); ?> <?php echo $form->textField($model,'pkMemPostId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'fkMemberId'); ?> <?php echo $form->textField($model,'fkMemberId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'fkPostId'); ?> <?php echo $form->textField($model,'fkPostId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'Status'); ?> <?php echo $form->textField($model,'Status'); ?>
</div>

<div class="row"><?php echo $form->label($model,'AssignDate'); ?> <?php echo $form->textField($model,'AssignDate'); ?>
</div>

<div class="row"><?php echo $form->label($model,'TillDate'); ?> <?php echo $form->textField($model,'TillDate'); ?>
</div>

<div class="row"><?php echo $form->label($model,'Order'); ?> <?php echo $form->textField($model,'Order'); ?>
</div>

<div class="row buttons"><?php echo CHtml::submitButton('Search'); ?></div>

<?php $this->endWidget(); ?></div>
<!-- search-form -->
