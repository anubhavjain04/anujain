<?php

class MemberDetailsController extends Controller
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
				'actions'=>array('index','view', 'nationalExecutives', 'zoneExecutives', 'nationalGoverningBoard', 
								'executiveProfile','foundationExecutives','zonalExecutivesCommittee','hospitalExecutives',
								'samachaarExecutives','bjmKaryakarini','founderFoundationTrusti','aajeevanFoundationTrusti',
								'nationalFormerExecutives','foundationFormerExecutives','searchMember'),
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
	
	public function actionExecutiveProfile($id)
	{
		$model=$this->loadModel($id);
		
		$connection=Yii::app()->db;
		$query = "SELECT mp.AssignDate,mp.TillDate,lm.LevelName,pm.PostName"
				  ." FROM member_post mp"
				  ." inner join post_master pm on (mp.fkPostId=pm.pkPostId)"
				  ." inner join level_master lm on (lm.LevelCode=pm.LevelCode)"
				  ." where mp.fkMemberId=".$id." and mp.Status=1 and pm.Status=1"
				  ." order by lm.LevelOrder,pm.PostOrder,mp.`Order`";
		$command=$connection->createCommand($query);
		$memberPosts = $command->queryAll();
		
		$query1 = "select zm.ZoneCode"
				  ." from zone_master zm"
				  ." inner join zone_members zmm on (zmm.fkZoneId=zm.pkZoneId)"
				  ." where zmm.fkMemberId=".$id." and zm.Status=1 and zmm.Status=1";
		$command1=$connection->createCommand($query1);
		$memberZone = $command1->queryAll();
		
		
		$query2 = "select bm.BranchName, bm.BranchCode"
				  ." from branch_master bm"
				  ." inner join milan_details mdet on (mdet.fkBranchId=bm.pkBranchId)"
				  ." where mdet.fkMemberId=".$id." and bm.Status=1";
		$command2=$connection->createCommand($query2);
		$memberBranch = $command2->queryAll();
		
		
		$this->render('member_profile',array(
			'model'=>$model,
			'memberPosts'=>$memberPosts,
			'memberZone'=>$memberZone,
			'memberBranch'=>$memberBranch,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new MemberDetails;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MemberDetails']))
		{
			$model->attributes=$_POST['MemberDetails'];
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

		if(isset($_POST['MemberDetails']))
		{
			$model->attributes=$_POST['MemberDetails'];
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
		$dataProvider=new CActiveDataProvider('MemberDetails');
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

		$model=new MemberDetails('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MemberDetails']))
		$model->attributes=$_GET['MemberDetails'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionNationalExecutives(){
		
		$connection=Yii::app()->db;
		$query = "SELECT md.pkMemberId,pm.PostName,md.MemberName,md.City,md.District,md.State,md.PersonalNo,md.HContactNo"
	  			  ." FROM member_details md"
    			  ." inner join member_post mp on (md.pkMemberId=mp.fkMemberId)"
    			  ." inner join post_master pm on (mp.fkPostId=pm.pkPostId)"
				  ." inner join group_posts gp on (gp.fkPostId=pm.pkPostId)"
				  ." inner join group_master gm on (gm.pkGroupId=gp.fkGroupId)"
  				  ." where gm.GroupCode='NEXCO' and mp.Status=1 and pm.LevelCode='NATIONAL'"
				  ." order by pm.PostOrder,mp.`Order`";
		$command=$connection->createCommand($query);
		$nationalMembers = $command->queryAll();	
		
		
		$query2 = "select md.pkMemberId,md.MemberName,md.City,md.District,md.State, md.PersonalNo,md.HContactNo, md.EmailId, pm.PostName"
				  ." from member_details md"
				  ." inner join member_post mp on (md.pkMemberId=mp.fkMemberId)"
				  ." inner join post_master pm on (pm.pkPostId=fkPostId)"
				  ." inner join group_posts gp on (gp.fkPostId=pm.pkPostId)"
				  ." inner join group_master gm on (gm.pkGroupId=gp.fkGroupId)"
				  ." where gm.GroupCode='FEX' and pm.LevelCode='FOUNDATION'"
				  ." and mp.Status=1 and pm.Status=1 and gp.Status=1"
				  ." order by pm.PostOrder,mp.`Order`";
		$command2=$connection->createCommand($query2);
		$foundationMembers = $command2->queryAll();
		
		$query3 = "select md.pkMemberId,md.MemberName,md.City,md.District,md.State, md.PersonalNo,md.HContactNo, md.EmailId, pm.PostName"
				  ." from member_details md"
				  ." inner join member_post mp on (md.pkMemberId=mp.fkMemberId)"
				  ." inner join post_master pm on (pm.pkPostId=fkPostId)"
				  ." inner join group_posts gp on (gp.fkPostId=pm.pkPostId)"
				  ." inner join group_master gm on (gm.pkGroupId=gp.fkGroupId)"
				  ." where gm.GroupCode='HOSEX' and pm.LevelCode='HOSPITAL'"
				  ." and mp.Status=1 and pm.Status=1 and gp.Status=1"
				  ." order by pm.PostOrder,mp.`Order`";
		$command3=$connection->createCommand($query3);
		$hospitalMembers = $command3->queryAll();
		
		$query4 = "select md.pkMemberId,md.MemberName,md.City,md.District,md.State, md.PersonalNo,md.HContactNo, md.EmailId,pm.PostName"
				  ." from member_details md"
				  ." inner join member_post mp on (md.pkMemberId=mp.fkMemberId)"
				  ." inner join post_master pm on (pm.pkPostId=fkPostId)"
				  ." inner join group_posts gp on (gp.fkPostId=pm.pkPostId)"
				  ." where pm.LevelCode='SAMACHAR'"
				  ." and mp.Status=1 and pm.Status=1 and gp.Status=1"
				  ." order by pm.PostOrder,mp.`Order`";
		$command4=$connection->createCommand($query4);
		$samachaarMembers = $command4->queryAll();
		
		
		
		$query5 = "SELECT m.MagazineName, m.MagzineDate, m.Path, mt.TypeCode"
					." FROM magazine m"
					 ." inner join magazine_type mt on (m.fkMagTypeId=mt.pkMagTypeId)"
					 ." where mt.TypeCode='NEXCOMM'"
					 ." order by m.MagzineDate desc;";
		$command5=$connection->createCommand($query5);
		$magazine = $command5->queryAll();
		
		
		/*foreach($postModel as $item){
			echo CHtml::tag('option', array('value'=>$item['pkPostId']),  $item['PostName']);
		}*/
		
		$this->render('executives_committee',array(
			'nationalMembers'=>$nationalMembers,
			'foundationMembers'=>$foundationMembers,
			'hospitalMembers'=>$hospitalMembers,
			'samachaarMembers'=>$samachaarMembers,
			'magazine'=>$magazine,
		));
	}
	
	public function actionZoneExecutives($zone){
		$zonecode = 01;
		if($zone){
			$zonecode = $zone;
		}
		
		$connection=Yii::app()->db;
		$query = "SELECT md.pkMemberId,md.MemberName,md.City,md.District,md.State,md.PersonalNo,md.HContactNo,zmas.ZoneCode,md.EmailId, mp.AssignDate,md.PhotoPath,pm.PostName"
	  			  ." FROM member_details md"
    			  ." inner join member_post mp on (md.pkMemberId=mp.fkMemberId)"
    			  ." inner join post_master pm on (mp.fkPostId=pm.pkPostId)"
				  ." inner join group_posts gp on (gp.fkPostId=pm.pkPostId)"
				   ." inner join group_master gm on (gm.pkGroupId=gp.fkGroupId)"
            	  ." inner join zone_members zmem on (md.pkMemberId=zmem.fkMemberId)"
            	  ." inner join zone_master zmas on(zmas.pkZoneId=zmem.fkZoneId)"
  				  ." where gm.GroupCode='ZEX' and zmas.ZoneCode=".$zonecode." and mp.Status=1 and pm.LevelCode='ZONE'"
            	  ." and zmas.Status=1 and zmem.Status=1 and gp.Status=1 and pm.Status=1"
				  ." order by (zmas.ZoneCode*1),pm.PostOrder,mp.`Order`";
		$command=$connection->createCommand($query);
		$zoneMembers = $command->queryAll();	
		
		/*foreach($postModel as $item){
			echo CHtml::tag('option', array('value'=>$item['pkPostId']),  $item['PostName']);
		}*/
		
		$query2 = 'Select ZoneCode, Concat("Zone-",ZoneCode) as ZoneName from zone_master order by (ZoneCode*1)';
		$command2=$connection->createCommand($query2);
		$allZones = CHtml::listData($command2->queryAll(),'ZoneCode','ZoneName');
		
		$this->render('zone_executives',array(
			'zoneMembers'=>$zoneMembers,
			'zonecode'=>$zonecode,
			'allZones'=>$allZones,
		));
	}
	
	public function actionZonalExecutivesCommittee($zone){
		$zonecode = 01;
		if($zone){
			$zonecode = $zone;
		}
		
		$connection=Yii::app()->db;
		$query = "SELECT md.pkMemberId,pm.PostName,md.MemberName,md.City,md.District,md.State,md.PersonalNo,md.HContactNo"
	  			   ." FROM member_details md"
    			   ." inner join member_post mp on (md.pkMemberId=mp.fkMemberId)"
    			   ." inner join post_master pm on (mp.fkPostId=pm.pkPostId)"
				   ." inner join group_posts gp on (gp.fkPostId=pm.pkPostId)"
				   ." inner join group_master gm on (gm.pkGroupId=gp.fkGroupId)"
				   ." inner join zone_members zmem on (zmem.fkMemberId=md.pkMemberId)"
             	   ." inner join zone_master zm on (zm.pkZoneId=zmem.fkZoneId)"
  				   ." where gm.GroupCode='ZEXCO' and zm.ZoneCode=".$zonecode." and mp.Status=1 and gp.Status=1 and pm.Status=1"
				   ." order by pm.PostOrder,mp.`Order`";
		$command=$connection->createCommand($query);
		$members = $command->queryAll();	
		
		
		$query2 = 'Select ZoneCode, Concat("Zone-",ZoneCode) as ZoneName from zone_master order by (ZoneCode*1)';
		$command2=$connection->createCommand($query2);
		$allZones = CHtml::listData($command2->queryAll(),'ZoneCode','ZoneName');
		
		$query5 = "SELECT m.MagazineName, m.MagzineDate, m.Path,m.`Type`, mt.TypeCode"
					." FROM magazine m"
					 ." inner join magazine_type mt on (m.fkMagTypeId=mt.pkMagTypeId)"
					 ." inner join zone_master zm on (m.`Type`=zm.ZoneCode)"
					 ." where mt.TypeCode='ZEXCOMM' and m.`Type`='".$zonecode."'"
					 ." order by m.MagzineDate desc";
		$command5=$connection->createCommand($query5);
		$magazine = $command5->queryAll();
		
		$this->render('zone_executives_committee',array(
			'members'=>$members,
			'zonecode'=>$zonecode,
			'allZones'=>$allZones,
			'magazine'=>$magazine,
		));
	}
	
	public function actionNationalGoverningBoard(){
		$connection=Yii::app()->db;
		$query = "select md.pkMemberId,md.MemberName,md.City,md.District,md.State, md.PersonalNo,md.HContactNo, md.EmailId, mp.AssignDate,md.PhotoPath,pm.PostName"
				  ." from member_details md"
				  ." inner join member_post mp on (md.pkMemberId=mp.fkMemberId)"
				  ." inner join post_master pm on (pm.pkPostId=fkPostId)"
				  ." inner join group_posts gp on (gp.fkPostId=pm.pkPostId)"
				  ." inner join group_master gm on (gm.pkGroupId=gp.fkGroupId)"
				  ." where gm.GroupCode='NGB'"
				  ." and mp.Status=1 and pm.Status=1 and gp.Status=1"
				  ." order by pm.PostOrder,mp.`Order`";
		$command=$connection->createCommand($query);
		$boardMembers = $command->queryAll();	
		
		/*foreach($postModel as $item){
			echo CHtml::tag('option', array('value'=>$item['pkPostId']),  $item['PostName']);
		}*/
		
		$this->render('national_gov_board',array(
			'boardMembers'=>$boardMembers,
		));
	}
	
	public function actionFoundationExecutives(){
		$connection=Yii::app()->db;
		$query = "select md.pkMemberId,md.MemberName,md.City,md.District,md.State, md.PersonalNo,md.HContactNo, md.EmailId, mp.AssignDate,md.PhotoPath,pm.PostName"
				  ." from member_details md"
				  ." inner join member_post mp on (md.pkMemberId=mp.fkMemberId)"
				  ." inner join post_master pm on (pm.pkPostId=fkPostId)"
				  ." inner join group_posts gp on (gp.fkPostId=pm.pkPostId)"
				  ." inner join group_master gm on (gm.pkGroupId=gp.fkGroupId)"
				  ." where gm.GroupCode='FEX' and pm.LevelCode='FOUNDATION'"
				  ." and mp.Status=1 and pm.Status=1 and gp.Status=1"
				  ." order by pm.PostOrder,mp.`Order`";
		$command=$connection->createCommand($query);
		$boardMembers = $command->queryAll();	
		
		/*foreach($postModel as $item){
			echo CHtml::tag('option', array('value'=>$item['pkPostId']),  $item['PostName']);
		}*/
		
		$this->render('foundation_executives',array(
			'boardMembers'=>$boardMembers,
		));
	}
	
	public function actionHospitalExecutives(){
		$connection=Yii::app()->db;
		$query = "select md.pkMemberId,md.MemberName,md.City,md.District,md.State, md.PersonalNo,md.HContactNo, md.EmailId, mp.AssignDate,md.PhotoPath,pm.PostName"
				  ." from member_details md"
				  ." inner join member_post mp on (md.pkMemberId=mp.fkMemberId)"
				  ." inner join post_master pm on (pm.pkPostId=fkPostId)"
				  ." inner join group_posts gp on (gp.fkPostId=pm.pkPostId)"
				  ." inner join group_master gm on (gm.pkGroupId=gp.fkGroupId)"
				  ." where gm.GroupCode='HOSEX' and pm.LevelCode='HOSPITAL'"
				  ." and mp.Status=1 and pm.Status=1 and gp.Status=1"
				  ." order by pm.PostOrder,mp.`Order`";
		$command=$connection->createCommand($query);
		$boardMembers = $command->queryAll();	
		
		/*foreach($postModel as $item){
			echo CHtml::tag('option', array('value'=>$item['pkPostId']),  $item['PostName']);
		}*/
		
		$this->render('hospital_executives',array(
			'boardMembers'=>$boardMembers,
		));
	}
	
	public function actionSamachaarExecutives(){
		$connection=Yii::app()->db;
		$query = "select md.pkMemberId,md.MemberName,md.City,md.District,md.State, md.PersonalNo,md.HContactNo, md.EmailId, mp.AssignDate,md.PhotoPath,pm.PostName"
				  ." from member_details md"
				  ." inner join member_post mp on (md.pkMemberId=mp.fkMemberId)"
				  ." inner join post_master pm on (pm.pkPostId=fkPostId)"
				  ." inner join group_posts gp on (gp.fkPostId=pm.pkPostId)"
				  ." where pm.LevelCode='SAMACHAR'"
				  ." and mp.Status=1 and pm.Status=1 and gp.Status=1"
				  ." order by pm.PostOrder,mp.`Order`";
		$command=$connection->createCommand($query);
		$boardMembers = $command->queryAll();	
		
		/*foreach($postModel as $item){
			echo CHtml::tag('option', array('value'=>$item['pkPostId']),  $item['PostName']);
		}*/
		
		$this->render('samachaar_executives',array(
			'boardMembers'=>$boardMembers,
		));
	}
	
	public function actionNationalFormerExecutives(){
		$connection=Yii::app()->db;
		$query = "select md.pkMemberId,md.MemberName,md.City,md.District,md.State, md.PersonalNo,md.HContactNo, md.EmailId, mp.AssignDate,mp.TillDate,md.PhotoPath,pm.PostName"
				  ." from member_details md"
				  ." inner join member_post mp on (md.pkMemberId=mp.fkMemberId)"
				  ." inner join post_master pm on (pm.pkPostId=fkPostId)"
				  ." where pm.LevelCode='LEADER'"
				  ." and mp.Status=1 and pm.Status=1"
				  ." order by pm.PostOrder,mp.`Order`";
		$command=$connection->createCommand($query);
		$boardMembers = $command->queryAll();	
		
		$this->render('national_former_executives',array(
			'boardMembers'=>$boardMembers,
		));
	}
	
	public function actionFoundationFormerExecutives(){
		$connection=Yii::app()->db;
		$query = "select md.pkMemberId,md.MemberName,md.City,md.District,md.State, md.PersonalNo,md.HContactNo, md.EmailId, mp.AssignDate,mp.TillDate,md.PhotoPath,pm.PostName"
				  ." from member_details md"
				  ." inner join member_post mp on (md.pkMemberId=mp.fkMemberId)"
				  ." inner join post_master pm on (pm.pkPostId=fkPostId)"
				  ." where pm.LevelCode='FOUNDATION LEADER'"
				  ." and mp.Status=1 and pm.Status=1"
				  ." order by pm.PostOrder,mp.`Order`";
		$command=$connection->createCommand($query);
		$boardMembers = $command->queryAll();	
		
		$this->render('foundation_former_executives',array(
			'boardMembers'=>$boardMembers,
		));
	}
	
	public function actionBjmKaryakarini(){
		$this->render('bjm_karyakarini');
	}
	
	public function actionFounderFoundationTrusti(){
		if (isset($_GET['pageSize'])) {
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
		}
		
		$model = new MemberDetails();
		
		$this->render('founder_trusti',array(
			'model'=>$model,
		));
	}
	
	public function actionAajeevanFoundationTrusti(){
		if (isset($_GET['pageSize'])) {
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
		}
		
		$model = new MemberDetails();
		
		$this->render('aajeevan_trusti',array(
			'model'=>$model,
		));
	}
	
	// This function will return search members list.
	public function actionSearchMember(){	
		
		if (isset($_GET['pageSize'])) {
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
		}
		
		$model=new MemberDetails('search');
		$model->unsetAttributes();  // clear any default values
		
		/*if(isset($_GET['leveltype'])){
			$model->fkLevelCode=$_GET['leveltype'];
		}*/
		
		if(isset($_GET['MemberDetails']))
			$model->attributes=$_GET['MemberDetails'];	
		
		$this->render('search_member',array(
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
		$model=MemberDetails::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='member-details-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	//This function is used to delete multiple records at time
	public function multipleDelete($data)
	{
		$connection=Yii::app()->db;
		$arr=implode(',',$data['member-details-grid_c0']);
		$query = "delete from member_details where pkMemberId in(".$arr.")";
		$command=$connection->createCommand($query);
		if($command->execute())
		{
	  $this->redirect(array('admin'));
		}
	}

}
