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
        <input type="button" id="con2hi" value="Convert KD 016 to Hindi" />
        <input type="button" id="hi2con" value="Convert Hindi to KD 016" />
		<?php $this->widget('application.extensions.editMe.ExtEditMe', array(
    'model'=>$model,
    'attribute'=>'longDesc',
    'htmlOptions'=>array('option'=>'value'),
	'toolbar'=>array(array(
        /*'Source', '-', 'Save', 'NewPage', 'DocProps', 'Preview', 'Print', '-', 'Templates',*/ 
    ), 
    
    array(
        /*'Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt'*/
    ),
    array(
        /*'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'*/
    ), 
    '/', 
	array(
        'Cut', 'Copy', 'Paste', /*'PasteText', 'PasteFromWord',*/ '-', 'Undo', 'Redo', 
    ), 
    array(
        'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat', 
    ), 
    array(
        'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'BidiLtr', 'BidiRtl', 
    ), 
    array(
        'Link', 'Unlink', 'Anchor', 
    ), 
    array(
        'Image', 'Flash', 'Table', 'Youtube', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe'
    ), 
    '/',
    array(
        'Styles', 'Format', 'Font', 'FontSize', 
    ), 
    array(
        'TextColor', 'BGColor', 
    ), 
    array(
        'Maximize', 'ShowBlocks', '-', 'About', 
    ), 
	array(

        'Source', 

    ), 
	
	)
    /*'editMeOption1'=>'value',
    'editMeOption2'=>'value',*/
    
)); ?>
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
		
		/*$("#programs-form").submit(function(e) {
			
        });*/
		
		$("#con2hi").click(function(e){
			var editor = CKEDITOR.instances['Programs_longDesc'];			
			var mySelection = editor.getSelection();
			var selectedText = "";
			if (CKEDITOR.env.ie) {
				mySelection.unlock(true);
				selectedText = mySelection.getNative().createRange().text;
			} else {
				selectedText = mySelection.getNative();
			}
			selectedText = String(selectedText);
			
			editor.insertText(convert_to_unicode(selectedText));
			
			//alert(editor.getData());
			//editor.setData(convert_to_unicode(editor.getData()));
			
		});
		
		$("#hi2con").click(function(e) {
			var editor = CKEDITOR.instances['Programs_longDesc'];			
			var mySelection = editor.getSelection();
			var selectedText = "";
			if (CKEDITOR.env.ie) {
				mySelection.unlock(true);
				selectedText = mySelection.getNative().createRange().text;
			} else {
				selectedText = mySelection.getNative();
			}
			selectedText = String(selectedText);
			
			editor.insertText(Convert_to_Kritidev_010(selectedText));		
            
        });
		
		$('#Programs_venueDate')
		.datetimepicker({
			createButton:false, 
			startDate:'01/01/1900', 
			changeMonth: true, 
			changeYear: true, 
			yearRange: '-40:+10',
			timeFormat: "hh:mm tt",
			hourGrid: 6,
			minuteGrid: 10
		});
		
    });

</script>