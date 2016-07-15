<?php $this->pageTitle="Bhartiya Jain Milan | Contact Us" ?>
<div id="content">
  <div class="wrapper">
    <div class="col-1">
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
                          	<div>
	                          	<div style="float: left;">
		                            <h2 class="title-1"><strong>Contact Us</strong></h2>                            
		                            <h4 style="margin-bottom: 8px; margin-top: 25px; color: #ff0000;">Narendra Jain Rajkamal</h4>
		                            <h5 class="p4" style="margin-bottom: 8px; color: #008000;"><strong>Prabhari Website / National General Secretary (Org.)</strong> </h5>
		                            <h4 style="font-size: 1.5em; margin-bottom: 8px;"><strong>Bhartiya Jain Milan</strong></h4>
		                            <h5 class="p4" style="margin-bottom: 8px;"><strong>Mobile: </strong> 09837048560</h5>
		                            <h5 class="p4"><strong>Email: </strong><a href="mailto:contactus@bhartiyajainmilan.com">contactus@bhartiyajainmilan.com</a></h5>
	                           	</div>
	                           	<div style="float: right;">
	                            	<div class="website-contact">
	                            		<div class="post"><strong>National President</strong></div>
	                            		<div class="name">Veer Suresh Jain Rituraj</div>
	                            		<div class="contactNo"><strong>Mobile: </strong> +91 9837481839</div>
	                            		<div class="email"><strong>Email: </strong><a href="mailto:tulsipublication@gmail.com">tulsipublication@gmail.com</a></div>
	                            		
	                            	</div>
	                            	<div class="website-contact">
			                            <div class="post"><strong>National General Secretary (Administration)</strong></div>
			                            <div class="name">Veer Naresh Chand Jain</div>
	                            		<div class="contactNo"><strong>Mobile: </strong> +91 9897227228</div>
	                            		<div class="email"><strong>Email: </strong><a href="mailto:nareshchandjain24@gmail.com">nareshchandjain24@gmail.com</a></div>
	                            	</div>
	                            	<div class="website-contact">
			                            <div class="post"><strong>National General Secretary (Organization)</strong></div>
			                            <div class="name">Veer Narendra Jain Rajkamal</div>
	                            		<div class="contactNo"><strong>Mobile: </strong> +91 9837048560</div>
	                            		<div class="email"><strong>Email: </strong><a href="mailto:rajkamal@bhartiyajainmilan.com">rajkamal@bhartiyajainmilan.com</a></div>
	                            	</div>
	                            </div>
                           	</div> 
                            
                            
                            <div class="clear"></div>

							<div class="p4">
                            	<?php 
								if(isset($success)){
									echo $success;	
								}
								?>   
                           	</div>
                            <h3 class="title-1"><strong>Feedback / Query</strong></h3>
                            <p>
                            	* Fields are mandatory.
                            </p>
                            
                            <form class="form-theme" id="feedback_form" name="feedback_form" method="post" action="<?php echo Yii::app()->homeUrl?>/staticPages/contactUs">
                            <ul>
                                <li><label for="fname">Your Name*</label></li>
                                <li><input type="text" id="fname" name="fname" /></li>
                                <li><label for="femail">Your Email Address</label></li>
                                <li><input type="text" id="femail" name="femail" /></li>
                                <li><label for="fsubject">Message Subject*</label></li>
                                <li><input type="text" id="fsubject" name="fsubject" /></li>
                                <li><label for="fbody">Your Message*</label></li>
                                <li><textarea id="fbody" name="fbody" rows="10" cols="50"></textarea></li>
                                <li><input type="checkbox" value="0" id="femail_copy" name="femail_copy">
                                    <label for="femail_copy">E-mail a copy of this message to your own address.</label>
                                </li>
                                <li>
									 <?php
                                          require_once(Yii::app()->basePath."/controllers/recaptchalib.php");
                                          $publickey = "6Lepn9sSAAAAAEM0srD2FE9Tko1JoAZ-LqRyy3rP"; // you got this from the signup page
                                          echo recaptcha_get_html($publickey);
                                    ?>
                                    
                                </li>
                                <li><button id="FeedbackForm" name="FeedbackForm" >Send</button></li>
                            </ul>
                            </form>                            
                            
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
    <?php
    	$filepath = Yii::app()->basePath."/views/site/rightNewsProgrames.php";
    	include($filepath); 
    ?>
  </div>
</div>
