<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'matrimonial-package-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PackageName'); ?>
		<?php echo $form->textField($model,'PackageName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'PackageName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PackageType'); ?>
        <?php $packageTypes = array('MONTHLY'=>'Monthly','HALFYEAR'=>'Half Yearly','YEAR'=>'Yearly',); ?>
		<?php echo $form->dropDownList($model,'PackageType',$packageTypes,array('prompt'=>'[Select PackageType]')); ?>
		<?php echo $form->error($model,'PackageType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cost'); ?>
		<?php echo $form->textField($model,'Cost',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PackageDate'); ?>
		<?php echo $form->textField($model,'PackageDate'); ?>
		<?php echo $form->error($model,'PackageDate'); ?>
	</div>
		
	<?php echo $form->hiddenField($model,'Days',array('size'=>10,'maxlength'=>10)); ?>
    
    <div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->dropDownList($model,'Status',array('1'=>'Published', '0'=>'Un-Published')); ?> 
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#MatrimonialPackage_PackageDate')
		.datepicker({createButton:false, startDate:'01/01/1900'})
		.bind('click',
			function()
			{
				$(this).dpDisplay();
				this.blur();
				return false;
			}
		);
	});
</script>