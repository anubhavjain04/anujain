<?php $this->pageTitle="Bhartiya Jain Milan-All Branch" ?>
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
                            <h2 class="title-1">Bhartiya Jain Milan <strong>Branches</strong></h2>                            
                            
                            <h3 class="head1">Zone-<?php if($zonecode){ echo $zonecode; }?><strong> Branches</strong> </h3>
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
                            <?php 
								if($branches && count($branches)>0){
							?>
                            <table class="tbllist">
                            	<tr>
                                	<th>Branch Code</th>
                                    <th>Branch Name</th>
                                    <th>Town/City</th>
                                    <th>View Branch</th>
                                </tr>
                                <?php 
									$prevPost = "";
									for($i=0; $i<count($branches); $i++){
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
											echo $branches[$i]["BranchCode"];
										?>
                                    </td>
                                    <td><?php echo $branches[$i]["BranchName"]; ?> </td>
                                    <td>
										<?php 
											echo $branches[$i]["City"]; 
											if($branches[$i]["District"] && $branches[$i]["District"]!="" && trim($branches[$i]["City"])!=trim($branches[$i]["District"])){
												echo " - ".$branches[$i]["District"];
											}
											if($branches[$i]["State"] && $branches[$i]["State"]!=""){
												echo " (".$branches[$i]["State"].")";
											}
										 ?>
                                    </td>
                                    <td class="btn">
                                    	<a href='<?php echo Yii::app()->createUrl("/branchMaster/branchExecutives/branch/".$branches[$i]["BranchCode"]);?>' class="button png"><span class="png"><span class="png">more</span></span> </a>
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
