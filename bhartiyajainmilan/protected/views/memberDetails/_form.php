<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-details-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are
required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row"><?php echo $form->labelEx($model,'FName'); ?> <?php echo $form->textField($model,'FName',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'FName'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'MName'); ?> <?php echo $form->textField($model,'MName',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'MName'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'LName'); ?> <?php echo $form->textField($model,'LName',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'LName'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'DOB'); ?> <?php echo $form->textField($model,'DOB'); ?>
<?php echo $form->error($model,'DOB'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'Sex'); ?> <?php 
echo $form->dropDownList($model,'Sex',array('MALE'=>'Male', 'FEMALE'=>'Female'));
?> <?php echo $form->error($model,'Sex'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'MaritalStatus'); ?> <?php 
echo $form->dropDownList($model,'MaritalStatus',array('0'=>'Un-Married', '1'=>'Married'));
?> <?php echo $form->error($model,'MaritalStatus'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'SpouseName'); ?> <?php echo $form->textField($model,'SpouseName',array('size'=>60,'maxlength'=>100)); ?>
<?php echo $form->error($model,'SpouseName'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'MarriageDate'); ?> <?php echo $form->textField($model,'MarriageDate'); ?>
<?php echo $form->error($model,'MarriageDate'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'HAddress1'); ?> <?php echo $form->textField($model,'HAddress1',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'HAddress1'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'HAddress2'); ?> <?php echo $form->textField($model,'HAddress2',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'HAddress2'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'HAddress3'); ?> <?php echo $form->textField($model,'HAddress3',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'HAddress3'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'HContactNo'); ?> <?php echo $form->textField($model,'HContactNo',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'HContactNo'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'OccType'); ?> <?php echo $form->textField($model,'OccType'); ?>
<?php echo $form->error($model,'OccType'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'Occupation'); ?> <?php echo $form->textField($model,'Occupation',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'Occupation'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'OAddress1'); ?> <?php echo $form->textField($model,'OAddress1',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'OAddress1'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'OAddress2'); ?> <?php echo $form->textField($model,'OAddress2',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'OAddress2'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'OAddress3'); ?> <?php echo $form->textField($model,'OAddress3',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'OAddress3'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'FatherName'); ?> <?php echo $form->textField($model,'FatherName',array('size'=>60,'maxlength'=>100)); ?>
<?php echo $form->error($model,'FatherName'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'MotherName'); ?> <?php echo $form->textField($model,'MotherName',array('size'=>60,'maxlength'=>100)); ?>
<?php echo $form->error($model,'MotherName'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'City'); ?> <?php echo $form->textField($model,'City',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'City'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'District'); ?> <?php echo $form->textField($model,'District',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'District'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'State'); ?> <?php echo $form->textField($model,'State',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'State'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'Country'); ?> <?php echo $form->textField($model,'Country',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'Country'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'OccContactNo'); ?> <?php echo $form->textField($model,'OccContactNo',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'OccContactNo'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'PersonalNo'); ?> <?php echo $form->textField($model,'PersonalNo',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'PersonalNo'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'MemberCode'); ?> <?php echo $form->textField($model,'MemberCode',array('size'=>45,'maxlength'=>45)); ?>
<?php echo $form->error($model,'MemberCode'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'fkLoginId'); ?> <?php
$loginMaster = CHtml::listData(LoginMaster::model()->findAll(),'pkLoginId','UserId');
echo $form->dropDownList($model,'fkLoginId',$loginMaster,array('id'=>'fkLoginId'));
?> <?php echo $form->error($model,'fkLoginId'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'EmailId'); ?> <?php echo $form->textField($model,'EmailId',array('size'=>50,'maxlength'=>50)); ?>
<?php echo $form->error($model,'EmailId'); ?></div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?></div>
<!-- form -->
