<?php

class SiteController extends Controller
{
	public $layout='column1';
	//public $defaultAction='Login';


	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
		// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
		),
		// page action renders "static" pages stored under 'protected/views/site/pages'
		// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
		),
		);
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
//			if(Yii::app()->request->isAjaxRequest)
//			echo $error['message'];
//			else
//			$this->render('error', $error);
			$responseObj["status"] = $error["code"];
			$responseObj["message"] = $error["message"];
			$this->echoObjectAsJSON($responseObj);
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		Yii::app()->clientScript->registerMetaTag('Bhartiya Jain Milan Matrimonial,matrimony.bhartiyajainmilan.com,jain matrimony, matrimony, matrimonial, shaadi, vivah, match making, jain samaj', 'keywords');
		Yii::app()->clientScript->registerMetaTag('Bhartiya Jain Milan Matrimonal - To find someone who will love you for no reason. Specially, this site is made for jains matrimony. We match better.', 'description');
		Yii::app()->clientScript->registerMetaTag('all,index,follow,Bhartiya Jain Milan Matrimonial, Matrimony, matrimonial, shaadi, vivah, match making, jain samaj','robots');
		Yii::app()->clientScript->registerMetaTag('index,follow,noodp,Bhartiya Jain Milan Matrimonial, Matrimony, matrimonial, shaadi, vivah, match making, jain samaj','googlebot');
		Yii::app()->clientScript->registerMetaTag('all,index,follow,Bhartiya Jain Milan Matrimonial, Matrimony, matrimonial, shaadi, vivah, match making, jain samaj','msnbot');

		$this->render('index');
	}
	
	
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{

		$model=new LoginForm;
		// collect user input data
		if(isset($_POST['LoginForm'])){
			$model->attributes=$_POST['LoginForm'];

			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				$currTime = time();
				$user=MatrimonyUser::model()->find('pkUserId=?',array(Yii::app()->user->id));
				$user->LastLoginDate = date('Y-m-d H:i',$currTime);
				$user->ResetPassword = null;
				$user->Comments = "Last login:".date('Y-m-d H:i:s',$currTime);
				$user->save();

				$data = MatrimonyMembers::model()->getMemberData(Yii::app()->user->id);
				$this->echoObjectAsJSON($data);
			}else{
				throw new CHttpException(403,'Unauthorized');
			}
		}else{
			throw new CHttpException(400,'Not allowed');
		}
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout(){
		Yii::app()->user->logout();
		//$this->redirect(Yii::app()->homeUrl);
	}


	public function actionDashboard()
	{
//		save profile pic into DB
//		$members = MatrimonyMembers::model()->findAll();
//		foreach($members as $member)
//		{
//			if(isset($member->MemberPhoto)){
//				$imagePath = Yii::app()->params['matrimonyPath']."/".$member->MemberPhoto;
//				if(file_exists($imagePath)) {
//					$imgData = file_get_contents($imagePath, FILE_USE_INCLUDE_PATH);
//					if (isset($imgData)) {
//						$member->ProfilePic = $imgData;
//						$member->save();
//					}
//				}
//			}
//		}


//		if(Yii::app()->user->isGuest) {
//			$this->redirect(Yii::app()->homeUrl.'/site/login');
//		}
		// display the Dashboard
		$this->render('dashboard');
	}
	
	public function actionUser(){
		if(!Yii::app()->user->isGuest){
			$data = MatrimonyMembers::model()->getMemberData(Yii::app()->user->id);
			$this->echoObjectAsJSON($data);

		}else{
			throw new CHttpException(403,'session expired');
		}
	}

	public function actionForgotPassword(){

		if(isset($_POST["emailid"])) {
			$userid = $_POST["emailid"];
			$user = MatrimonyUser::model()->find('LOWER(EmailID)=?', array(strtolower($userid)));
			if ($user === null) {
				$member = MatrimonyMembers::model()->find('LOWER(MemberCode)=?', array(strtolower($userid)));
				if ($member !== null) {
					$user = MatrimonyUser::model()->find('pkUserId=?', array($member->fkLoginId));
				}
			}
			if ($user === null) {
				throw new CHttpException(403,'This Matrimony ID / Email ID could not exists.');
			}else{
				$currTime = time();
				$resetPassword = $user->resetHashPassword($currTime);
				$user->ResetPassword = $resetPassword;
				$user->ModifiedDate = date('Y-m-d H:i:s',$currTime);
				$user->Comments = "Request Reset Password:".date('Y-m-d H:i:s',$currTime);
				if($user->save()){
					try {
						$this->sendForgotPasswordMailToUser($user);
					}catch(Exception $e){
						//error_log("Unable to send mail.");
					}
					$responseObj["status"] = 200;
					$responseObj["message"] = "Password reset link has been sent on your registered Email ID. This link will be valid only for 2 hours.";
					$responseObj["resetlink"] = Yii::app()->request->hostInfo.Yii::app()->request->baseUrl.'/#/reset-password/'.$user->ResetPassword;
					$this->echoObjectAsJSON($responseObj);
				}else{
					throw new CHttpException(500,'Error found on password reset.');
				}
			}
		}else{
			throw new CHttpException(403,'Matrimony ID / Email ID could not be blank.');
		}

	}

	public function actionResetPassword(){
		if(isset($_POST["user"])) {
			$userInfo = $_POST["user"];
			if(isset($userInfo["newPassword"]) && strlen($userInfo["newPassword"]) < 8) {
				throw new CHttpException(403, "Password should be minimum 8 character long.");
			}else if($userInfo["newPassword"] != $userInfo["confirmPassword"]) {
				throw new CHttpException(403, "Password and Confirm password doesn't match.");
			}

			$user = MatrimonyUser::model()->find('ResetPassword=?', array($userInfo["resetPasswordToken"]));
			if (!$this->validateResetToken($user)) {
				throw new CHttpException(403,'You have provided either invalid token or expired token.');
			}else{
				$currTime = time();
				$currentTimeFormatted = date('Y-m-d H:i:s',$currTime);

				$user->Password = $user->hashPassword($userInfo["newPassword"]);
				$user->ResetPassword = null;
				$user->Comments = "Password has been Reset:".date('Y-m-d H:i:s',$currTime);
				$user->ModifiedDate = $currentTimeFormatted;

				if($user->save()){
					try {
						$this->sendResetPasswordMailToUser($user);
					}catch(Exception $e){
						//error_log("Unable to send mail.");
					}
					$responseObj["status"] = 200;
					$responseObj["message"] = "Your password has been reset successfully.";
					$this->echoObjectAsJSON($responseObj);
				}else{
					throw new CHttpException(500,'Error found on password reset.');
				}
			}
		}else{
			throw new CHttpException(403,'Matrimony ID / Email ID could not be blank.');
		}
	}

	protected function validateResetToken($user){
		if($user === null){
			return false;
		}else{
			$lastModifiedTime = strtotime($user->ModifiedDate);
			$twoHoursBeforeTime = strtotime("-2 hours", time());
			return ($lastModifiedTime<$twoHoursBeforeTime)?false:true;
		}
	}

	protected function sendForgotPasswordMailToUser($member){
		if($member->Email){
			$mail=new MailMessage();
			$mail->fromEmail = "matrimony@bhartiyajainmilan.com";
			$mail->fromName = "Bhartiya Jain Milan Matrimonial";
			$mail->toEmail = $member->Email;
			$mail->subject = "Reset password requested";
			$mail->message = $this->forgotPasswordMailMessage($member);
			$result = $mail->sendMail();
		}
	}

	protected function sendResetPasswordMailToUser($member){
		if($member->Email){
			$mail=new MailMessage();
			$mail->fromEmail = "matrimony@bhartiyajainmilan.com";
			$mail->fromName = "Bhartiya Jain Milan Matrimonial";
			$mail->toEmail = $member->Email;
			$mail->subject = "Your password has been reset";
			$mail->message = $this->resetPasswordMailMessage($member);
			$result = $mail->sendMail();
		}
	}

	protected function mailMessageTemplate($member, $htmlMessage){
		if($member){
			$message = '<div style="font-family: verdana;font-size: 13px;">'
				.'<div style="height: 50px; margin-bottom: 30px; padding: 15px; background-color: #f8f8f8; text-align: left;">'
				.'<img src="http://www.jainmilanmatrimonial.com/dist/images/matrimony-logo.png" height="50" alt="Jain Milan Matrimonial" />'
				.'</div>'
				.'<div>'
				.'Dear <strong>'.$member->MemberName.' ('.$member->MemberCode.')</strong>'
				.'</div>'
				.$htmlMessage
				.'<div style="margin-top: 20px;">thanks</div>'
				.'<div style="margin-top: 30px;">'
				.'<div>With Regards,</div>'
				.'<div style="padding-top: 10px;">'
				.'<div style="font-size: 1.1em;"><strong>Bhartiya Jain Milan Matrimonial</strong></div>'
				.'<div style="padding-top: 5px;"><strong>Email:</strong> <a href="mailto:matrimony@bhartiyajainmilan.com">matrimony@bhartiyajainmilan.com</a></div>'
				.'<div style="padding-top: 5px;"><strong>Website:</strong> <a href="http://www.jainmilanmatrimonial.com" target="_blank">www.jainmilanmatrimonial.com</a></div>'
				.'</div>'
				.'</div>'

				.'<div style="margin-top: 50px; height: 20px; text-align: center; background-color: #f5f5f5; font-size: 0.9em; padding: 10px;">'
				.'<span style="color: #999;">Jain Milan Matrimonial is a part of <a href="http://www.bhartiyajainmilan.com" target="_blank">www.bhartiyajainmilan.com</a></span>'

				.'</div>'

				.'</div>';
			return $message;
		}else{
			return "";
		}
	}

	protected function forgotPasswordMailMessage($member){
		if($member){
			$resetURL = Yii::app()->request->hostInfo.Yii::app()->request->baseUrl.'/#/reset-password/'.$member->ResetPassword;
			$htmlMessage = '<h5><span>Email: '.$member->Email.'</span></h5>'
				.'<p style="margin-top: 20px;">'
				.'You can reset your password by simply click on below link:-'
				.'</p>'
				.'<div>'
				.'<a href="'.$resetURL.'">'
				.'<span>'.$resetURL.'</span>'
				.'</a>'
				.'</div>'
				.'<p>'
				.'Or, you can copy and paste above path into browser\'s address bar.'
				.'</p>';
			return $this->mailMessageTemplate($member, $htmlMessage);
		}else{
			return "";
		}
	}

	protected function resetPasswordMailMessage($member){
		if($member){
			$htmlMessage = '<h5><span>Email: '.$member->Email.'</span></h5>'
				.'<p style="margin-top: 20px;">'
				.'Your password has been reset successfully.'
				.'</p>';
			return $this->mailMessageTemplate($member, $htmlMessage);
		}else{
			return "";
		}
	}

}