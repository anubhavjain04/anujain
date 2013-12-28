<?php $this->pageTitle="Bhartiya Jain Milan-Advertisement" ?>
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
                          <div class="padding addvertize reset">
                          	<?php 
								if($model!=null){
							?>
                            <h2 class="head1">Advertisement:-</h2>
				           	<h3 class="title-1"><?php //echo $model->TitleName; ?></h3>
				               	
				           	<div style="margin-top: 20px;"></div>
                            <?php 
									if(isset($model->WebPage) && $model->WebPage!=null){
										echo $model->WebPage; 
									}else{
										?>
	                                    <p class="text-1 indent-bot"> 
	                                        No page found...
	                                    </p>
	                                    <?php
									}
									?>
									<div class="adinfo" style="text-align: center; font-size: 18px;">
									<div style="margin-top: 20px;"></div>
									<hr />
									<div style="margin-top: 20px;"></div>
				                	<?php 
										if(isset($model->WebsiteLink) && $model->WebsiteLink != null && !empty($model->WebsiteLink)){
											echo 'Website: <a href="'.$model->WebsiteLink.'" target="_blank">'.$model->WebsiteLink.'</a>';
										}
									?>
									</div>
								<?php 				               
								}else{									
								
							?>
                            	<h3 class="title-1">No advertisement found...</h3>
                            <?php
								}
							?>
                            
                            <div style="margin-top: 40px; padding: 8px; background-color: #D3D3D3; font-size: 11px;">
                            	<p><strong>Note:</strong> 
                                The appearance of advertising on Bhartiya Jain Milan websites does not imply endorsement of the advertised company or product, nor is advertising allowed to affect editorial decisions or editorial content. Bhartiya Jain Milan is not responsible any type of content displayed in advertisement.                                
                                </p>
                                <div style="text-align:right;">
                                	- more about <a href='<?php echo Yii::app()->createUrl("/staticPages/privacyPolicy");?>' title="Privacy Policy">Advertisement Privacy Policy</a>
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
