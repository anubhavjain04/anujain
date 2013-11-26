<?php $this->pageTitle="Bhartiya Jain Milan | Member Profile Form" ?>
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
                          	<?php 
							if(isset($success) &&  $success !=''){
								
								
								?>
                                <h3 class="head1"><?php echo $success; ?></h3>	
                                Please <a href="<?php echo Yii::app()->createUrl("/staticPages/sendProfile");?>">click here</a> for try again. 
                                <?php
							}
							else{
							?> 
                            <h2 class="title-1"><strong>Send your profile to us</strong></h2>
							<p>
                            	Please fill your profile and click on send button. Your profile will come to us and we will update your profile as soon as possible.
                            </p>
							<div class="p4">
                            	  
                           	</div>
                            <h3 class="head1">Fill Your Profile</h3>
                            <p>
                            	* Fields are mandatory.
                            </p>
                            
                            <form class="form-theme" id="member_profile" name="member_profile" method="post" enctype="multipart/form-data" action='<?php echo Yii::app()->createUrl("/staticPages/sendProfile");?>'>
                            <table>
                            	<tr>
                                <td colspan="2"><h4>Personal Details</h4></td>
                                </tr>
                            	<tr>
                                <td><label for="mname">Member Name*</label></td>
                                <td><input type="text" id="mname" name="mname" /></td>
                                </tr>
                                <tr>                                
                                <td><label for="dob">Member's Date of Birth</label></td>
                                <td><input type="text" id="dob" name="dob" /> (dd/mm/yyyy)</td>
                                </tr>
                                <tr>
                                <td><label for="sex">Gender</label></td>
                                <td><input type="radio" name="sex" value="Male" checked="checked" style="width: 20px;" />Male <input type="radio" name="sex" value="Female" style="width: 20px;" />Female</td>
                                </tr>
                                <tr>
                                <td><label for="maritalstatus">Marital Status</label></td>
                                <td><input type="radio" name="maritalstatus" value="Married" checked="checked" style="width: 20px;" />Married <input type="radio" name="maritalstatus" value="Unmarried" style="width: 20px;" />Unmarried</td>
                                </tr>
                                <tr>
                                <td><label for="spouse">Spouse(Wife/Husband) Name</label></td>
                                <td><input type="text" id="spouse" name="spouse" /></td>
                                </tr>
                                <tr>
                                <td><label for="mdate">Marriage Date</label></td>
                                <td><input type="text" id="mdate" name="mdate" /> (dd/mm/yyyy)</td>
                                </tr>
                                <tr>
                                <td><label for="hAddress1">Home Address</label></td>
                                <td><input type="text" id="hAddress1" name="hAddress1" style="width: 400px;" /></td>
                                </tr>
                                <tr>
                                <td></td>
                                <td><input type="text" id="hAddress2" name="hAddress2" style="width: 400px;" /></td>
                                </tr>
                                <tr>
                                <td><label for="hContactNo">Home Contact No.</label></td>
                                <td><input type="text" id="hContactNo" name="hContactNo" /></td>
                                </tr>
                                <tr>
                                <td><label for="oName">Office/Occupation Name</label></td>
                                <td><input type="text" id="oName" name="oName" /></td>
                                </tr>
                                <tr>
                                <td><label for="oAddress1">Office/Occupation Address</label></td>                                
                                <td><input type="text" id="oAddress1" name="oAddress1" style="width: 400px;" /></td>
                                </tr>
                                <tr>
                                <td></td>                                
                                <td><input type="text" id="oAddress2" name="oAddress2" style="width: 400px;" /></td>
                                </tr>
                                <tr>
                                <td><label for="oContactNo">Office/Occupation Contact No.</label></td>
                                <td><input type="text" id="oContactNo" name="oContactNo" /></td>
                                </tr>
                                <tr>
                                <td><label for="fatherName">Father's Name</label></td>
                                <td><input type="text" id="fatherName" name="fatherName" /></td>
                                </tr>
                                <tr>
                                <td><label for="motherName">Mother's Name</label></td>
                                <td><input type="text" id="motherName" name="motherName" /></td>
                                </tr>
                                <tr>
                                <td><label for="city">City*</label></td>
                                <td><input type="text" id="city" name="city" /></td>
                                </tr>
                                <tr>
                                <td><label for="district">District</label></td>
                                <td><input type="text" id="district" name="district" /></td>
                                </tr>
                                <tr>
                                <td><label for="state">State*</label></td>
                                <td><input type="text" id="state" name="state" /></td>
                                </tr>
                                <tr>
                                <td><label for="mobNo">Personal Mobile No.</label></td>
                                <td><input type="text" id="mobNo" name="mobNo" /></td>
                                </tr>
                                <tr>
                                <td><label for="emailid">Email ID</label></td>
                                <td><input type="text" id="emailid" name="emailid" /></td>
                                </tr>
                                <tr>
                                <tr>
                                <td><label for="photo" style="color:#0033FF;">Upload Your Photo</label></td>
                                <td><input type="file" id="photo" name="photo"  /></td>
                                </tr>
                                <tr>
                                <td colspan="2"><h4>Organization Details</h4></td>
                                </tr>
                                <tr>
                                <td><label for="memCode">Member Code</label></td>
                                <td><input type="text" id="memCode" name="memCode" /></td>
                                </tr>
                                <tr>
                                <td><label for="zoneNo">Member's Zone No.</label></td>
                                <td><input type="text" id="zoneNo" name="zoneNo" /></td>
                                </tr>
                                <tr>
                                <td><label for="memBranchName">Member's Branch Name</label></td>
                                <td><input type="text" id="memBranchName" name="memBranchName" /></td>
                                </tr>
                                <tr>
                                <td><label for="memBranchNo">Member's Branch No.</label></td>
                                <td><input type="text" id="memBranchNo" name="memBranchNo" /></td>
                                </tr>
                                <tr>
                                <td><label>Post Details</label></td>
                                <td>
                                	<p>If you have multiple posts on diffrent levels, please fill all post which you have.</p>
                                	<table class="tbllist" style="width: 100%; text-align: left; border: solid 1px #999999;">
                                    	<tr style="border-bottom: solid 1px #999999;">
                                        	<th>Level</th>
                                        	<th>Post Name</th>
                                            <th>From Year</th>
                                        </tr>
                                        <tr>
                                        	<td style="padding:3px; background:#999999; color:#FFF;">National</td>
                                        	<td style="padding:3px;"><input type="text" id="nlPost" name="nlPost" style="width: 150px;" /></td>
                                            <td style="padding:3px;"><input type="text" id="nlFrom" name="nlFrom" style="width: 150px;" /></td>
                                        </tr>
                                        <tr>
                                        	<td style="padding:3px; background:#999999; color:#FFF;">BJM Foundation</td>
                                        	<td style="padding:3px;"><input type="text" id="flPost" name="flPost" style="width: 150px;" /></td>
                                            <td style="padding:3px;"><input type="text" id="flFrom" name="flFrom" style="width: 150px;" /></td>
                                        </tr>                                         
                                        <tr>
                                        	<td style="padding:3px; background:#999999; color:#FFF;">Zone</td>
                                        	<td style="padding:3px;"><input type="text" id="zlPost" name="zlPost" style="width: 150px;" /></td>
                                            <td style="padding:3px;"><input type="text" id="zlFrom" name="zlFrom" style="width: 150px;" /></td>
                                        </tr>
                                        <tr>
                                        	<td style="padding:3px; background:#999999; color:#FFF;">Branch</td>
                                        	<td style="padding:3px;"><input type="text" id="blPost" name="blPost" style="width: 150px;" /></td>
                                            <td style="padding:3px;"><input type="text" id="blFrom" name="blFrom" style="width: 150px;" /></td>
                                        </tr>
                                    </table>
                                
                                </td>
                                </tr>
                                <tr>
                                	<td>Verify Code</td>
                                    <td>
                                    	 <?php
											  require_once(Yii::app()->basePath."/controllers/recaptchalib.php");
											  $publickey = "6Lepn9sSAAAAAEM0srD2FE9Tko1JoAZ-LqRyy3rP"; // you got this from the signup page
											  echo recaptcha_get_html($publickey);
										?>
                                    </td>
                                </tr>
                                <tr>
                                <td>
                                </td>
                                <td><button id="MemberProfile" name="MemberProfile" >Send</button></td>
                                </tr>
                            </table>
                           
                            </form>                            
                            <?php } ?>
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
