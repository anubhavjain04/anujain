<?php
$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
?>

<?php $this->pageTitle="Foundation | Founder | Trusti" ?>
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
                                <strong>Foundation</strong>
                            </h4>
                            <h2 class="title-1"></h2>
                            <h3 class="head1">
                            	Founder Trusti List
                            </h3>                           
							
                            <form name="actionForm" id="actionForm" action="" method="post">
                                <div class="contentbox nopad" id="tabs-2">
                                
                                <div style="color: #FF0000;"><?php if(isset($_GET['msg']) && !empty($_GET['msg'])) { echo $_GET['msg']; } ?>
                                </div>
                                
                                <?php
									
									$dataProvider = $model->searchTrusti('FOUNDER');
									
									
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
                            	 <?php 
										$data = $dataProvider->getData();
										for($i=0; $i<count($data); $i++ ){
											$item = $data[$i];
											
											$imgPath = Yii::app()->request->baseUrl."/images/blank_user.png";
											if($item["PhotoPath"] && trim($item["PhotoPath"])!=""){
												$imgPath = Yii::app()->request->baseUrl.Yii::app()->params['memberPotoPath']."/".$item["PhotoPath"];
											}
											
								?>                      	
                                <tr class="group">
                                	<td colspan="2"><?php echo $item["PostName"]; ?></td>
                                </tr>                                
                                 <tr class="odd">
                                	<td style="width: 100px;"><div class="userimg" style="background: url(<?php echo $imgPath; ?>) center;"></td>
                                    <td>
                                    	<ul class="ullist">
                                        	<li>Founder Trusti: <?php echo $item["FounderOrder"]; ?></li>
                                            <li class="strong color-10"><?php echo $item["MemberName"]; ?></li>
                                            <li>City: <?php 
														echo $item["City"]; 
														if($item["District"] && $item["District"]!="" && $item["District"]!=$item["City"]){
															echo " - ".$item["District"];
														}
														if($item["State"] && $item["State"]!=""){
															echo " (".$item["State"].")";
														}
														?>
                                            </li>
                                            <li class="color-11">
                                            	Contact No: 
												<?php
													echo trim($item["PersonalNo"]); 
													if(trim($item["PersonalNo"])!="" &&  trim($item["HContactNo"])!="" && trim($item["PersonalNo"])!=trim($item["HContactNo"])) {
														echo ", ";
													}
													if(trim($item["PersonalNo"])!=trim($item["HContactNo"])){
														echo trim($item["HContactNo"]);
													} 
												?> 
                                            </li>
                                            <?php /* <li>                                            	 
												<?php if(trim($item["EmailId"])!="") echo "Email Id:".trim($item["EmailId"]); ?> 
                                            </li>
											*/ ?>
                                            <li class="color-9">
                                            	<div class="left">
                                            	since <?php echo date('F',strtotime($item["AssignDate"]));  ?> <?php echo date('Y',strtotime($item["AssignDate"])); ?>
                                                </div>
                                                <div class="right" style="text-align: right; padding-right: 10px;">
                                                	<a href='<?php echo Yii::app()->createUrl("/memberDetails/executiveProfile/id/".$item["pkMemberId"]);?>' class="button png"><span class="png"><span class="png">more</span></span> </a>
                                                </div>
                                            </li>                                            
                                        </ul>
                                     </td>
                                </tr>
                                <?php 
									}	
								?>                                 
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
