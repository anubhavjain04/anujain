<?php 
	$advertisementData = $model->getRandomAdvertisement();
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
			<a href="#" style="background:url(<?php echo $imgPath; ?>);">
			</a>
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