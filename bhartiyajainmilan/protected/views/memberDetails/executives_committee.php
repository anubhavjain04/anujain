<?php $this->pageTitle="Bhartiya Jain Milan-National Executives" ?>
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
                            <h2 class="title-1">Bhartiya Jain Milan <strong>Executives</strong></h2>
                            <h3 class="head1">National <strong>Executive</strong> Committee
								<?php 
									if(intval(date('m'))>3){
										echo date('Y').'-'.(intval(date('Y'))+1);
									}else{
										echo (intval(date('Y'))-1) ."-".date('Y');
									}
									
									
								?>
                            </h3>
							<?php if(isset($magazine) && count($magazine)>0){
							?>
                            <div style="text-align:right;">View: <a href="<?php echo Yii::app()->request->baseUrl.Yii::app()->params['magzinePath']."/".$magazine[0]['Path'];?>" target="_blank">Executive Committee list in hindi</a></div>
                            <?php 
								}								
								if($nationalMembers && count($nationalMembers)>0){
							?>
                            <table class="tbllist">
                            	<tr>
                                	<th>Rank</th>
                                    <th>Executive Name</th>
                                    <th>Town/City</th>
                                    <th>Contact Number</th>
                                    <th>View Profile</th>
                                </tr>
                                <?php 
									$prevPost = "";
									for($i=0; $i<count($nationalMembers); $i++){
										$rowtype = "";
										if($i % 2 == 0){
											$rowtype = "even";
										}else{
											$rowtype = "odd";
										}
										$member = $nationalMembers[$i];
								?>
                                <tr class="<?php echo $rowtype; ?>">
                                	<td class="tag">
										<?php
											if(trim($member["PostName"])!=$prevPost){
												$prevPost = trim($member["PostName"]);
												echo $member["PostName"]; 
											}
										?>
                                    </td>
                                    <td><?php echo $member["MemberName"]; ?> </td>
                                    <td>
										<?php 
											echo $member["City"]; 
											if($member["District"] && $member["District"]!="" && trim($member["City"])!=trim($member["District"])){
												echo " - ".$member["District"];
											}
											if($member["State"] && $member["State"]!=""){
												echo " (".$member["State"].")";
											}
										 ?>
                                    </td>
                                    <td>
										<?php 
											echo trim($member["PersonalNo"]); 
											if(trim($member["PersonalNo"])!="" &&  trim($member["HContactNo"])!="" && trim($member["PersonalNo"])!=trim($member["HContactNo"])) {
												echo ", ";
											}
											if(trim($member["PersonalNo"])!=trim($member["HContactNo"])){
												echo trim($member["HContactNo"]);
											}
										?>
                                    </td>
                                    <td class="btn">
                                    	<a href='<?php echo Yii::app()->createUrl("/memberDetails/executiveProfile/id/".$member["pkMemberId"]);?>' class="button png"><span class="png"><span class="png">more</span></span> </a>
                                    </td>
                                </tr>
                                <?php
									}
								?>
                                
                                <tr class="group">
                                	<td colspan="5">BJM Foundation</td>
                                </tr>
                                 <?php 
									
									for($i=0; $i<count($foundationMembers); $i++){
										$rowtype = "";
										if($i % 2 == 0){
											$rowtype = "even";
										}else{
											$rowtype = "odd";
										}
										$member = $foundationMembers[$i];
								?>
                                <tr class="<?php echo $rowtype; ?>">
                                	<td class="tag">
										<?php
											if(trim($member["PostName"])!=$prevPost){
												$prevPost = trim($member["PostName"]);
												echo $member["PostName"]; 
											}
										?>
                                    </td>
                                    <td><?php echo $member["MemberName"]; ?> </td>
                                    <td>
										<?php 
											echo $member["City"]; 
											if($member["District"] && $member["District"]!="" && trim($member["City"])!=trim($member["District"])){
												echo " - ".$member["District"];
											}
											if($member["State"] && $member["State"]!=""){
												echo " (".$member["State"].")";
											}
										 ?>
                                    </td>
                                    <td>
										<?php 
											echo trim($member["PersonalNo"]); 
											if(trim($member["PersonalNo"])!="" &&  trim($member["HContactNo"])!="" && trim($member["PersonalNo"])!=trim($member["HContactNo"])) {
												echo ", ";
											}
											if(trim($member["PersonalNo"])!=trim($member["HContactNo"])){
												echo trim($member["HContactNo"]);
											}
										?>
                                    </td>
                                    <td class="btn">
                                    	<a href='<?php echo Yii::app()->createUrl("/memberDetails/executiveProfile/id/".$member["pkMemberId"]);?>' class="button png"><span class="png"><span class="png">more</span></span> </a>
                                    </td>
                                </tr>
                                <?php
									}
								?>
                                
                                <tr class="group">
                                	<td colspan="5">BJM Hospital</td>
                                </tr>
                                 <?php 
									
									for($i=0; $i<count($hospitalMembers); $i++){
										$rowtype = "";
										if($i % 2 == 0){
											$rowtype = "even";
										}else{
											$rowtype = "odd";
										}
										$member = $hospitalMembers[$i];
								?>
                                <tr class="<?php echo $rowtype; ?>">
                                	<td class="tag">
										<?php
											if(trim($member["PostName"])!=$prevPost){
												$prevPost = trim($member["PostName"]);
												echo $member["PostName"]; 
											}
										?>
                                    </td>
                                    <td><?php echo $member["MemberName"]; ?> </td>
                                    <td>
										<?php 
											echo $member["City"]; 
											if($member["District"] && $member["District"]!="" && trim($member["City"])!=trim($member["District"])){
												echo " - ".$member["District"];
											}
											if($member["State"] && $member["State"]!=""){
												echo " (".$member["State"].")";
											}
										 ?>
                                    </td>
                                    <td>
										<?php 
											echo trim($member["PersonalNo"]); 
											if(trim($member["PersonalNo"])!="" &&  trim($member["HContactNo"])!="" && trim($member["PersonalNo"])!=trim($member["HContactNo"])) {
												echo ", ";
											}
											if(trim($member["PersonalNo"])!=trim($member["HContactNo"])){
												echo trim($member["HContactNo"]);
											}
										?>
                                    </td>
                                    <td class="btn">
                                    	<a href='<?php echo Yii::app()->createUrl("/memberDetails/executiveProfile/id/".$member["pkMemberId"]);?>' class="button png"><span class="png"><span class="png">more</span></span> </a>
                                    </td>
                                </tr>
                                <?php
									}
								?>
                                
                                
                                <tr class="group">
                                	<td colspan="5">BJM Samachaar</td>
                                </tr>
                                 <?php 
									
									for($i=0; $i<count($samachaarMembers); $i++){
										$rowtype = "";
										if($i % 2 == 0){
											$rowtype = "even";
										}else{
											$rowtype = "odd";
										}
										$member = $samachaarMembers[$i];
								?>
                                <tr class="<?php echo $rowtype; ?>">
                                	<td class="tag">
										<?php
											if(trim($member["PostName"])!=$prevPost){
												$prevPost = trim($member["PostName"]);
												echo $member["PostName"]; 
											}
										?>
                                    </td>
                                    <td><?php echo $member["MemberName"]; ?> </td>
                                    <td>
										<?php 
											echo $member["City"]; 
											if($member["District"] && $member["District"]!="" && trim($member["City"])!=trim($member["District"])){
												echo " - ".$member["District"];
											}
											if($member["State"] && $member["State"]!=""){
												echo " (".$member["State"].")";
											}
										 ?>
                                    </td>
                                    <td>
										<?php 
											echo trim($member["PersonalNo"]); 
											if(trim($member["PersonalNo"])!="" &&  trim($member["HContactNo"])!="" && trim($member["PersonalNo"])!=trim($member["HContactNo"])) {
												echo ", ";
											}
											if(trim($member["PersonalNo"])!=trim($member["HContactNo"])){
												echo trim($member["HContactNo"]);
											}
										?>
                                    </td>
                                    <td class="btn">
                                    	<a href='<?php echo Yii::app()->createUrl("/memberDetails/executiveProfile/id/".$member["pkMemberId"]);?>' class="button png"><span class="png"><span class="png">more</span></span> </a>
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
