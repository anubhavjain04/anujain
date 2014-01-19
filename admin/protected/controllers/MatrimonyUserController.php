<?php

class MatrimonyUserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'memberLogin'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new MatrimonyUser;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MatrimonyUser']))
		{
			if(isset($_POST['MatrimonyMembers']) && isset($_POST['MatrimonyMembers']['pkMemberId'])){
				$memberModel=MatrimonyMembers::model()->findByPk($_POST['MatrimonyMembers']['pkMemberId']);
				$currentTime = date('Y-m-d H:i',time());
				$model->attributes=$_POST['MatrimonyUser'];
				$pwd = $model->Password;
				// update static values
				$model->CreatedDate=$currentTime;
				$model->ModifiedDate=$currentTime;
				$model->Type = 'USR';
				$model->Password = $model->hashPassword($model->Password);
				
				if($model->save()){
					$memberModel->fkLoginId = $model->pkUserId;
					$memberModel->save();
					$this->sendMailToUser($memberModel, $pwd);
					$this->redirect(array('matrimonyMembers/admin'));
				}
			}else{
				throw new CHttpException(404,'Member not found.');
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{	
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MatrimonyUser']))
		{
			if(isset($_POST['MatrimonyMembers']) && isset($_POST['MatrimonyMembers']['pkMemberId'])){
				$memberModel=MatrimonyMembers::model()->findByPk($_POST['MatrimonyMembers']['pkMemberId']);
				$currentTime = date('Y-m-d H:i',time());
				$model->attributes=$_POST['MatrimonyUser'];
				$pwd = $model->Password;
				// update static values
				$model->ModifiedDate=$currentTime;
				$model->Type = 'USR';
				$model->Password = $model->hashPassword($model->Password);
		
				if($model->save()){
					$memberModel->fkLoginId = $model->pkUserId;
					$memberModel->save();
					$this->sendMailToUser($memberModel, $pwd);
					$this->redirect(array('matrimonyMembers/admin'));
				}
			}else{
				throw new CHttpException(404,'Member not found.');
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	protected function sendMailToUser($member, $password){
		if($member->Email){
			$mail=new MailMessage();
			$mail->fromEmail = "matrimony@bhartiyajainmilan.com";
			$mail->fromName = "Bhartiya Jain Milan Matrimonial";
			//$mail->toEmail = $member->Email;
			$mail->toEmail = 'anubhavjain04@gmail.com';
			$mail->subject = "Your login credentials";
			$mail->message = $this->userCreateMailMessage($member, $password);
			$result = $mail->sendMail();
		}
	}
	
	protected function userCreateMailMessage($member, $password){
		if($member){
			$message = '<div style="font-family: verdana;font-size: 13px;">'
				.'<div style="height: 50px; margin-bottom: 30px; background-color: #ED1C24; text-align: left;">'
					.'<img src="http://www.matrimony.bhartiyajainmilan.com/images/matrimony-logo.gif" width="224" height="50" alt="Bhartiya Jain Milan Matrimonial" />'
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
				.'<div style="margin-top: 20px;">thanks</div>'
				.'<div style="margin-top: 30px;">'
					.'<div>With Regards,</div>'
					.'<div style="padding-top: 10px;">'
						.'<div style="font-size: 1.1em;"><strong>Bhartiya Jain Milan Matrimonial</strong></div>'
						.'<div style="padding-top: 5px;"><strong>Email:</strong> <a href="mailto:matrimony@bhartiyajainmilan.com">matrimony@bhartiyajainmilan.com</a></div>'
						.'<div style="padding-top: 5px;"><strong>Website:</strong> <a href="http://www.matrimony.bhartiyajainmilan.com" target="_blank">www.matrimony.bhartiyajainmilan.com</a></div>'
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
	
	public function actionMemberLogin($id){
		$memberModel=MatrimonyMembers::model()->findByPk($id);		
		if($memberModel){
			$model = null;
			if($memberModel->fkLoginId){
				$model=$this->loadModel($memberModel->fkLoginId);				
			}
			if($model == null){
				$model = new MatrimonyUser;					
			}
			$model->EmailID = $memberModel->MemberCode;
			$this->render('create',array(
				'model'=>$model,
				'memberModel'=>$memberModel,
			));
		}else{
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('MatrimonyUser');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new MatrimonyUser('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MatrimonyUser']))
			$model->attributes=$_GET['MatrimonyUser'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=MatrimonyUser::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='matrimony-user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
