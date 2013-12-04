<?php
$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
?>

<?php $this->pageTitle="Programs | Events | Function" ?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/grid.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/resources/js/programs/view.js" type="text/javascript"></script>
<div id="content">
  <div class="wrapper">
    <div class="">
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
                          	<h3 class="title-1">
                          		Bhartiya Jain Milan Website <strong>Sponsors</strong>
                          	</h3>                      
                            <div class="clear"></div>  
                            
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
								<br />
                                
                                <div>
                                	
                                    <?php 
										$data = $dataProvider->getData();
										for($i=0; $i<count($data); $i++ ){
											$add = $data[$i];
											$imgPath = Yii::app()->request->baseUrl.Yii::app()->params['addImgPath']."/no-cover.gif";
											if($add["AddImagePath"] && trim($add["AddImagePath"])!=""){
												$imgPath = Yii::app()->request->baseUrl.Yii::app()->params['addImgPath']."/".$add["AddImagePath"];
											}
											$webPageLink = "#";
											if(isset($add["WebPage"]) && $add["WebPage"]!=null){
												$webPageLink = Yii::app()->createUrl("/advertisement/view/id/".$add['pkAddId']);
											}
											
									?>
										<div class="border-bot indent-bot">
										   <div class="wrapper addvertize">
												<div class="title"><a href="<?php echo $webPageLink; ?>"><?php echo $add['TitleName']; ?></a></div>
												<div class="adinfo">
													<?php 
														if(isset($add['WebsiteLink']) && $add['WebsiteLink'] != null && !empty($add['WebsiteLink'])){
															echo '<a href="'.$add['WebsiteLink'].'" target="_blank">'.$add['WebsiteLink'].'</a>';
														}else{
															echo '<a href="'.$webPageLink.'">To know more click here</a>';
														}
													?>
												</div>
												<div class="addimg">
													<a href="#" style="background:url(<?php echo $imgPath; ?>);">
													</a>
												</div>
												<div class="body">
													<?php echo $add['Description']; ?>
												</div>
												<div class="body2">
													<?php echo $add['FooterDescription']; ?>
												</div>
											</div>
										  </div>
                                    <?php		
																					
										}
									?>
                                    
                                </div>
                                <div class="clear"></div>
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
                            <h4 class="head1">
                            	Become a sponsor of <strong>Bhartiya Jain Milan Website</strong> 
                            </h4>
                             <center>
							 	<div>
							 		<div class="left">
							 			<img src="<?php echo Yii::app()->request->baseUrl; ?>/resources/advertisement-img/default-screen-add.jpg" alt="Advertisement" />
							 		</div>
							 		<div class="right sponsorContactUs" >
							 			<h2 class="head1"><strong>Contact Us</strong></h2>                            
							            <h4 style="margin-top: 20px; color: #ff0000;">Narendra Jain Rajkamal</h4>
							            <h5 class="p4" style="margin-bottom: 8px;"><strong>Mobile: </strong> 09837048560</h5>
							            <h4 style="font-size: 1.5em; margin-bottom: 8px;"><strong>Bhartiya Jain Milan</strong></h4>
							            <h5 class="p4"><strong>Email: </strong><a href="mailto:sponsor@bhartiyajainmilan.com">sponsor@bhartiyajainmilan.com</a></h5>
							 		</div>
							 	</div>
							 </center>
                            <div class="clear"></div>
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
    </div>
  </div>
</div>
