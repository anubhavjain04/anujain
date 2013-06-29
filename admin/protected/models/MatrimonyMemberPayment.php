<?php

/**
 * This is the model class for table "matrimony_member_payment".
 *
 * The followings are the available columns in table 'matrimony_member_payment':
 * @property string $pkMemPayId
 * @property string $fkMemberId
 * @property string $fkPackageId
 * @property string $StartDate
 * @property string $EndDate
 * @property string $AmountPaid
 * @property integer $Status
 * @property string $Discount
 * @property string $ReasonOfDiscount
 *
 * The followings are the available model relations:
 * @property MatrimonyMembers $fkMember
 * @property MatrimonialPackage $fkPackage
 */
class MatrimonyMemberPayment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatrimonyMemberPayment the static model class
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
		return 'matrimony_member_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fkMemberId, fkPackageId, StartDate, EndDate, AmountPaid', 'required'),
			array('Status', 'numerical', 'integerOnly'=>true),
			array('fkMemberId, fkPackageId, AmountPaid, Discount', 'length', 'max'=>10),
			array('ReasonOfDiscount', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkMemPayId, fkMemberId, fkPackageId, StartDate, EndDate, AmountPaid, Status, Discount, ReasonOfDiscount', 'safe', 'on'=>'search'),
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
			'fkMember' => array(self::BELONGS_TO, 'MatrimonyMembers', 'fkMemberId'),
			'fkPackage' => array(self::BELONGS_TO, 'MatrimonialPackage', 'fkPackageId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkMemPayId' => 'Pk Mem Pay',
			'fkMemberId' => 'Fk Member',
			'fkPackageId' => 'Fk Package',
			'StartDate' => 'Start Date',
			'EndDate' => 'End Date',
			'AmountPaid' => 'Amount Paid',
			'Status' => 'Status',
			'Discount' => 'Discount',
			'ReasonOfDiscount' => 'Reason Of Discount',
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

		$criteria->compare('pkMemPayId',$this->pkMemPayId,true);
		$criteria->compare('fkMemberId',$this->fkMemberId,true);
		$criteria->compare('fkPackageId',$this->fkPackageId,true);
		$criteria->compare('StartDate',$this->StartDate,true);
		$criteria->compare('EndDate',$this->EndDate,true);
		$criteria->compare('AmountPaid',$this->AmountPaid,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('Discount',$this->Discount,true);
		$criteria->compare('ReasonOfDiscount',$this->ReasonOfDiscount,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}