<?php

class RegisterController extends Controller
{
	public $layout='column1';
	
		
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('registerMember'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('updateProfile'),
				'users'=>array('@'),
			),
			/*array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionRegisterMember(){
		if($_POST){		
			$registerData = $_POST;
			
			/*$done=1;
			// validate captcha
			require_once('recaptchalib.php');
			$privatekey = "6Lepn9sSAAAAAMKikiufea-zajI54LzDn-b1tPII";
			$resp = recaptcha_check_answer($privatekey,
											$_SERVER["REMOTE_ADDR"],
											$registerData['recaptchaChallenge'],
											$registerData['recaptchaValue']);
			if (!$resp->is_valid) {
				// $resp->error 
				$done=0;
				$success = "<span style='color:#FF0000;'>You have entered a wrong validation text.</span>"	;
			}*/
			
			//if($done == 1){
			
				$currentTime = date('Y-m-d H:i',time());
	
				$existingUser=MatrimonyUser::model()->find('LOWER(EmailID)=?',array(strtolower($registerData['emailId'])));
				if($existingUser!==null){
					throw new CHttpException(302,'This email-id is already registered.');
					return;
				}
				$userModel=new MatrimonyUser;
				$userModel->EmailID = $registerData['emailId'];
				$userModel->Password = $userModel->hashPassword($registerData['password']);
				$userModel->Type = 'USR';
				$userModel->Status = 1;
				$userModel->CreatedDate = $currentTime;
				$userModel->ModifiedDate = $currentTime;
				
				if($userModel->save()){
					$model=new MatrimonyMembers;
					
					$model->MemberName = $registerData['memberName'];
					$model->RegisteredBy = $registerData['registerBy'];
					$model->Sex = $registerData['sex'];
					$model->DOB = date('Y-m-d',strtotime($registerData['dob']));
					$model->MaritalStatus = $registerData['maritalStatus'];
					$model->fkSect = $registerData['sect'];
					$model->fkSubSect = $registerData['subSect'];
					$model->fkMotherTongue = $registerData['motherTongue'];
					$model->ContactNo = $registerData['contactNumber'];
					$model->fkCountryLivingIn = $registerData['country'];
					$model->fkResidingState = $registerData['state'];
					$model->ResidingCity = $registerData['city'];
					$model->Height = $registerData['height'];
					
					$model->Email = $userModel->EmailID;
					
					$model->Manglik = 0;
					$model->PhysicalStatus = 0;
					$model->MarryInSameSubSect = 2;
					$model->EmployedIn = 5;
					$model->Status = 0;
					$model->MemberPhoto = null;
					
					$model->fkLoginId = $userModel->pkUserId;
					
					// set member code
					$connection=Yii::app()->db;
				    $query = "select MAX(CAST(SUBSTRING(MemberCode, 4) as UNSIGNED)) maxCode from matrimony_members";
				    $command=$connection->createCommand($query);
				    $lastMember = $command->queryRow();
				    $maxCode = 0; 
					if($lastMember["maxCode"]!=null){
						$maxCode = $lastMember["maxCode"];
					}
					$model->MemberCode = $maxCode+1;
					if(strlen($model->MemberCode)<4){
					   $temp = "";
					   for($i=4-strlen($model->MemberCode); $i>0; $i--){
						   $temp = $temp.'0';
					   }
					  $model->MemberCode = $temp.$model->MemberCode;   
				    }
					$model->MemberCode = 'BJM'.$model->MemberCode;
					
					// set default value
					if(!$model->Weight){
						$model->Weight = null;
					}
					if(!$model->Height){
						$model->Height = null;
					}
					if(!$model->fkCaste){
						$model->fkCaste = null;
					}			
					if(!$model->BodyType){
						$model->BodyType = null;
					}
					if(!$model->Complexion){
						$model->Complexion = null;
					}
					if(!$model->fkEducation){
						$model->fkEducation = null;
					}
					if(!$model->Occupation){
						$model->Occupation = null;
					}
					if(!$model->IncomeAnnual){
						$model->IncomeAnnual = null;
					}			
					if($model->fkCaste!=0){
						$model->OtherCaste = "";
					}
					$model->CreatedDate=$currentTime;
					$model->ModifiedDate=$currentTime;
					if($model->save()){
						$login=new LoginForm;
						$login->emailid = $registerData['emailId'];
						$login->password = $registerData['password'];
						$pwd = $registerData['password'];
						// validate user input and login
						if($login->validate() && $login->login()){
							$user["id"] = Yii::app()->user->id;
							$user["userName"] = Yii::app()->user->name;
							$user["role"] = Yii::app()->user->role;

							try {
								$this->sendMailToUser($model, $pwd);
								$this->sendMailToAdmin($model, $pwd);
							}catch(Exception $e){
								//error_log("Unable to send mail.");
							}

							$this->echoObjectAsJSON($user);
							//$this->redirect(Yii::app()->homeUrl);
						}else{
							throw new CHttpException(403,'Unauthorized');
						}
					}
				}else{
					throw new CHttpException(500,'Unable to create user.');
				}
			/*}else{
				throw new CHttpException(403,'You have entered wrong captcha(text)');
			}*/
		}else{
			throw new CHttpException(400,'Invalid request.');
		}
		//$model = $this->loadModel();
		//$this->render('search');
	}
	
	public function actionUpdateProfile($id){
		if($id && $id != null && $_POST){
			$currentTime = date('Y-m-d H:i',time());						
			$model=MatrimonyMembers::model()->find('fkLoginId=:fkLoginId',array('fkLoginId'=>$id));
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			
			$familyModel=MatrimonyFamilyDetails::model()->find('MemberCode=:MemberCode', array(':MemberCode'=>$model->MemberCode));
			if($familyModel === null){
				$familyModel = new MatrimonyFamilyDetails;
				$familyModel->CreatedDate=$currentTime;
			}
				
			$memberProfile = $_POST;			
			// set memder details
			if(isset($memberProfile['birthHour']) && isset($memberProfile['birthMinute']) && isset($memberProfile['birthAmPm'])){
				$model->DOB = date('m/d/Y',strtotime($model->DOB));
				$model->DOB = date('Y-m-d H:i',strtotime($model->DOB.' '.$memberProfile['birthHour'].':'.$memberProfile['birthMinute'].' '.$memberProfile['birthAmPm']));
			}			
			//$model->Height = (isset($memberProfile['height']) && $memberProfile['height'])?$memberProfile['height']: null;
			$model->Weight = (isset($memberProfile['weight']) && $memberProfile['weight'])?$memberProfile['weight']: null;
			$model->BodyType = (isset($memberProfile['bodyType']) && $memberProfile['bodyType'])?$memberProfile['bodyType']: null;
			$model->Complexion = (isset($memberProfile['complexion']) && $memberProfile['complexion'])?$memberProfile['complexion']: null;
			$model->PhysicalStatus = (isset($memberProfile['physicalStatus']))?$memberProfile['physicalStatus']: null;
			$model->AboutMe = (isset($memberProfile['aboutMe']) && $memberProfile['aboutMe'])?$memberProfile['aboutMe']: null;
			$model->HomeAddress = (isset($memberProfile['homeAddress']) && $memberProfile['homeAddress'])?$memberProfile['homeAddress']: null;
			$model->WorkingAddress = (isset($memberProfile['workingAddress']) && $memberProfile['workingAddress'])?$memberProfile['workingAddress']: null;
			$model->IncomeAnnual = (isset($memberProfile['annualIncome']) && $memberProfile['annualIncome'])?$memberProfile['annualIncome']: null;
			$model->MarryInSameSubSect = (isset($memberProfile['marryInSameSect']) && $memberProfile['marryInSameSect'])?$memberProfile['marryInSameSect']: 2;
			$model->AboutMyPartner = (isset($memberProfile['aboutMyPartner']) && $memberProfile['aboutMyPartner'])?$memberProfile['aboutMyPartner']: null;
			$model->fkCaste = (isset($memberProfile['caste']) && $memberProfile['caste'])?$memberProfile['caste']: null;
			$model->Gotra = (isset($memberProfile['gotra']) && $memberProfile['gotra'])?$memberProfile['gotra']: null;
			$model->Manglik = (isset($memberProfile['manglikStatus']))?$memberProfile['manglikStatus']: null;
			$model->fkEducation = (isset($memberProfile['education']) && $memberProfile['education'])?$memberProfile['education']: null;
			$model->EmployedIn = (isset($memberProfile['employedIn']) && $memberProfile['employedIn'])?$memberProfile['employedIn']: null;
			$model->Occupation = (isset($memberProfile['occupation']) && $memberProfile['occupation'])?$memberProfile['occupation']: null;
			$model->ModifiedDate=$currentTime;
			// set memder family details
			$familyModel->MemberCode = $model->MemberCode;
			$familyModel->FatherName = (isset($memberProfile['fatherName']) && $memberProfile['fatherName'])?$memberProfile['fatherName']: null;
			$familyModel->FatherOccupation = (isset($memberProfile['fatherOccupation']) && $memberProfile['fatherOccupation'])?$memberProfile['fatherOccupation']: null;
			$familyModel->MotherName = (isset($memberProfile['motherName']) && $memberProfile['motherName'])?$memberProfile['motherName']: null;
			$familyModel->MotherOccupation = (isset($memberProfile['motherOccupation']) && $memberProfile['motherOccupation'])?$memberProfile['motherOccupation']: null;
			$familyModel->UnmarriedBrothers = (isset($memberProfile['unmarriedBrothers']) && $memberProfile['unmarriedBrothers'])?$memberProfile['unmarriedBrothers']: null;
			$familyModel->MarriedBrothers = (isset($memberProfile['marriedBrothers']) && $memberProfile['marriedBrothers'])?$memberProfile['marriedBrothers']: null;
			$familyModel->UnmarriedSisters = (isset($memberProfile['unmarriedSisters']) && $memberProfile['unmarriedSisters'])?$memberProfile['unmarriedSisters']: null;
			$familyModel->MarriedSisters = (isset($memberProfile['marriedSisters']) && $memberProfile['marriedSisters'])?$memberProfile['marriedSisters']: null;
			$familyModel->AboutFamily = (isset($memberProfile['aboutFamily']) && $memberProfile['aboutFamily'])?$memberProfile['aboutFamily']: null;
			$familyModel->ModifiedDate=$currentTime;
			
			// validate and save data
			if($model->validate() && $familyModel->validate()){				
				$model->save();
				$familyModel->save();
								
				$data['member'] = $model;
				$data['memberFamilyDetails'] = $familyModel;
				$this->echoObjectAsJSON($data);
			}
			else{
				throw new CHttpException(500,'Invalid data.');	
			}
		}else{
			throw new CHttpException(400,'Invalid request.');
		}
		
	}
	
	protected function sendMailToUser($member, $password){
		if($member->Email){
			$mail=new MailMessage();
			$mail->fromEmail = "matrimony@bhartiyajainmilan.com";
			$mail->fromName = "Bhartiya Jain Milan Matrimonial";
			$mail->toEmail = $member->Email;			
			$mail->subject = "Your login credentials";
			$mail->message = $this->userCreateMailMessage($member, $password);
			$result = $mail->sendMail();
		}
	}
	
	protected function sendMailToAdmin($member, $password){
		if($member->Email){
			$mail=new MailMessage();
			$mail->fromEmail = "matrimony@bhartiyajainmilan.com";
			$mail->fromName = "Bhartiya Jain Milan Matrimonial";
			$mail->toEmail = "matrimony@bhartiyajainmilan.com";			
			$mail->subject = "New Matrimony User ".$member->MemberName." (".$member->MemberCode.") is registered";
			$mail->message = $this->notifyAdminMailMessage($member, $password);
			$result = $mail->sendMail();
		}
	}
	
	protected function userCreateMailMessage($member, $password){
		if($member){
			$message = '<div style="font-family: verdana;font-size: 13px;">'
				.'<div style="height: 50px; margin-bottom: 30px; padding: 15px; background-color: #f8f8f8; text-align: left;">'
					.'<img src="http://www.jainmilanmatrimonial.com/dist/images/matrimony-logo.png" height="50" alt="Jain Milan Matrimonial" />'
				.'</div>'
				.'<div>'
				.'Dear <strong>'.$member->MemberName.' ('.$member->MemberCode.')</strong>'
				.'</div>'
			
				.'<p style="margin-top: 20px;">'
				.'Your profile has been created/updated successfully on <strong>Bhartiya Jain Milan Matrimonial</strong>. Your BJM Matrimonial Id is <strong>'.$member->MemberCode.'</strong>.'
				
				.'</p>'
				.'<p>'
					.'Below are your sign-in credentials:-'
				.'</p>'
				.'<ul style="list-style: none;">'
					.'<li><strong>Matrimony ID / Email ID:</strong> '.$member->MemberCode.' <b>/</b> '.$member->Email.' </li>'
					.'<li><strong>Password:</strong> '.$password.'</li>'
				.'</ul>'
				.'<p>'
					.'You can sign-in using matrimony id or registered email id. After sign-in, you can change your profile details instantly.'
				.'</p>'
				.'<p>'
					.'After registration, you have to pay to activate your account.'
				.'</p>'
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
	
	protected function notifyAdminMailMessage($member, $password){
		if($member){
			$message = '<div style="font-family: verdana;font-size: 13px;">'
				.'<div style="height: 50px; margin-bottom: 30px; padding: 15px; background-color: #f8f8f8; text-align: left;">'
					.'<img src="http://www.jainmilanmatrimonial.com/dist/images/matrimony-logo.png" height="50" alt="Jain Milan Matrimonial" />'
				.'</div>'
				.'<div>'
				.'Dear <strong>Admin</strong>'
				.'</div>'
			
				.'<p style="margin-top: 20px;">'
				.'A new member is registered at www.jainmilanmatrimonial.com. Below are registered user details:'
				
				.'</p>'
				
				.'<table style="font-family: verdana;font-size: 13px;">'
					.'<tr>'
						.'<th>Member Name</th>'
						.'<td>'.$member->MemberName.'</td>'
					.'</tr>'
					.'<tr>'
						.'<th>Member Code</th>'
						.'<td>'.$member->MemberCode.'</td>'
					.'</tr>'
					.'<tr>'
						.'<th>Email</th>'
						.'<td>'.$member->Email.'</td>'
					.'</tr>'
					.'<tr>'
						.'<th>Contact No.</th>'
						.'<td>'.$member->ContactNo.'</td>'
					.'</tr>'
					.'<tr>'
						.'<th>City</th>'
						.'<td>'.$member->ResidingCity.'</td>'
					.'</tr>'
				.'</table>'
				
				.'<p>'
					.'Please review registered user.'
				.'</p>'
								
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

}

?>