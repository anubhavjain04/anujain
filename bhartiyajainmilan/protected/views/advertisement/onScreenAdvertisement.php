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
    <div style="float: left;"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/resources/advertisement-img/default-screen-add.jpg" alt="Advertisement" width="400" /> </div>
    <div class="sponsorContactUs" style="float: right; width: 235px; height: 227px;">
      <div style="float: left;">
        <h2 class="head1" style="margin-top: 0px; "><strong>Contact Us</strong></h2>
        <h4 style="margin-bottom: 8px; margin-top: 5px; color: #ff0000; font-size: 19px;">Narendra Jain Rajkamal</h4>
        <h5 class="p4" style="margin-bottom: 8px; color: #008000;"><strong>Prabhari Website <br />
          <br />
          and <br />
          <br />
          National Vice President</strong> </h5>
        <hr />
        <h4 style="font-size: 1.5em; margin-bottom: 8px;"><strong>Bhartiya Jain Milan</strong></h4>
        <h5 class="p4" style="margin-bottom: 8px;"><strong>Mobile: </strong> 09837048560</h5>
        <h5 class="p4"><strong>Email: </strong><br />
          <br />
          <a href="mailto:sponsor@bhartiyajainmilan.com">sponsor@bhartiyajainmilan.com</a></h5>
      </div>
    </div>
    <div class="clear"></div>
    <hr style="margin-top: 10px;" />
    <div style="text-align: center;">
      <div class="website-contact">
        <div class="post"><strong>National President</strong></div>
        <div class="name">Veer Jai Chand Jain</div>
        <div class="contactNo"><strong>Mobile: </strong> 09259107200</div>
        <div class="email"><strong>Email: </strong><a href="mailto:national.president@bhartiyajainmilan.com">national.president@bhartiyajainmilan.com</a></div>
      </div>
    </div>
    <div style="float: left">
      <div class="website-contact">
        <div class="post"><strong>General Secretary (Administration)</strong></div>
        <div class="name">Veer Naresh Chand Jain</div>
        <div class="contactNo"><strong>Mobile: </strong> 09897227228</div>
        <div class="email"><strong>Email: </strong><a href="mailto:gen.secretary.admin@bhartiyajainmilan.com">gen.secretary.admin@bhartiyajainmilan.com</a></div>
      </div>
    </div>
    <div style="float: right;">
      <div class="website-contact">
        <div class="post"><strong>General Secretary (Organization)</strong></div>
        <div class="name">Veer Vipin Jain</div>
        <div class="contactNo"><strong>Mobile: </strong> 09412207908</div>
        <div class="email"><strong>Email: </strong><a href="mailto:gen.secretary.org@bhartiyajainmilan.com">gen.secretary.org@bhartiyajainmilan.com</a></div>
      </div>
    </div>
  </div>
</center>
<?php 
	}
 ?>
