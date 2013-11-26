<?php $this->pageTitle="Bhartiya Jain Milan-Branch Executives Committee" ?>
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
                            <h3 class="title-1">Bhartiya Jain Milan </h3>    
                            <h3 class="head1">Branch <strong> Executive Committee</strong> 
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
    $("#branch").change(function(e) {
		var branch = $.trim($(this).val());
        if(branch!=""){
			document.location.href = "<?php echo Yii::app()->homeUrl.'/'.Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId(); ?>/branch/"+branch+".html";
		}
    });
});
</script>
