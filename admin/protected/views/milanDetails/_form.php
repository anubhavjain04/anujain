<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'milan-details-form',
        'enableAjaxValidation'=>false,
    )); ?>
    
    <p class="note">Fields with <span class="required">*</span> are
    required.</p>
    
    <?php echo $form->errorSummary($model); ?>
    
     <div class="row">
		<?php echo $form->labelEx($model,'fkBranchId'); ?>
        <?php 
			$branchArray = array();
			if(isset($allBranches)){
				$branchArray = $allBranches;
			}
			 ?>
		<?php echo $form->dropDownList($model,'fkBranchId',$branchArray,array('prompt'=>'[Select Branch]')); ?>        
		<?php echo $form->error($model,'fkBranchId'); ?>
	</div>
    
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
    
    <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
    
    <?php $this->endWidget(); ?>
</div>
<!-- form -->
