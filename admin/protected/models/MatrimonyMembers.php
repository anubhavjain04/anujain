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
			'DOB' => 'Date&nbsp;of&nbsp;Birth',
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
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('fkResidingState0');
		$criteria->together = true;
		$sort = new CSort;

		$criteria->compare('pkMemberId',$this->pkMemberId,true);
		$criteria->compare('MemberName',$this->MemberName,true);
		$criteria->compare('Sex',$this->Sex);
		$criteria->compare('DOB',$this->DOB,true);
		$criteria->compare('MaritalStatus',$this->MaritalStatus,true);
		$criteria->compare('Childrens',$this->Childrens,true);
		$criteria->compare('Height',$this->Height,true);
		$criteria->compare('fkSect',$this->fkSect,true);
		$criteria->compare('fkSubSect',$this->fkSubSect,true);
		$criteria->compare('fkCaste',$this->fkCaste,true);
		$criteria->compare('OtherCaste',$this->OtherCaste,true);
		$criteria->compare('fkMotherTongue',$this->fkMotherTongue,true);
		$criteria->compare('fkCountryLivingIn',$this->fkCountryLivingIn,true);
		$criteria->compare('ContactNo',$this->ContactNo,true);
		$criteria->compare('MemberPhoto',$this->MemberPhoto,true);
		$criteria->compare('PhysicalStatus',$this->PhysicalStatus);
		$criteria->compare('fkResidingState',$this->fkResidingState,true);
		$criteria->compare('ResidingCity',$this->ResidingCity,true);
		$criteria->compare('MarryInSameSubSect',$this->MarryInSameSubSect);
		$criteria->compare('fkEducation',$this->fkEducation,true);
		$criteria->compare('EmployedIn',$this->EmployedIn,true);
		$criteria->compare('Occupation',$this->Occupation,true);
		$criteria->compare('IncomeAnnual',$this->IncomeAnnual,true);
		$criteria->compare('AboutMe',$this->AboutMe,true);
		$criteria->compare('AboutMyPartner',$this->AboutMyPartner,true);
		$criteria->compare('HomeAddress',$this->HomeAddress,true);
		$criteria->compare('WorkingAddress',$this->WorkingAddress,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('ActivationCode',$this->ActivationCode,true);
		$criteria->compare('fkLoginId',$this->fkLoginId,true);
		$criteria->compare('MemberCode',$this->MemberCode,true);
		$criteria->compare('Manglik',$this->Manglik,true);
		$criteria->compare('BodyType',$this->BodyType,true);
		$criteria->compare('Weight',$this->Weight,true);
		$criteria->compare('Complexion',$this->Complexion,true);
		$criteria->compare('RegisteredBy',$this->RegisteredBy,true);
		$criteria->compare('Gotra',$this->Gotra,true);
		$criteria->compare('CreatedDate',$this->CreatedDate,true);
		$criteria->compare('ModifiedDate',$this->ModifiedDate,true);
		
		$sort->attributes = array(
			'MemberName'=>array(
			  'asc'=>'MemberName',
			  'desc'=>'MemberName desc',
			),
			'Sex'=>array(
			  'asc'=>'Sex',
			  'desc'=>'Sex desc',
			),
			'DOB'=>array(
			  'asc'=>'DOB',
			  'desc'=>'DOB desc',
			),
			'MemberCode'=>array(
			  'asc'=>'MemberCode',
			  'desc'=>'MemberCode desc',
			),
			'fkResidingState'=>array(
			  'asc'=>'fkResidingState0.StateName',
			  'desc'=>'fkResidingState0.StateName desc',
			),
			'ResidingCity'=>array(
			  'asc'=>'ResidingCity',
			  'desc'=>'ResidingCity desc',
			),
			'Email'=>array(
			  'asc'=>'Email',
			  'desc'=>'Email desc',
			),
			'Status'=>array(
			  'asc'=>'Status',
			  'desc'=>'Status desc',
			),
			'CreatedDate'=>array(
			  'asc'=>'CreatedDate',
			  'desc'=>'CreatedDate desc',
			),
			'ModifiedDate'=>array(
			  'asc'=>'ModifiedDate',
			  'desc'=>'ModifiedDate desc',
			),
			
		  );
		  
		  /* Default Sort Order*/
        $sort->defaultOrder= array(
            'MemberName'=>CSort::SORT_ASC,
        );
		
		//$criteria->order = ' MemberName ASC ';		
		
		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
	}
}