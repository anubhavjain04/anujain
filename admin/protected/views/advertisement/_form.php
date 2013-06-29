<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.js"></script>
<?php
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/Jcrop/jquery.Jcrop.min.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/Jcrop/jquery.color.js');
		Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/Jcrop/jquery.Jcrop.css');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'advertisement-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
     ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<div style="float:left;">
	<div class="row">
		<?php echo $form->labelEx($model,'CustomerName'); ?>
		<?php echo $form->textField($model,'CustomerName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'CustomerName'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'TitleName'); ?>
		<?php echo $form->textField($model,'TitleName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'TitleName'); ?>
	</div>
</div>
<div style="float: right;">
	<?php
		$imgPath = Yii::app()->request->baseUrl."/..". Yii::app()->params['addImgPath']."/no-cover.gif";									
		if($model->AddImagePath && trim($model->AddImagePath)!=""){
			$imgPath = Yii::app()->request->baseUrl."/..". Yii::app()->params['addImgPath']."/".$model->AddImagePath;
		}
	?>
	<div style="background: url(<?php echo $imgPath; ?>) center; width: 100px; height: 70px; border: solid 1px #CCCCCC;" ></div>
</div>
<div style="clear:both;"></div>
	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textField($model,'Description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'Description'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'FooterDescription'); ?>
		<?php echo $form->textField($model,'FooterDescription',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'FooterDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'WebPage'); ?>
        <?php $this->widget('application.extensions.editMe.ExtEditMe', array(
    'model'=>$model,
    'attribute'=>'WebPage',
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
		<?php //echo $form->textArea($model,'WebPage',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'WebPage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DateFrom'); ?>
		<?php echo $form->textField($model,'DateFrom'); ?>
		<?php echo $form->error($model,'DateFrom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DateTo'); ?>
		<?php echo $form->textField($model,'DateTo'); ?>
		<?php echo $form->error($model,'DateTo'); ?>
	</div>

	<div class="row">
    	<?php echo $form->labelEx($model,'Status'); ?> 
		<?php echo $form->dropDownList($model,'Status',array('1'=>'Published', '0'=>'Un-Published')); ?> 
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'WebsiteLink'); ?>
		<?php echo $form->textField($model,'WebsiteLink',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'WebsiteLink'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $previewWidth = 100; $previewHeight = 70; ?>
<div>
    <input type="hidden" id="cropID" name="cropID" value="0" />
    <input type="hidden" id="cropX" name="cropX" value="0" />
    <input type="hidden" id="cropY" name="cropY" value="0" />
    <input type="hidden" id="cropW" name="cropW" value="100" />
    <input type="hidden" id="cropH" name="cropH" value="70" />
</div>
<br /><br />
<div>
    <div id="uploadedImage" style="float: left;">
        
    </div>
	
    <div style="float: left; margin-left: 20px;">
    <h4>Preview of cropped image</h4>
    <div style="position:relative;  overflow:hidden; width:<?php echo $previewWidth;?>px; height:<?php echo $previewHeight;?>px; margin-top: 10px; margin-bottom: 10px;">
        <img id="preview" src="" style="width: 0px; height: 0px; margin-left: 0px; margin-top: 0px;">
    </div>
    </div>

</div>

<div style="clear:both;"></div>




<?php $this->endWidget(); ?>

</div><!-- form -->

<br /><br />
<form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo Yii::app()->createUrl("/advertisement/uploadImg") ?>'>
	<label for="photoimg">Upload Advertisement cover image</label>
	<input type="file" name="photoimg" id="photoimg"  />
    <input type="button" value="Cancel current crop" onclick="clearCoords();"  /> 
</form>

<script type="text/javascript">
	var d1=new Date();
	var dd = d1.getDate();      
	var mm = d1.getMonth();
	var yyyy = d1.getFullYear();	  
	if(dd.length<2){
		dd = '0'+dd;
	}
	if(mm.length<2){
		mm = '0'+mm;
	}

	function updateCoords(c)
	{
		$('#cropID').val('1');
		jQuery('#cropX').val(c.x);
		jQuery('#cropY').val(c.y);
		jQuery('#cropW').val(c.w);
		jQuery('#cropH').val(c.h);
		var rx = <?php echo $previewWidth; ?> / c.w;
		var ry = <?php echo $previewHeight; ?> / c.h;
		if ($('#preview') != undefined) {
			$('#preview').css({
				width: Math.round(rx * $('#prewImg').width() ) + 'px',
				height: Math.round(ry * $('#prewImg').height()) + 'px',
				marginLeft: '-' + Math.round(rx * c.x) + 'px',
				marginTop: '-' + Math.round(ry * c.y) + 'px'
			}); 
		}
	};
	
	function clearCoords()
    {
      $('#cropID').val('0');
	  $('#preview').css({
			width: '0px',
			height: '0px',
			marginLeft: '0px',
			marginTop: '0px'
		});
    };
	
	$(document).ready(function(){
		var addDateFrom = $.trim($('#Advertisement_DateFrom').val());
		var addDateTo = $.trim($('#Advertisement_DateTo').val());
		if(addDateFrom == null || addDateFrom == ""){
			$('#Advertisement_DateFrom').val(mm+"/"+dd+"/"+yyyy);
		}
		if(addDateTo == null || addDateTo == ""){
			$('#Advertisement_DateTo').val(mm+"/"+dd+"/"+yyyy);
		}
		$('#Advertisement_DateFrom, #Advertisement_DateTo')
		.datepicker({createButton:false, startDate:'01/01/1900'})
		.bind('click',
			function()
			{
				$(this).dpDisplay();
				this.blur();
				return false;
			}
		);
		
		$('#photoimg').live('change', function(){ 
			$("#uploadedImage").html('');
			$("#uploadedImage").html('<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/loading.gif" alt="Uploading...."/>');
			$("#imageform").ajaxForm({
				target: '#uploadedImage',
				success: function(){
					$("#preview").attr("src",$("#prewImg").attr("src"));
					$("#cropID").val(1);
					$('#uploadedImage').find("#prewImg").Jcrop({
						onChange:   updateCoords,
						onSelect:   updateCoords,
						aspectRatio: 1.4286,
						boxWidth: 500,
						boxHeight: 500,
						bgFade: true,
          				bgOpacity: .6,
          				setSelect: [ 0, 0, 100, 140 ],
						onRelease:  clearCoords
					  });
				}
			}).submit();
		
		});
	});
</script>