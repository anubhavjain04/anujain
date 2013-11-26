<?php
$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
?>

<?php $this->pageTitle="Bhartiya Jain Milan-Find Executive | Search Member" ?>
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
                          	<h2 class="title-1">Bhartiya Jain Milan <strong>Executive</strong></h2>
                            <h3 class="head1">Search <strong>Executive</strong></h3>
                             <p>
                            	Please type text in input box and press enter.
                            </p>
                            <h4 > 
                            	<strong>Find Records By:</strong>
                            </h4>
                            
                            <div id="filters" class="form-theme">
                            	<ul class="left">
                                	<li><label for="MemberName" >Executive Name</label></li>
                                    <li><input id="MemberName" type="text" name="MemberDetails[MemberName]" value="<?php echo $model->MemberName; ?>"  /></li>
                                    <li><label for="MemberCode" >Executive Code</label></li>
                                    <li><input id="MemberCode" type="text" name="MemberDetails[MemberCode]" value="<?php echo $model->MemberCode; ?>"  /></li>
                                    <li><label for="PersonalNo" >Mobile No.</label></li>
                                    <li><input id="PersonalNo" type="text" name="MemberDetails[PersonalNo]" value="<?php echo $model->PersonalNo; ?>" /></li>
                                </ul> 
                                <ul class="left">
                                    <li><label for="District" >District</label></li>
                                    <li><input id="District" type="text" name="MemberDetails[District]" value="<?php echo $model->District; ?>" /></li>
                                    <li><label for="State" >State</label></li>
                                    <li><input id="State" type="text" name="MemberDetails[State]" value="<?php echo $model->State; ?>" /></li>
                                    <li><label for="City" >City</label></li>
                                    <li><input id="City" type="text" name="MemberDetails[City]" value="<?php echo $model->City; ?>" /></li>
                                </ul>   
                            </div>
                            <div class="clear"></div>
                            
                            <br />
                            <form name="actionForm" id="actionForm" action="" method="post">
                                <div class="contentbox nopad" id="tabs-2">
                                
                                    <div style="color: #FF0000;"><?php if(isset($_GET['msg']) && !empty($_GET['msg'])) { echo $_GET['msg']; } ?>
                                    </div>
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
                                  <div> No. of records display per page : 
                                	<select id="pageSize" name="pageSize" pval="<?php echo $pageSize; ?>">
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
                                    <th>Executive Name</th>
                                    <th>Executive Code</th>
                                    <th>Town/City</th>
                                    <th>Contact Number</th>
                                    <th>View Profile</th>
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
                                	<td class="tag"><?php echo $item->MemberName; ?></td>
                                    <td><?php echo $item->MemberCode; ?> </td>
                                    <td>
										<?php 
											echo $item->City; 
											if($item->District && $item->District!="" && trim($item->City)!=trim($item->District)){
												echo " - ".$item->District;
											}
											if($item->State && $item->State!=""){
												echo " (".$item->State.")";
											}
										 ?>
                                    </td>
                                    <td>
										<?php 
											echo trim($item->PersonalNo); 
										?>
                                    </td>
                                    <td class="btn">
                                    	<a href='<?php echo Yii::app()->createUrl("/memberDetails/executiveProfile/id/".$item->pkMemberId);?>' class="button png"><span class="png"><span class="png">more</span></span> </a>
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
                            <p class="text-1 indent-bot"> 
                            	No Record found...
                            </p>
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
          <h3></h3>
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
