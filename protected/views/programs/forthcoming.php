<?php
$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
?>

<?php $this->pageTitle="Programs | Events | Function" ?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/grid.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/resources/js/programs/view.js" type="text/javascript"></script>
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
                            <h4 class="title-1">
                            	Bhartiya Jain Milan 
                                <strong>
									<?php 
										if($ptype && $ptype=="forthcoming"){
											echo "Forthcoming ";
										}else if($ptype && $ptype=="recent"){
											echo "Recent ";
										}
								 	?>
                                  Programs
                                </strong>
                            </h4>
                            <h2 class="title-1"></h2>
                            <h3 class="head1">
                            	<?php 
									if(isset($_GET['leveltype'])){
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
									}else{
										echo "All Programs";
									}
								?>
                            </h3>
                            <h4 class="title-1"> 
                            	<strong>Find Records:</strong>
                            </h4>
                            <div id="filters" class="form-theme">
                            	<ul class="left">
                                	<li><label for="programName" >Program Name</label></li>
                                    <li><input id="programName" type="text" name="Programs[programName]"  /></li>
                                    <li><label for="venuePlace" >Venue Place</label></li>
                                    <li><input id="venuePlace" type="text" name="Programs[venuePlace]"  /></li>
                                    <?php if(!isset($_GET['leveltype'])){ ?>
                                    <li><label for="fkLevelCode" >Level</label></li>
                                    <li><input id="fkLevelCode" type="text" name="Programs[fkLevelCode]"  /></li>
                                    <?php }?>
                                </ul> 
                                <ul class="left">
                                    <li><label for="shortDesc" >Short Description</label></li>
                                    <li><input id="shortDesc" type="text" name="Programs[shortDesc]"  /></li>
                                    <li><label for="venueDate" >Venue Date</label></li>
                                    <li><input id="venueDate" type="text" name="Programs[venueDate]"  /></li>
                                </ul>   
                            </div>
                            <div class="clear"></div>
                            
                            <br />
                            
                            <form name="actionForm" id="actionForm" action="" method="post">
                                <div class="contentbox nopad" id="tabs-2">
                                
                                <div style="color: #FF0000;"><?php if(isset($_GET['msg']) && !empty($_GET['msg'])) { echo $_GET['msg']; } ?>
                                </div>
                                
                                <?php
									if($ptype && $ptype=="forthcoming"){
										$dataProvider = $model->search("forthcoming");
									}else if($ptype && $ptype=="recent"){
										$dataProvider = $model->search("recent");
									}
									
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
                                
                                <div> No. of Programs display per page : 
                                	<select id="pageSize" name="pageSize" pval="<?php echo $pageSize; ?>">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="200">200</option>
                                    </select>
                                 </div>
                                <div id="grid-data_loader" class="ajax"></div> 
                                <div id="grid-data">
                                
                                <div>Displaying <?php echo $start; ?>-<?php echo $end; ?> of <?php echo $total; ?> results.</div>
                                <table class="tbllist">
                                	<tr>
                                        <th>Program Name</th>
                                        <th>Short Description</th>
                                        <th>Venue Place</th>
                                        <th>Venue Date</th>
                                        <?php if(!isset($_GET['leveltype'])){ ?>
                                        <th>Level</th>
                                        <?php }?>
                                        <th>Zone / Branch</th>
                                        <th>Details</th>
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
											
											$sublevel = "";
											if(!is_null($item->fkLevelTableId) && !empty($item->fkLevelTableId)){
												if($item->fkLevelCode == "ZONE"){
														$zone = ZoneMaster::model()->findByPk($item->fkLevelTableId);
														$sublevel = "Zone-".$zone->ZoneCode." (".$zone->ZoneName.")";
													
												}
												else if($item->fkLevelCode == "BRANCH"){
													$branch = BranchMaster::model()->findByPk($item->fkLevelTableId);
													$sublevel = $branch->BranchName;
												}
											}else{
												$sublevel = $item->fkLevelCode;
											}
											
									?>
                                    	<tr class="<?php echo $rowtype; ?>">
                                            <td class="tag"><?php echo $item->programName; ?></td>
                                            <td><?php echo $item->shortDesc; ?></td>
                                            <td><?php echo $item->venuePlace; ?></td>
                                            <td><?php echo $item->venueDate; ?></td>
                                            <?php if(!isset($_GET['leveltype'])){ ?>
                                            <td><?php echo $item->fkLevelCode; ?></td>
                                            <?php }?>
                                            <td><?php echo $sublevel; ?></td>
                                            <td>
                                            	<a href="<?php echo Yii::app()->createUrl("/programs/viewProgram?id=".$item->pkProgramId); ?>  " title="View Details">
                                                	View Details
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
                                        <?php if(!isset($_GET['leveltype'])){ ?>
                                        <td></td>
                                        <?php }?>
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
                                <input type="hidden" id="grid-data_pageURL" value="<?php echo Yii::app()->createUrl(Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId(),$_GET); ?>"  />
                                <input type="hidden" id="grid-data_searchURL" value="<?php echo Yii::app()->createUrl(Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId()); ?>"  />
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
