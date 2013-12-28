<?php

class StaticPagesController extends Controller

{

/**

	 * Displays a particular model.

	 * @param integer $id the ID of the model to be displayed

	 */

	public function actionView()
	{
		$model = $this->loadModel();

		/*$id = $_GET['id'];

		$model = $this->loadModel($id);

		$this->pageTitle = $model['static_page_name'];

		

		////Code to show Meta title and Meta Description////// 

		

		Yii::app()->clientScript->registerMetaTag($model['static_page_meta_tag'], 'keywords');

		Yii::app()->clientScript->registerMetaTag($model['static_page_meta_description'], 'description');

		

		////Code to show Meta title and Meta Description////// 
		*/
		

		

		$this->render('view',array(

			'model'=>$model,

		));

	}
	
	public function actionHistory(){
		Yii::app()->clientScript->registerMetaTag('Bhartiya Jain Milan History,jain milan history, history, jain milan structure, digambar, shwetambar', 'keywords');
		Yii::app()->clientScript->registerMetaTag('This page describes the histroy and structure of Bhartiya Jain Milan.', 'description');
		$model = $this->loadModel();
		$this->render('history',array(
			'model'=>$model,
		));
	}
	
	public function actionJourney(){
		Yii::app()->clientScript->registerMetaTag('Bhartiya Jain Milan History,jain milan journey, through the years, jain milan structure, digambar, shwetambar', 'keywords');
		Yii::app()->clientScript->registerMetaTag('This page describes the establishment of Bhartiya Jain Milan.', 'description');
		$model = $this->loadModel();
		$this->render('bjm_journey',array(
			'model'=>$model,
		));
	}
	
	public function actionPrivacyPolicy(){
		Yii::app()->clientScript->registerMetaTag('Bhartiya Jain Milan Privacy Policy,jain milan policy, policy, privacy', 'keywords');
		Yii::app()->clientScript->registerMetaTag('This page describes the privacy policy of Bhartiya Jain Milan.', 'description');
		$model = $this->loadModel();
		$this->render('bjm_privacy_policy',array(
			'model'=>$model,
		));
	}
	
	
	public function actionHospitalEstablishment(){
		Yii::app()->clientScript->registerMetaTag('Bhartiya Jain Milan Hospital, Hospital Establishment', 'keywords');
		Yii::app()->clientScript->registerMetaTag('This page describes the establishment of Bhartiya Jain Milan Hospital.', 'description');
		$model = $this->loadModel();
		$this->render('bjm_hospital_history',array(
			'model'=>$model,
		));
	}
	
	public function actionFoundationEstablishment(){
		$model = $this->loadModel();
		$this->render('festablishment',array(
			'model'=>$model,
		));
	}
	
	public function actionSamachaarEstablishment(){
		$model = $this->loadModel();
		$this->render('samachaar_establishment',array(
			'model'=>$model,
		));
	}
	
	public function actionPreviousFoundationExecutives(){
		$model = $this->loadModel();
		$this->render('prevFoundationExecutives',array(
			'model'=>$model,
		));
	}
	
	public function actionFoundationExecutives(){
		$model = $this->loadModel();
		$this->render('foundationExecutives',array(
			'model'=>$model,
		));
	}
	
	public function actionMonogramSutra(){
		$model = $this->loadModel();
		$this->render('logo_sutra',array(
			'model'=>$model,
		));
	}
	
	public function actionMahaveer(){
		$model = $this->loadModel();
		$this->render('mahaveer',array(
			'model'=>$model,
		));
	}

	public function actionStructure(){
		$model = $this->loadModel();
		$this->render('structure',array(
			'model'=>$model,
		));
	}
	
	public function actionFoundationMembership(){
		$model = $this->loadModel();
		$this->render('foundation_membership',array(
			'model'=>$model,
		));
	}
	
	public function actionHowToJoinFoundation(){
		$model = $this->loadModel();
		$this->render('join_foundation',array(
			'model'=>$model,
		));
	}
	
	public function actionFoundationWorkingSystem(){
		$model = $this->loadModel();
		$this->render('fworking_system',array(
			'model'=>$model,
		));
	}
	public function actionFoundationAchievements(){
		$model = $this->loadModel();
		$this->render('fachievements',array(
			'model'=>$model,
		));
	}
	public function actionFoundationDonationLoan(){
		$model = $this->loadModel();
		$this->render('fdonation_loan',array(
			'model'=>$model,
		));
	}
	public function actionBranchWorkingSystem(){
		$model = $this->loadModel();
		$this->render('branch_working_system',array(
			'model'=>$model,
		));
	}
	public function actionZonalSystem(){
		$model = $this->loadModel();
		$this->render('zonal_system',array(
			'model'=>$model,
		));
	}
	
	public function actionAhinsa(){
		$model = $this->loadModel();
		$this->render('ahinsa',array(
			'model'=>$model,
		));
	}
	
	public function actionFormerLeaders(){
		$model = $this->loadModel();
		$this->render('former_leaders',array(
			'model'=>$model,
		));
	}
	
	public function actionLeaders(){
		$model = $this->loadModel();
		$this->render('leaders',array(
			'model'=>$model,
		));
	}
	
	public function actionService(){
		$model = $this->loadModel();
		$this->render('service',array(
			'model'=>$model,
		));
	}
	public function actionHelp(){
		$model = $this->loadModel();
		$this->render('help',array(
			'model'=>$model,
		));
	}
	public function actionSanskar(){
		$model = $this->loadModel();
		$this->render('sanskar',array(
			'model'=>$model,
		));
	}
	public function actionSocial(){
		$model = $this->loadModel();
		$this->render('social',array(
			'model'=>$model,
		));
	}
	public function actionEducational(){
		$model = $this->loadModel();
		$this->render('educational',array(
			'model'=>$model,
		));
	}
	public function actionVaganism(){
		$model = $this->loadModel();
		$this->render('vaganism',array(
			'model'=>$model,
		));
	}
	public function actionCulture(){
		$model = $this->loadModel();
		$this->render('culture',array(
			'model'=>$model,
		));
	}
	public function actionJainUnity(){
		$model = $this->loadModel();
		$this->render('jain_unity',array(
			'model'=>$model,
		));
	}
	public function actionReligious(){
		$model = $this->loadModel();
		$this->render('religious',array(
			'model'=>$model,
		));
	}
	
	
	public function actionContactUs(){
		$model = $this->loadModel();
		$done = 1;
		$success="";
		if(isset($_POST['FeedbackForm'])){ 		
			$guestName = (!empty($_POST['fname'])) ? trim($_POST['fname']) : '';
			$guestEmail= (!empty($_POST['femail'])) ? trim($_POST['femail']) : '';
			$subject = (!empty($_POST['fsubject'])) ? trim($_POST['fsubject']) : '';
			$body = (!empty($_POST['fbody'])) ? trim($_POST['fbody']) : '';
			if(isset($_POST['femail_copy'])){
				$copyToGuest = 1;
			}else{
				$copyToGuest = 0;
			}
			
			if($guestName=='' || $subject=='' || $body==''){
				$done=0;
				if($guestName==''){
					$success = "<span style='color:#FF0000;'>Please write your name.</span>"	;
				}else if($subject==''){
					$success = "<span style='color:#FF0000;'>Please write subject.</span>"	;
				}else if($body==''){
					$success = "<span style='color:#FF0000;'>Please write your message.</span>"	;
				}
			}
			
			// validate captcha
			require_once('recaptchalib.php');
			$privatekey = "6Lepn9sSAAAAAMKikiufea-zajI54LzDn-b1tPII";
			$resp = recaptcha_check_answer ($privatekey,
											$_SERVER["REMOTE_ADDR"],
											$_POST["recaptcha_challenge_field"],
											$_POST["recaptcha_response_field"]);
			
			if (!$resp->is_valid) {
				// $resp->error 
				$done=0;
				$success = "<span style='color:#FF0000;'>You have entered a wrong validation text.</span>"	;
			 }
			
			
			if($done==1){
				$subject = "BJM Feedback/Query: ".$subject;
				$message = $body;
				
				$headers  = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=utf-8\r\n";       
				$headers .= "From: ".$guestName."<".$guestEmail.">\r\n";
				$headers .= "Return-Path: ".$guestEmail."\n";
				$headers .= "Reply-To: ".$guestEmail."\n";
				if($copyToGuest==1){
					$headers .= "Bcc: ".$guestEmail."\n";
				}
				$headers .= "Message-Id: <".time()."@".$_SERVER['SERVER_NAME'].">\n";
				$mail = mail(Yii::app()->params['adminEmail'],$subject,$message,$headers);
				if($mail)
				{
					$success = "<span style='color:#004000;'>Thanks so much for contacting with us.We appreciate your interest and we look forward to communicate with you very soon.</span>"	;
				}
				else
				{
					$success = "<span style='color:#FF0000;'>Email not sent due to some technical problem.Please try again after some time.</span>"	;
				}
			}
		}
		
		$this->render('contactus',array(
			'success' => $success,
			'model'=>$model,
		));
	}
	
	
	public function actionSendProfile(){
		$model = $this->loadModel();
		$done = 1;
		$success="";		
		if(isset($_POST['MemberProfile'])){ 			
			$mname = (!empty($_POST['mname'])) ? $_POST['mname'] : '';			
			$dob= (!empty($_POST['dob'])) ? $_POST['dob'] : '';
			$sex = (!empty($_POST['sex'])) ? $_POST['sex'] : '';
			$maritalstatus = (!empty($_POST['maritalstatus'])) ? $_POST['maritalstatus'] : '';
			$spouse = (!empty($_POST['spouse'])) ? $_POST['spouse'] : '';
			$mdate = (!empty($_POST['mdate'])) ? $_POST['mdate'] : '';
			$hAddress1 = (!empty($_POST['hAddress1'])) ? $_POST['hAddress1'] : '';
			$hAddress2 = (!empty($_POST['hAddress2'])) ? $_POST['hAddress2'] : '';
			$hContactNo = (!empty($_POST['hContactNo'])) ? $_POST['hContactNo'] : '';
			$oName = (!empty($_POST['oName'])) ? $_POST['oName'] : '';
			$oAddress1 = (!empty($_POST['oAddress1'])) ? $_POST['oAddress1'] : '';
			$oAddress2 = (!empty($_POST['oAddress2'])) ? $_POST['oAddress2'] : '';
			$oContactNo = (!empty($_POST['oContactNo'])) ? $_POST['oContactNo'] : '';
			$fatherName = (!empty($_POST['fatherName'])) ? $_POST['fatherName'] : '';
			$motherName = (!empty($_POST['motherName'])) ? $_POST['motherName'] : '';
			$city = (!empty($_POST['city'])) ? $_POST['city'] : '';
			$district = (!empty($_POST['district'])) ? $_POST['district'] : '';
			$state = (!empty($_POST['state'])) ? $_POST['state'] : '';
			$mobNo = (!empty($_POST['mobNo'])) ? $_POST['mobNo'] : '';
			$emailid = (!empty($_POST['emailid'])) ? $_POST['emailid'] : '';
			$memCode = (!empty($_POST['memCode'])) ? $_POST['memCode'] : '';
			$zoneNo = (!empty($_POST['zoneNo'])) ? $_POST['zoneNo'] : '';
			$memBranchName = (!empty($_POST['memBranchName'])) ? $_POST['memBranchName'] : '';
			$memBranchNo = (!empty($_POST['memBranchNo'])) ? $_POST['memBranchNo'] : '';
			$nlPost = (!empty($_POST['nlPost'])) ? $_POST['nlPost'] : '';
			$nlFrom = (!empty($_POST['nlFrom'])) ? $_POST['nlFrom'] : '';
			$flPost = (!empty($_POST['flPost'])) ? $_POST['flPost'] : '';
			$flFrom = (!empty($_POST['flFrom'])) ? $_POST['flFrom'] : '';
			$zlPost = (!empty($_POST['zlPost'])) ? $_POST['zlPost'] : '';
			$zlFrom = (!empty($_POST['zlFrom'])) ? $_POST['zlFrom'] : '';
			$blPost = (!empty($_POST['blPost'])) ? $_POST['blPost'] : '';
			$blFrom = (!empty($_POST['blFrom'])) ? $_POST['blFrom'] : '';
			
			if($mname=='' || $city=='' || $state==''){
				$done=0;
				if($mname==''){
					$success = "<span style='color:#FF0000;'>Please write member name.</span>"	;
				}else if($city==''){
					$success = "<span style='color:#FF0000;'>Please write city name.</span>"	;
				}else if($state==''){
					$success = "<span style='color:#FF0000;'>Please write state name.</span>"	;
				}
			}else if($nlPost=='' && $flPost=='' && $slPost=='' && $hlPost=='' && $zlPost=='' && $blPost==''){
				$done=0;
				$success = "<span style='color:#FF0000;'>Please write atleast 1 post which you have.</span>"	;
			}
			
			// validate captcha
			require_once('recaptchalib.php');
			$privatekey = "6Lepn9sSAAAAAMKikiufea-zajI54LzDn-b1tPII";
			$resp = recaptcha_check_answer ($privatekey,
											$_SERVER["REMOTE_ADDR"],
											$_POST["recaptcha_challenge_field"],
											$_POST["recaptcha_response_field"]);
			
			if (!$resp->is_valid) {
				// $resp->error 
				$done=0;
				$success = "<span style='color:#FF0000;'>You have entered a wrong validation text.</span>"	;
			 } 
			
			$body = '';
			if($done==1){
			$body .= '<table>'
                            	.'<tr>'
                                .'<td colspan="2"><h4>Personal Details</h4></td>'
                                .'</tr>'
                            	.'<tr>'
                                .'<td><label for="mname">Member Name*</label></td>'
                                .'<td>'.$mname.'</td>'
                                .'</tr>'
                                .'<tr>'                                
                                .'<td><label for="dob">Member Date of Birth</label></td>'
                                .'<td>'.$dob.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="sex">Gender</label></td>'
                                .'<td>'.$sex.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="maritalstatus">Marital Status</label></td>'
                                .'<td>'.$maritalstatus.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="spouse">Spouse(Wife/Husband) Name</label></td>'
                                .'<td>'.$spouse.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="mdate">Marriage Date</label></td>'
                                .'<td>'.$mdate.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="hAddress1">Home Address</label></td>'
                                .'<td>'.$hAddress1.'</td>'
                                .'</tr>'
								.'<tr>'
                                .'<td></td>'
                                .'<td>'.$hAddress2.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="hContactNo">Home Contact No.</label></td>'
                                .'<td>'.$hContactNo.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="oName">Office/Occupation Name</label></td>'
                                .'<td>'.$oName.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="oAddress1">Office/Occupation Address</label></td>'
                                .'<td>'.$oAddress1.'</td>'
                                .'</tr>'
								.'<tr>'
                                .'<td></td>'
                                .'<td>'.$oAddress2.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="oContactNo">Office/Occupation Contact No.</label></td>'
                                .'<td>'.$oContactNo.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="fatherName">Father Name</label></td>'
                                .'<td>'.$fatherName.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="motherName">Mother Name</label></td>'
                                .'<td>'.$motherName.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="city">City*</label></td>'
                                .'<td>'.$city.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="district">District</label></td>'
                                .'<td>'.$district.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="state">State*</label></td>'
                                .'<td>'.$state.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="mobNo">Personal Mobile No.</label></td>'
                                .'<td>'.$mobNo.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="emaitdd">Email ID</label></td>'
                                .'<td>'.$emailid.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td colspan="2"><h4>Organization Details</h4></td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="memCode">Member Code</label></td>'
                                .'<td>'.$memCode.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="zoneNo">Member Zone No.</label></td>'
                                .'<td>'.$zoneNo.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="memBranchName">Member Branch Name</label></td>'
                                .'<td>'.$memBranchName.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label for="memBranchNo">Member Branch No.</label></td>'
                                .'<td>'.$memBranchNo.'</td>'
                                .'</tr>'
                                .'<tr>'
                                .'<td><label>Post Details</label></td>'
                                .'<td>'                                	
                                	.'<table style="width: 100%; text-align: left; border: solid 1px #999999;">'
                                    	.'<tr>'
                                        	.'<th style="padding:3px;"></th>'
                                        	.'<th style="padding:3px;">Post Name</th>'
                                            .'<th style="padding:3px;">From Year</th>'
                                        .'</tr>'
                                        .'<tr>'
                                        	.'<th style="padding:3px;">National Level</th>'
                                        	.'<td style="padding:3px;">'.$nlPost.'</td>'
                                            .'<td style="padding:3px;">'.$nlFrom.'</td>'
                                        .'</tr>'
                                        .'<tr>'
                                        	.'<th style="padding:3px;">BJM Foundation Level</th>'
                                        	.'<td style="padding:3px;">'.$flPost.'</td>'
                                            .'<td style="padding:3px;">'.$flFrom.'</td>'
                                        .'</tr>'                                        
                                        .'<tr>'
                                        	.'<th style="padding:3px;">Zone Level</th>'
                                        	.'<td style="padding:3px;">'.$zlPost.'</td>'
                                            .'<td style="padding:3px;">'.$zlFrom.'</td>'
                                        .'</tr>'
                                        .'<tr>'
                                        	.'<th style="padding:3px;">Branch Level</th>'
                                        	.'<td style="padding:3px;">'.$blPost.'</td>'
                                            .'<td style="padding:3px;">'.$blFrom.'</td>'
                                        .'</tr>'
                                    .'</table>'
                                
                                .'</td>'
                                .'</tr>'                                
                            .'</table>';
			
			
			
						
				if($_FILES['photo']['name'] && ($_FILES['photo']['error'] == 0)){
					$success =  $this->sendProfileWithAttachment($body, $mname);
				}
				else{
					$success = $this->sendProfileWithoutAttachment($body, $mname);
				}
			}
		}
		
		$this->render('send_member_profile',array(
			'success' => $success,
			'model'=>$model,
		));
	}
		
	public function sendProfileWithAttachment($body, $mname){
		$valid_formats = array("jpg", "jpeg", "png", "gif", "bmp");
				
		$filename = $_FILES['photo']['name'];
		$file_size = $_FILES['photo']['size'];
		$file = $_FILES['photo']['tmp_name'];			
		
		$nameArr = explode(".", $filename);
		$ext = strtolower($nameArr[count($nameArr)-1]);				
		
		if(in_array($ext,$valid_formats)){
			$handle = fopen($file, "r");
			$content = fread($handle, $file_size);
			fclose($handle);
			$content = chunk_split(base64_encode($content));
			$uid = md5(uniqid(time()));
			$name = basename($file);
		}
		else{
			return $success = "<span style='color:#FF0000;'>Only .jpg, .png, .gif, .bmp images are allowed to be uploaded.</span>";
		}	
		
		$replyto = $from_mail ="rajkamal@bhartiyajainmilan.com";
		$from_name = $mname;
		$message = $body;
		$mailto = Yii::app()->params['adminEmail'];
		$subject = "BJM Member Details -- ".$mname;
		$header = "From: ".$from_name." <".$from_mail.">\r\n";
		$header .= "Reply-To: ".$replyto."\r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
		$header .= "This is a multi-part message in MIME format.\r\n";
		$header .= "--".$uid."\r\n";
		$header .= "Content-type:text/html; charset=utf-8\r\n";
		$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
		$header .= $message."\r\n\r\n";
		$header .= "--".$uid."\r\n";
		$header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
		$header .= "Content-Transfer-Encoding: base64\r\n";
		$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
		$header .= $content."\r\n\r\n";
		$header .= "--".$uid."--";
		if (mail($mailto, $subject, "", $header)) {
			$success = "<span style='color:#004000;'>Thanks so much for sending your profile to us. We will update your profile as soon as possible.</span>";
		} else {
			$success = "<span style='color:#FF0000;'>Email not sent due to some technical problem.Please try again after some time.</span>"	;
		}
		
		return $success;
		
	}
	
	public function sendProfileWithoutAttachment($body, $mname){		
		
		$guestEmail = 'rajkamal@bhartiyajainmilan.com';
		$subject = "BJM Member Details -- ".$mname;
		$message = $body;
		
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";       
		$headers .= "From: ".$mname."<".$guestEmail.">\r\n";
		$headers .= "Return-Path: ".$guestEmail."\n";
		$headers .= "Reply-To: ".$guestEmail."\n";
		
		$headers .= "Message-Id: <".time()."@".$_SERVER['SERVER_NAME'].">\n";
		$mail = mail(Yii::app()->params['adminEmail'],$subject,$message,$headers);
		if($mail)
		{
			$success = "<span style='color:#004000;'>Thanks so much for sending your profile to us. We will update your profile as soon as possible.</span>";
		}
		else
		{
			$success = "<span style='color:#FF0000;'>Email not sent due to some technical problem.Please try again after some time.</span>"	;
		}
		
		return $success;
	}

	/**

	 * Returns the data model based on the primary key given in the GET variable.

	 * If the data model is not found, an HTTP exception will be raised.

	 * @param integer the ID of the model to be loaded

	 */

	public function loadModel()
	{

		/*$model=StaticPages::model()->published()->findByPk($id);

		if($model===null)

			throw new CHttpException(404,'The requested page does not exist.');

		return $model;*/
		return StaticPages::model();

	}

}

?>