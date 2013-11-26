<div class="wide form"><?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="row"><?php echo $form->label($model,'pkLevelPostId'); ?> <?php echo $form->textField($model,'pkLevelPostId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'fkLevelId'); ?> <?php echo $form->textField($model,'fkLevelId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'fkPostId'); ?> <?php echo $form->textField($model,'fkPostId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row buttons"><?php echo CHtml::submitButton('Search'); ?></div>

<?php $this->endWidget(); ?></div>
<!-- search-form -->
