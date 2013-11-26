<?php
$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
?>
<div class="headings">
<h2>Manage Posts</h2>
</div>
<?php if(isset($_POST['action_type']) && $_POST['action_type']=="multiple_delete") { $this->multipleDelete($_POST); } ?>
<?php if(isset($_POST['action_type']) && $_POST['action_type']=="multiple_publish") { $this->multiplePublish($_POST); } ?>
<?php if(isset($_POST['action_type']) && $_POST['action_type']=="multiple_unpublish") { $this->multipleUnpublish($_POST); } ?>

<form name="actionForm" id="actionForm" action="" method="post">
<div class="contentbox nopad" id="tabs-2">
<div style="color: #FF0000;"><?php if(isset($_GET['msg']) && !empty($_GET['msg'])) { echo $_GET['msg']; } ?>
</div>
<div align="right"><a href="javascript:void(0);" id="multiple_delete"> <img
	src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/mu_delete.png"
	title="Delete" /> </a> <a
	href="<?php echo Yii::app()->createUrl("/memberDetails/create");?>"
	id="mul_add"> <img
	src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/add.png"
	title="Add" alt="Add" /> </a></div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
'cssFile'=>Yii::app()->request->baseUrl.'/css/gridview/styles.css',
	'id'=>'member-details-grid',
	'dataProvider'=>$model->search(),
	'selectableRows'=>10,
	'filter'=>$model,
	'columns'=>array(				
array(
						'class'=>'CCheckBoxColumn',
),

array(
						'name'=>'fkLogin',
						'value'=>'$data->fkLogin->UserId',
						'header'=>'User Id',
),

array(
						'name'=>'fkLogin',
						'value'=>'$data->fkLogin->Type',
						'header'=>'User Type',
),

array(
						'name'=>'FName',
						'value'=>'$data->FName ." ". $data->MName . " ". $data->LName',
						'header'=>'User Name',
),

array(
						'name'=>'MemberCode',
						'value'=>'$data->MemberCode',
),

array(
						'name'=>'DOB',
						'value'=>'$data->DOB',
),

array(
						'name'=>'Sex',
						'value'=>'$data->Sex',
),

array(
						'name'=>'EmailId',
						'value'=>'$data->EmailId',
),


array(
			'class'=>'CButtonColumn',
			'htmlOptions' => array('style'=>'width:120px'),

			'header'=>CHtml::dropDownList('pageSize',$pageSize,array(5=>5,10=>10,15=>15,20=>20,30=>30,50=>50,100=>100,200=>200),array(
// change 'user-grid' to the actual id of your grid!!
								'onchange'=>"$.fn.yiiGridView.update('member-details-grid',{ data:{pageSize: $(this).val() }})",
)),
						    'viewButtonLabel'=>yii::t('core','View'),
							'updateButtonLabel'=>yii::t('core','Update'),
							'deleteButtonLabel'=>yii::t('core','Delete'),
            				'template'=> '{view} {update} {delete}',
),
),
)); ?></div>
<input type="hidden" name="action_type" id="action_type" value="" /></form>
