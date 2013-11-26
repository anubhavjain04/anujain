<?php $this->pageTitle="Bhartiya Jain Milan-Zonal Executives Committee" ?>
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
                            
                            <h3 class="head1">Zone-<?php if($zonecode){ echo $zonecode; }?><strong> Executives Committee</strong> 
								<?php 
									if(intval(date('m'))>3){
										echo date('Y').'-'.(intval(date('Y'))+1);
									}else{
										echo (intval(date('Y'))-1) ."-".date('Y');
									}
								?>
                            </h3>
                           <?php /* <div style="text-align:right;">View: <a href="<?php echo Yii::app()->request->baseUrl; ?>/resources/bjm-karyakarini.pdf" target="_blank">Executive Committee list in hindi</a></div> */?>
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
                            <?php if(isset($magazine) && count($magazine)>0){
							?>
                            <div style="text-align:right;">View: <a href="<?php echo Yii::app()->request->baseUrl.Yii::app()->params['magzinePath']."/".$magazine[0]['Path'];?>" target="_blank">Executive Committee list of Zone-<?php if($zonecode){ echo $zonecode; }?> in PDF</a></div>
                            <?php 
								}
							?>
                            
                            <?php 
								if($members && count($members)>0){
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
									for($i=0; $i<count($members); $i++){
										$rowtype = "";
										if($i % 2 == 0){
											$rowtype = "even";
										}else{
											$rowtype = "odd";
										}
								?>
                                <tr class="<?php echo $rowtype; ?>">
                                	<td class="tag">
										<?php
											if(trim($members[$i]["PostName"])!=$prevPost){
												$prevPost = trim($members[$i]["PostName"]);
												echo $members[$i]["PostName"]; 
											}
										?>
                                    </td>
                                    <td><?php echo $members[$i]["MemberName"]; ?> </td>
                                    <td>
										<?php 
											echo $members[$i]["City"]; 
											if($members[$i]["District"] && $members[$i]["District"]!="" && trim($members[$i]["City"])!=trim($members[$i]["District"])){
												echo " - ".$members[$i]["District"];
											}
											if($members[$i]["State"] && $members[$i]["State"]!=""){
												echo " (".$members[$i]["State"].")";
											}
										 ?>
                                    </td>
                                    <td>
										<?php 
											echo trim($members[$i]["PersonalNo"]); 
											if(trim($members[$i]["PersonalNo"])!="" &&  trim($members[$i]["HContactNo"])!="" && trim($members[$i]["PersonalNo"])!=trim($members[$i]["HContactNo"])) {
												echo ", ";
											}
											if(trim($members[$i]["PersonalNo"])!=trim($members[$i]["HContactNo"])){
												echo trim($members[$i]["HContactNo"]);
											}
										?>
                                    </td>
                                    <td class="btn">
                                    	<a href='<?php echo Yii::app()->createUrl("/memberDetails/executiveProfile/id/".$members[$i]["pkMemberId"]);?>' class="button png"><span class="png"><span class="png">more</span></span> </a>
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
