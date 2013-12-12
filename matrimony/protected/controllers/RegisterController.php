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
				'actions'=>array('update'),
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
				$model->DOB = date('Y-m-d H:i',strtotime($registerData['dob']));
				$model->MaritalStatus = $registerData['maritalStatus'];
				$model->fkSect = $registerData['sect'];
				$model->fkSubSect = $registerData['subSect'];
				$model->fkMotherTongue = $registerData['motherTongue'];
				$model->ContactNo = $registerData['contactNumber'];
				$model->fkCountryLivingIn = $registerData['country'];
				$model->fkResidingState = $registerData['state'];
				$model->ResidingCity = $registerData['city'];
				
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
					// validate user input and login
					if($login->validate() && $login->login()){
						$user["id"] = Yii::app()->user->id;
						$user["userName"] = Yii::app()->user->name;
						$user["role"] = Yii::app()->user->role;
						$this->echoObjectAsJSON($user);
						//$this->redirect(Yii::app()->homeUrl);
					}else{
						throw new CHttpException(403,'Unauthorized');
					}
				}
			}else{
				throw new CHttpException(500,'Unable to create user.');
			}
		}else{
			throw new CHttpException(400,'Invalid request.');
		}
		//$model = $this->loadModel();
		//$this->render('search');
	}

}

?>