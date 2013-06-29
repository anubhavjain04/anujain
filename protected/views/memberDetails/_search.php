<div class="wide form"><?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="row"><?php echo $form->label($model,'pkMemberId'); ?> <?php echo $form->textField($model,'pkMemberId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'FName'); ?> <?php echo $form->textField($model,'FName',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'MName'); ?> <?php echo $form->textField($model,'MName',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'LName'); ?> <?php echo $form->textField($model,'LName',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'DOB'); ?> <?php echo $form->textField($model,'DOB'); ?>
</div>

<div class="row"><?php echo $form->label($model,'Sex'); ?> <?php echo $form->textField($model,'Sex',array('size'=>6,'maxlength'=>6)); ?>
</div>

<div class="row"><?php echo $form->label($model,'MaritalStatus'); ?> <?php echo $form->textField($model,'MaritalStatus'); ?>
</div>

<div class="row"><?php echo $form->label($model,'SpouseName'); ?> <?php echo $form->textField($model,'SpouseName',array('size'=>60,'maxlength'=>100)); ?>
</div>

<div class="row"><?php echo $form->label($model,'MarriageDate'); ?> <?php echo $form->textField($model,'MarriageDate'); ?>
</div>

<div class="row"><?php echo $form->label($model,'HAddress1'); ?> <?php echo $form->textField($model,'HAddress1',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'HAddress2'); ?> <?php echo $form->textField($model,'HAddress2',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'HAddress3'); ?> <?php echo $form->textField($model,'HAddress3',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'HContactNo'); ?> <?php echo $form->textField($model,'HContactNo',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'OccType'); ?> <?php echo $form->textField($model,'OccType'); ?>
</div>

<div class="row"><?php echo $form->label($model,'Occupation'); ?> <?php echo $form->textField($model,'Occupation',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'OAddress1'); ?> <?php echo $form->textField($model,'OAddress1',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'OAddress2'); ?> <?php echo $form->textField($model,'OAddress2',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'OAddress3'); ?> <?php echo $form->textField($model,'OAddress3',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'FatherName'); ?> <?php echo $form->textField($model,'FatherName',array('size'=>60,'maxlength'=>100)); ?>
</div>

<div class="row"><?php echo $form->label($model,'MotherName'); ?> <?php echo $form->textField($model,'MotherName',array('size'=>60,'maxlength'=>100)); ?>
</div>

<div class="row"><?php echo $form->label($model,'City'); ?> <?php echo $form->textField($model,'City',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'District'); ?> <?php echo $form->textField($model,'District',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'State'); ?> <?php echo $form->textField($model,'State',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'Country'); ?> <?php echo $form->textField($model,'Country',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'OccContactNo'); ?> <?php echo $form->textField($model,'OccContactNo',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'PersonalNo'); ?> <?php echo $form->textField($model,'PersonalNo',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'MemberCode'); ?> <?php echo $form->textField($model,'MemberCode',array('size'=>45,'maxlength'=>45)); ?>
</div>

<div class="row"><?php echo $form->label($model,'fkLoginId'); ?> <?php echo $form->textField($model,'fkLoginId',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="row"><?php echo $form->label($model,'EmailId'); ?> <?php echo $form->textField($model,'EmailId',array('size'=>50,'maxlength'=>50)); ?>
</div>

<div class="row buttons"><?php echo CHtml::submitButton('Search'); ?></div>

<?php $this->endWidget(); ?></div>
<!-- search-form -->
