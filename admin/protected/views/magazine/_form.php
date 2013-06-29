<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'magazine-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data',),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'MagazineName'); ?>
		<?php echo $form->textField($model,'MagazineName',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'MagazineName'); ?>
	</div>    
    
	<div class="row">
		<?php echo $form->labelEx($model,'fkMagTypeId'); ?>
        <?php 
			$criteria=new CDbCriteria;
			$criteria->order = "MagazineType";
		?>
        
         <select id="Magazine_fkMagTypeId" name="Magazine[fkMagTypeId]">
         	<option value="" typecode="">[Select Magazine Type]</option>
             <?php 
				$magzineTypeArray = MagazineType::model()->findAll($criteria);
				$fkMagTypeId = '';
				if(isset($model->fkMagTypeId)){
					$fkMagTypeId = $model->fkMagTypeId;
				}
				foreach($magzineTypeArray as $item){
					$attrArray = array();
					if($fkMagTypeId==$item['pkMagTypeId']){
						$attrArray = array('value'=>$item['pkMagTypeId'],'typecode'=>$item['TypeCode'],'selected'=>'selected');
					}else{
						$attrArray = array('value'=>$item['pkMagTypeId'],'typecode'=>$item['TypeCode']);
					}
					echo CHtml::tag('option', $attrArray,  $item['MagazineType']);
				}
		 	?>
         </select>
		<?php echo $form->error($model,'fkMagTypeId'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'Type'); ?>
        <?php 
			$criteria1=new CDbCriteria;
			$criteria1->select = ' Concat("Zone-",t.ZoneCode) as ZoneName,ZoneCode';
			$criteria1->order = " (ZoneCode*1) ";
		
		?>
        <?php $zoneArray =  CHtml::listData(ZoneMaster::model()->findAll($criteria1),'ZoneCode','ZoneName'); ?>
		<?php echo $form->dropDownList($model,'Type',$zoneArray, array('prompt'=>'[Select Zone]','disabled'=>'disabled')); ?>
		<?php echo $form->error($model,'Type'); ?>
	</div>
    
    <div class="row" style="margin-top: 5px; margin-bottom: 5px;">
    	Day
        <?php 
			$day_array = array();
			for($i=1; $i<32; $i++){
				$value = '';
				if($i<10){
					$value = '0'.$i;
				}else{
					$value = $i;
				}
				$day_array[$value] = $value;
			}
		?>
        <?php echo CHtml::dropDownList('day','01', $day_array,array('prompt'=>'[Select Day]', 'id'=>'day')); ?>
        
        Month
        <?php 
			$month_array = array('01'=>'January','02'=>'February','03'=>'March','04'=>'April','05'=>'May','06'=>'June','07'=>'July','08'=>'August','09'=>'September','10'=>'October','11'=>'November','12'=>'December');
			
		?>
        <?php echo CHtml::dropDownList('month','01', $month_array,array('prompt'=>'[Select Month]', 'id'=>'month')); ?>
        
        Year
        <?php 
		$curr_year = intval(date('Y',time()))+1;
			$year_array = array();
			for($i=2000; $i< $curr_year; $i++){
				$year_array[$i] = $i;
			}
		?>
        <?php echo CHtml::dropDownList('year','', $year_array,array('prompt'=>'[Select Year]', 'id'=>'year')); ?>
        
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'Upload pdf file'); ?>
		<?php echo $form->fileField($model,'Path'); ?>
		<?php echo $form->error($model,'Path'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->dropDownList($model,'Status',array('1'=>'Published', '0'=>'Un-Published')); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>    

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('id'=>'submitData')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
if(isset($model->Path)) {
?>
<br /><br />
<iframe style="width: 100%; height: 750px; border: 1px solid #CCC; padding:3px;" src="https://docs.google.com/viewer?url=http://<?php echo $_SERVER['SERVER_NAME'].Yii::app()->request->baseUrl.'/..'.Yii::app()->params['magzinePath'].'/'.$model->Path; ?>&embedded=true">
</iframe>
<?php
}
?>

<script type="text/javascript">
	var day = '';
	var month = '';
	var year = '';
	<?php 
		if(isset($model->MagzineDate)){
			?>
			day = '<?php echo date('d',strtotime($model->MagzineDate)); ?>';
			month = '<?php echo date('m',strtotime($model->MagzineDate)); ?>';
			year = '<?php echo date('Y',strtotime($model->MagzineDate)); ?>';
			<?php
		}
	?>
	
	function changeDateParams(){
		if($("#Magazine_fkMagTypeId").val()!=""){
			if($(this+":selected").attr('typecode')=='BJMMONMAG'){
				$("#day").val('01');
				$("#day").attr("disabled",true);
				$("#month").val('01');
				$("#month").attr("disabled",false);
				
				$("#Magazine_Type").attr("disabled",true);
			}
			else if($(this+":selected").attr('typecode')=='ZEXCOMM'){
				$("#day").val('01');
				$("#day").attr("disabled",true);
				$("#month").val('04');
				$("#month").attr("disabled",true);
				
				$("#Magazine_Type").attr("disabled",false);
			}
			else if($(this+":selected").attr('typecode')=='NEXCOMM'){
				$("#day").val('01');
				$("#day").attr("disabled",true);
				$("#month").val('04');
				$("#month").attr("disabled",true);
				
				$("#Magazine_Type").attr("disabled",true);
			}
			else{
				$("#day").val('01');
				$("#day").attr("disabled",false);
				$("#month").val('01');
				$("#month").attr("disabled",false);
				
				$("#Magazine_Type").attr("disabled",true);
			}
		}else{
			$("#day").val('01');
			$("#day").attr("disabled",false);
			$("#month").val('01');
			$("#month").attr("disabled",false);
			
			$("#Magazine_Type").attr("disabled",true);
		}
	}
	$(document).ready(function(e) {
		changeDateParams();
		if(day!=''){
			$("#day").val(day);
		}
		if(month!=''){
			$("#month").val(month);
		}
		if(year!=''){
			$("#year").val(year);
		}
        $("#Magazine_fkMagTypeId").change(function(e) {			
            changeDateParams();
        });
		
		$("#submitData").click(function(e) {
            if($("#Magazine_fkMagTypeId :selected").attr("typecode")=="ZEXCOMM" && $("#Magazine_Type").val()==""){
				alert("Please select Sub Level for zone code.");
				$("#Magazine_Type").focus();
				return false;	
			}
			
        });
    });
</script>