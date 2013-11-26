<?php

class MagazineController extends Controller
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
		$model=new Magazine;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Magazine']))
		{
			$model->attributes=$_POST['Magazine'];
			
			$magazineFile = CUploadedFile::getInstanceByName('Magazine[Path]'); 
						
			$isFoundError = false;
			if(!isset($magazineFile)){
				$isFoundError = true;
				$model->addError('Path','Please click on Browse button to upload a PDF file.');
			}
			
			if(!$isFoundError){			
				$fileName = $magazineFile->getName();
				$extArr = explode(".", $fileName); 
				$ext = strtolower($extArr[count($extArr)-1]);			
				
				$day = '01';
				$month = '04';
				$year = date('Y',time());				
				
				if(isset($_POST['day']) && $_POST['day']!=""){
					$day = $_POST['day'];
				}
				if(isset($_POST['month']) && $_POST['month']!=""){
					$month = $_POST['month'];
				}
				if(isset($_POST['year']) && $_POST['year']!=""){
					$year = $_POST['year'];
				}
				
				$model->MagzineDate =  date('Y-m-d',strtotime($year.'-'.$month.'-'.$day));				
				
				$model->Path = null;
				if(!isset($model->Type)){
					$model->Type = null;
				}
				
				if ($ext == 'pdf' || $ext == 'PDF') {					
				}else{
					$isFoundError = true;
					$model->addError('Path','You can upload only PDF file.');	
				}				
				
				if(!$isFoundError){
					$connection=Yii::app()->db;
					$query = "SELECT m.MagazineName, m.MagzineDate, m.`Type`, mt.pkMagTypeId, mt.TypeCode"
							 ." FROM magazine m"
							 ." inner join magazine_type mt on (m.fkMagTypeId=mt.pkMagTypeId)"
							 ." where mt.pkMagTypeId=".$model->fkMagTypeId." and m.MagzineDate='".$model->MagzineDate."'";
					if(isset($model->Type)){
						$query = $query." and m.`Type`=".$model->Type;
					}		 
					$command=$connection->createCommand($query);
					$existsMagzines = $command->queryAll();
					
					if(count($existsMagzines)){
						$isFoundError = true;
						$model->addError('MagzineDate','Magazine is already added for this month and year, please update if you want.');	
					}
				
				}
				
				
			}
				
			if (!$isFoundError) {
				if($model->save()){
					if(isset($magazineFile)){
						$savaBasePath = pathinfo(Yii::app()->request->scriptFile);						
						$filename = $model->pkMagazineId.".".$ext;
						$magazineFile->saveAs($savaBasePath['dirname']."/".Yii::app()->params['bjmDIR'].Yii::app()->params['magzinePath']."/".$filename);
						$model->Path=$filename;
						$model->save();
					}					
					
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

		if(isset($_POST['Magazine']))
		{			
			$model->attributes=$_POST['Magazine'];
			
			$magazineFile = CUploadedFile::getInstanceByName('Magazine[Path]');							
				
			$day = '01';
			$month = '04';
			$year = date('Y',time());				
			
			if(isset($_POST['day']) && $_POST['day']!=""){
				$day = $_POST['day'];
			}
			if(isset($_POST['month']) && $_POST['month']!=""){
				$month = $_POST['month'];
			}
			if(isset($_POST['year']) && $_POST['year']!=""){
				$year = $_POST['year'];
			}
			
			$model->MagzineDate =  date('Y-m-d',strtotime($year.'-'.$month.'-'.$day));				
			
			
			unset($model->Path);
			
			if(!isset($model->Type)){
				$model->Type = null;
			}
			
			
			$connection=Yii::app()->db;
			$query = "SELECT m.MagazineName, m.MagzineDate, m.`Type`, mt.pkMagTypeId, mt.TypeCode"
					 ." FROM magazine m"
					 ." inner join magazine_type mt on (m.fkMagTypeId=mt.pkMagTypeId)"
					 ." where mt.pkMagTypeId=".$model->fkMagTypeId." and m.MagzineDate='".$model->MagzineDate."' and m.pkMagazineId!=".$model->pkMagazineId;
			if(isset($model->Type)){
				$query = $query." and m.`Type`=".$model->Type;
			}		 
			$command=$connection->createCommand($query);
			$existsMagzines = $command->queryAll();
			
			$isFoundError = false;
			if(count($existsMagzines)){
				$isFoundError = true;
				$model->addError('MagzineDate','Magazine is already added for this month and year.');	
			}
				
						
			if(!$isFoundError){
				if($model->save()){
					if(isset($magazineFile)){
						$fileName = $magazineFile->getName();					
						$extArr = explode(".", $fileName); 
						$ext = strtolower($extArr[count($extArr)-1]);
						if ($ext == 'pdf') {
							$savaBasePath = pathinfo(Yii::app()->request->scriptFile);												
							$filename = $model->pkMagazineId.".".$ext;						
							$magazineFile->saveAs($savaBasePath['dirname']."/".Yii::app()->params['bjmDIR'].Yii::app()->params['magzinePath']."/".$filename);
							$model->Path=$filename;
							$model->save();
						}
						else{
							$model->addError('Path','You can upload only PDF file.');	
						}
					}
					
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
		$dataProvider=new CActiveDataProvider('Magazine');
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
		
		$model=new Magazine('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Magazine']))
			$model->attributes=$_GET['Magazine'];

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
		$model=Magazine::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='magazine-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	//This function is used to publish multiple records at time
	public function multiplePublish($data)
	{
		$arr=implode(',',$data['magazine-grid_c0']);
		$connection=Yii::app()->db;
		$query = "update magazine set Status='1' where pkMagazineId in(".$arr.")";
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
	 $arr=implode(',',$data['magazine-grid_c0']);
	 $query = "update magazine set Status='0' where pkMagazineId in(".$arr.")";
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
		$arr=implode(',',$data['magazine-grid_c0']);
		$query = "delete from magazine where pkMagazineId in(".$arr.")";
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
		$query = "update magazine set Status='1' where pkMagazineId='".$_GET['id']."'";
		$command=$connection->createCommand($query);
		$command->execute();
		$this->redirect(array('admin'));
	}
	//this function is used to unpubhlish a single record
	public function actionUnpublish()
	{
		$connection=Yii::app()->db;
		$query = "update magazine set Status='0' where pkMagazineId='".$_GET['id']."'";
		$command=$connection->createCommand($query);
		$command->execute();
		$this->redirect(array('admin'));
	}
}
