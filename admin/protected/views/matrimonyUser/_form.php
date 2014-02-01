<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'matrimony-user-form',
	'enableAjaxValidation'=>false,
	'action' => $model->isNewRecord ? Yii::app()->createUrl("/matrimonyUser/create") : Yii::app()->createUrl("/matrimonyUser/update/id/".$model->pkUserId), 
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<dl>
			<dt><?php echo $form->labelEx($model,'EmailID'); ?></dt>
			<dd>
				<?php echo $form->textField($model,'EmailID',array('size'=>60,'maxlength'=>100)); ?>
				<?php echo $form->error($model,'EmailID'); ?>
			</dd>	
		</dl>
	</div>

	<div class="row">
		<dl>
			<dt><?php echo $form->labelEx($model,'Password'); ?></dt>
			<dd>
				<?php echo $form->passwordField($model,'Password',array('size'=>45,'maxlength'=>45)); ?>
				<?php echo $form->error($model,'Password'); ?>
			</dd>
		</dl>
	</div>
		
	<div class="row">
		<dl>
			<dt><?php echo $form->labelEx($model,'Status'); ?></dt>
			<dd>
				<?php echo $form->dropDownList($model,'Status',array('1'=>'Published', '0'=>'Un-Published')); ?>
				<?php echo $form->error($model,'Status'); ?>
            </dd>    
        </dl>
	</div>
	
	<?php echo $form->hiddenField($memberModel,'pkMemberId');  ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

<div class="row">
	<dl>
		<dt>Random String : </dt>
		<dd>
			<?php echo $randomString;  ?>
            </dd>    
        </dl>
</div>

</div><!-- form -->