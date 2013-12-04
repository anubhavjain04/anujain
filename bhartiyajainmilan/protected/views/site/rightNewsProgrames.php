<div class="col-2">
 <!-- <div class="row-1 p4">
    <div class="padding">
      <h3>Forthcoming Programs</h3>
      <div class="border-bot indent-bot">
        <div class="wrapper">
          <div class="date-box"> apr<br />
            <span>28</span> </div>
          <div class="extra-box"> <strong class="color-5">Lorem ipsum eturadipcin praesent vesint</strong><br />
            Anbun molestie nonuyhendre sit variusm <a class="color-4 it" href="#">more</a> </div>
        </div>
      </div>
      <div class="border-bot margin-bot">
        <div class="wrapper">
          <div class="date-box"> apr<br />
            <span>28</span> </div>
          <div class="extra-box"> <strong class="color-5">Lorem ipsum eturadipcin praesent vesint</strong><br />
            Anbun molestie nonuyhendre sit variusm <a class="color-4 it" href="#">more</a> </div>
        </div>
      </div>
      <a class="button png" href="#"><span class="png"><span class="png">all news</span></span> </a> </div>
  </div>-->
  
  <div class="row-2 p4">
    <div class="padding sponsar">
      <div class="head p4">
      	<span>Sponsored</span>
        <a href='<?php echo Yii::app()->createUrl("/advertisement/allAdvertisement"); ?>'>see all</a>
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
           		<div class="title"><a href="<?php echo $webPageLink; ?>"><?php echo $add['TitleName']; ?></a></div>
               	<div class="adinfo">
                	<?php 
						if(isset($add['WebsiteLink']) && $add['WebsiteLink'] != null && !empty($add['WebsiteLink'])){
							echo '<a href="'.$add['WebsiteLink'].'" target="_blank">'.$add['WebsiteLink'].'</a>';
						}else{
							echo '<a href="'.$webPageLink.'">To know more click here</a>';
						}
					?>
                </div>
               	<div class="addimg">
                	<?php 
						if(isset($add['WebsiteLink']) && $add['WebsiteLink'] != null && !empty($add['WebsiteLink'])){
					?>
                    	<a href="<?php echo $add['WebsiteLink']; ?>"  target="_blank" style="background:url(<?php echo $imgPath; ?>);">
                    	</a>
							
                    <?php        
						}else{
					?>
                     <a href="<?php echo $webPageLink; ?>" style="background:url(<?php echo $imgPath; ?>);">
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
  
  <!--<div class="row-2">
    <div class="box1">
      <div class="corner-top-left">
        <div class="corner-top-right">
          <div class="corner-bot-left">
            <div class="corner-bot-right">
              <div class="padding">
                <h4>Recent Programs</h4>
                <div style="height: 200px; overflow: hidden;">
                	<marquee behavior="scroll" direction="up" height="200px" onmouseover="stop();" onmouseout="start();" scrolldelay="150">
                        <div class="recent border-bot indent-bot"> <strong><div class="date">22 april 2012 </div><div class="city">Agra</div></strong>
                          <a href="#">1st Meeting of Bhartiya Jain Milan Foundation</a> </div>
                        <div class="recent border-bot indent-bot"> <strong><div class="date">22 april 2012 </div><div class="city">Agra</div></strong>
                          <a href="#">Zone - 9 <br /> Zonal Adhivation</a> </div>
                        <div class="recent border-bot indent-bot"> <strong><div class="date">07 july 2012 </div><div class="city">Kishangarh(Raj.)</div></strong>
                          <a href="#">1st Meeting of National Executive Committee</a> </div>
                       <div class="recent border-bot indent-bot"> <strong><div class="date">03 june 2012 </div><div class="city">Baraut</div></strong>
                        <a href="#">Zone - 5 <br />1st Meeting of Zonal Executive Committee </a> </div>
                    </marquee>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->
</div>
