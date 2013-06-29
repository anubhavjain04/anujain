<?php $this->pageTitle="View News | Samachar" ?>
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
                            <h2 class="title-1">Bhartiya Jain Milan <strong> News</strong></h2>
                            <?php 
							if($model){
							?>                     
                            
                           	<h3 class="head1">City  <strong><?php echo $model->city; ?></strong></h3>
                           <div style="font-size: 1.1em;">
                            <table class="tbllist p3 hindi">
                            	<tr class="odd">
                                	<th>Title</th>
                                    <td>
                                    	<h5 class="title-1" style="line-height: 1.4em;"> 
			                            	<strong><?php echo $model->title; ?></strong>
                            			</h5>
                                    </td>
                                </tr>
                                <tr class="even">
                                	<th>City</th>
                                    <td>
                                    	<?php echo $model->city; ?>
                                    </td>
                                </tr>                                
                                <tr class="even">
                                	<th>Date</th>
                                    <td>
                                    	<?php echo date('d F Y',strtotime($model->newsDate)); ?>
                                    </td>
                                </tr>   
                                                         	
                            </table>
                            
                            <h4>News Details</h4>
                            <div class="hindi" style="line-height: 2.2em; color:#000000; text-align: justify;"><?php echo $model->news; ?></div>
                             <?php 
							}else{
								echo "No news found...";
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
      </div>
      <div class="row-2">
        <div class="indent">
          <h3><span class="hindifont"></span></h3>
        </div>
        <div class="wrapper">        	
        	<p class="text-11">
            	
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
