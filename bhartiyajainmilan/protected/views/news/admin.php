<?php
$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
?>
<div class="headings">
	<h2>Manage News</h2>
</div>
<?php if(isset($_POST['action_type']) && $_POST['action_type']=="multiple_delete") { $this->multipleDelete($_POST); } ?>
<?php if(isset($_POST['action_type']) && $_POST['action_type']=="multiple_publish") { $this->multiplePublish($_POST); } ?>
<?php if(isset($_POST['action_type']) && $_POST['action_type']=="multiple_unpublish") { $this->multipleUnpublish($_POST); } ?>

<form name="actionForm" id="actionForm" action="" method="post">
	<div class="contentbox nopad" id="tabs-2">
		<div style="color: #FF0000;"><?php if(isset($_GET['msg']) && !empty($_GET['msg'])) { echo $_GET['msg']; } ?>
		</div>
        <div align="right">
        	<a href="javascript:void(0);" id="multiple_delete"> <img src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/mu_delete.png" title="Delete" /> </a> 
	        <a href="javascript:void(0);" id="multiple_publish"> <img src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/publish.png" title="Publish" /> </a> 
            <a href="javascript:void(0);" id="multiple_unpublish"> <img	src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/unpublish.png" title="Unpublish" /> </a> 
            <a href="<?php echo Yii::app()->createUrl("/news/create");?>" id="mul_add"> <img src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/add.png"	title="Add" alt="Add" /> </a>
        </div>


		<?php $this->widget('zii.widgets.grid.CGridView', array(
        	'cssFile'=>Yii::app()->request->baseUrl.'/css/gridview/styles.css',
            'id'=>'news-grid',
            'dataProvider'=>$model->search(),
            'selectableRows'=>10,
            'filter'=>$model,
            'columns'=>array(				
						array(
							'class'=>'CCheckBoxColumn',
						),				
						array(
							'name'=>'city',
							'value'=>'$data->city',
							'htmlOptions' => array('class'=>'hindi'),
						),
						array(
							'name'=>'title',
							'value'=>'mb_substr($data->title, 0, 50, "UTF-8")',
							'htmlOptions' => array('class'=>'hindi'),
						),
						array(
							'name'=>'newsDate',
							'value'=>'date("d-M-Y",strtotime($data->newsDate))',
						),						
						array(
							'name'=>'newsOrder',
							'value'=>'$data->newsOrder',
						),
						array(
							'name'=>'status',
							'value'=>'$data->status==1 ? "Published" : "Unpublished"',
							'filter'=>false,
						),					        
						array(
							'class'=>'CButtonColumn',
							'htmlOptions' => array('style'=>'width:120px'),				
							'header'=>CHtml::dropDownList(
										'pageSize',
										$pageSize,
										array(5=>5,10=>10,15=>15,20=>20,30=>30,50=>50,100=>100,200=>200),
										array(
											'onchange'=>"$.fn.yiiGridView.update('news-grid',{ data:{pageSize: $(this).val() }})",
										)
									),
							'buttons'=>array(
								  'up'=>array(
									  'label'=>'Publish',
									  'imageUrl'=>Yii::app()->request->baseUrl . '/img/icons/publish_small.png',
									  'url'=>'Yii::app()->createUrl("/news/publish?id=$data->pkNewsId")',
									),
								  'down'=>array(
									  'label'=>'Unpublish',
									  'imageUrl'=>Yii::app()->request->baseUrl . '/img/icons/unpublish_small.png',
									  'url'=>'Yii::app()->createUrl("/news/unpublish?id=$data->pkNewsId")',
									),
							),		                                
							'viewButtonLabel'=>yii::t('core','View'),
							'updateButtonLabel'=>yii::t('core','Update'),
							'deleteButtonLabel'=>yii::t('core','Delete'),
							'template'=> '{up} {down} {view} {update} {delete}',
        				),
        			),
        )); ?>
	</div>
	<input type="hidden" name="action_type" id="action_type" value="" />
</form>