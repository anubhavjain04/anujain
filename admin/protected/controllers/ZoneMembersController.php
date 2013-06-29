<?php

class ZoneMembersController extends Controller
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
		$model=new ZoneMembers;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ZoneMembers']))
		{
			$model->attributes=$_POST['ZoneMembers'];
			
			$zoneMemModel = new ZoneMembers();
			$criteria1=new CDbCriteria;
			$criteria1->condition = "fkZoneId=".$model->fkZoneId." and fkMemberId=".$model->fkMemberId;
			$zoneMemData = $zoneMemModel->findAll($criteria1);
			
			if(count($zoneMemData)>0){
				$model->addError('fkZoneId','This zone is already assigned with this member.');
			}else{
				if($model->save())
				$this->redirect(array('admin'));	
			}
			
		}else{
			$connection=Yii::app()->db;
			 $query = 'Select pkZoneId, Concat("Zone-",ZoneCode) as ZoneCode from zone_master order by (ZoneCode*1)';
			 $command=$connection->createCommand($query);
			 $allZones = CHtml::listData($command->queryAll(),'pkZoneId','ZoneCode');
			 
			 $query2 =	'SELECT concat(trim(m.MemberName),(case when (m.District is not null and trim(m.District)!=trim(m.City)) then concat("-",trim(m.City),"-",trim(m.District)) else concat("-",trim(m.City)) end),(case when (m.State is not null and trim(m.State)!="") then concat("(",trim(m.State),")") else "" end )) as MemberName,trim(m.City) as City, m.pkMemberId  FROM member_details m'
				  		.' inner join member_post mp on (m.pkMemberId = mp.fkMemberId)'
				  		.' inner join post_master pm on (pm.pkPostId=mp.fkPostId)'
						.' where m.pkMemberId not in (select fkMemberId from zone_members)'
						.' order by m.City,m.MemberName';
			 $command=$connection->createCommand($query2);
			 $allMembers = CHtml::listData($command->queryAll(),'pkMemberId','MemberName','City');
		}
		

		$this->render('create',array(
			'model'=>$model,
			'allZones'=>$allZones,
			'allMembers'=>$allMembers,
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

		if(isset($_POST['ZoneMembers']))
		{
			$model->attributes=$_POST['ZoneMembers'];
			
			$zoneMemModel = new ZoneMembers();
			$criteria1=new CDbCriteria;
			$criteria1->condition = "fkZoneId=".$model->fkZoneId." and fkMemberId=".$model->fkMemberId." and pkZoneMember!=".$id;
			$zoneMemData = $zoneMemModel->findAll($criteria1);
			
			if(count($zoneMemData)>0){
				$model->addError('fkZoneId','This zone is already assigned with this member.');
			}else{
				if($model->save())
				$this->redirect(array('admin'));	
			}
			
		}else{
			$connection=Yii::app()->db;
			 $query = 'Select pkZoneId, Concat("Zone-",ZoneCode) as ZoneCode from zone_master order by (ZoneCode*1)';
			 $command=$connection->createCommand($query);
			 $allZones = CHtml::listData($command->queryAll(),'pkZoneId','ZoneCode');
			 
			  $query2 =	'SELECT concat(trim(m.MemberName),(case when (m.District is not null and trim(m.District)!=trim(m.City)) then concat("-",trim(m.City),"-",trim(m.District)) else concat("-",trim(m.City)) end),(case when (m.State is not null and trim(m.State)!="") then concat("(",trim(m.State),")") else "" end )) as MemberName,trim(m.City) as City, m.pkMemberId  FROM member_details m'
				  		.' inner join member_post mp on (m.pkMemberId = mp.fkMemberId)'
				  		.' inner join post_master pm on (pm.pkPostId=mp.fkPostId)'
						.' where m.pkMemberId in (select fkMemberId from zone_members)'
						.' order by m.City,m.MemberName';
			 
			 $command=$connection->createCommand($query2);
			 $allMembers = CHtml::listData($command->queryAll(),'pkMemberId','MemberName','City');
		}

		$this->render('update',array(
			'model'=>$model,
			'allZones'=>$allZones,
			'allMembers'=>$allMembers,
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
		$dataProvider=new CActiveDataProvider('ZoneMembers');
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
		
		$model=new ZoneMembers('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ZoneMembers']))
			$model->attributes=$_GET['ZoneMembers'];

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
		$model=ZoneMembers::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='zone-members-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	//This function is used to publish multiple records at time
	public function multiplePublish($data)
	{
		$arr=implode(',',$data['zone-members-grid_c0']);
		$connection=Yii::app()->db;
		$query = "update zone_members set Status='1' where pkZoneMember in(".$arr.")";
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
	 $arr=implode(',',$data['zone-members-grid_c0']);
	 $query = "update zone_members set Status='0' where pkZoneMember in(".$arr.")";
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
		$arr=implode(',',$data['zone-members-grid_c0']);
		$query = "delete from zone_members where pkZoneMember in(".$arr.")";
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
		$query = "update zone_members set Status='1' where pkZoneMember='".$_GET['id']."'";
		$command=$connection->createCommand($query);
		$command->execute();
		$this->redirect(array('admin'));
	}
	//this function is used to unpubhlish a single record
	public function actionUnpublish()
	{
		$connection=Yii::app()->db;
		$query = "update zone_members set Status='0' where pkZoneMember='".$_GET['id']."'";
		$command=$connection->createCommand($query);
		$command->execute();
		$this->redirect(array('admin'));
	}
}
