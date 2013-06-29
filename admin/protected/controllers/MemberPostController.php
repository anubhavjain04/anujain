<?php

class MemberPostController extends Controller
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
		$model=new MemberPost;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MemberPost']))
		{
			$model->attributes=$_POST['MemberPost'];
			
			if($model->AssignDate){
				$model->AssignDate = date('Y-m-d',strtotime($model->AssignDate));
			}else{
				$model->AssignDate = date('Y-m-d',strtotime('01/01/1900'));
			}
			
			if($model->TillDate){
				$model->TillDate = date('Y-m-d',strtotime($model->TillDate));
			}else{
				$model->TillDate = null;
			}
			
			
			$MemPostModel = new MemberPost();
			$criteria1=new CDbCriteria;
			$criteria1->condition = "fkMemberId=".$model->fkMemberId." and fkPostId=".$model->fkPostId;
			$MemPostData = $MemPostModel->findAll($criteria1);
			
			if(count($MemPostData)>0){
				$model->addError('fkMemberId','This post is already assigned with this member.');
			}else{
				if($model->save())
				$this->redirect(array('admin'));	
			}
			
		}else{
			$connection=Yii::app()->db;
			$query2 =	'SELECT concat(trim(m.MemberName),(case when (m.District is not null and trim(m.District)!=trim(m.City)) then concat("-",trim(m.City),"-",trim(m.District)) else concat("-",m.City) end),(case when (m.State is not null and m.State!="") then concat("(",m.State,")") else "" end )) as MemberName,trim(m.City) as City, m.pkMemberId  FROM member_details m'
						.' order by m.City,m.MemberName';
			 $command=$connection->createCommand($query2);
			 $allMembers = CHtml::listData($command->queryAll(),'pkMemberId','MemberName','City');
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['MemberPost']))
		{
			$model->attributes=$_POST['MemberPost'];
			
			if($model->AssignDate){
				$model->AssignDate = date('Y-m-d',strtotime($model->AssignDate));
			}else{
				$model->AssignDate = date('Y-m-d',strtotime('01/01/1900'));
			}
			
			if($model->TillDate){
				$model->TillDate = date('Y-m-d',strtotime($model->TillDate));
			}else{
				$model->TillDate = null;
			}
			
			$MemPostModel = new MemberPost();
			$criteria1=new CDbCriteria;
			$criteria1->condition = "fkMemberId=".$model->fkMemberId." and fkPostId=".$model->fkPostId." and pkMemPostId!=".$id;
			$MemPostData = $MemPostModel->findAll($criteria1);
			
			if(count($MemPostData)>0){
				$model->addError('fkMemberId','This post is already assigned with this member.');
			}else{
				if($model->save())
				$this->redirect(array('admin'));	
			}
			
		}else{
			if($model->AssignDate){
				$model->AssignDate = date('m/d/Y',strtotime($model->AssignDate));
			}
			if($model->TillDate){
				$model->TillDate = date('m/d/Y',strtotime($model->TillDate));
			}
			
			$connection=Yii::app()->db;
			$query2 =	'SELECT concat(trim(m.MemberName),(case when (m.District is not null and trim(m.District)!=trim(m.City)) then concat("-",trim(m.City),"-",trim(m.District)) else concat("-",m.City) end),(case when (m.State is not null and m.State!="") then concat("(",m.State,")") else "" end )) as MemberName,trim(m.City) as City, m.pkMemberId  FROM member_details m'
						.' order by m.City,m.MemberName';
			 $command=$connection->createCommand($query2);
			 $allMembers = CHtml::listData($command->queryAll(),'pkMemberId','MemberName','City');
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('MemberPost');
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

		$model=new MemberPost('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MemberPost']))
		$model->attributes=$_GET['MemberPost'];

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
		$model=MemberPost::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='member-post-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	//This function is used to publish multiple records at time
	public function multiplePublish($data)
	{
		$arr=implode(',',$data['member-post-grid_c0']);
		$connection=Yii::app()->db;
		$query = "update member_post set Status='1' where pkMemPostId in(".$arr.")";
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
	 $arr=implode(',',$data['member-post-grid_c0']);
	 $query = "update member_post set Status='0' where pkMemPostId in(".$arr.")";
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
		$arr=implode(',',$data['member-post-grid_c0']);
		$query = "delete from member_post where pkMemPostId in(".$arr.")";
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
		$query = "update member_post set Status='1' where pkMemPostId='".$_GET['id']."'";
		$command=$connection->createCommand($query);
		$command->execute();
		$this->redirect(array('admin'));
	}
	//this function is used to unpubhlish a single record
	public function actionUnpublish()
	{
		$connection=Yii::app()->db;
		$query = "update member_post set Status='0' where pkMemPostId='".$_GET['id']."'";
		$command=$connection->createCommand($query);
		$command->execute();
		$this->redirect(array('admin'));
	}
	
	public function actionGetLevelPosts(){
		if(isset($_POST['lCode'])){
			$levelCode = $_POST['lCode'];
			
			/*$postModel = new PostMaster();
			
			$criteria=new CDbCriteria;
			$criteria->condition='LevelCode>=:LevelCode';
			$criteria->order = 'PostOrder ASC';
			$criteria->params=array(":LevelCode"=>$levelCode);			
			$postModel = $postModel->findAll($criteria);*/
			
			$connection=Yii::app()->db;
			$query = "select * from post_master where LevelCode='".$levelCode."' order by PostOrder";
			$command=$connection->createCommand($query);
			$postModel = $command->queryAll();
			
			
			foreach($postModel as $item){
				echo CHtml::tag('option', array('value'=>$item['pkPostId']),  $item['PostName']);
			}	
		}
		else{
			echo '';
		}
		
	}
	
	public function actionSearchMembers(){
		if(isset($_GET['term'])){
			$connection=Yii::app()->db;
			$query = "select MemberName from member_details where MemberName like '%".$_GET['term']."%' order by MemberName";
			$command=$connection->createCommand($query);
			$membersModel = $command->queryAll();
			
			foreach($membersModel as $item){
				echo $item['MemberName'].",";
			}
		}else{
			echo 'aaa';
		}
	}
}
