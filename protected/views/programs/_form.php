<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'programs-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'programName'); ?>
		<?php echo $form->textField($model,'programName',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'programName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shortDesc'); ?>
		<?php echo $form->textField($model,'shortDesc',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'shortDesc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'longDesc'); ?>
		<?php echo $form->textArea($model,'longDesc',array('rows'=>8, 'cols'=>56)); ?>
		<?php echo $form->error($model,'longDesc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'venuePlace'); ?>
		<?php echo $form->textField($model,'venuePlace',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'venuePlace'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'venueDate'); ?>
		<?php echo $form->textField($model,'venueDate'); ?>
		<?php echo $form->error($model,'venueDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fkLevelCode'); ?>
        <?php $allLevels = CHtml::listData(LevelMaster::model()->findAll(),'LevelCode','LevelName'); ?>
		<?php echo $form->dropDownList($model,'fkLevelCode',$allLevels,array('prompt'=>'[Select Level]')); ?>        
		<?php echo $form->error($model,'fkLevelCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fkLevelTableId'); ?>
        <?php $levelTableData = array(); ?>
		<?php echo $form->dropDownList($model,'fkLevelTableId',$levelTableData,array('prompt'=>'[Select Level Records]')); ?>
        <?php //echo CHtml::dropDownList('fkLevelTableId','', array(),array('prompt'=>'[Select Level Records]')); ?>
		<?php echo $form->error($model,'fkLevelTableId'); ?>
	</div>

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
	var subLevelId = '<?php echo $model->fkLevelTableId ?>';
	function getLevelData(lCode){
		if(lCode!=""){
			$.ajax({
				type: "POST",	
				url: '<?php echo Yii::app()->homeUrl.'/programs/levelRecords';?>',
				data: { lCode: lCode},
				success: function(data) {
					$("#Programs_fkLevelTableId option:not(:eq(0))").remove();
					$("#Programs_fkLevelTableId").append(data);
					$("#Programs_fkLevelTableId").val(subLevelId);
					
				}
			});
		}else{
			$("#Programs_fkLevelTableId option:not(:eq(0))").remove();
		}
	}
	$(document).ready(function(e) {
		var levelCode = $("#Programs_fkLevelCode");
        getLevelData($.trim(levelCode.val()));
		
		levelCode.change(function(e) {
            getLevelData($.trim($(this).val()));
        });
		
    });
</script>