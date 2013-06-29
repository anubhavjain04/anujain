<div class="form"><?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-post-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are
required.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row">
	<?php echo $form->labelEx($model,'fkMemberId'); ?>
    <?php 
        $memberArray = array();
        if(isset($allMembers)){
            $memberArray = $allMembers;
        }
         ?>
    <?php echo $form->dropDownList($model,'fkMemberId',$memberArray,array('prompt'=>'[Select Member]')); ?>        
    <?php echo $form->error($model,'fkMemberId'); ?>
</div>	
<div class="row">
    <label for="levelCode">Level Name</label>
    <?php $levelArray =  CHtml::listData(LevelMaster::model()->findAll(),'LevelCode','LevelName'); ?>
    <?php //echo $form->dropDownList($model,'fkLevelTableId',$levelTableData,array('prompt'=>'[Select Level Records]')); ?>
    <?php echo CHtml::dropDownList('levelCode','', $levelArray,array('prompt'=>'[Select Level for Post]')); ?>
    <?php //echo $form->error($model,'fkLevelTableId'); ?>
</div>

<?php  /*
<div class="row"><?php echo $form->labelEx($model,'fkPostId'); ?> <?php
$postArray = CHtml::listData(PostMaster::model()->findAll(),'pkPostId','PostName');
echo $form->dropDownList($model,'fkPostId',$postArray,array('empty'=>'Select Post','id'=>'pkPostId'));
?> <?php echo $form->error($model,'fkPostId'); ?></div>
*/
?>

<div class="row">
	<?php echo $form->labelEx($model,'fkPostId'); ?>
    <?php $postArray = array(); ?>
    <?php echo $form->dropDownList($model,'fkPostId',$postArray,array('prompt'=>'[Select Post]')); ?>
    <?php echo $form->error($model,'fkPostId'); ?>
</div>

<div class="row"><?php echo $form->labelEx($model,'Status'); ?> <?php
echo $form->dropDownList($model,'Status',array('1'=>'Published', '0'=>'Un-Published'));
?> <?php echo $form->error($model,'Status'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'AssignDate'); ?> <?php echo $form->textField($model,'AssignDate'); ?>
<?php echo $form->error($model,'AssignDate'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'TillDate'); ?> <?php echo $form->textField($model,'TillDate'); ?>
<?php echo $form->error($model,'TillDate'); ?></div>

<div class="row"><?php echo $form->labelEx($model,'Order'); ?> <?php echo $form->textField($model,'Order'); ?>
<?php echo $form->error($model,'Order'); ?></div>

<div class="row buttons"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?></div>

<script type="text/javascript">
	var subLevelId = '<?php echo $model->fkPostId ?>';
	var level = '<?php echo $model->fkPost!=null ? $model->fkPost->LevelCode : ""?>';
	function getLevelPosts(lCode){
		if(lCode!=""){
			$.ajax({
				type: "POST",	
				url: '<?php echo Yii::app()->homeUrl.'/memberPost/getLevelPosts';?>',
				data: { lCode: lCode},
				success: function(data) {
					$("#MemberPost_fkPostId option:not(:eq(0))").remove();
					$("#MemberPost_fkPostId").append(data);
					$("#MemberPost_fkPostId").val(subLevelId);
					
				}
			});
		}else{
			$("#MemberPost_fkPostId option:not(:eq(0))").remove();
		}
	}
	$(document).ready(function(e) {
		var levelCode = $("#levelCode");
		if($.trim(level)!=""){
			levelCode.val($.trim(level));
			getLevelPosts($.trim(levelCode.val()));
		}
		
		levelCode.change(function(e) {
            getLevelPosts($.trim($(this).val()));
        });
		
    });

	$(document).ready(function(){
		if($.trim($('#MemberPost_AssignDate').val())==""){
			//$('#MemberPost_AssignDate').val(new Date(1900,00,01).asString());
			$('#MemberPost_AssignDate').val(new Date().asString());
		}
		$('#MemberPost_AssignDate, #MemberPost_TillDate')
		.datepicker({createButton:false, startDate:'01/01/1900'})
		.bind('click',
			function()
			{
				$(this).dpDisplay();
				this.blur();
				return false;
			}
		);		
		
		$( "#memberSearch" ).autocomplete({
			source: "<?php echo Yii::app()->homeUrl.'/memberPost/searchMembers';?>",
			minLength: 2,
			select: function( event, ui ) {
				alert( ui.item ?
					"Selected: " + ui.item.value + " aka " + ui.item.id :
					"Nothing selected, input was " + this.value );
			}
		});
		
		/*$("#member-post-form").submit(function(e) {
            alert($("#MemberPost_AssignDate").val());
			return false;
        });*/
		
		
		//$('#formdate').dpSetOffset(23, -70);
		//$('.timepicker').ptTimeSelect({isTopRight: true});
	});
</script>
<!-- form -->
