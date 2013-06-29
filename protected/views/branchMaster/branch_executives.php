<?php $this->pageTitle="Bhartiya Jain Milan-Branch Executives" ?>
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
                            <h3 class="title-1">Bhartiya Jain Milan</h3>
                            <h3 class="head1">Branch <strong> Executives</strong> 
								<?php 
									if(intval(date('m'))>3){
										echo date('Y').'-'.(intval(date('Y'))+1);
									}else{
										echo (intval(date('Y'))-1) ."-".date('Y');
									}
								?>
                            </h3>
                            
                            <p class="text-1 indent-bot">
                            	Branch Name : <strong> <?php echo $model->BranchName;?> </strong> <br />
                                Branch Code : <?php echo $model->BranchCode; ?> 
                            </p> 
                           
                            <div class="row">
								Branch Name : 
                                <?php 
                                    $branchCodeArray = array();
                                    if(isset($allBranches)){
                                        $branchCodeArray = $allBranches;
                                    }
                                     ?>
                                <?php echo CHtml::dropDownList('branch',$branchcode, $branchCodeArray, array('prompt'=>'[Select Branch]', 'id'=>'branch'));?>
                            </div>
                            
                            <br /> 
                            <div style="text-align: right;">
                            	View: <a href='<?php echo Yii::app()->createUrl("/branchMaster/branchExecutivesCommittee/branch/".$model->BranchCode);?>'>Branch Committee Members</a>
                            </div>   
                            <?php 
								if($members && count($members)>0){
							?>
                            <table class="tbllist">  
                            	<?php 
									$prevZoneCode = "";
									for($i=0; $i<count($members); $i++){
										$imgPath = Yii::app()->request->baseUrl."/images/blank_user.png";
										if($members[$i]["PhotoPath"] && trim($members[$i]["PhotoPath"])!=""){
											$imgPath = Yii::app()->request->baseUrl.Yii::app()->params['memberPotoPath']."/".$members[$i]["PhotoPath"];
										}
										
								?>       
                                 <?php /* 
									if(trim($members[$i]["ZoneCode"])!=$prevZoneCode){
										$prevZoneCode = trim($members[$i]["ZoneCode"]);
										echo "<tr class=\"group\" style=\"margin-top: 8px;\"><td colspan=\"2\" style=\"background-color:#74A021;\">Zone - ".$members[$i]["ZoneCode"]."</td></tr>"; 
									}*/
								?>                   	
                                <tr class="group">
                                	<td colspan="2"><?php echo $members[$i]["PostName"]; ?></td>
                                </tr>                                
                                 <tr class="odd">
                                	<td style="width: 100px;"><div class="userimg" style="background: url(<?php echo $imgPath; ?>) center;"></td>
                                    <td>
                                    	<ul class="ullist">
                                        	<li class="strong"><?php echo "Zone - ".$members[$i]["ZoneCode"]; ?></li>
                                            <li class="strong color-10"><?php echo $members[$i]["MemberName"]; ?></li>
                                            <li>City: <?php 
														echo $members[$i]["City"]; 
														if($members[$i]["District"] && $members[$i]["District"]!="" && $members[$i]["District"]!=$members[$i]["City"]){
															echo " - ".$members[$i]["District"];
														}
														if($members[$i]["State"] && $members[$i]["State"]!=""){
															echo " (".$members[$i]["State"].")";
														}
														?>
                                            </li>
                                             <li class="color-11">
                                            	Contact No: 
												<?php
													echo trim($members[$i]["PersonalNo"]); 
													if(trim($members[$i]["PersonalNo"])!="" &&  trim($members[$i]["HContactNo"])!="" && trim($members[$i]["PersonalNo"])!=trim($members[$i]["HContactNo"])) {
														echo ", ";
													}
													if(trim($members[$i]["PersonalNo"])!=trim($members[$i]["HContactNo"])){
														echo trim($members[$i]["HContactNo"]);
													} 
												?> 
                                            </li>
                                            <?php /* <li>                                            	 
												<?php if(trim($members[$i]["EmailId"])!="") echo "Email Id:".trim($members[$i]["EmailId"]); ?> 
                                            </li> */ ?>
                                            <li class="color-9">
                                            	<div class="left">
                                            	since <?php echo date('F',strtotime($members[$i]["AssignDate"]));  ?> <?php echo date('Y',strtotime($members[$i]["AssignDate"])); ?>
                                                </div>
                                                <div class="right" style="text-align: right; padding-right: 10px;">
                                                	<a href='<?php echo Yii::app()->createUrl("/memberDetails/executiveProfile/id/".$members[$i]["pkMemberId"]);?>' class="button png"><span class="png"><span class="png">more</span></span> </a>
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
<script type="text/javascript">
$(document).ready(function(e) {
    $("#branch").change(function(e) {
		var branch = $.trim($(this).val());
        if(branch!=""){
			document.location.href = "<?php echo Yii::app()->homeUrl.'/'.Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId(); ?>/branch/"+branch+".html";
		}
    });
});
</script>
