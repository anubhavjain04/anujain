<?php

class BranchMasterController extends Controller
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
				'actions'=>array('index','view','branchList','branchExecutives','branchExecutivesCommittee'),
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
		$model=new BranchMaster;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BranchMaster']))
		{
			$model->attributes=$_POST['BranchMaster'];
			if($model->save())
			$this->redirect(array('admin'));
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

		if(isset($_POST['BranchMaster']))
		{
			$model->attributes=$_POST['BranchMaster'];
			if($model->save())
			$this->redirect(array('admin'));
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
		$dataProvider=new CActiveDataProvider('BranchMaster');
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

		$model=new BranchMaster('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BranchMaster']))
		$model->attributes=$_GET['BranchMaster'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionBranchList($zone){
		$zonecode = 01;
		if($zone){
			$zonecode = $zone;
		}
		
		
		$connection=Yii::app()->db;
		$query = "SELECT bm.*"
					." FROM branch_master bm"
					." inner join zone_master zm on (zm.pkZoneId=bm.fkZoneId)"
					." where zm.ZoneCode=".$zonecode." and bm.`Status`=1 and zm.`Status`=1"
					." order by (bm.BranchCode*1)";
		$command=$connection->createCommand($query);
		$branches = $command->queryAll();	
		
		
		$query2 = 'Select ZoneCode, Concat("Zone-",ZoneCode) as ZoneName from zone_master order by (ZoneCode*1)';
		$command2=$connection->createCommand($query2);
		$allZones = CHtml::listData($command2->queryAll(),'ZoneCode','ZoneName');
		
		$this->render('branchesList',array(
			'branches'=>$branches,
			'zonecode'=>$zonecode,
			'allZones'=>$allZones,
		));
	}
	
	public function actionBranchExecutives($branch){
		$branchcode = 001;
		if($branch){
			$branchcode = $branch;
		}
		
		$model=BranchMaster::model()->find('BranchCode=:BranchCode', array(':BranchCode'=>$branchcode));
		
		$connection=Yii::app()->db;
		$query = 'SELECT md.pkMemberId,md.MemberName,md.City,md.District,md.State,md.PersonalNo,md.HContactNo,zmas.ZoneCode,md.EmailId, mp.AssignDate,md.PhotoPath,pm.PostName,bm.BranchName,bm.BranchCode'
	  			   .' FROM member_details md'
    			   .' inner join member_post mp on (md.pkMemberId=mp.fkMemberId)'
    			   .' inner join post_master pm on (mp.fkPostId=pm.pkPostId)'
				   .' inner join group_posts gp on (gp.fkPostId=pm.pkPostId)'
				    .' inner join group_master gm on (gm.pkGroupId=gp.fkGroupId)'
                .' inner join milan_details mild on (md.pkMemberId=mild.fkMemberId)'
            	   .' inner join branch_master bm on (bm.pkBranchId=mild.fkBranchId)'
            	   .' inner join zone_master zmas on(zmas.pkZoneId=bm.fkZoneId)'
  				   .' where gm.GroupCode=\'BEX\' and bm.BranchCode=\''.$branchcode.'\' and mp.Status=1'
            	   .' and zmas.`Status`=1 and gp.`Status`=1 and pm.`Status`=1 and bm.`Status`=1'
				   .' order by (bm.BranchCode*1),pm.PostOrder,mp.`Order`';
		$command=$connection->createCommand($query);
		$members = $command->queryAll();	
		
		/*foreach($postModel as $item){
			echo CHtml::tag('option', array('value'=>$item['pkPostId']),  $item['PostName']);
		}*/
		
		$query2 = 'SELECT bm.BranchCode,concat(trim(bm.BranchCode)," - ",trim(bm.BranchName),(case when (bm.District is not null and trim(bm.District)!=trim(bm.City)) then concat("-",trim(bm.City),"-",trim(bm.District)) else concat("-",bm.City) end),(case when (bm.State is not null and bm.State!="") then concat("(",bm.State,")") else "" end )) as BranchName,Concat("Zone-",zm.ZoneCode) as ZoneName'
					.' FROM branch_master bm'
					.' inner join zone_master zm on (zm.pkZoneId=bm.fkZoneId)'
					.' where bm.`Status`=1 and zm.`Status`=1'
					.' order by (zm.ZoneCode*1),(bm.BranchCode*1)';
		$command2=$connection->createCommand($query2);
		$allBranches = CHtml::listData($command2->queryAll(),'BranchCode','BranchName','ZoneName');
		
		$this->render('branch_executives',array(
			'model'=>$model,
			'members'=>$members,
			'branchcode'=>$branchcode,
			'allBranches'=>$allBranches,
		));
	}
	
	
	public function actionBranchExecutivesCommittee($branch){
		$branchcode = 001;
		if($branch){
			$branchcode = $branch;
		}
		
		$model=BranchMaster::model()->find('BranchCode=:BranchCode', array(':BranchCode'=>$branchcode));
		
		$connection=Yii::app()->db;
		$query = 'SELECT md.pkMemberId,md.MemberName,md.City,md.District,md.State,md.PersonalNo,md.HContactNo,zmas.ZoneCode,md.EmailId, mp.AssignDate,md.PhotoPath,pm.PostName,bm.BranchName,bm.BranchCode'
	  			   .' FROM member_details md'
    			   .' inner join member_post mp on (md.pkMemberId=mp.fkMemberId)'
    			   .' inner join post_master pm on (mp.fkPostId=pm.pkPostId)'
				   .' inner join group_posts gp on (gp.fkPostId=pm.pkPostId)'
				    .' inner join group_master gm on (gm.pkGroupId=gp.fkGroupId)'
                .' inner join milan_details mild on (md.pkMemberId=mild.fkMemberId)'
            	   .' inner join branch_master bm on (bm.pkBranchId=mild.fkBranchId)'
            	   .' inner join zone_master zmas on(zmas.pkZoneId=bm.fkZoneId)'
  				   .' where gm.GroupCode=\'BEXCO\' and bm.BranchCode=\''.$branchcode.'\' and mp.Status=1'
            	   .' and zmas.`Status`=1 and gp.`Status`=1 and pm.`Status`=1 and bm.`Status`=1'
				   .' order by (bm.BranchCode*1),pm.PostOrder,mp.`Order`';
		$command=$connection->createCommand($query);
		$members = $command->queryAll();	
		
		/*foreach($postModel as $item){
			echo CHtml::tag('option', array('value'=>$item['pkPostId']),  $item['PostName']);
		}*/
		
		$query2 = 'SELECT bm.BranchCode,concat(trim(bm.BranchCode)," - ",trim(bm.BranchName),(case when (bm.District is not null and trim(bm.District)!=trim(bm.City)) then concat("-",trim(bm.City),"-",trim(bm.District)) else concat("-",bm.City) end),(case when (bm.State is not null and bm.State!="") then concat("(",bm.State,")") else "" end )) as BranchName,Concat("Zone-",zm.ZoneCode) as ZoneName'
					.' FROM branch_master bm'
					.' inner join zone_master zm on (zm.pkZoneId=bm.fkZoneId)'
					.' where bm.`Status`=1 and zm.`Status`=1'
					.' order by (zm.ZoneCode*1),(bm.BranchCode*1)';
		$command2=$connection->createCommand($query2);
		$allBranches = CHtml::listData($command2->queryAll(),'BranchCode','BranchName','ZoneName');
		
		$this->render('branch_executives_committee',array(
			'model'=>$model,
			'members'=>$members,
			'branchcode'=>$branchcode,
			'allBranches'=>$allBranches,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=BranchMaster::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='branch-master-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	//This function is used to publish multiple records at time
	public function multiplePublish($data)
	{
		$arr=implode(',',$data['branch-master-grid_c0']);
		$connection=Yii::app()->db;
		$query = "update branch_master set Status='1' where pkBranchId in(".$arr.")";
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
	 $arr=implode(',',$data['branch-master-grid_c0']);
	 $query = "update branch_master set Status='0' where pkBranchId in(".$arr.")";
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
		$arr=implode(',',$data['branch-master-grid_c0']);
		$query = "delete from branch_master where pkBranchId in(".$arr.")";
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
		$query = "update branch_master set Status='1' where pkBranchId='".$_GET['id']."'";
		$command=$connection->createCommand($query);
		$command->execute();
		$this->redirect(array('admin'));
	}
	//this function is used to unpubhlish a single record
	public function actionUnpublish()
	{
		$connection=Yii::app()->db;
		$query = "update branch_master set Status='0' where pkBranchId='".$_GET['id']."'";
		$command=$connection->createCommand($query);
		$command->execute();
		$this->redirect(array('admin'));
	}

}
