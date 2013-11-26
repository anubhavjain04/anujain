<?php $this->pageTitle="Bhartiya Jain Milan-National Governing Board" ?>
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
                            <h3 class="head1">Zone-<?php if($zonecode){ echo $zonecode; }?><strong> Executives</strong> 
								<?php 
									if(intval(date('m'))>3){
										echo date('Y').'-'.(intval(date('Y'))+1);
									}else{
										echo (intval(date('Y'))-1) ."-".date('Y');
									}
								?>
                            </h3> 
                            <div class="row">
								Zone Name : 
                                <?php 
                                    $zoneCodeArray = array();
                                    if(isset($allZones)){
                                        $zoneCodeArray = $allZones;
                                    }
                                     ?>
                                <?php echo CHtml::dropDownList('zone',$zonecode, $zoneCodeArray, array('prompt'=>'[Select Zone]', 'id'=>'zone'));?>
                            </div> 
                               
                            <?php 
								if($zoneMembers && count($zoneMembers)>0){
							?>
                            <table class="tbllist">  
                            	<?php 
									$prevZoneCode = "";
									for($i=0; $i<count($zoneMembers); $i++){
										$imgPath = Yii::app()->request->baseUrl."/images/blank_user.png";
										if($zoneMembers[$i]["PhotoPath"] && trim($zoneMembers[$i]["PhotoPath"])!=""){
											$imgPath = Yii::app()->request->baseUrl.Yii::app()->params['memberPotoPath']."/".$zoneMembers[$i]["PhotoPath"];
										}
										
								?>       
                                 <?php /* 
									if(trim($zoneMembers[$i]["ZoneCode"])!=$prevZoneCode){
										$prevZoneCode = trim($zoneMembers[$i]["ZoneCode"]);
										echo "<tr class=\"group\" style=\"margin-top: 8px;\"><td colspan=\"2\" style=\"background-color:#74A021;\">Zone - ".$zoneMembers[$i]["ZoneCode"]."</td></tr>"; 
									}*/
								?>                   	
                                <tr class="group">
                                	<td colspan="2"><?php echo $zoneMembers[$i]["PostName"]; ?></td>
                                </tr>                                
                                 <tr class="odd">
                                	<td style="width: 100px;"><div class="userimg" style="background: url(<?php echo $imgPath; ?>) center;"></td>
                                    <td>
                                    	<ul class="ullist">
                                        	<li class="strong"><?php echo "Zone - ".$zoneMembers[$i]["ZoneCode"]; ?></li>
                                            <li class="strong color-10"><?php echo $zoneMembers[$i]["MemberName"]; ?></li>
                                            <li>City: <?php 
														echo $zoneMembers[$i]["City"]; 
														if($zoneMembers[$i]["District"] && $zoneMembers[$i]["District"]!="" && $zoneMembers[$i]["District"]!=$zoneMembers[$i]["City"]){
															echo " - ".$zoneMembers[$i]["District"];
														}
														if($zoneMembers[$i]["State"] && $zoneMembers[$i]["State"]!=""){
															echo " (".$zoneMembers[$i]["State"].")";
														}
														?>
                                            </li>
                                             <li class="color-11">
                                            	Contact No: 
												<?php
													echo trim($zoneMembers[$i]["PersonalNo"]); 
													if(trim($zoneMembers[$i]["PersonalNo"])!="" &&  trim($zoneMembers[$i]["HContactNo"])!="" && trim($zoneMembers[$i]["PersonalNo"])!=trim($zoneMembers[$i]["HContactNo"])) {
														echo ", ";
													}
													if(trim($zoneMembers[$i]["PersonalNo"])!=trim($zoneMembers[$i]["HContactNo"])){
														echo trim($zoneMembers[$i]["HContactNo"]);
													} 
												?> 
                                            </li>
                                            <?php /* <li>                                            	 
												<?php if(trim($zoneMembers[$i]["EmailId"])!="") echo "Email Id:".trim($zoneMembers[$i]["EmailId"]); ?> 
                                            </li> */ ?>
                                            <li class="color-9">
                                            	<div class="left">
                                            	since <?php echo date('F',strtotime($zoneMembers[$i]["AssignDate"]));  ?> <?php echo date('Y',strtotime($zoneMembers[$i]["AssignDate"])); ?>
                                                </div>
                                                <div class="right" style="text-align: right; padding-right: 10px;">
                                                	<a href='<?php echo Yii::app()->createUrl("/memberDetails/executiveProfile/id/".$zoneMembers[$i]["pkMemberId"]);?>' class="button png"><span class="png"><span class="png">more</span></span> </a>
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
    $("#zone").change(function(e) {
		var zone = $.trim($(this).val());
        if(zone!=""){
			document.location.href = "<?php echo Yii::app()->homeUrl.'/'.Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId(); ?>/zone/"+zone+".html";
		}
    });
});
</script>
