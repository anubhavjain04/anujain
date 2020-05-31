<?php

class LoginMasterController extends Controller
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
		//'actions'=>array('create','update'),
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
		
		$model=new LoginMaster;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
			
		
		if(isset($_POST['LoginMaster']))
		{
			$model->attributes=$_POST['LoginMaster'];
			$model->CreationDate= date('Y-m-d H:i:s', time());
			if(is_null($model->attributes['fkgroupId']) || trim($model->attributes['fkgroupId'])==''){
				$model->fkgroupId = null;
			}
			$model->Password = $model->hashPassword($model->Password);
			
			$criteria=new CDbCriteria;
			$criteria->condition='UserId=:UserId';
			$criteria->params=array(':UserId'=>$model->UserId);


			//$existModel = LoginMaster::model()->find('UserId=:UserId',array(':UserId'=>$model->UserId));

			$loginMasterList = LoginMaster::model()->find($criteria);
				
			if(isset($loginMasterList)){
				 $model->addError('UserId','This user-id is already exists.');
			}else{
				if($model->validate()){
					if($model->save())
					$this->redirect(array('admin'));
				}
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

		if(isset($_POST['LoginMaster']))
		{
			$model->attributes=$_POST['LoginMaster'];
			
			$model->CreationDate= date('Y-m-d H:i:s', time());
			if(is_null($model->attributes['fkgroupId']) || trim($model->attributes['fkgroupId'])==''){
				$model->fkgroupId = null;
			}
			$model->Password = $model->hashPassword($model->Password);
			
			$criteria=new CDbCriteria;
			$criteria->condition='UserId=:UserId and pkLoginId!=:pkLoginId';
			$criteria->params=array(':UserId'=>$model->UserId, ":pkLoginId"=>$id);


			//$existModel = LoginMaster::model()->find('UserId=:UserId',array(':UserId'=>$model->UserId));

			$loginMasterList = LoginMaster::model()->find($criteria);
			if(isset($loginMasterList)){
				 $model->addError('UserId','This user-id is already exists.');
			}else{
				if($model->validate()){
					if($model->save())
					$this->redirect(array('admin'));
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
		$dataProvider=new CActiveDataProvider('LoginMaster');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		//Code to display the selected no of result from dropdown in Manage Static Pages
		if (isset($_GET['pageSize'])) {
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
		}

		$model=new LoginMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LoginMaster']))
		$model->attributes=$_GET['LoginMaster'];

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
		$model=LoginMaster::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-master-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	//This function is used to publish multiple records at time
	public function multiplePublish($data)
	{
		$arr=implode(',',$data['login-master-grid_c0']);
		$connection=Yii::app()->db;
		$query = "update login_master set Status='1' where pkLoginId in(".$arr.")";
		$command=$connection->createCommand($query);
		if($command->execute())
		{
	  $this->redirect(array('admin'));
		}
	}

	//This function is used to unpublish multiple records at time
	public function multipleUnpublish($data)
	{
	 $connection=Yii::app()->db;
	 $arr=implode(',',$data['login-master-grid_c0']);
	 $query = "update login_master set Status='0' where pkLoginId in(".$arr.")";
	 $command=$connection->createCommand($query);
	 if($command->execute())
	 {
	  $this->redirect(array('admin'));
	 }
	}

	//This function is used to delete multiple records at time
	public function multipleDelete($data)
	{
		$connection=Yii::app()->db;
		$arr=implode(',',$data['login-master-grid_c0']);
		$query = "delete from login_master where pkLoginId in(".$arr.")";
		$command=$connection->createCommand($query);
		if($command->execute())
		{
	  $this->redirect(array('admin'));
		}
	}

	//this function is used to pubhlish a single record
	public function actionPublish()
	{
		$connection=Yii::app()->db;
		$query = "update login_master set Status='1' where pkLoginId='".$_GET['id']."'";
		$command=$connection->createCommand($query);
		$command->execute();
		$this->redirect(array('admin'));
	}
	//this function is used to unpubhlish a single record
	public function actionUnpublish()
	{
		$connection=Yii::app()->db;
		$query = "update login_master set Status='0' where pkLoginId='".$_GET['id']."'";
		$command=$connection->createCommand($query);
		$command->execute();
		$this->redirect(array('admin'));
	}
}
