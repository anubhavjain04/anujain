<?php

/**
 * This is the model class for table "matrimony_family_details".
 *
 * The followings are the available columns in table 'matrimony_family_details':
 * @property string $pkFamilyId
 * @property string $MemberCode
 * @property string $FatherOccupation
 * @property string $MotherOccupation
 * @property string $UnmarriedBrothers
 * @property string $MarriedBrothers
 * @property string $UnmarriedSisters
 * @property string $MarriedSisters
 * @property string $AboutFamily
 * @property string $FatherName
 * @property string $MotherName
 * @property string $CreatedDate
 * @property string $ModifiedDate

 *
 * The followings are the available model relations:
 * @property MatrimonyMembers $memberCode
 */
class MatrimonyFamilyDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatrimonyFamilyDetails the static model class
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
		return 'matrimony_family_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MemberCode, CreatedDate, ModifiedDate', 'required'),
			array('MemberCode', 'length', 'max'=>45),
			array('FatherName, MotherName', 'length', 'max'=>100),
			array('FatherOccupation, MotherOccupation', 'length', 'max'=>150),
			array('UnmarriedBrothers, MarriedBrothers, UnmarriedSisters, MarriedSisters', 'length', 'max'=>2),
			array('AboutFamily', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkFamilyId, MemberCode, FatherOccupation, MotherOccupation, UnmarriedBrothers, MarriedBrothers, UnmarriedSisters, MarriedSisters, AboutFamily, FatherName, MotherName, CreatedDate, ModifiedDate', 'safe', 'on'=>'search'),
			array('UnmarriedBrothers, MarriedBrothers, UnmarriedSisters, MarriedSisters', 'filter', 'filter'=>array($this,'empty2null')),
		);
	}
	
	public function empty2null($value) {
		if(!$value){
			return null;
		}else{
			return $value;
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'memberCode' => array(self::BELONGS_TO, 'MatrimonyMembers', 'MemberCode'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkFamilyId' => 'Pk Family',
			'MemberCode' => 'Member Code',
			'FatherOccupation' => 'Father Occupation',
			'MotherOccupation' => 'Mother Occupation',
			'UnmarriedBrothers' => 'Unmarried Brothers',
			'MarriedBrothers' => 'Married Brothers',
			'UnmarriedSisters' => 'Unmarried Sisters',
			'MarriedSisters' => 'Married Sisters',
			'AboutFamily' => 'About Family',
			'FatherName' => 'Father Name',
			'MotherName' => 'Mother Name',
			'CreatedDate'=>'Created Date', 
			'ModifiedDate'=>'Modified Date',
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

		$criteria->compare('pkFamilyId',$this->pkFamilyId,true);
		$criteria->compare('MemberCode',$this->MemberCode,true);
		$criteria->compare('FatherOccupation',$this->FatherOccupation,true);
		$criteria->compare('MotherOccupation',$this->MotherOccupation,true);
		$criteria->compare('UnmarriedBrothers',$this->UnmarriedBrothers,true);
		$criteria->compare('MarriedBrothers',$this->MarriedBrothers,true);
		$criteria->compare('UnmarriedSisters',$this->UnmarriedSisters,true);
		$criteria->compare('MarriedSisters',$this->MarriedSisters,true);
		$criteria->compare('AboutFamily',$this->AboutFamily,true);
		$criteria->compare('FatherName',$this->FatherName,true);
		$criteria->compare('MotherName',$this->MotherName,true);
		$criteria->compare('CreatedDate',$this->CreatedDate,true);
		$criteria->compare('ModifiedDate',$this->ModifiedDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
