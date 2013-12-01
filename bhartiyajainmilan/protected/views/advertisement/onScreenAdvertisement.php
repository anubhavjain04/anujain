<?php 
	$advertisementData = $model->getScreenAdvertisement();
	if(count($advertisementData)>0){
		$add = $advertisementData[0];			
		if(isset($add["WebPage"]) && $add["WebPage"]!=null){
			echo '<center>'.$add["WebPage"].'</center>';
		}
	}
	else{
 ?>
 <center>
 	<div style="height: 500px;">
 		<div>
 			<img src="<?php echo Yii::app()->request->baseUrl; ?>/resources/advertisement-img/default-screen-add.jpg" alt="Advertisement" />
 		</div>
 		<div>
 			<h2 class="title-1"><strong>Contact Us</strong></h2>                            
            <h4 style="margin-bottom: 8px;">Narendra Jain Rajkamal</h4>
            <h5 class="p4" style="margin-bottom: 8px;"><strong>Mobile: </strong> 09837048560</h5>
            <h4 style="font-size: 1.5em; margin-bottom: 8px;"><strong>Bhartiya Jain Milan</strong></h4>
            <h5 class="p4"><strong>Email: </strong><a href="mailto:sponsor@bhartiyajainmilan.com">sponsor@bhartiyajainmilan.com</a></h5>
 		</div>
 	</div>
 </center>
 <?php 
	}
 ?>