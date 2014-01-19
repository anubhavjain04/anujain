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
			array('allow',  // allow all users to perform 'index' actions
				'actions'=>array('index', 'view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('uploadImg','changeUploadedImage', 'updateMemberDetails'),
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
	public function actionView($id){
		if($id){
			$model=MatrimonyMembers::model()->find('fkLoginId=:fkLoginId',array('fkLoginId'=>$id));
			if($model){
				$familyModel=MatrimonyFamilyDetails::model()->find('MemberCode=:MemberCode', array(':MemberCode'=>$model->MemberCode));
				$plainModel = CJSON::decode(CJSON::encode($model));
				$ageDiff = abs(time() - strtotime($model['DOB']));
				$years = floor($ageDiff / (365*60*60*24));
				$plainModel['age'] = $years;
				$plainModel['sectName'] = $model->fkSect0->SectName;
				$plainModel['subSectName'] = $model->fkSubSect0->SubSectName;
				$plainModel['country'] = $model->fkCountryLivingIn0->CountryName;
				$plainModel['state'] = $model->fkResidingState0->StateName;				
				$plainModel['education'] = ($model->fkEducation0)? $model->fkEducation0->CourseName : '';
				$plainModel['occupation'] = ($model->occupation)? $model->occupation->OccupationName : '';
				$plainModel['motherTongue'] = $model->fkMotherTongue0->TongueName;
				if($model->fkCaste0){
					$plainModel['caste'] = $model->fkCaste0->CasteName;
				}else{
					$plainModel['caste'] = null;
				}
				
				$data['member'] = $plainModel;
				$data['family'] = $familyModel;
				$this->echoObjectAsJSON($data);
			}else{
				throw new CHttpException(404, $id.' member not found');
			}
		}else{
			throw new CHttpException(400,'Invalid request. You have to give member uid');
		}
		/*$this->render('view',array(
			'model'=>$this->loadModel($id),
		));*/
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new MatrimonyMembers;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['MatrimonyMembers']))
		{
			$model->attributes=$_POST['MatrimonyMembers'];
			
			$model->MemberPhoto = null;
			
			$connection=Yii::app()->db;
		    $query = "select max(MemberCode*1) maxCode from matrimony_members";
		    $command=$connection->createCommand($query);
		    $lastMember = $command->queryRow();
		    $maxCode = 0; 
			if($lastMember["maxCode"]!=null){
				$maxCode = $lastMember["maxCode"];
			}
			$model->MemberCode = $maxCode+1;
			
			
			if($model->DOB){
				$model->DOB = date('Y-m-d H:i',strtotime($model->DOB));
			}else{
				$model->DOB = null;
			}
			
			if(!$model->fkLoginId || $model->fkLoginId==""){
				$model->fkLoginId = null;
			}
			
			if($model->save()){
				if(isset($_POST['cropID']) && $_POST['cropID']==1){					
					$targ_w = 100;
					$targ_h = 140;
					$jpeg_quality = 90;
					
					$rootPath = pathinfo(Yii::app()->baseUrl);
					$path = Yii::app()->params['tempPath']."/";
		
					$src = $path.Yii::app()->session['tempImgName'];
					$distSrc = Yii::app()->params['matrimonyPath']."/".$model->pkMemberId.".jpg";
					
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
					
					$model->MemberPhoto = $model->pkMemberId.".jpg";
					$model->save();
					
					$this->removeTempData();				
				}
				$this->redirect(array('admin'));
			}
		}else{
			$this->removeTempData();
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

		if(isset($_POST['MatrimonyMembers']))
		{
			$model->attributes=$_POST['MatrimonyMembers'];
			
			if($model->DOB){
				$model->DOB = date('Y-m-d H:i',strtotime($model->DOB));
			}else{
				$model->DOB = null;
			}
			
			if(!$model->fkLoginId || $model->fkLoginId==""){
				$model->fkLoginId = null;
			}
			
			if($model->save()){
				if(isset($_POST['cropID']) && $_POST['cropID']==1){					
					$targ_w = 100;
					$targ_h = 140;
					$jpeg_quality = 90;
					
					$rootPath = pathinfo(Yii::app()->baseUrl);
					$path = Yii::app()->params['tempPath']."/";
		
					$src = $path.Yii::app()->session['tempImgName'];
					$distSrc = Yii::app()->params['matrimonyPath']."/".$model->pkMemberId.".jpg";
					
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
					
					$model->MemberPhoto = $model->pkMemberId.".jpg";
					$model->save();
					
					$this->removeTempData();				
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
		));
	}
	
	public function actionUpdateMemberDetails($id){
		$currentTime = date('Y-m-d H:i',time());						
		$model=MatrimonyMembers::model()->find('fkLoginId=:fkLoginId',array('fkLoginId'=>$id));
		if($model===null){
			throw new CHttpException(204,'The requested member does not exist.');
			return;
		}
		if($_POST){
			$data = $_POST;
						
			$model->MemberName = (isset($data['memberName']) && $data['memberName'])?$data['memberName']: $model->MemberName;
			$model->RegisteredBy = (isset($data['registerBy']) && $data['registerBy'])?$data['registerBy']: $model->RegisteredBy;
			$model->Sex = (isset($data['sex']))?$data['sex']: $model->Sex;
			// DOB with time update
			$memberDOB = date('m/d/Y',strtotime($model->DOB));
			$memberTOB = date('h:i a',strtotime($model->DOB));
			$memberDOB = (isset($data['dob']) && $data['dob'])?date('m/d/Y',strtotime($data['dob'])): $memberDOB;
			if(isset($memberProfile['birthHour']) && isset($memberProfile['birthMinute']) && isset($memberProfile['birthAmPm'])){
				$memberTOB = $memberProfile['birthHour'].':'.$memberProfile['birthMinute'].' '.$memberProfile['birthAmPm'];
			} 
			$model->DOB = date('Y-m-d H:i',strtotime($memberDOB.' '.$memberTOB));
			
			$model->MaritalStatus = (isset($data['maritalStatus']) && $data['maritalStatus'])?$data['maritalStatus']: $model->MaritalStatus;
			$model->Childrens = isset($data['childrens'])?$data['childrens']: $model->Childrens;
			$model->fkSect = (isset($data['sect']) && $data['sect'])?$data['sect']: $model->fkSect;
			$model->fkSubSect = (isset($data['subSect']) && $data['subSect'])?$data['subSect']: $model->fkSubSect;
			$model->fkCaste = isset($data['caste'])? (($data['caste'])?$data['caste']:null) : $model->fkCaste;
			$model->OtherCaste = isset($data['otherCaste'])? (($data['otherCaste'])?$data['otherCaste']:null) : $model->OtherCaste;
			$model->fkMotherTongue = (isset($data['motherTongue']) && $data['motherTongue'])?$data['motherTongue']: $model->fkMotherTongue;
			$model->ContactNo = (isset($data['contactNumber']) && $data['contactNumber'])?$data['contactNumber']: $model->ContactNo;
			$model->fkCountryLivingIn = (isset($data['country']) && $data['country'])?$data['country']: $model->fkCountryLivingIn;
			$model->fkResidingState = (isset($data['state']) && $data['state'])?$data['state']: $model->fkResidingState;
			$model->ResidingCity = (isset($data['city']) && $data['city'])?$data['city']: $model->ResidingCity;
			
			$model->Height = isset($data['height'])? (($data['height'])?$data['height']:null) : $model->Height;
			$model->Weight = isset($data['weight'])? (($data['weight'])?$data['weight']:null) : $model->Weight;
			$model->BodyType = isset($data['bodyType'])? (($data['bodyType'])?$data['bodyType']:null) : $model->BodyType;
			$model->Complexion = isset($data['complexion'])? (($data['complexion'])?$data['complexion']:null) : $model->Complexion;
			$model->PhysicalStatus = isset($data['physicalStatus'])?$data['physicalStatus']: $model->PhysicalStatus;
			$model->MarryInSameSubSect = isset($data['marryInSameSect'])?$data['marryInSameSect']: $model->MarryInSameSubSect;
			$model->fkEducation = isset($data['education'])? (($data['education'])?$data['education']:null) : $model->fkEducation;
			$model->EmployedIn = isset($data['employedIn'])? $data['employedIn']: $model->EmployedIn;
			$model->Occupation = isset($data['occupation'])? (($data['occupation'])?$data['occupation']:null) : $model->Occupation;
			$model->Gotra = isset($data['gotra'])? (($data['gotra'])?$data['gotra']:null) : $model->Gotra;
			$model->Manglik = isset($data['manglikStatus'])?$data['manglikStatus']: $model->Manglik;
			
			$model->AboutMe = isset($data['aboutMe'])?$data['aboutMe']: $model->AboutMe;
			$model->HomeAddress = isset($data['homeAddress'])?$data['homeAddress']: $model->HomeAddress;
			$model->WorkingAddress = isset($data['workingAddress'])?$data['workingAddress']: $model->WorkingAddress;
			$model->IncomeAnnual = isset($data['annualIncome'])? (($data['annualIncome'])?$data['annualIncome']:null) : $model->IncomeAnnual;
			$model->AboutMyPartner = isset($data['aboutMyPartner'])?$data['aboutMyPartner']: $model->AboutMyPartner;
			$model->Email = isset($data['emailId'])?$data['emailId']: $model->Email;
			
			$model->ModifiedDate = $currentTime;
					
			// validate and save data
			if($model->validate()){				
				$model->save();	

				$plainModel = CJSON::decode(CJSON::encode($model));
				$ageDiff = abs(time() - strtotime($model['DOB']));
				$years = floor($ageDiff / (365*60*60*24));
				$plainModel['age'] = $years;
				$plainModel['sectName'] = $model->fkSect0->SectName;
				$plainModel['subSectName'] = $model->fkSubSect0->SubSectName;
				$plainModel['country'] = $model->fkCountryLivingIn0->CountryName;
				$plainModel['state'] = $model->fkResidingState0->StateName;				
				$plainModel['education'] = ($model->fkEducation0)? $model->fkEducation0->CourseName : '';
				$plainModel['occupation'] = ($model->occupation)? $model->occupation->OccupationName : '';
				$plainModel['motherTongue'] = $model->fkMotherTongue0->TongueName;
				if($model->fkCaste0){
					$plainModel['caste'] = $model->fkCaste0->CasteName;
				}else{
					$plainModel['caste'] = null;
				}
				
				$this->echoObjectAsJSON($plainModel);
			}
			else{
				throw new CHttpException(500,'Invalid data.');	
			}			
		}else{
			throw new CHttpException(400,'Invalid request.');
		}
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
	
	public function actionChangeUploadedImage($id){
		$model=MatrimonyMembers::model()->find('fkLoginId=:fkLoginId',array('fkLoginId'=>$id));
		if(isset($_POST['cropID']) && $_POST['cropID']==1){					
			$targ_w = 150;
			$targ_h = 200;
			$jpeg_quality = 90;
					
			$rootPath = pathinfo(Yii::app()->baseUrl);
			$path = Yii::app()->params['tempPath']."/";		
			$src = $path.Yii::app()->session['tempImgName'];

			$oldImagePath = null;
			if($model->MemberPhoto){
				$imageName = $model->MemberPhoto;
				$oldImagePath = Yii::app()->params['matrimonyPath']."/".$imageName;
			}
			/*else{
				$imageName = $model->MemberCode."_".$this->generateRandomString()."_P.jpg";
			}*/
			$imageName = $model->MemberCode."_".$this->generateRandomString()."_P.jpg";
			
			$distSrc = Yii::app()->params['matrimonyPath']."/".$imageName;
					
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
					
			$model->MemberPhoto = $imageName;
			$result = $model->save();
			
			// delete old profile image
			if($result && $oldImagePath){
				if(file_exists($oldImagePath)){
					unlink($oldImagePath);
				}
			}
					
			$this->removeTempData();

			$data['status'] = 'success';
			$data['updatedPhoto'] = $model->MemberPhoto;
			$this->echoObjectAsJSON($data);
		}
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
	public function multipleDelete($data)
	{
		$connection=Yii::app()->db;
		$arr=implode(',',$data['matrimony-members-grid_c0']);
		$query = "delete from matrimony_members where pkMemberId in(".$arr.")";
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
