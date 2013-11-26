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
<script type="text/javascript">
	$(document).ready(function(e) {
		$("#pageSize").val(<?php echo $pageSize; ?>);
        $("#pageSize").change(function(e) {
            var pageSize = $(this).val();
			$.ajax({
				type: "GET",
				url: $("#pageURL").val(),
				data: {pageSize: pageSize},
				success: function(data,status){
					$d=$(data);
					$("#grid-data").html(($d.find("#grid-data").html()));
					//$filtered=$d.filter("#tbl123");
					
				}
			});
        });
		
		$("#pager a").live("click", function(e) {
			$.ajax({
				type: "GET",
				url: $(this).attr("href"),
				success: function(data,status){
					$d=$(data);
					$("#grid-data").html(($d.find("#grid-data").html()));
					//$filtered=$d.filter("#tbl123");
					
				}
			});
			
            return false;
        });
		
		$("#filters input").change(function(e) {
			$.ajax({
				type: "GET",
				url: $("#pageURL").val(),
				data: $.param($("#filters input")),
				success: function(data,status){
					$d=$(data);
					$("#grid-data").html(($d.find("#grid-data").html()));
					//$filtered=$d.filter("#tbl123");
					
				}
			});
			
            return false;
        });
    });
</script>
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
									
							}?>
                            </h3>
                            <h3 class="title-1"> 
                            	<strong>Find Records:</strong>
                            </h3>
                            <div id="filters" class="form-theme">
                            	<ul class="left">
                                	<li><label for="programName" >Program Name</label></li>
                                    <li><input id="programName" type="text" name="Programs[programName]"  /></li>
                                    <li><label for="venuePlace" >Venue Place</label></li>
                                    <li><input id="venuePlace" type="text" name="Programs[venuePlace]"  /></li>
                                    <li><label for="fkLevelCode" >Level</label></li>
                                    <li><input id="fkLevelCode" type="text" name="Programs[fkLevelCode]"  /></li>
                                </ul> 
                                <ul class="left">
                                    <li><label for="shortDesc" >Short Description</label></li>
                                    <li><input id="shortDesc" type="text" name="Programs[shortDesc]"  /></li>
                                    <li><label for="venueDate" >Venue Place</label></li>
                                    <li><input id="venueDate" type="text" name="Programs[venueDate]"  /></li>
                                </ul>   
                            </div>
                            <div style="clear:both;"></div>
                            
                            
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
									//if($currentUser!=null){
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
									//}
								?>
                                 
                                <div>
                                	<select id="pageSize" name="pageSize" onchange="">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                    </select>
                                 </div>
                                 
                                <div id="grid-data">
                                <?php
									$dataProvider = $model->search();
									if($dataProvider->getItemCount()>0)
									{
										$count=$dataProvider->getItemCount();
										$pagination=$dataProvider->getPagination();
										$total=$dataProvider->getTotalItemCount();
										$start=$pagination->currentPage*$pagination->pageSize+1;
										$end=$start+$count-1;
										if($end>$total)
										{
											$end=$total;
											$start=$end-$count+1;
										}
								 ?>
                                <div>Displaying <?php echo $start; ?>-<?php echo $end; ?> of <?php echo $total; ?> results.</div>
                                <table class="tbllist">
                                	<tr>
                                   	  <th class="checkbox-column"><input type="checkbox" class="chkAll" /></th>
                                        <th>Program Name</th>
                                        <th>Short Description</th>
                                        <th>Venue Place</th>
                                        <th>Venue Date</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php 
										$data = $dataProvider->getData();
										for($i=0; $i<count($data); $i++ ){
											$item = $data[$i];
											$rowtype = "";
											if($i % 2 == 0){
												$rowtype = "even";
											}else{
												$rowtype = "odd";
											}
									?>
                                    	<tr class="<?php echo $rowtype; ?>">
                                        	<td class="checkbox-column tag"><input type="checkbox" class="chkItem" value="<?php echo $item->pkProgramId; ?>" /></td>
                                            <td><?php echo $item->programName; ?></td>
                                            <td><?php echo $item->shortDesc; ?></td>
                                            <td><?php echo $item->venuePlace; ?></td>
                                            <td><?php echo $item->venueDate; ?></td>
                                            <td><?php echo $item->fkLevelCode; ?></td>
                                            <td><?php echo ($item->Status==1) ? "Published" : "Unpublished"; ?></td>
                                            <td>
                                            	<a href="/bjm/index.php/programs/publish?id=1.html" title="Publish">
                                                	<img alt="Publish" src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/publish_small.png" />
                                                </a> 
                                                <a href="/bjm/index.php/programs/unpublish?id=1.html" title="Unpublish">
                                                	<img alt="Unpublish" src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/unpublish_small.png" />
                                                </a> 
                                                <a href="/bjm/index.php/programs/view/id/1.html" title="View" class="view">
                                                	<img alt="View" src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/view2.png" /></a> 
                                                <a href="/bjm/index.php/programs/update/id/1.html" title="Update" class="update">
                                                	<img alt="Update" src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/update2.png" /></a> 
                                                <a href="/bjm/index.php/programs/delete/id/1.html" title="Delete" class="delete">
                                                	<img alt="Delete" src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/delete2.png" />
                                                </a>
                                            </td>
                                        </tr>
                                    <?php		
																					
										}
										
									?>
                                    <tr class="last">
                                    	<td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                                <?php 								
								 $pager=array();
								 $class='CLinkPager';
								 $pager['pages']=$dataProvider->getPagination();
									if($pager['pages']->getPageCount()>1)
									{
										echo '<div id="pager" class="pager">';
										$this->widget($class,$pager);
										echo '</div>';
									}									
								?>                               
                                <input type="hidden" id="pageURL" value="<?php echo Yii::app()->createUrl(Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId(),$_GET); ?>"  />
                                </div>
                                <?php 
									}
									else{										
								?>
                                	<div> No Records Found.. </div>
                                 <?php 
									}
								?>
                                
             </div>
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
