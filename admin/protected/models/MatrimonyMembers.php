<?php

/**
 * This is the model class for table "matrimony_members".
 *
 * The followings are the available columns in table 'matrimony_members':
 * @property string $pkMemberId
 * @property string $MemberName
 * @property string $Sex
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
 * @property string $Address1
 * @property string $Address2
 * @property string $Address3
 * @property string $Email
 * @property integer $Status
 * @property string $ActivationCode
 * @property string $fkLoginId
 * @property string $MemberCode
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
			array('MemberName, Sex, DOB, MaritalStatus, Height, fkSect, fkSubSect, fkCaste, fkMotherTongue, fkCountryLivingIn, ContactNo, PhysicalStatus, fkResidingState, ResidingCity, MarryInSameSubSect, fkEducation, EmployedIn, Occupation, MemberCode, Status', 'required'),
			array('PhysicalStatus, MarryInSameSubSect, Status, Sex', 'numerical', 'integerOnly'=>true),
			array('MemberName, OtherCaste, ContactNo, MemberPhoto, ResidingCity, Address1, Address2, Address3, ActivationCode, MemberCode', 'length', 'max'=>45),

			array('MaritalStatus, Childrens, EmployedIn', 'length', 'max'=>1),
			array('Height, fkSect, fkSubSect, fkCaste, fkMotherTongue, fkCountryLivingIn, fkResidingState, fkEducation, Occupation, IncomeAnnual, fkLoginId', 'length', 'max'=>10),
			array('AboutMe, AboutMyPartner', 'length', 'max'=>200),
			array('Email', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkMemberId, MemberName, Sex, DOB, MaritalStatus, Childrens, Height, fkSect, fkSubSect, fkCaste, OtherCaste, fkMotherTongue, fkCountryLivingIn, ContactNo, MemberPhoto, PhysicalStatus, fkResidingState, ResidingCity, MarryInSameSubSect, fkEducation, EmployedIn, Occupation, IncomeAnnual, AboutMe, AboutMyPartner, Address1, Address2, Address3, Email, Status, ActivationCode, fkLoginId, MemberCode', 'safe', 'on'=>'search'),
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
			'Address1' => 'Address1',
			'Address2' => 'Address2',
			'Address3' => 'Address3',
			'Email' => 'Email',
			'Status' => 'Status',
			'ActivationCode' => 'Activation Code',
			'fkLoginId' => 'Fk Login',
			'MemberCode' => 'Member Code',
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

		$criteria->compare('pkMemberId',$this->pkMemberId,true);
		$criteria->compare('MemberName',$this->MemberName,true);
		$criteria->compare('Sex',$this->Sex,true);
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
		$criteria->compare('Address1',$this->Address1,true);
		$criteria->compare('Address2',$this->Address2,true);
		$criteria->compare('Address3',$this->Address3,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('ActivationCode',$this->ActivationCode,true);
		$criteria->compare('fkLoginId',$this->fkLoginId,true);
		$criteria->compare('MemberCode',$this->MemberCode,true);
		
		$criteria->order = ' MemberName ASC ';		

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
}