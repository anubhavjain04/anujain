<?php

class MemberDetailsController extends Controller
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
		$model = $this->loadModel($id);
		
		if($model->DOB){
			$model->DOB = date('m/d/Y',strtotime($model->DOB));
		}
		if($model->MarriageDate){
			$model->MarriageDate = date('m/d/Y',strtotime($model->MarriageDate));
		}
					
		$this->render('view',array(
			'model'=>$model,
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
			
			$model->PhotoPath = null;		
			
			if($model->DOB){
				$model->DOB = date('Y-m-d',strtotime($model->DOB));
			}else{
				$model->DOB = null;
			}
			
			if($model->MarriageDate){
				$model->MarriageDate = date('Y-m-d',strtotime($model->MarriageDate));
			}else{
				$model->MarriageDate = null;
			}
			
			if(!$model->fkLoginId || $model->fkLoginId==""){
				$model->fkLoginId = null;
			}						
			
			if($model->save()){
				if(isset($_POST['zoneId']) && $_POST['zoneId']!=""){
					$zoneMember = new ZoneMembers();
					$criteria=new CDbCriteria;
					$criteria->condition='fkMemberId='.$model->pkMemberId;
					$zoneModel = $zoneMember->find($criteria);
					if(count($zoneModel)==0){
						$zoneMember->fkMemberId=$model->pkMemberId;
						$zoneMember->fkZoneId=$_POST['zoneId'];
						$zoneMember->Status=1;
						$zoneMember->save();
					}else{
						$zoneModel->fkZoneId=$_POST['zoneId'];
						$zoneModel->save();
					}
				}
				
				if(isset($_POST['branchId']) && $_POST['branchId']!=""){
					$milanDetails = new MilanDetails();
					$criteria=new CDbCriteria;
					$criteria->condition='fkMemberId='.$model->pkMemberId;
					$milanModel = $milanDetails->find($criteria);
					if(count($milanModel)==0){
						$milanDetails->fkMemberId=$model->pkMemberId;
						$milanDetails->fkBranchId=$_POST['branchId'];						
						$milanDetails->save();
					}else{
						$milanModel->fkBranchId=$_POST['branchId'];
						$milanModel->save();
					}
				}
				
				if(isset($_POST['cropID']) && $_POST['cropID']==1){
					$targ_w = 100;
					$targ_h = 140;
					$jpeg_quality = 90;
					
					$rootPath = pathinfo(Yii::app()->baseUrl);
					$path = "..".Yii::app()->params['tempPath']."/";
		
					$src = $path.Yii::app()->session['tempImgName'];
					$distSrc = "..".Yii::app()->params['memberPotoPath']."/".$model->pkMemberId.".jpg";
					
					$extArr = explode(".", $src); 
					$ext = $extArr[count($extArr)-1];
					
					$cropX = $_POST['cropX'];
					$cropY = $_POST['cropY'];
					$cropW = $_POST['cropW'];
					$cropH = $_POST['cropH'];
					
					$img_r = imagecreatefromjpeg($src);
					
					if ($ext == '.jpeg' || $ext == '.jpg') {
							$img_r = imagecreatefromjpeg($path.$filename);
					} else if ($ext == '.gif') {
							$img_r = imagecreatefromgif($path.$filename);
					}  else if ($ext == '.png') {
							$img_r = imagecreatefrompng($path.$filename);
					}
						
					
					$dst_r = imagecreatetruecolor( $targ_w, $targ_h );
				
					imagecopyresampled($dst_r,$img_r,0,0,$cropX,$cropY,
					$targ_w,$targ_h,$cropW,$cropH);
				
					//header('Content-type: image/jpeg');
					imagejpeg($dst_r,$distSrc,$jpeg_quality);
					//imagepng($dst_r, "upload/mm.png", 0);
					imagedestroy($img_r);
					imagedestroy($dst_r);
					
					$model->PhotoPath = $model->pkMemberId.".jpg";
					$model->save();
					
					$this->removeTempData();
				}
				
				$this->redirect(array('admin'));
			}
		}else{
			$this->removeTempData();
			
			$connection=Yii::app()->db;
		    $query = "select max(MemberCode*1) maxCode from member_details";
		    $command=$connection->createCommand($query);
		    $lastMember = $command->queryRow();
		    $maxCode = 0; 
			if($lastMember["maxCode"]!=null){
				$maxCode = $lastMember["maxCode"];
			}
			$model->MemberCode = $maxCode+1;
			
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
			
			
			if($model->DOB){
				$model->DOB = date('Y-m-d',strtotime($model->DOB));
			}else{
				$model->DOB = null;
			}
			
			if($model->MarriageDate){
				$model->MarriageDate = date('Y-m-d',strtotime($model->MarriageDate));
			}else{
				$model->MarriageDate = null;
			}
			
			if(!$model->fkLoginId || $model->fkLoginId==""){
				$model->fkLoginId = null;
			}
			
			/*if(isset($photo)){
				$savaBasePath = pathinfo(Yii::app()->request->scriptFile);
				$photo->saveAs(dirname($savaBasePath['dirname']).Yii::app()->params['memberPotoPath']."/".$model->pkMemberId.".jpg");
				$model->PhotoPath=$model->pkMemberId.".jpg";
			}
			else{
				unset($model->PhotoPath);
			}*/
			
			if($model->save()){	
				if(isset($_POST['zoneId']) && $_POST['zoneId']!=""){					
					$zoneMember = new ZoneMembers();
					$criteria=new CDbCriteria;
					$criteria->condition='fkMemberId='.$model->pkMemberId;
					$zoneModel = $zoneMember->find($criteria);
					
					if(count($zoneModel)==0){
						$zoneMember->fkMemberId=$model->pkMemberId;
						$zoneMember->fkZoneId=$_POST['zoneId'];
						$zoneMember->Status=1;
						$zoneMember->save();
					}else{
						$zoneModel->fkZoneId=$_POST['zoneId'];
						$zoneModel->save();
					}
				}
				
				if(isset($_POST['branchId']) && $_POST['branchId']!=""){
					$milanDetails = new MilanDetails();
					$criteria=new CDbCriteria;
					$criteria->condition='fkMemberId='.$model->pkMemberId;
					$milanModel = $milanDetails->find($criteria);
					if(count($milanModel)==0){
						$milanDetails->fkMemberId=$model->pkMemberId;
						$milanDetails->fkBranchId=$_POST['branchId'];						
						$milanDetails->save();
					}else{
						$milanModel->fkBranchId=$_POST['branchId'];
						$milanModel->save();
					}
				}
				
				if(isset($_POST['cropID']) && $_POST['cropID']==1){
					$targ_w = 100;
					$targ_h = 140;
					$jpeg_quality = 90;
					
					$rootPath = pathinfo(Yii::app()->baseUrl);
					$path = "..".Yii::app()->params['tempPath']."/";
		
					$src = $path.Yii::app()->session['tempImgName'];
					$distSrc = "..".Yii::app()->params['memberPotoPath']."/".$model->pkMemberId.".jpg";
					
					$extArr = explode(".", $src); 
					$ext = $extArr[count($extArr)-1];
					
					$cropX = $_POST['cropX'];
					$cropY = $_POST['cropY'];
					$cropW = $_POST['cropW'];
					$cropH = $_POST['cropH'];
					
					$img_r = imagecreatefromjpeg($src);
					
					if ($ext == '.jpeg' || $ext == '.jpg') {
							$img_r = imagecreatefromjpeg($path.$filename);
					} else if ($ext == '.gif') {
							$img_r = imagecreatefromgif($path.$filename);
					}  else if ($ext == '.png') {
							$img_r = imagecreatefrompng($path.$filename);
					}
						
					
					$dst_r = imagecreatetruecolor( $targ_w, $targ_h );
				
					imagecopyresampled($dst_r,$img_r,0,0,$cropX,$cropY,
					$targ_w,$targ_h,$cropW,$cropH);
				
					//header('Content-type: image/jpeg');
					imagejpeg($dst_r,$distSrc,$jpeg_quality);
					//imagepng($dst_r, "upload/mm.png", 0);
					imagedestroy($img_r);
					imagedestroy($dst_r);
					
					$model->PhotoPath = $model->pkMemberId.".jpg";
					$model->save();
					
					$this->removeTempData();
				}			
				
				$this->redirect(array('admin'));
			}
			
		}else{
			
			$this->removeTempData();
			
			if($model->DOB){
				$model->DOB = date('m/d/Y',strtotime($model->DOB));
			}
			if($model->MarriageDate){
				$model->MarriageDate = date('m/d/Y',strtotime($model->MarriageDate));
			}		
			
			
			$criteria=new CDbCriteria;
			$criteria->condition='fkMemberId='.$id;
			$milanModel = MilanDetails::model()->find($criteria);
			
			$branchModel = null;
			
			if(count($milanModel)>0){
				$criteria1=new CDbCriteria;
				$criteria1->condition='pkBranchId='.$milanModel->fkBranchId;
				$branchModel = BranchMaster::model()->find($criteria1);
			}
			
			
		}

		$this->render('update',array(
			'model'=>$model,
			'branchModel'=>$branchModel,
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
			
			$connection=Yii::app()->db;
			$query2 = "delete from member_post where fkMemberId in(".$id.")";
			$command2=$connection->createCommand($query2);
			$command2->execute();
			
			$query3 = "delete from milan_details where fkMemberId in(".$id.")";
			$command3=$connection->createCommand($query3);
			$command3->execute();
			
			$query4 = "delete from zone_members where fkMemberId in(".$id.")";
			$command4=$connection->createCommand($query4);
			$command4->execute();

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
	
	public function actionCropImg(){
	
		$this->renderPartial('cropImg');
	}
	
	public function actionUploadImg()
	{	
		$rootPath = pathinfo(Yii::app()->basePath);
		$path = dirname($rootPath['dirname']).Yii::app()->params['tempPath']."/";
		$valid_formats = array("jpg", "jpeg", "png", "gif", "bmp");
		if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					//list($txt, $ext) = explode(".", $name);
					$nameArr = explode(".", $name);
					$ext = strtolower($nameArr[count($nameArr)-1]);
					$txt = "temp";
					
					if(in_array($ext,$valid_formats))
					{
						if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							Yii::app()->session['tempImgName'] = $actual_image_name;
							//$actual_image_name = "aaa.".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
								//mysql_query("UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id'");
									
									echo "<img id='prewImg' src='".Yii::app()->baseUrl."/..".Yii::app()->params['tempPath']."/".$actual_image_name."' />";
								}
							else
								echo "failed";
						}
						else
							echo "Image file size max 1 MB";					
					}
					else
					echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}
		
		
	}
	
	public function removeTempData(){
		if(isset(Yii::app()->session['tempImgName'])){
			$rootPath = pathinfo(Yii::app()->baseUrl);
			$path = "..".Yii::app()->params['tempPath']."/";
			$src = $path.Yii::app()->session['tempImgName'];
			if(file_exists($src)){
				unlink($src);
				unset(Yii::app()->session['tempImgName']);
			}
		}
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
			$query2 = "delete from member_post where fkMemberId in(".$arr.")";
			$command2=$connection->createCommand($query2);
			$command2->execute();
			
			$query3 = "delete from milan_details where fkMemberId in(".$arr.")";
			$command3=$connection->createCommand($query3);
			$command3->execute();
			
			$query4 = "delete from zone_members where fkMemberId in(".$arr.")";
			$command4=$connection->createCommand($query4);
			$command4->execute();
		
	  		$this->redirect(array('admin'));
		}
	}
	
	public function actionGetZoneBranches(){
		if(isset($_POST['zoneId']) && trim($_POST['zoneId']!="")){
			$zoneId = $_POST['zoneId'];			
			
			$branchMaster = new BranchMaster();			
			$criteria=new CDbCriteria;
			$criteria->select=' t.pkBranchId,trim(t.BranchName) as BranchName ';
			$criteria->condition='fkZoneId=:fkZoneId';
			$criteria->order = 'BranchName ASC';
			$criteria->params=array(":fkZoneId"=>$zoneId);			
			$branchModel = $branchMaster->findAll($criteria);
			
			
			
			
			/*$connection=Yii::app()->db;
			$query = "select * from post_master where LevelCode='".$levelCode."' order by PostOrder";
			$command=$connection->createCommand($query);
			$postModel = $command->queryAll();*/
			
			
			foreach($branchModel as $item){
				echo CHtml::tag('option', array('value'=>$item['pkBranchId']),  $item['BranchName']);
			}	
		}
		else{
			echo '';
		}
		
	}

}
