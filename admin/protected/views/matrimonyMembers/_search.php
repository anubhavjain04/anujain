<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pkMemberId'); ?>
		<?php echo $form->textField($model,'pkMemberId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MemberName'); ?>
		<?php echo $form->textField($model,'MemberName',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Sex'); ?>
		<?php echo $form->textField($model,'Sex'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DOB'); ?>
		<?php echo $form->textField($model,'DOB'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MaritalStatus'); ?>
		<?php echo $form->textField($model,'MaritalStatus',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Childrens'); ?>
		<?php echo $form->textField($model,'Childrens',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Height'); ?>
		<?php echo $form->textField($model,'Height',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkSect'); ?>
		<?php echo $form->textField($model,'fkSect',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkSubSect'); ?>
		<?php echo $form->textField($model,'fkSubSect',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkCaste'); ?>
		<?php echo $form->textField($model,'fkCaste',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'OtherCaste'); ?>
		<?php echo $form->textField($model,'OtherCaste',array('size'=>45,'maxlength'=>45)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'Gotra'); ?>
		<?php echo $form->textField($model,'Gotra',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkMotherTongue'); ?>
		<?php echo $form->textField($model,'fkMotherTongue',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkCountryLivingIn'); ?>
		<?php echo $form->textField($model,'fkCountryLivingIn',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ContactNo'); ?>
		<?php echo $form->textField($model,'ContactNo',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MemberPhoto'); ?>
		<?php echo $form->textField($model,'MemberPhoto',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PhysicalStatus'); ?>
		<?php echo $form->textField($model,'PhysicalStatus'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkResidingState'); ?>
		<?php echo $form->textField($model,'fkResidingState',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ResidingCity'); ?>
		<?php echo $form->textField($model,'ResidingCity',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MarryInSameSubSect'); ?>
		<?php echo $form->textField($model,'MarryInSameSubSect'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkEducation'); ?>
		<?php echo $form->textField($model,'fkEducation',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EmployedIn'); ?>
		<?php echo $form->textField($model,'EmployedIn',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Occupation'); ?>
		<?php echo $form->textField($model,'Occupation',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IncomeAnnual'); ?>
		<?php echo $form->textField($model,'IncomeAnnual',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AboutMe'); ?>
		<?php echo $form->textField($model,'AboutMe',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AboutMyPartner'); ?>
		<?php echo $form->textField($model,'AboutMyPartner',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HomeAddress'); ?>
		<?php echo $form->textField($model,'HomeAddress',array('size'=>150,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WorkingAddress'); ?>
		<?php echo $form->textField($model,'WorkingAddress',array('size'=>150,'maxlength'=>150)); ?>
	</div>	

	<div class="row">
		<?php echo $form->label($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status'); ?>
		<?php echo $form->textField($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ActivationCode'); ?>
		<?php echo $form->textField($model,'ActivationCode',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fkLoginId'); ?>
		<?php echo $form->textField($model,'fkLoginId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MemberCode'); ?>
		<?php echo $form->textField($model,'MemberCode',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->