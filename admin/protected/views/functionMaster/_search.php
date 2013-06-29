<div class="wide form"><?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="row"><?php echo $form->label($model,'pkfunctionId'); ?> <?php echo $form->textField($model,'pkfunctionId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'functionName'); ?> <?php echo $form->textField($model,'functionName',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'shortDesc'); ?> <?php echo $form->textField($model,'shortDesc',array('size'=>50,'maxlength'=>50)); ?>
</div>

<div class="row"><?php echo $form->label($model,'longDesc'); ?> <?php echo $form->textField($model,'longDesc',array('size'=>60,'maxlength'=>100)); ?>
</div>

<div class="row"><?php echo $form->label($model,'status'); ?> <?php echo $form->textField($model,'status'); ?>
</div>

<div class="row"><?php echo $form->label($model,'functionCode'); ?> <?php echo $form->textField($model,'functionCode',array('size'=>20,'maxlength'=>20)); ?>
</div>

<div class="row"><?php echo $form->label($model,'parentFunctionId'); ?>
<?php echo $form->textField($model,'parentFunctionId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row buttons"><?php echo CHtml::submitButton('Search'); ?></div>

<?php $this->endWidget(); ?></div>
<!-- search-form -->
