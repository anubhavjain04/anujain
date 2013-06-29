<?php $this->pageTitle="View Programs | Events | Function" ?>
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
                            <h2 class="title-1">Bhartiya Jain Milan <strong> Program</strong></h2>
                            <?php 
							if($program){
							?>
                            <h3 class="head1">
                            	<?php 																			
									if($program->fkLevelCode=='ZONE'){
										if(!is_null($program->fkLevelTableId) && !empty($program->fkLevelTableId)){
											$zone = ZoneMaster::model()->findByPk($program->fkLevelTableId);
											echo "Zone - ".$zone->ZoneCode." (".$zone->ZoneName.")";
										}else{
											echo "Zone Program";
										}
									}else if($program->fkLevelCode=='NATIONAL'){
										echo "National Program";
									}
									else if($program->fkLevelCode=='BRANCH'){
										if(!is_null($program->fkLevelTableId) && !empty($program->fkLevelTableId)){
											$branch = BranchMaster::model()->findByPk($program->fkLevelTableId);
											echo "Branch-".$branch->BranchName;
										}else{
											echo "Branch Program";
										}
									}
									else if($program->fkLevelCode=='HOSPITAL'){
										echo "Hospital Program";
									}
									else if($program->fkLevelCode=='FOUNDATION'){
										echo "Foundation Program";
									}									
									
								?>
                            </h3>
                            
                            <?php 
							}else{
								echo "No program found...";
							}
							?>
                            <table class="tbllist p3">
                            	<tr class="odd">
                                	<th>Program Name</th>
                                    <td>
                                    	<h5 class="title-1"> 
			                            	<strong><?php echo $program->programName; ?></strong>
                            			</h5>
                                    </td>
                                </tr>
                                <tr class="even">
                                	<th>Short Description</th>
                                    <td>
                                    	<?php echo $program->shortDesc; ?>
                                    </td>
                                </tr> 
                                <tr class="odd">
                                	<th>Venue Place</th>
                                    <td>
                                    	<?php echo $program->venuePlace; ?>
                                    </td>
                                </tr> 
                                <tr class="even">
                                	<th>Venu Date</th>
                                    <td>
                                    	<?php echo date('d F Y',strtotime($program->venueDate)); ?>
                                    </td>
                                </tr>   
                                                         	
                            </table>
                            
                            <!--<h4>Report</h4>-->
                            <p class="text-1 indent-bot">
                            </p>
                            <div class="hindi" style="line-height: 2.2em; color:#000000; text-align: justify;"><?php echo $program->longDesc; ?></div>
                            
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
