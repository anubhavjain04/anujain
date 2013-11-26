<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.js"></script>
<?php
	Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/Jcrop/jquery.Jcrop.min.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/Jcrop/jquery.color.js');
		Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/Jcrop/jquery.Jcrop.css');
?>		

<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-details-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
     ),
)); ?>

<p class="note">Fields with <span class="required">*</span> are
required.</p>

<?php echo $form->errorSummary($model); ?>

<div style="float:left;">
    <div class="row"><?php echo $form->labelEx($model,'MemberName'); ?> <?php echo $form->textField($model,'MemberName',array('size'=>100,'maxlength'=>100)); ?>
    <?php echo $form->error($model,'MemberName'); ?></div>
    
    <div class="row"><?php echo $form->labelEx($model,'DOB'); ?> <?php echo $form->textField($model,'DOB'); ?>
	<?php echo $form->error($model,'DOB'); ?></div>
    
    <div class="row"><?php echo $form->labelEx($model,'Sex'); ?> <?php 
    echo $form->dropDownList($model,'Sex',array('MALE'=>'Male', 'FEMALE'=>'Female'));
    ?> <?php echo $form->error($model,'Sex'); ?></div>


</div>
<div style="float: right;">
	<?php
		$imgPath = Yii::app()->params['bjmURL']."/images/blank_user.png";										
		if($model->PhotoPath && trim($model->PhotoPath)!=""){
			$imgPath = Yii::app()->params['bjmURL'].Yii::app()->params['memberPotoPath']."/".$model->PhotoPath;
		}
	?>
	<div style="background: url(<?php echo $imgPath; ?>) center; width: 100px; height: 140px; border: solid 1px #CCCCCC;" ></div>
</div>
<div style="clear:both;"></div>

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
echo $form->dropDownList($model,'fkLoginId',$loginMaster,array('id'=>'fkLoginId', 'prompt'=>'[Select User]'));
?> <?php echo $form->error($model,'fkLoginId'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'EmailId'); ?> <?php echo $form->textField($model,'EmailId',array('size'=>50,'maxlength'=>50)); ?>
<?php echo $form->error($model,'EmailId'); ?></div>

<div class="row">
	<?php 
		$criteria=new CDbCriteria;
		$criteria->select='t.pkZoneId,Concat("Zone-",t.ZoneCode) as ZoneCode';  // only select the 'title' column
		//$criteria->condition='postID=:postID';
		//$criteria->params=array(':postID'=>10);
		$criteria->order = '(ZoneCode*1) ASC';
	?>
    <label for="zoneId">Zone</label>
    <?php $zoneArray =  CHtml::listData(ZoneMaster::model()->findAll($criteria),'pkZoneId','ZoneCode'); ?>
    <?php echo CHtml::dropDownList('zoneId','', $zoneArray,array('prompt'=>'[Select Zone]','id'=>'zoneId')); ?>
</div>

<div class="row">
	<label for="branchId">Branch</label>
    <?php $branchArray = array(); ?>
    <?php echo CHtml::dropDownList('branchId','', $branchArray,array('prompt'=>'[Select Branch]','id'=>'branchId')); ?>
</div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>
<?php $previewWidth = 100; $previewHeight = 140; ?>
<div>
    <input type="hidden" id="cropID" name="cropID" value="0" />
    <input type="hidden" id="cropX" name="cropX" value="0" />
    <input type="hidden" id="cropY" name="cropY" value="0" />
    <input type="hidden" id="cropW" name="cropW" value="100" />
    <input type="hidden" id="cropH" name="cropH" value="100" />
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



<?php $this->endWidget(); ?></div>

<br /><br />
<form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo Yii::app()->createUrl("/memberDetails/uploadImg") ?>'>
	<label for="photoimg">Upload Member Photo</label>
	<input type="file" name="photoimg" id="photoimg"  />
    <input type="button" value="Cancel current crop" onclick="clearCoords();"  /> 
</form>





<script type="text/javascript">

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
    }
	
	$(document).ready(function(){
		$('#MemberDetails_DOB, #MemberDetails_MarriageDate')
		.datepicker({startDate:'01/01/1900', changeMonth: true, changeYear: true, yearRange: '-70:+0'});
		
		
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
						aspectRatio: .714,
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
		
		//$('#formdate').dpSetOffset(23, -70);
		//$('.timepicker').ptTimeSelect({isTopRight: true});
	});
	
	<?php 
		$zone = "";
		$branch = "";
		if(isset($branchModel) && $branchModel !=null){
			$branch = $branchModel->pkBranchId;
			$zone = $branchModel->fkZoneId;
		}
	?>
	var zone = '<?php echo $zone; ?>';
	var branch = '<?php echo $branch; ?>';
	function getZoneBranches(zoneId){
		if(zoneId!=""){
			$.ajax({
				type: "POST",	
				url: '<?php echo Yii::app()->homeUrl.'/memberDetails/getZoneBranches';?>',
				data: { zoneId: zoneId},
				success: function(data) {
					$("#branchId option:not(:eq(0))").remove();
					$("#branchId").append(data);
					$("#branchId").val(branch);
					
				}
			});
		}else{
			$("#branchId option:not(:eq(0))").remove();
		}
	}
	$(document).ready(function(e) {
		var zoneId = $("#zoneId");
		if($.trim(zone)!=""){
			zoneId.val($.trim(zone));
			getZoneBranches($.trim(zoneId.val()));
		}
		
		zoneId.change(function(e) {
            getZoneBranches($.trim($(this).val()));
        });
		
    });
	
</script>
<!-- form -->
