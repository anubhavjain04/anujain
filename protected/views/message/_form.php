<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'message-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<br />    
    <div class="row">
		<?php echo $form->labelEx($model,'MessageType'); ?>       
        <?php echo $form->radioButton($model,'MessageType',array('value'=>'0')) . 'English'; ?>
		<?php echo $form->radioButton($model,'MessageType',array('value'=>'1', 'checked'=>'checked')) . 'Hindi (Kruti Dev 016)'; ?>		
		<?php echo $form->error($model,'MessageType'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'Message'); ?>
        <?php echo $form->textArea($model, 'Message',array('style'=>'width: 500px; height: 110px;', 'maxlength'=>500, 'class'=>'hindifont',)); ?>
		<?php echo $form->error($model,'Message'); ?>
	</div>
    

	<div class="row">
		<?php echo $form->labelEx($model,'LineNo'); ?>
        <?php $lineNo = array('1'=>'Line 1','2'=>'Line 2',); ?>
		<?php echo $form->dropDownList($model,'LineNo',$lineNo,array('prompt'=>'[Select Line]')); ?>
		<?php echo $form->error($model,'LineNo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MessageOrder'); ?>
		<?php echo $form->textField($model,'MessageOrder'); ?>
		<?php echo $form->error($model,'MessageOrder'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->dropDownList($model,'Status',array('1'=>'Published', '0'=>'Un-Published')); ?> 
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('id'=>'submitMessage')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	$(document).ready(function(e) {		
        $(":radio[name=Message[MessageType]]").change(function(e) {
            var sel = $(this).val();
			if(sel==1){
				if(!$("#Message_Message").hasClass("hindifont")){
					$("#Message_Message").addClass("hindifont");
				}
			}else{
				if($("#Message_Message").hasClass("hindifont")){
					$("#Message_Message").removeClass("hindifont");
				}
			}
        });
		$("#submitMessage").click(function(e) {
			var msgTypes = $(":radio[name=Message[MessageType]]");
			msgTypes.each(function(index, element) {
                if($(this).attr("checked") && $(this).val()==1){
					$("#Message_Message").val(convert_to_unicode($("#Message_Message").val()));
				}
            });
			return true;
        });
		
		var msgMode = '<?php echo $model->MessageType; ?>';
		if(msgMode=='0'){
			$(":radio[name=Message[MessageType]][value=0]").attr("checked",true);
			$(":radio[name=Message[MessageType]][value=0]").change();
		}else if(msgMode=='1'){
			$(":radio[name=Message[MessageType]][value=1]").attr("checked",true);
			$("#Message_Message").val(Convert_to_Kritidev_010($("#Message_Message").val()));
			$(":radio[name=Message[MessageType]][value=1]").change();
		}
    });
</script>