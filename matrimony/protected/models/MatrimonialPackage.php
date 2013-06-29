<?php

/**
 * This is the model class for table "matrimonial_package".
 *
 * The followings are the available columns in table 'matrimonial_package':
 * @property string $pkPackageId
 * @property string $PackageName
 * @property string $PackageType
 * @property string $Cost
 * @property string $PackageDate
 * @property integer $Status
 * @property string $Days
 *
 * The followings are the available model relations:
 * @property MatrimonyMemberPayment[] $matrimonyMemberPayments
 */
class MatrimonialPackage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatrimonialPackage the static model class
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
		return 'matrimonial_package';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PackageName, PackageType, Cost, PackageDate, Days', 'required'),
			array('Status', 'numerical', 'integerOnly'=>true),
			array('PackageName, PackageType', 'length', 'max'=>45),
			array('Cost, Days', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkPackageId, PackageName, PackageType, Cost, PackageDate, Status, Days', 'safe', 'on'=>'search'),
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
			'matrimonyMemberPayments' => array(self::HAS_MANY, 'MatrimonyMemberPayment', 'fkPackageId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkPackageId' => 'Pk Package',
			'PackageName' => 'Package Name',
			'PackageType' => 'Package Type',
			'Cost' => 'Cost',
			'PackageDate' => 'Package Date',
			'Status' => 'Status',
			'Days' => 'Days',
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

		$criteria->compare('pkPackageId',$this->pkPackageId,true);
		$criteria->compare('PackageName',$this->PackageName,true);
		$criteria->compare('PackageType',$this->PackageType,false);
		$criteria->compare('Cost',$this->Cost,true);
		$criteria->compare('PackageDate',$this->PackageDate,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('Days',$this->Days,true);
		
		$criteria->order = ' PackageName ASC ';

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
}