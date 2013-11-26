<?php $this->pageTitle="Bhartiya Jain Milan-Zone Executives" ?>
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
                            <h3 class="head1">Zonal <strong>Executives</strong> 
								<?php 
									if(intval(date('m'))>3){
										echo date('Y').'-'.(intval(date('Y'))+1);
									}else{
										echo (intval(date('Y'))-1) ."-".date('Y');
									}
								?>
                            </h3>
                            <?php 
								if($zoneMembers && count($zoneMembers)>0){
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
									$prevZoneCode = "";
									for($i=0; $i<count($zoneMembers); $i++){
										$rowtype = "";
										if($i % 2 == 0){
											$rowtype = "even";
										}else{
											$rowtype = "odd";
										}
								?>
                                <?php 
									if(trim($zoneMembers[$i]["ZoneCode"])!=$prevZoneCode){
										$prevZoneCode = trim($zoneMembers[$i]["ZoneCode"]);
										echo "<tr class=\"group\"><td colspan=\"5\">Zone - ".$zoneMembers[$i]["ZoneCode"]."</td></tr>"; 
									}
								?>
                                <tr class="<?php echo $rowtype; ?>">
                                	<td class="tag">
										<?php
											if(trim($zoneMembers[$i]["PostName"])!=$prevPost){
												$prevPost = trim($zoneMembers[$i]["PostName"]);
												echo $zoneMembers[$i]["PostName"]; 
											}
										?>
                                    </td>
                                    <td><?php echo $zoneMembers[$i]["MemberName"]; ?></td>
                                    <td>
										<?php 
											echo $zoneMembers[$i]["City"]; 
											if($zoneMembers[$i]["District"] && $zoneMembers[$i]["District"]!=""){
												echo " - ".$zoneMembers[$i]["District"];
											}
											if($zoneMembers[$i]["State"] && $zoneMembers[$i]["State"]!=""){
												echo " (".$zoneMembers[$i]["State"].")";
											}
										 ?>
                                    </td>
                                     <td>
										<?php 
											echo trim($zoneMembers[$i]["PersonalNo"]); 
											if(trim($zoneMembers[$i]["PersonalNo"])!="" &&  trim($zoneMembers[$i]["HContactNo"])!="" && trim($zoneMembers[$i]["PersonalNo"])!=trim($zoneMembers[$i]["HContactNo"])) {
												echo ", ";
											}
											if(trim($zoneMembers[$i]["PersonalNo"])!=trim($zoneMembers[$i]["HContactNo"])){
												echo trim($zoneMembers[$i]["HContactNo"]);
											}
										?>
                                    </td>
                                    <td class="btn">
                                    	<a href='<?php echo Yii::app()->createUrl("/memberDetails/executiveProfile/id/".$zoneMembers[$i]["pkMemberId"]);?>' class="button png"><span class="png"><span class="png">more</span></span> </a>
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
