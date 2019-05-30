<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shortDesc'); ?>
		<?php echo $form->textField($model,'shortDesc',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'shortDesc'); ?>
	</div>

	<div class="row">
    	<?php echo $form->labelEx($model,'type'); ?> 
		<?php echo $form->dropDownList($model,'type',array('1'=>'Video', '2'=>'Audio', '3'=>'Image')); ?> 
		<?php echo $form->error($model,'type'); ?>
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

	<div id="folderPathElement" class="row">
		<?php echo $form->labelEx($model,'folderPath'); ?>
		<?php echo $form->textField($model,'folderPath',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'folderPath'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date', array('autocomplete'=>'off')); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
    	<?php echo $form->labelEx($model,'status'); ?> 
		<?php echo $form->dropDownList($model,'status',array('1'=>'Published', '0'=>'Un-Published')); ?> 
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
	function showHideFolderPathElement() {
		var type = $('#Gallery_type').val();

		if (type === '3') {
			$("#folderPathElement").show();
		} else {
			$("#Gallery_folderPath").val('');
			$("#folderPathElement").hide();
		}
	}

	$(document).ready(function(e) {		
		$("#con2hi").click(function(e){
			var editor = CKEDITOR.instances['Gallery_longDesc'];			
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
			var editor = CKEDITOR.instances['Gallery_longDesc'];			
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
		
		$('#Gallery_date')
		.datepicker({
			startDate:'01/01/1900', 
			changeMonth: true, 
			changeYear: true, 
			yearRange: '-40:+10'
		});

		showHideFolderPathElement();
		$('#Gallery_type').change(function() {
			showHideFolderPathElement();
		});
    });

</script>