<?php

class SiteController extends Controller
{
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
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		Yii::app()->clientScript->registerMetaTag('Bhartiya Jain Milan,jain,jain samaaz, samaaj, samaz, samaj, charity, help, jain milan, forthcoming, recent, program, event, coming event', 'keywords');
		Yii::app()->clientScript->registerMetaTag('This page shows forthcoming programs, recent programs and working projects of Bhartiya Jain Milan mainly.', 'description');
		Yii::app()->clientScript->registerMetaTag('all,index,follow,Bhartiya Jain Milan','robots');
		Yii::app()->clientScript->registerMetaTag('index,follow,noodp,Bhartiya Jain Milan','googlebot');
		Yii::app()->clientScript->registerMetaTag('all,index,follow,Bhartiya Jain Milan','msnbot');
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$todayDate = date('Y-m-d', time());
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
		$programsOldData = $programsModel->findAll($criteria2);
		
		$this->render('index',array('programsNewData'=>$programsNewData, 'programsOldData'=>$programsOldData));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		
		// collect user input data
		if(isset($_POST['username']) && isset($_POST['password']))
		{
			$model->username=$_POST['username'];
			$model->password=$_POST['password'];
						
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){				
				//$user = new User();				
				//$user =	$_SESSION['currentUser'];
				//$this->redirect(Yii::app()->user->returnUrl);
				echo "success";
			}else{
				if($model->getIdentity()->errorCode===UserIdentity::ERROR_UNKNOWN_IDENTITY)
				{
					echo "Your account has been locked.";
				}else{
					echo "Username and Password does not match.";
				}
			}
			
		}
		
		//$this->render('login',array('model'=>$model));
		//$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		Yii::app()->session->clear();
		Yii::app()->session->destroy();
		$this->redirect(Yii::app()->homeUrl);
	}
}