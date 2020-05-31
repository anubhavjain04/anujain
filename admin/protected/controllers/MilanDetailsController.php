<?php

class MilanDetailsController extends Controller
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
		$model=new MilanDetails;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MilanDetails']))
		{
			$model->attributes=$_POST['MilanDetails'];
			
			$branchMemModel = new MilanDetails();
			$criteria1=new CDbCriteria;
			$criteria1->condition = "fkBranchId=".$model->fkBranchId." and fkMemberId=".$model->fkMemberId;
			$branchMemData = $branchMemModel->findAll($criteria1);
			
			$connection=Yii::app()->db;
			$query = 'Select zm.fkZoneId'
						.' from branch_master bm'
						.' inner join zone_members zm on (zm.fkZoneId=bm.fkZoneId)'
						.' where bm.pkBranchId='.$model->fkBranchId.' and zm.fkMemberId='.$model->fkMemberId;
					  
			$command=$connection->createCommand($query);
			$allZoneMembers = $command->queryAll();
			
			if(count($branchMemData)>0){
				$model->addError('fkBranchId','This branch is already assigned with this member.');
			}else{
				if($model->save()){
					if(count($allZoneMembers)==0){
						$zoneMemberModel=new ZoneMembers;
						$zoneMemberModel->fkZoneId = $model->fkBranch->fkZoneId;
						$zoneMemberModel->fkMemberId = $model->fkMemberId;
						$zoneMemberModel->save();
					}
					$this->redirect(array('admin'));	
				}
			}
			
		}else{
			$connection=Yii::app()->db;
			 $query = 'Select bm.pkBranchId, Concat(bm.BranchCode," - ",bm.BranchName) as BranchName, concat("Zone-",zm.ZoneCode,"(",zm.ZoneName,")") as ZoneName'
					  .' from branch_master bm'
					  .' inner join zone_master zm on (zm.pkZoneId=bm.fkZoneId)'
					  . ' where bm.Status=1'
					  .' order by (zm.ZoneCode*1),(bm.BranchName)';
			 $command=$connection->createCommand($query);
			 $allBranches = CHtml::listData($command->queryAll(),'pkBranchId','BranchName','ZoneName');
			 
			 $query2 =	'SELECT concat(m.MemberName,(case when (m.District is not null and m.District!=m.City) then concat("-",m.City,"-",m.District) else concat("-",m.City) end),(case when (m.State is not null and m.State!="") then concat("(",m.State,")") else "" end )) as MemberName,trim(m.City) as City, m.pkMemberId  FROM member_details m'
				  		.' inner join member_post mp on (m.pkMemberId = mp.fkMemberId)'
				  		.' inner join post_master pm on (pm.pkPostId=mp.fkPostId)'
						.' where m.pkMemberId not in (select fkMemberId from milan_details)'
						.' order by City,m.MemberName';
			
			 $command=$connection->createCommand($query2);
			 $allMembers = CHtml::listData($command->queryAll(),'pkMemberId','MemberName','City');
		}

		$this->render('create',array(
			'model'=>$model,
			'allBranches'=>$allBranches,
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

		if(isset($_POST['MilanDetails']))
		{
			$model->attributes=$_POST['MilanDetails'];
			
			$branchMemModel = new MilanDetails();
			$criteria1=new CDbCriteria;
			$criteria1->condition = "fkBranchId=".$model->fkBranchId." and fkMemberId=".$model->fkMemberId." and pkRecId!=".$id;
			$branchMemData = $branchMemModel->findAll($criteria1);
			
			if(count($branchMemData)>0){
				$model->addError('fkBranchId','This branch is already assigned with this member.');
			}else{
				if($model->save())
				$this->redirect(array('admin'));	
			}
			
		}
		else{
			$connection=Yii::app()->db;
			 $query = 'Select bm.pkBranchId, Concat(bm.BranchCode," - ",bm.BranchName) as BranchName, concat("Zone-",zm.ZoneCode,"(",zm.ZoneName,")") as ZoneName'
					  .' from branch_master bm'
					  .' inner join zone_master zm on (zm.pkZoneId=bm.fkZoneId)'
					  . ' where bm.Status=1'
					  .' order by (zm.ZoneCode*1),(bm.BranchName)';
			 $command=$connection->createCommand($query);
			 $allBranches = CHtml::listData($command->queryAll(),'pkBranchId','BranchName','ZoneName');
			 
			 $query2 =	'SELECT concat(m.MemberName,(case when (m.District is not null and m.District!=m.City) then concat("-",m.City,"-",m.District) else concat("-",m.City) end),(case when (m.State is not null and m.State!="") then concat("(",m.State,")") else "" end )) as MemberName,trim(m.City) as City, m.pkMemberId  FROM member_details m'
				  		.' inner join member_post mp on (m.pkMemberId = mp.fkMemberId)'
				  		.' inner join post_master pm on (pm.pkPostId=mp.fkPostId)'
						.' where m.pkMemberId not in (select fkMemberId from milan_details)'
						.' order by City,m.MemberName';
			
			 $command=$connection->createCommand($query2);
			 $allMembers = CHtml::listData($command->queryAll(),'pkMemberId','MemberName','City');
		}

		$this->render('update',array(
			'model'=>$model,
			'allBranches'=>$allBranches,
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
		$dataProvider=new CActiveDataProvider('MilanDetails');
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

		$model=new MilanDetails('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MilanDetails']))
		$model->attributes=$_GET['MilanDetails'];

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
		$model=MilanDetails::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='milan-details-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	//This function is used to delete multiple records at time
	public function multipleDelete($data)
	{
		$connection=Yii::app()->db;
		$arr=implode(',',$data['milan-details-grid_c0']);
		$query = "delete from milan_details where pkRecId in(".$arr.")";
		$command=$connection->createCommand($query);
		if($command->execute())
		{
	  $this->redirect(array('admin'));
		}
	}

}
