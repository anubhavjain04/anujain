<?php $this->pageTitle="Bhartiya Jain Milan-Samachaar Executives" ?>
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
                            <h2 class="title-1">Bhartiya Jain Milan</h2>
                            <h3 class="title-1"><strong>Samachaar Executives</strong></h3>
                            <?php 
								if($boardMembers && count($boardMembers)>0){
							?>
                            <table class="tbllist">  
                            	<?php 
									for($i=0; $i<count($boardMembers); $i++){
										$imgPath = Yii::app()->request->baseUrl."/images/blank_user.png";
										if($boardMembers[$i]["PhotoPath"] && trim($boardMembers[$i]["PhotoPath"])!=""){
											$imgPath = Yii::app()->request->baseUrl.Yii::app()->params['memberPotoPath']."/".$boardMembers[$i]["PhotoPath"];
										}
										
								?>                          	
                                <tr class="group">
                                	<td colspan="2"><?php echo $boardMembers[$i]["PostName"]; ?></td>
                                </tr>                                
                                 <tr class="odd">
                                	<td style="width: 100px;"><div class="userimg" style="background: url(<?php echo $imgPath; ?>) center;"></td>
                                    <td>
                                    	<ul class="ullist">
                                            <li class="strong color-10"><?php echo $boardMembers[$i]["MemberName"]; ?></li>
                                            <li>City: <?php 
														echo $boardMembers[$i]["City"]; 
														if($boardMembers[$i]["District"] && $boardMembers[$i]["District"]!="" && $boardMembers[$i]["District"]!=$boardMembers[$i]["City"]){
															echo " - ".$boardMembers[$i]["District"];
														}
														if($boardMembers[$i]["State"] && $boardMembers[$i]["State"]!=""){
															echo " (".$boardMembers[$i]["State"].")";
														}
														?>
                                            </li>
                                            <li class="color-11">
                                            	Contact No: 
												<?php
													echo trim($boardMembers[$i]["PersonalNo"]); 
													if(trim($boardMembers[$i]["PersonalNo"])!="" &&  trim($boardMembers[$i]["HContactNo"])!="" && trim($boardMembers[$i]["PersonalNo"])!=trim($boardMembers[$i]["HContactNo"])) {
														echo ", ";
													}
													if(trim($boardMembers[$i]["PersonalNo"])!=trim($boardMembers[$i]["HContactNo"])){
														echo trim($boardMembers[$i]["HContactNo"]);
													} 
												?> 
                                            </li>
                                           <?php /* <li>                                            	 
												<?php if(trim($boardMembers[$i]["EmailId"])!="") echo "Email Id:".trim($boardMembers[$i]["EmailId"]); ?> 
                                            </li>
											*/ ?>
                                            <li class="color-9">
                                            	<div class="left">
                                            	since <?php echo date('F',strtotime($boardMembers[$i]["AssignDate"]));  ?> <?php echo date('Y',strtotime($boardMembers[$i]["AssignDate"])); ?>
                                                </div>
                                                <div class="right" style="text-align: right; padding-right: 10px;">
                                                	<a href='<?php echo Yii::app()->createUrl("/memberDetails/executiveProfile/id/".$boardMembers[$i]["pkMemberId"]);?>' class="button png"><span class="png"><span class="png">more</span></span> </a>
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
