<?php

class MatrimonyMembersController extends Controller
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
		$model=new MatrimonyMembers;
		$familyModel=new MatrimonyFamilyDetails;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MatrimonyMembers']))
		{
			$model->attributes=$_POST['MatrimonyMembers'];
			
			$model->MemberPhoto = null;
			
			$connection=Yii::app()->db;
		    $query = "select MAX(CAST(SUBSTRING(MemberCode, 4) as UNSIGNED)) maxCode from matrimony_members";
		    $command=$connection->createCommand($query);
		    $lastMember = $command->queryRow();
		    $maxCode = 0; 
			if($lastMember["maxCode"]!=null){
				$maxCode = $lastMember["maxCode"];
			}
			$model->MemberCode = $maxCode+1;
			
			if(strlen($model->MemberCode)<4){
			   $temp = "";
			   for($i=4-strlen($model->MemberCode); $i>0; $i--){
				   $temp = $temp.'0';
			   }
			  $model->MemberCode = $temp.$model->MemberCode;   
		    }
			
			$model->MemberCode = 'BJM'.$model->MemberCode;
			
			if($model->DOB){
				$model->DOB = date('Y-m-d H:i',strtotime($model->DOB));
			}else{
				$model->DOB = null;
			}
			if(!$model->Weight){
				$model->Weight = null;
			}
			if(!$model->Height){
				$model->Height = null;
			}
			if(!$model->fkCaste){
				$model->fkCaste = null;
			}			
			if(!$model->BodyType){
				$model->BodyType = null;
			}
			if(!$model->Complexion){
				$model->Complexion = null;
			}
			if(!$model->fkEducation){
				$model->fkEducation = null;
			}
			if(!$model->Occupation){
				$model->Occupation = null;
			}
			if(!$model->IncomeAnnual){
				$model->IncomeAnnual = null;
			}
			
			if(!$model->fkLoginId || $model->fkLoginId==""){
				$model->fkLoginId = null;
			}
			
			if($model->fkCaste!=0){
				$model->OtherCaste = "";
			}
			$currentTime = date('Y-m-d H:i',time());
			$model->CreatedDate=$currentTime;
			$model->ModifiedDate=$currentTime;
			
			if($model->save()){
				// save family details
				if(isset($_POST['MatrimonyFamilyDetails'])){
					$familyModel->attributes=$_POST['MatrimonyFamilyDetails'];
					$familyModel->MemberCode = $model->MemberCode;
					$familyModel->CreatedDate=$currentTime;
					$familyModel->ModifiedDate=$currentTime;
					$familyModel->save();
				}
				if(isset($_POST['cropID']) && $_POST['cropID']==1){					
					$targ_w = 200;
					$targ_h = 200;
					$jpeg_quality = 100;

					$rootPath = pathinfo(Yii::app()->baseUrl);
					$path = Yii::app()->params['tempPath']."/";
					$src = $path.Yii::app()->session['tempImgName'];
					$imageName = $model->MemberCode."_".$this->generateRandomString()."_P.jpg";
					$distSrc = Yii::app()->params['tempPath']. "/".$imageName;

					$extArr = explode(".", $src);
					$ext = $extArr[count($extArr)-1];

					$cropX = $_POST['cropX'];
					$cropY = $_POST['cropY'];
					$cropW = $_POST['cropW'];
					$cropH = $_POST['cropH'];

					$img_r = imagecreatefromjpeg($src);

					if ($ext == '.jpeg' || $ext == '.jpg') {
						$img_r = imagecreatefromjpeg($src);
					} else if ($ext == '.gif') {
						$img_r = imagecreatefromgif($src);
					}  else if ($ext == '.png') {
						$img_r = imagecreatefrompng($src);
					}

					$dst_r = imagecreatetruecolor( $targ_w, $targ_h );
					imagecopyresampled($dst_r,$img_r,0,0,$cropX,$cropY,
						$targ_w,$targ_h,$cropW,$cropH);

					//header('Content-type: image/jpeg');
					imagejpeg($dst_r,$distSrc,$jpeg_quality);
					//imagepng($dst_r, "upload/mm.png", 0);
					imagedestroy($img_r);
					imagedestroy($dst_r);

					$model->ProfilePic = file_get_contents($distSrc);
					$model->save();

					$this->removeTempData();
					if(file_exists($distSrc)){
						unlink($distSrc);
					}
				}
				$this->redirect(array('admin'));
			}
		}else{
			$this->removeTempData();
		}

		$this->render('create',array(
			'model'=>$model,
			'familyModel'=>$familyModel,
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
		$familyModel=MatrimonyFamilyDetails::model()->find('MemberCode=:MemberCode', array(':MemberCode'=>$model->MemberCode));
		if($familyModel === null){
			$familyModel = new MatrimonyFamilyDetails;
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MatrimonyMembers']))
		{
			$model->attributes=$_POST['MatrimonyMembers'];
			
			if($model->DOB){
				$model->DOB = date('Y-m-d H:i',strtotime($model->DOB));
			}else{
				$model->DOB = null;
			}
			if(!$model->Weight){
				$model->Weight = null;
			}
			if(!$model->Height){
				$model->Height = null;
			}
			if(!$model->fkCaste){
				$model->fkCaste = null;
			}
			if(!$model->BodyType){
				$model->BodyType = null;
			}
			if(!$model->Complexion){
				$model->Complexion = null;
			}
			if(!$model->fkEducation){
				$model->fkEducation = null;
			}
			if(!$model->Occupation){
				$model->Occupation = null;
			}
			if(!$model->IncomeAnnual){
				$model->IncomeAnnual = null;
			}
			
			if(!$model->fkLoginId || $model->fkLoginId==""){
				$model->fkLoginId = null;
			}
			
			if($model->fkCaste!=0){
				$model->OtherCaste = "";
			}
			
			$currentTime = date('Y-m-d H:i',time());
			$model->ModifiedDate=$currentTime;
			
			if($model->save()){
				// update family details
				if(isset($_POST['MatrimonyFamilyDetails'])){
					$familyModel->attributes=$_POST['MatrimonyFamilyDetails'];
					$familyModel->MemberCode = $model->MemberCode;
					if(!$familyModel->CreatedDate){
						$familyModel->CreatedDate=$currentTime;
					}
					$familyModel->ModifiedDate=$currentTime;
					$familyModel->save();
				}				
				
				if(isset($_POST['cropID']) && $_POST['cropID']==1){					
					$targ_w = 200;
					$targ_h = 200;
					$jpeg_quality = 100;
					
					$rootPath = pathinfo(Yii::app()->baseUrl);
					$path = Yii::app()->params['tempPath']."/";		
					$src = $path.Yii::app()->session['tempImgName'];
					
					$imageName = $model->MemberCode."_".$this->generateRandomString()."_P.jpg";
					$distSrc = Yii::app()->params['tempPath']. "/".$imageName;

					$extArr = explode(".", $src); 
					$ext = $extArr[count($extArr)-1];
					
					$cropX = $_POST['cropX'];
					$cropY = $_POST['cropY'];
					$cropW = $_POST['cropW'];
					$cropH = $_POST['cropH'];
					
					$img_r = imagecreatefromjpeg($src);
					
					if ($ext == '.jpeg' || $ext == '.jpg') {
							$img_r = imagecreatefromjpeg($src);
					} else if ($ext == '.gif') {
							$img_r = imagecreatefromgif($src);
					}  else if ($ext == '.png') {
							$img_r = imagecreatefrompng($src);
					}

					$dst_r = imagecreatetruecolor( $targ_w, $targ_h );
					imagecopyresampled($dst_r,$img_r,0,0,$cropX,$cropY,
					$targ_w,$targ_h,$cropW,$cropH);

					//header('Content-type: image/jpeg');
					imagejpeg($dst_r,$distSrc,$jpeg_quality);
					//imagepng($dst_r, "upload/mm.png", 0);
					imagedestroy($img_r);
					imagedestroy($dst_r);

					$model->ProfilePic = file_get_contents($distSrc);
					$model->save();

					$this->removeTempData();
					if(file_exists($distSrc)){
						unlink($distSrc);
					}
				}
				$this->redirect(array('admin'));
			}
		}else{
			$this->removeTempData();
			
			if($model->DOB){
				$model->DOB = date('m/d/Y h:i a',strtotime($model->DOB));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'familyModel'=>$familyModel,
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
			$model=$this->loadModel($id);
			$familyModel=MatrimonyFamilyDetails::model()->deleteAll('MemberCode=:MemberCode', array(':MemberCode'=>$model->MemberCode));
			// we only allow deletion via POST request
			$model->delete();

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
		$dataProvider=new CActiveDataProvider('MatrimonyMembers');
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
		
		$model=new MatrimonyMembers('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MatrimonyMembers']))
			$model->attributes=$_GET['MatrimonyMembers'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	* Upload Image	
	*/
	public function actionUploadImg()
	{			
		$rootPath = pathinfo(Yii::app()->basePath);
		$path = $rootPath['dirname']."/".Yii::app()->params['tempPath']."/";
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
									
									echo "<img id='prewImg' src='".Yii::app()->baseUrl."/".Yii::app()->params['tempPath']."/".$actual_image_name."' />";
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


	
	protected function generateRandomString($length = 5) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}
	
	public function removeTempData(){
		if(isset(Yii::app()->session['tempImgName'])){
			$rootPath = pathinfo(Yii::app()->baseUrl);
			$path = Yii::app()->params['tempPath']."/";
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
		$model=MatrimonyMembers::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='matrimony-members-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	//This function is used to publish multiple records at time
	public function multiplePublish($data)
	{
		$arr=implode(',',$data['matrimony-members-grid_c0']);
		$connection=Yii::app()->db;
		$query = "update matrimony_members set Status='1' where pkMemberId in(".$arr.")";
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
	 $arr=implode(',',$data['matrimony-members-grid_c0']);
	 $query = "update matrimony_members set Status='0' where pkMemberId in(".$arr.")";
	 $command=$connection->createCommand($query);
	 if($command->execute())
	 {
	  $this->redirect(array('admin'));
	 }
	}

	//This function is used to delete multiple records at time
	public function multipleDelete($data){		
		$arr= $data['matrimony-members-grid_c0'];
		
		$criteria = new CDbCriteria;
		$criteria->addInCondition('pkMemberId',$arr);
		$membersList =	MatrimonyMembers::model()->findAll($criteria);
		$memberCodes = array();
		foreach ($membersList as $member){
	  		array_push($memberCodes, $member->MemberCode);
	  	}
	  	
	  	$deleteCriteria = new CDbCriteria;
		$deleteCriteria->addInCondition('MemberCode',$memberCodes);
		MatrimonyFamilyDetails::model()->deleteAll($deleteCriteria);
		MatrimonyMembers::model()->deleteAll($criteria);		
	  	$this->redirect(array('admin'));
		
	}

	//this function is used to pubhlish a single record
	public function actionPublish()
	{
		$connection=Yii::app()->db;
		$query = "update matrimony_members set Status='1' where pkMemberId='".$_GET['id']."'";
		$command=$connection->createCommand($query);
		$command->execute();
		$this->redirect(array('admin'));
	}
	//this function is used to unpubhlish a single record
	public function actionUnpublish()
	{
		$connection=Yii::app()->db;
		$query = "update matrimony_members set Status='0' where pkMemberId='".$_GET['id']."'";
		$command=$connection->createCommand($query);
		$command->execute();
		$this->redirect(array('admin'));
	}
}
