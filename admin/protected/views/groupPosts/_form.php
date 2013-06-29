<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-posts-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'fkGroupId'); ?> 
        <?php $groupArray = CHtml::listData(GroupMaster::model()->findAll(),'pkGroupId','GroupName'); 
            echo $form->dropDownList($model,'fkGroupId',$groupArray,array('id'=>'pkGroupId')); 
        ?> 
        <?php echo $form->error($model,'LevelCode'); ?>
    </div>
    
    <div class="row">
        <label for="levelCode">Level Name</label>
        <?php $levelArray =  CHtml::listData(LevelMaster::model()->findAll(),'LevelCode','LevelName'); ?>
        <?php echo CHtml::dropDownList('levelCode','', $levelArray,array('prompt'=>'[Select Level for Post]')); ?>
    </div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'fkPostId'); ?>
        <?php $postArray = array(); ?>
        <?php echo $form->dropDownList($model,'fkPostId',$postArray,array('prompt'=>'[Select Post]')); ?>
        <?php echo $form->error($model,'fkPostId'); ?>
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

</div>

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
					$("#GroupPosts_fkPostId option:not(:eq(0))").remove();
					$("#GroupPosts_fkPostId").append(data);
					$("#GroupPosts_fkPostId").val(subLevelId);
					
				}
			});
		}else{
			$("#GroupPosts_fkPostId option:not(:eq(0))").remove();
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
</script>

<!-- form -->