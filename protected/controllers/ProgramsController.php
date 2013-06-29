<?php

class ProgramsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

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
				'actions'=>array('index','view', 'forthcomingPrograms', 'recentPrograms', 'viewProgram'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
		$model=new Programs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Programs']))
		{			
			$model->attributes=$_POST['Programs'];
						
			if((trim($model->attributes['fkLevelCode'])=='ZONE' || trim($model->attributes['fkLevelCode'])=='BRANCH') && (is_null($model->attributes['fkLevelTableId']) || trim($model->attributes['fkLevelTableId'])=='')){
				$model->addError('fkLevelTableId','Please select sub level.');
			}
			else{
				if(is_null($model->attributes['fkLevelTableId']) || trim($model->attributes['fkLevelTableId'])==''){
					$model->fkLevelTableId = null;
				}
				
				if($model->save())
					$this->redirect(array('admin'));
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

		if(isset($_POST['Programs']))
		{
			$model->attributes=$_POST['Programs'];
			
			if((trim($model->attributes['fkLevelCode'])=='ZONE' || trim($model->attributes['fkLevelCode'])=='BRANCH') && (is_null($model->attributes['fkLevelTableId']) || trim($model->attributes['fkLevelTableId'])=='')){
				$model->addError('fkLevelTableId','Please select sub level.');
			}
			else{
				if(is_null($model->attributes['fkLevelTableId']) || trim($model->attributes['fkLevelTableId'])==''){
					$model->fkLevelTableId = null;
				}
				
				if($model->save())
					$this->redirect(array('admin'));
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
		$dataProvider=new CActiveDataProvider('Programs');
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
		$model=new Programs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Programs']))
			$model->attributes=$_GET['Programs'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	// This function will return all forth coming programs list.
	public function actionForthcomingPrograms(){	
		
		if (isset($_GET['pageSize'])) {
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
		}
		
		$model=new Programs('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['leveltype'])){
			$model->fkLevelCode=$_GET['leveltype'];
		}
		
		if(isset($_GET['Programs']))
			$model->attributes=$_GET['Programs'];	
		$model->Status = 1;	
		
		$this->render('forthcoming',array(
			'model'=>$model,
			'ptype'=>"forthcoming",
		));
	}
	
	// This function will return all recent programs list.
	public function actionRecentPrograms(){	
		
		if (isset($_GET['pageSize'])) {
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
		}
		
		$model=new Programs('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['leveltype'])){
			$model->fkLevelCode=$_GET['leveltype'];
		}
		
		if(isset($_GET['Programs']))
			$model->attributes=$_GET['Programs'];	
		$model->Status = 1;		
		
		$this->render('forthcoming',array(
			'model'=>$model,
			'ptype'=>"recent",
		));
	}
	
	// This function will return all forth coming programs list.
	public function actionViewProgram(){	
	
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$program = Programs::model()->findByPk($_GET['id']);
		}
		
		$this->render('view_programs',array(
			'program'=>$program,
		));
	}
	
	
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Programs::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='programs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	//This function is used to publish multiple records at time
	public function multiplePublish($data)
	{
		$arr=implode(',',$data['programs-grid_c0']);
		$connection=Yii::app()->db;
		$query = "update programs set Status='1' where pkProgramId in(".$arr.")";
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
	 $arr=implode(',',$data['programs-grid_c0']);
	 $query = "update programs set Status='0' where pkProgramId in(".$arr.")";
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
		$arr=implode(',',$data['programs-grid_c0']);
		$query = "delete from programs where pkProgramId in(".$arr.")";
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
		$query = "update programs set Status='1' where pkProgramId='".$_GET['id']."'";
		$command=$connection->createCommand($query);
		$command->execute();
		$this->redirect(array('admin'));
	}
	//this function is used to unpubhlish a single record
	public function actionUnpublish()
	{
		$connection=Yii::app()->db;
		$query = "update programs set Status='0' where pkProgramId='".$_GET['id']."'";
		$command=$connection->createCommand($query);
		$command->execute();
		$this->redirect(array('admin'));
	}
	
	public function actionLevelRecords(){
		if(isset($_POST['lCode'])){
			$levelCode = $_POST['lCode'];
			if($levelCode=='BRANCH'){
				$branchModel = new BranchMaster();
				$branchData = $branchModel->findAll();
				
				foreach($branchData as $item){
					echo CHtml::tag('option', array('value'=>$item['pkBranchId']),  $item['BranchName']);
				}				
			}else if($levelCode=='ZONE'){
				$zoneModel = new ZoneMaster();
				$zoneData = $zoneModel->findAll();
				
				foreach($zoneData as $item){
					echo CHtml::tag('option', array('value'=>$item['pkZoneId']),  $item['ZoneName']);
				}
			}else{
				echo '';
			}
		}
	}
}
