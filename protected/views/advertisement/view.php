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
                          <div class="padding reset">
                          	<?php 
								if($model!=null){
							?>
                            <h3 class="title-1"><?php //echo $model->TitleName; ?></h3>
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
								}else{									
								
							?>
                            	<h3 class="title-1">No advertisement found...</h3>
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
