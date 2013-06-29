<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<br />  
	<div class="row">
    	<?php echo $form->labelEx($model,'newsType'); ?>       
        <?php echo $form->radioButton($model,'newsType',array('value'=>'0')) . 'English'; ?>
		<?php echo $form->radioButton($model,'newsType',array('value'=>'1', 'checked'=>'checked')) . 'Hindi (Kruti Dev 016)'; ?>		
		<?php echo $form->error($model,'newsType'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>45,'maxlength'=>45, 'class'=>'hindifont',)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100, 'class'=>'hindifont',)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>	
    
	<div class="row">
		<?php echo $form->labelEx($model,'news'); ?>
		<input type="button" id="con2hi" value="Convert KD 016 to Hindi" />
        <input type="button" id="hi2con" value="Convert Hindi to KD 016" />
		<?php $this->widget('application.extensions.editMe.ExtEditMe', array(
			'model'=>$model,
			'attribute'=>'news',
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
			
		)); ?>
		<?php echo $form->error($model,'news'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'newsDate'); ?>
		<?php echo $form->textField($model,'newsDate'); ?>
		<?php echo $form->error($model,'newsDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'newsOrder'); ?>
		<?php echo $form->textField($model,'newsOrder',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'newsOrder'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status',array('1'=>'Published', '0'=>'Un-Published')); ?> 
		<?php echo $form->error($model,'status'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('id'=>'submitMessage')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	$(document).ready(function(e) {		
        $(":radio[name=News[newsType]]").change(function(e) {
            var sel = $(this).val();
			if(sel==1){
				if(!$("#News_title").hasClass("hindifont")){
					$("#News_title").addClass("hindifont");
				}
				if(!$("#News_city").hasClass("hindifont")){
					$("#News_city").addClass("hindifont");
				}
			}else{
				if($("#News_title").hasClass("hindifont")){
					$("#News_title").removeClass("hindifont");
				}
				if($("#News_city").hasClass("hindifont")){
					$("#News_city").removeClass("hindifont");
				}
			}
        });
		$("#submitMessage").click(function(e) {
			var msgTypes = $(":radio[name=News[newsType]]:checked");
			msgTypes.each(function(index, element) {
                if($(this).val()==1){
					$("#News_title").val(convert_to_unicode($("#News_title").val()));
					$("#News_city").val(convert_to_unicode($("#News_city").val()));
				}
            });
			return true;
        });
		
		var msgMode = '<?php echo $model->newsType; ?>';
		if(msgMode=='0'){
			$(":radio[name=News[newsType]][value=0]").attr("checked",true);
			$(":radio[name=News[newsType]][value=0]").change();
		}else if(msgMode=='1'){
			$(":radio[name=News[newsType]][value=1]").attr("checked",true);
			$("#News_title").val(Convert_to_Kritidev_010($("#News_title").val()));
			$("#News_city").val(Convert_to_Kritidev_010($("#News_city").val()));
			$(":radio[name=News[newsType]][value=1]").change();
		}
		
		
		// news section for ckeditor
		$("#con2hi").click(function(e){
			var editor = CKEDITOR.instances['News_news'];			
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
		});
		
		$("#hi2con").click(function(e) {
			var editor = CKEDITOR.instances['News_news'];			
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
		
		$( "#News_newsDate" ).datepicker({
		  changeMonth: true,
		  changeYear: true,
		  yearRange: 'c-40:c'
		});
		
		$("#News_newsOrder").spinner({ culture: "fr", min: 1, numberFormat: "n" });
    });
</script>