<?php $this->pageTitle="Bhartiya Jain Milan-Executive Profile" ?>
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
                            <h3 class="head1">Executive <strong>Profile</strong>
                            </h3>
                            <?php 
								if($model){
									$imgPath = Yii::app()->request->baseUrl."/images/blank_user.png";	
									
									if($model->PhotoPath && trim($model->PhotoPath)!=""){
										$imgPath = Yii::app()->request->baseUrl. Yii::app()->params['memberPotoPath']."/".$model->PhotoPath;
									}
							?>
                            <table class="profile">
                            	<tr class="group">
                                	<td colspan="2">Personal Details</td>
                                </tr>
                                <tr>
                                	<th class="headwidth" style="text-align: center;"><center><div style="background: url(<?php echo $imgPath; ?>) center;" class="userimg"></div></center></th>
                                    <td style="vertical-align: bottom;"><h4 class="color-12"><?php echo $model->MemberName; ?></h4></td>
                                </tr>
                                
                                <tr class="odd">
                                	<th>Date of Birth</th>
                                    <td>
                                    	<?php 
											if($model->DOB){
												echo date('d F Y',strtotime($model->DOB));
											}
										?>
                                    </td>
                                </tr>
                                <tr class="odd">
                                	<th >Marital Status</th>
                                    <td>
										<?php 
											if($model->MaritalStatus==1){
												echo "Married";
											}else{
												echo "Single";
											}
										?>
                                    </td>
                                </tr>
                                <tr class="odd">
                                	<th >Spouse Name</th>
                                    <td><?php echo $model->SpouseName; ?></td>
                                </tr>
                                <tr class="odd">
                                	<th >Marriage Date</th>
                                    <td>
                                    	<?php 
											if($model->MarriageDate){
												echo date('d F Y',strtotime($model->MarriageDate));
											}
										?>
                                    </td>
                                </tr>
                                <tr class="odd">
                                	<th >Father's Name</th>
                                    <td><?php echo $model->FatherName; ?></td>
                                </tr>
                                <tr class="odd">
                                	<th >Home Address</th>
                                    <td>
										<?php 
											if($model->HAddress1){
												echo $model->HAddress1;
											}
											if($model->HAddress2){
												echo "<br>".$model->HAddress2;
											}
											if($model->HAddress3){
												echo "<br>".$model->HAddress3;
											}
										 ?>
                                    </td>
                                </tr> 
                                <tr class="odd">
                                	<th >Home Contact No.</th>
                                    <td><?php echo $model->HContactNo; ?></td>
                                </tr>
                                <tr class="odd">
                                	<th >Occupation Name</th>
                                    <td><?php echo $model->Occupation; ?></td>
                                </tr>
                                <tr class="odd">
                                	<th >Occupation Address</th>
                                    <td>
										<?php 
											if($model->OAddress1){
												echo $model->OAddress1;
											}
											if($model->OAddress2){
												echo "<br>".$model->OAddress2;
											}
											if($model->OAddress3){
												echo "<br>".$model->OAddress3;
											}
										 ?>
                                    </td>
                                </tr>
                                 <tr class="odd">
                                	<th >Occupation Contact No.</th>
                                    <td><?php echo $model->OccContactNo; ?></td>
                                </tr>                         
                                <tr class="odd">
                                	<th >City</th>
                                    <td><?php echo $model->City; ?></td>
                                </tr>
                                <tr class="odd">
                                	<th >District</th>
                                    <td><?php echo $model->District; ?></td>
                                </tr>
                                <tr class="odd">
                                	<th >State</th>
                                    <td><?php echo $model->State; ?></td>
                                </tr>                                 
                                <tr class="odd">
                                	<th>Personal Contact No.</th>
                                    <td><?php echo $model->PersonalNo; ?></td>
                                </tr>
                                <tr class="odd">
                                	<th >Email ID</th>
                                    <td><?php echo $model->EmailId; ?></td>
                                </tr> 
                                <tr class="group">
                                	<td colspan="2">Organization Details</td>
                                </tr> 
                                <tr class="odd">
                                	<th >Member Code</th>
                                    <td><?php echo $model->MemberCode; ?></td>
                                </tr> 
                                <tr class="odd">
                                	<th >Member's Zone No.</th>
                                    <td><?php 
											if($memberZone && count($memberZone)>0){
												echo $memberZone[0]["ZoneCode"]; 
											}
										?>
                                    </td>
                                </tr> 
                                <tr class="odd">
                                	<th >Member's Branch Name</th>
                                    <td><?php 
											if($memberBranch && count($memberBranch)>0){
												echo $memberBranch[0]["BranchName"]; 
											}
										?>
                                    </td>
                                </tr> 
                                 <tr class="odd">
                                	<th >Member's Branch No.</th>
                                    <td><?php 
											if($memberBranch && count($memberBranch)>0){
												echo $memberBranch[0]["BranchCode"]; 
											}
										?>
                                    </td>
                                </tr> 
                                <tr class="odd">
                                	<th>Post Detials</th>
                                    <td>
                                    	<?php 
										if($memberPosts && count($memberPosts)>0){
										?>
                                    	<table style="width: 100%;">
                                        	<tr>
                                            	<th>Level</th>
                                                <th>Post Name</th>
                                                <th>Period</th>
                                            </tr>
                                            <?php
                                            for($i=0; $i<count($memberPosts); $i++){
											?>	
                                            <tr>
                                            	<td><?php echo $memberPosts[$i]["LevelName"]; ?></td>
                                                <td><?php echo $memberPosts[$i]["PostName"]; ?></td>
                                                <td>
													<?php 
														echo date('F Y',strtotime($memberPosts[$i]["AssignDate"])); 
													?>
                                                    <?php 
														echo ' to ';
														if($memberPosts[$i]["TillDate"]!=null && trim($memberPosts[$i]["TillDate"])!=""){
															echo date('F Y',strtotime($memberPosts[$i]["TillDate"])); 
														}else{
															echo 'Till Now';
														}
													?>
                                                </td>
                                            </tr>
                                            <?php
                                            }
											?>
                                        </table>
                                        <?php
										}else{
											echo "No post assigned..";
										}
										?>
                                        
                                    </td>
                                </tr>                         
                                
                            </table>
                            <?php 
								}else{
									
							?>
                            <p class="text-1 indent-bot"> 
                            	No Record found....
                            </p>
                            <?php 
								}
							?>
                             
                            
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
            	<span class="hindifont hindi-size">
                           
				</span>
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
