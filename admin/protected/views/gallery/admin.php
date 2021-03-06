<?php
$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
?>
<div class="headings">
<h2>Manage Gallery</h2>
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
	title="Delete" /> </a> <a href="javascript:void(0);"
	id="multiple_publish"> <img
	src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/publish.png"
	title="Publish" /> </a> <a href="javascript:void(0);"
	id="multiple_unpublish"> <img
	src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/unpublish.png"
	title="Unpublish" /> </a> <a
	href="<?php echo Yii::app()->createUrl("/gallery/create");?>"
	id="mul_add"> <img
	src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/add.png"
	title="Add" alt="Add" /> </a></div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'cssFile'=>Yii::app()->request->baseUrl.'/css/gridview/styles.css',
	'id'=>'gallery-grid',
	'dataProvider'=>$model->search(),
	'selectableRows'=>5,
	'filter'=>$model,
	'columns'=>array(				
					array(
						'class'=>'CCheckBoxColumn',
					),
					array(
						'name'=>'title',
						'value'=>'$data->title',
						'htmlOptions' => array('width' => 250),
					),
					array(
						'name'=>'shortDesc',
						'value'=>'$data->shortDesc',
						'htmlOptions' => array('width' => 250),
					),
					array(
						'name'=>'type',
						'value'=>'$data->type==1 ? "Video" : ($data->type==2 ? "Audio" : "Image")',
						'filter'=>CHtml::dropDownList('Gallery[type]', $model->type,  
									array(''=>'All', '1'=>'Video', '2'=>'Audio', '3'=>'Image'),
									array('style'=>'width: 100px;')),
					),
					array(
						'name'=>'date',
						'value'=>'$data->date',
					),
					array(
						'name'=>'status',
						'value'=>'$data->status==1 ? "Published" : "Unpublished"',
						'filter'=>false,
					),

					array(
						'class'=>'CButtonColumn',
						'htmlOptions' => array('style'=>'width:120px'),
						'header'=>CHtml::dropDownList('pageSize',$pageSize,array(5=>5,10=>10,15=>15,20=>20,30=>30,50=>50,100=>100,200=>200),array(
						// change 'user-grid' to the actual id of your grid!!
								'onchange'=>"$.fn.yiiGridView.update('gallery-grid',{ data:{pageSize: $(this).val() }})",
						)),
						'buttons'=>array(
						  'up'=>array(
							  'label'=>'Publish',
							  'imageUrl'=>Yii::app()->request->baseUrl . '/img/icons/publish_small.png',
							  'url'=>'Yii::app()->createUrl("/gallery/publish?id=$data->pkGalleryId")',
							),
						  'down'=>array(
							  'label'=>'Unpublish',
							  'imageUrl'=>Yii::app()->request->baseUrl . '/img/icons/unpublish_small.png',
							  'url'=>'Yii::app()->createUrl("/gallery/unpublish?id=$data->pkGalleryId")',
							),
						),
						'viewButtonLabel'=>yii::t('core','View'),
						'updateButtonLabel'=>yii::t('core','Update'),
						'deleteButtonLabel'=>yii::t('core','Delete'),
						'template'=> '{up} {down} {view} {update} {delete}',
					),
			),
)); ?></div>
<input type="hidden" name="action_type" id="action_type" value="" /></form>