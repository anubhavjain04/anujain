<?php
$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
?>
<?php if(isset($_POST['action_type']) && $_POST['action_type']=="multiple_delete") { $this->multipleDelete($_POST); } ?>
<?php if(isset($_POST['action_type']) && $_POST['action_type']=="multiple_publish") { $this->multiplePublish($_POST); } ?>
<?php if(isset($_POST['action_type']) && $_POST['action_type']=="multiple_unpublish") { $this->multipleUnpublish($_POST); } ?>

<?php
$currentUser = null; 
if(isset(Yii::app()->session['currentUser'])){
	$user = new User();				
	$user =	Yii::app()->session['currentUser'];
	if(!is_null($user) && $user->Type==="USR"){
		$currentUser =  $user;
	}
}
?>



<?php $this->pageTitle="Programs | Events | Function" ?>
<div id="content">
  <div class="wrapper">
    <div class="col-1 ">
      <div class="row-1 p4">
        <div class="box">
          <div class="tail-top">
            <div class="tail-bot">
              <div class="tail-left">
                <div class="tail-right">
                  <div class="corner-top-left">
                    <div class="corner-top-right">
                      <div class="corner-bot-left">
                        <div class="corner-bot-right">
                          <div class="padding">
                            <h2 class="title-1">Bhartiya Jain Milan <strong>Programs</strong></h2>
                            <h3 class="head1">
                            	<?php if(isset($_GET['leveltype'])){
									if($_GET['leveltype']=='ZONE'){
										echo "Zone wise";
									}else if($_GET['leveltype']=='NATIONAL'){
										echo "National wise";
									}
									else if($_GET['leveltype']=='BRANCH'){
										echo "Branch wise";
									}
									else if($_GET['leveltype']=='HOSPITAL'){
										echo "Hospital Programs";
									}
									else if($_GET['leveltype']=='FOUNDATION'){
										echo "Foundation Programs";
									}									
									
									Yii::app()->createUrl(
  Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId() , 
  $_GET 
);
							}?>
                            </h3>
                            
                            <p class="text-1 indent-bot"> 
                            	
                            </p>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row-2">
        <div class="indent">
          <h3><span class="hindifont"></span></h3>
        </div>
        <div class="wrapper">
        	<form name="actionForm" id="actionForm" action="" method="post">
                                <div class="contentbox nopad" id="tabs-2">
                                <div style="color: #FF0000;"><?php if(isset($_GET['msg']) && !empty($_GET['msg'])) { echo $_GET['msg']; } ?>
                                </div>
                                <?php 
									$aaaa = 1;
									if($currentUser!=null){
								?>
                                <div align="right"><a href="javascript:void(0);" id="multiple_delete"> <img
                                    src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/mu_delete.png"
                                    title="Delete" /> </a> <a href="javascript:void(0);"
                                    id="multiple_publish"> <img
                                    src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/publish.png"
                                    title="Publish" /> </a> <a href="javascript:void(0);"
                                    id="multiple_unpublish"> <img
                                    src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/unpublish.png"
                                    title="Unpublish" /> </a> <a
                                    href="<?php echo Yii::app()->createUrl("/programs/create");?>"
                                    id="mul_add"> <img
                                    src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/add.png"
                                    title="Add" alt="Add" /> </a></div>
                                <?php
									}
								?>
                                
                                <?php $this->widget('zii.widgets.grid.CGridView', array(
                                    'cssFile'=>Yii::app()->request->baseUrl.'/css/gridview/styles.css',
                                    'id'=>'programs-grid',
                                    'dataProvider'=>$model->search(),
                                    'selectableRows'=>5,
                                    'filter'=>$model,
                                    'columns'=>array(				
                                                    array(
                                                        'class'=>'CCheckBoxColumn',
                                                    ),
                                
                                                    array(
                                                        'name'=>'programName',
                                                        'value'=>'$data->programName',
                                                    ),
                                
                                                    array(
                                                        'name'=>'shortDesc',
                                                        'value'=>'$data->shortDesc',
                                                    ),
                                
                                                    array(
                                                        'name'=>'venuePlace',
                                                        'value'=>'$data->venuePlace',
                                                    ),
                                                    array(
                                                        'name'=>'venueDate',
                                                        'value'=>'$data->venueDate',
                                                    ),
                                                    array(
                                                        'name'=>'fkLevelCode',
                                                        'value'=>'$data->fkLevelCode',
                                                    ),
                                
                                
                                                    array(
                                                        'name'=>'Status',
                                                        'value'=>'$data->Status==1 ? "Published" : "Unpublished"',
                                                        'filter'=>false,
                                                    ),
                                
                                                    array(
                                                        'class'=>'CButtonColumn',
                                                        'htmlOptions' => array('style'=>'width:120px'),
                                                        'header'=>CHtml::dropDownList('pageSize',$pageSize,array(5=>5,10=>10,15=>15,20=>20,30=>30,50=>50,100=>100,200=>200),array(
                                                        // change 'user-grid' to the actual id of your grid!!
                                                                'onchange'=>"$.fn.yiiGridView.update('programs-grid',{ data:{pageSize: $(this).val() }})",
                                                        )),														
                                                        'buttons'=>array(
                                                          'up'=>array(
                                                              'label'=> 'Publish',
                                                              'imageUrl'=>Yii::app()->request->baseUrl . '/img/icons/publish_small.png',
                                                              'url'=>'Yii::app()->createUrl("/programs/publish?id=$data->pkProgramId")',
															  'visible'=>($currentUser!=null)?'true':'false',
                                                            ),
                                                          'down'=>array(
                                                              'label'=>'Unpublish',
                                                              'imageUrl'=>Yii::app()->request->baseUrl . '/img/icons/unpublish_small.png',
                                                              'url'=>'Yii::app()->createUrl("/programs/unpublish?id=$data->pkProgramId")',
															  'visible'=>($currentUser!=null)?'true':'false',
                                                            ),
														  'view'=>array(
														  	  "visible"=>($currentUser!=null)?'true':'false',
														  ),
														  'update'=>array(
														  	  'visible'=>($currentUser!=null)?'true':'false',
														  ),
														  'delete'=>array(
														  	  'visible'=>($currentUser!=null)?'true':'false',
														  ),
                                                        ),
                                                        'viewButtonLabel'=>yii::t('core','View'),
                                                        'updateButtonLabel'=>yii::t('core','Update'),
                                                        'deleteButtonLabel'=>yii::t('core','Delete'),														
                                                        'template'=> '{up} {down} {view} {update} {delete}',
														
                                                    ),
                                            ),
                                )); ?></div>
                                <input type="hidden" name="action_type" id="action_type" value="" />
                        	</form>
        
        	<p class="text-11">
            	
            </p>
         
        </div>
      </div>
    </div>
    <?php
    	$filepath = Yii::app()->basePath."/views/site/rightNewsProgrames.php";
    	include($filepath); 
    ?>
  </div>
</div>
