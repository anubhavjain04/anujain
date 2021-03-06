<?php

/**
 * This is the model class for table "matrimony_members".
 *
 * The followings are the available columns in table 'matrimony_members':
 * @property string $pkMemberId
 * @property string $MemberName
 * @property integer $Sex
 * @property string $DOB
 * @property string $MaritalStatus
 * @property string $Childrens
 * @property string $Height
 * @property string $fkSect
 * @property string $fkSubSect
 * @property string $fkCaste
 * @property string $OtherCaste
 * @property string $fkMotherTongue
 * @property string $fkCountryLivingIn
 * @property string $ContactNo
 * @property string $MemberPhoto
 * @property integer $PhysicalStatus
 * @property string $fkResidingState
 * @property string $ResidingCity
 * @property integer $MarryInSameSubSect
 * @property string $fkEducation
 * @property string $EmployedIn
 * @property string $Occupation
 * @property string $IncomeAnnual
 * @property string $AboutMe
 * @property string $AboutMyPartner
 * @property string $HomeAddress
 * @property string $WorkingAddress
 * @property string $Email
 * @property integer $Status
 * @property string $ActivationCode
 * @property string $fkLoginId
 * @property string $MemberCode
 * @property string $Manglik
 * @property string $BodyType
 * @property string $Weight
 * @property string $Complexion
 * @property string $RegisteredBy
 * @property string $Gotra
 * @property string $CreatedDate
 * @property string $ModifiedDate
 * @property string $ProfilePic
 * @property string $Comments
 *
 * The followings are the available model relations:
 * @property MatrimonyMemberPayment[] $matrimonyMemberPayments
 * @property MatrimonyCaste $fkCaste0
 * @property Country $fkCountryLivingIn0
 * @property MatrimonyCourse $fkEducation0
 * @property MatrimonyMotherTongue $fkMotherTongue0
 * @property Occupation $occupation
 * @property MatrimonySect $fkSect0
 * @property States $fkResidingState0
 * @property MatrimonySubSect $fkSubSect0
 */
class MatrimonyMembers extends CActiveRecord
{	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatrimonyMembers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'matrimony_members';
	}
	
	
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MemberName, Sex, DOB, MaritalStatus, fkSect, fkSubSect, fkMotherTongue, fkCountryLivingIn, ContactNo, PhysicalStatus, fkResidingState, ResidingCity, MarryInSameSubSect, EmployedIn, MemberCode, Status, RegisteredBy, CreatedDate, ModifiedDate', 'required'),
			array('PhysicalStatus, MarryInSameSubSect, Status, Sex', 'numerical', 'integerOnly'=>true),
			array('MemberName, OtherCaste, ContactNo, MemberPhoto, ResidingCity, ActivationCode, MemberCode, Gotra', 'length', 'max'=>45),
			array('HomeAddress, WorkingAddress', 'length', 'max'=>150),
			array('MaritalStatus, Childrens, EmployedIn, Manglik, BodyType, Complexion, RegisteredBy', 'length', 'max'=>1),
			array('Height, fkSect, fkSubSect, fkCaste, fkMotherTongue, fkCountryLivingIn, fkResidingState, fkEducation, Occupation, IncomeAnnual, fkLoginId', 'length', 'max'=>10),
			array('AboutMe, AboutMyPartner', 'length', 'max'=>500),
			array('Email', 'length', 'max'=>100),
			array('Weight', 'length', 'max'=>3),
			array('Comments', 'length', 'max'=>200),
			array('ProfilePic', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkMemberId, MemberName, Sex, DOB, MaritalStatus, Childrens, Height, fkSect, fkSubSect, fkCaste, OtherCaste, fkMotherTongue, fkCountryLivingIn, ContactNo, MemberPhoto, PhysicalStatus, fkResidingState, ResidingCity, MarryInSameSubSect, fkEducation, EmployedIn, Occupation, IncomeAnnual, AboutMe, AboutMyPartner, HomeAddress, WorkingAddress, Email, Status, ActivationCode, fkLoginId, MemberCode, Gotra,CreatedDate, ModifiedDate, Comments', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'matrimonyMemberPayments' => array(self::HAS_MANY, 'MatrimonyMemberPayment', 'fkMemberId'),
			'fkCaste0' => array(self::BELONGS_TO, 'MatrimonyCaste', 'fkCaste'),
			'fkCountryLivingIn0' => array(self::BELONGS_TO, 'Country', 'fkCountryLivingIn'),
			'fkEducation0' => array(self::BELONGS_TO, 'MatrimonyCourse', 'fkEducation'),
			'fkMotherTongue0' => array(self::BELONGS_TO, 'MatrimonyMotherTongue', 'fkMotherTongue'),
			'occupation' => array(self::BELONGS_TO, 'Occupation', 'Occupation'),
			'fkSect0' => array(self::BELONGS_TO, 'MatrimonySect', 'fkSect'),
			'fkResidingState0' => array(self::BELONGS_TO, 'States', 'fkResidingState'),
			'fkSubSect0' => array(self::BELONGS_TO, 'MatrimonySubSect', 'fkSubSect'),
			'fkLoginId0' => array(self::BELONGS_TO, 'MatrimonyUser', 'fkLoginId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkMemberId' => 'Pk Member',
			'MemberName' => 'Member Name',
			'Sex' => 'Gender',
			'DOB' => 'Date of Birth',
			'MaritalStatus' => 'Marital Status',
			'Childrens' => 'Childrens',
			'Height' => 'Height',
			'fkSect' => 'Sect',
			'fkSubSect' => 'Sub Sect',
			'fkCaste' => 'Caste',
			'OtherCaste' => 'Other Caste',
			'fkMotherTongue' => 'Mother Tongue',
			'fkCountryLivingIn' => 'Country Living In',
			'ContactNo' => 'Contact No',
			'MemberPhoto' => 'Member Photo',
			'PhysicalStatus' => 'Physical Status',
			'fkResidingState' => 'Residing State',
			'ResidingCity' => 'Residing City',
			'MarryInSameSubSect' => 'Marry In Same Sub Sect',
			'fkEducation' => 'Highest Education',
			'EmployedIn' => 'Employed In',
			'Occupation' => 'Occupation',
			'IncomeAnnual' => 'Income Annual',
			'AboutMe' => 'About Me',
			'AboutMyPartner' => 'About My Partner',
			'HomeAddress' => 'Home Address',
			'WorkingAddress' => 'Working Address',
			'Email' => 'Email',
			'Status' => 'Status',
			'ActivationCode' => 'Activation Code',
			'fkLoginId' => 'Fk Login',
			'MemberCode' => 'Member Code',
			'Manglik' => 'Manglik',
			'BodyType' => 'Body Type',
			'Weight' => 'Weight',
			'Complexion' => 'Complexion',
			'RegisteredBy'=>'Registered By',
			'Gotra'=>'Gotra',
			'CreatedDate'=>'Created Date', 
			'ModifiedDate'=>'Modified Date',
			'ProfilePic' => 'Profile Pic',
			'Comments' => 'Comments',
		);
	}


	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($search)
	{	
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		if($search){
			$criteria->with = array('fkCaste0','fkCountryLivingIn0','fkEducation0','fkMotherTongue0','occupation','fkSect0','fkResidingState0','fkSubSect0');
			$criteria->together = true;
			
			if(isset($search['memberName']) && $search['memberName']){
				$criteria->compare('MemberName',$search['memberName'],true);
			}
			if(isset($search['sex'])){
				$criteria->compare('Sex',$search['sex']);
			}
			if((isset($search['ageFrom']) && $search['ageFrom']) && (isset($search['ageTo']) && $search['ageTo'])){
				$currentYear = date('Y',time());
				$criteria->addBetweenCondition('year(DOB)', $currentYear-(int)$search['ageTo'], $currentYear-(int)$search['ageFrom']);
			}
			if((isset($search['heightFrom']) && $search['heightFrom']) && (isset($search['heightTo']) && $search['heightTo'])){
				$criteria->addBetweenCondition('Height', $search['heightFrom'], $search['heightTo']);
			}
			if(isset($search['maritalStatus']) && $search['maritalStatus'] && $search['maritalStatus'][0]){
				$criteria->addInCondition('MaritalStatus',$search['maritalStatus']);
			}
			if(isset($search['sect']) && $search['sect'] && $search['sect'][0]){
				$criteria->addInCondition('fkSect',$search['sect']);
			}
			if(isset($search['subsect']) && $search['subsect'] && $search['subsect'][0]){
				$criteria->addInCondition('fkSubSect',$search['subsect']);
			}
			if(isset($search['caste']) && $search['caste'] && $search['caste'][0]){
				$criteria->addInCondition('fkCaste',$search['caste']);
			}
			if(isset($search['gotra']) && $search['gotra'] && $search['gotra'][0]){
				$criteria->addInCondition('Gotra',$search['gotra']);
			}			
			if(isset($search['mothertongue']) && $search['mothertongue'] && $search['mothertongue'][0]){
				$criteria->addInCondition('fkMotherTongue',$search['mothertongue']);
			}
			if(isset($search['educationGroup']) && $search['educationGroup'] && $search['educationGroup'][0]){
				$criteria->addInCondition('fkEducation0.fkCourseGroupId',$search['educationGroup']);
			}
			if(isset($search['marryInSameSubSect']) && $search['marryInSameSubSect'] && $search['marryInSameSubSect'][0]){
				$criteria->compare('MarryInSameSubSect',$search['marryInSameSubSect']);
			}
			if(isset($search['employedIn']) && $search['employedIn'] && $search['employedIn'][0]){
				$criteria->addInCondition('EmployedIn',$search['employedIn']);
			}
			if(isset($search['occupationGroup']) && $search['occupationGroup'] && $search['occupationGroup'][0]){
				$criteria->addInCondition('occupation.fkOccGroupId',$search['occupationGroup']);
			}
			if((isset($search['annualIncomeFrom']) && $search['annualIncomeFrom']) && (isset($search['annualIncomeTo']) && $search['annualIncomeTo'])){
				$criteria->addBetweenCondition('IncomeAnnual', $search['annualIncomeFrom'], $search['annualIncomeTo']);
			}
			if(isset($search['physicalStatus']) && $search['physicalStatus'] && $search['physicalStatus'][0]){
				$criteria->addInCondition('PhysicalStatus',$search['physicalStatus']);
			}
			if(isset($search['country']) && $search['country'] && $search['country'][0]){
				$criteria->addInCondition('fkCountryLivingIn',$search['country']);
			}
			if(isset($search['state']) && $search['state'] && $search['state'][0]){
				$criteria->addInCondition('fkResidingState',$search['state']);
			}
			if(isset($search['manglik']) && $search['manglik'] && $search['manglik'][0]){
				$criteria->addInCondition('Manglik',$search['manglik']);
			}
			if(isset($search['bodyType']) && $search['bodyType'] && $search['bodyType'][0]){
				$criteria->addInCondition('BodyType',$search['bodyType']);
			}
			if((isset($search['weightFrom']) && $search['weightFrom']) && (isset($search['weightTo']) && $search['weightTo'])){
				$criteria->addBetweenCondition('Weight', $search['weightFrom'], $search['weightTo']);
			}
			if(isset($search['complexion']) && $search['complexion'] && $search['complexion'][0]){
				$criteria->addInCondition('Complexion',$search['complexion']);
			}		
			if(isset($search['registeredBy']) && $search['registeredBy'] && $search['registeredBy'][0]){
				$criteria->addInCondition('RegisteredBy',$search['registeredBy']);
			}
			if(isset($search['status'])){
				$criteria->compare('Status',$search['status']);	
			}
			if(isset($search['memberCode']) && $search['memberCode']){
				$criteria->compare('MemberCode',$search['memberCode']);	
			}
		}
		$criteria->order = ' ModifiedDate DESC ';
		
		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}

	public function getMemberData($id)
	{
		$model=$this->find('fkLoginId=:fkLoginId',array('fkLoginId'=>$id));
		if($model){
			$familyModel=MatrimonyFamilyDetails::model()->find('MemberCode=:MemberCode', array(':MemberCode'=>$model->MemberCode));
			if(isset($model->ProfilePic)){
				//$model->ProfilePic = "data:image/jpeg;base64," . base64_encode($model->ProfilePic);
				$model->ProfilePic = $model->pkMemberId;
			}
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

			//$data['member'] = $plainModel;
			$plainModel['family'] = $familyModel;
			return $plainModel;
		}else{
			throw new CHttpException(404, $id.' member not found');
		}
	}

	public static function getProfileImageData($model){
		if($model){
			if(isset($model->ProfilePic)) {
				header("Content-type: image/jpeg");
				echo "data:image/jpeg;base64," . base64_encode($model->ProfilePic);
			}else{
				echo "";
			}
		}
	}
}
