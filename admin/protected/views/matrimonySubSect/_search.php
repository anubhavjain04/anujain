<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pkSubSectId'); ?>
		<?php echo $form->textField($model,'pkSubSectId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkSectId'); ?>
		<?php echo $form->textField($model,'fkSectId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SubSectName'); ?>
		<?php echo $form->textField($model,'SubSectName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->