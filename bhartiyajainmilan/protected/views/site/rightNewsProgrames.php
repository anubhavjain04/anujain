<div class="col-2">
  <div class="row-2 p4">
    <div class="padding sponsar">
      <div class="head p2">
      	<span>Sponsored</span>
        <a href='<?php echo Yii::app()->createUrl("/advertisement/allAdvertisement"); ?>'>see all</a>
       </div>
       
       <div>
       	<p>To know more about advertisement, please click on advertisement title, website link or thumbnail.</p>
       </div>
      
      <div id="adds" class="margin-bot">
      	 <?php 
		 	$advertisementModel = new Advertisement();
			$advertisementData = $advertisementModel->getRandomAdvertisement();
			
			if(count($advertisementData)>0){
				for($i=0; $i<count($advertisementData); $i++){
					$add = $advertisementData[$i];
					$imgPath = Yii::app()->request->baseUrl.Yii::app()->params['addImgPath']."/no-cover.gif";
					if($add["AddImagePath"] && trim($add["AddImagePath"])!=""){
						$imgPath = Yii::app()->request->baseUrl.Yii::app()->params['addImgPath']."/".$add["AddImagePath"];
					}
					$webPageLink = "#";
					if(isset($add["WebPage"]) && $add["WebPage"]!=null){
						$webPageLink = Yii::app()->createUrl("/advertisement/view/id/".$add['pkAddId']);
					}
		 ?>	
          <div class="border-bot indent-bot">
           <div class="wrapper addvertize">
           		<div class="title"><a href="<?php echo $webPageLink; ?>" title="<?php echo $add['CustomerName']; ?>"><?php echo $add['TitleName']; ?></a></div>
               	<div class="adinfo">
                	<?php 
						if(isset($add['WebsiteLink']) && $add['WebsiteLink'] != null && !empty($add['WebsiteLink'])){
							echo '<a href="'.$add['WebsiteLink'].'" target="_blank" title="'.$add['CustomerName'].'">'.$add['WebsiteLink'].'</a>';
						}else{
							echo '<a href="'.$webPageLink.'">To know more click here</a>';
						}
					?>
                </div>
               	<div class="addimg">
                	<?php 
						if(isset($add['WebsiteLink']) && $add['WebsiteLink'] != null && !empty($add['WebsiteLink'])){
					?>
                    	<a href="<?php echo $add['WebsiteLink']; ?>"  target="_blank" title="<?php echo $add['CustomerName']; ?>" style="background:url(<?php echo $imgPath; ?>);">
                    	</a>
							
                    <?php        
						}else{
					?>
                     <a href="<?php echo $webPageLink; ?>" title="<?php echo $add['CustomerName']; ?>" style="background:url(<?php echo $imgPath; ?>);">
                    </a>
                    <?php		
						}
					?>
                </div>
               	<div class="body">
                	<?php echo $add['Description']; ?>
                </div>
                <div class="body2">
                	<?php echo $add['FooterDescription']; ?>
                </div>
            </div>
          </div>
          <?php
				}
			}
			else{
		  ?>
          	<div>No advertisements....</div>
          <?php 
			}
		  ?>
          
      </div>
      <a class="button png" href='<?php echo Yii::app()->createUrl("/advertisement/allAdvertisement"); ?>'><span class="png"><span class="png">see all</span></span> </a> </div>
  </div>
</div>
