<?php $this->pageTitle="Bhartiya Jain Milan-Monthly Magazine" ?>
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
                            <h2 class="title-1">Bhartiya Jain Milan <strong>Leaders</strong></h2>
                            <h3 class="head1">Monthly Magazine</h3>
                            
                            <p class="text-1 indent-bot"> 
                            	
                            </p>
                            
                            <?php //echo Yii::app()->request->scriptFile; 
							  
							 //$aa = pathinfo(Yii::app()->basePath);
							 //echo $aa['dirname'];
							 echo $_SERVER['SERVER_NAME'];
							 echo 'aaa'.Yii::app()->request->baseUrl;
							 echo 'bbb'.Yii::app()->homeUrl;
							?>
                            
                            
                            <iframe style="width: 100%; height: 700px;" src="https://docs.google.com/viewer?url=http://<?php echo $_SERVER['SERVER_NAME'].Yii::app()->request->baseUrl; ?>/resources/magazines/sep_2012.pdf&embedded=true">
                            </iframe>
                            
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
