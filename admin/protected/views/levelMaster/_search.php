<div class="wide form"><?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="row"><?php echo $form->label($model,'pkLevel'); ?> <?php echo $form->textField($model,'pkLevel',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'LevelName'); ?> <?php echo $form->textField($model,'LevelName',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'LevelCode'); ?> <?php echo $form->textField($model,'LevelCode',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'LevelOrder'); ?> <?php echo $form->textField($model,'LevelOrder',array('size'=>10,'maxlength'=>10)); ?>
</div>


<div class="row buttons"><?php echo CHtml::submitButton('Search'); ?></div>

<?php $this->endWidget(); ?></div>
<!-- search-form -->
