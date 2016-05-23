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
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		/*$todayDate = date('Y-m-d', time());
		$programsModel=new Programs;
		$criteria1=new CDbCriteria;
		$criteria1->condition='Status=:Status and venueDate>=:venueDate';
		$criteria1->order = 'venueDate DESC';
		$criteria1->limit = 10;
		$criteria1->params=array(':Status'=>1, ":venueDate"=>$todayDate);
		$programsNewData = $programsModel->findAll($criteria1);
		
		$criteria2=new CDbCriteria;
		$criteria2->condition='Status=:Status and venueDate<:venueDate';
		$criteria2->order = 'venueDate DESC';
		$criteria2->limit = 10;
		$criteria2->params=array(':Status'=>1, ":venueDate"=>$todayDate);
		$programsOldData = $programsModel->findAll($criteria2);*/
		
		//$this->render('index',array('programsNewData'=>$programsNewData, 'programsOldData'=>$programsOldData));
		$this->render('index');
	}
	
	
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{

		$model=new LoginForm;
//		if(!Yii::app()->user->isGuest) {
//			//echo $this->echoObjectAsJSON($this);
//
//			$data = MatrimonyMembers::model()->getMemberData(Yii::app()->user->id);
//			$this->echoObjectAsJSON($data);
//
////			$user["id"] = Yii::app()->user->id;
////			$user["userName"] = Yii::app()->user->name;
////			$user["isGuest"] = Yii::app()->user->isGuest;
////			$user["role"] = Yii::app()->user->role;
////			$this->echoObjectAsJSON($user);
//			return;
//		}
		
		// if it is ajax validation request
		/*if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}*/


		// collect user input data
		if(isset($_POST['LoginForm'])){
			$model->attributes=$_POST['LoginForm'];

			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){

				$data = MatrimonyMembers::model()->getMemberData(Yii::app()->user->id);
				$this->echoObjectAsJSON($data);

//				$user["id"] = Yii::app()->user->id;
//				$user["userName"] = Yii::app()->user->name;
//				$user["isGuest"] = Yii::app()->user->isGuest;
//				$user["role"] = Yii::app()->user->role;
//				$this->echoObjectAsJSON($user);
				//$this->redirect(Yii::app()->homeUrl);
			}else{
				throw new CHttpException(403,'Unauthorized');
			}
			//echo print_r($model->_identity);
				//die;
		}else{
			throw new CHttpException(400,'Not allowed');
		}
		
		// display the login form
		//$this->redirect(Yii::app()->homeUrl);
		//$this->render('index',array('model'=>$model));
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
		$members = MatrimonyMembers::model()->findAll();
		foreach($members as $member)
		{
			if(isset($member->MemberPhoto)){
				$imagePath = Yii::app()->params['matrimonyPath']."/".$member->MemberPhoto;
				if(file_exists($imagePath)) {
					$imgData = file_get_contents($imagePath, FILE_USE_INCLUDE_PATH);
					if (isset($imgData)) {
						$member->ProfilePic = $imgData;
						$member->save();
					}
				}
			}
		}


//		if(Yii::app()->user->isGuest) {
//			$this->redirect(Yii::app()->homeUrl.'/site/login');
//		}
		// display the Dashboard
		$this->render('dashboard');
	}
	
	public function actionUser(){
		if(!Yii::app()->user->isGuest){
//			$user["id"] = Yii::app()->user->id;
//			$user["userName"] = Yii::app()->user->name;
//			$user["isGuest"] = Yii::app()->user->isGuest;
//			$user["role"] = Yii::app()->user->role;

			$data = MatrimonyMembers::model()->getMemberData(Yii::app()->user->id);
			$this->echoObjectAsJSON($data);

		}else{
			throw new CHttpException(403,'session expired');
		}
		//$this->echoObjectAsJSON($user);
	}
}