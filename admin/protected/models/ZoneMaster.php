<?php

/**
 * This is the model class for table "zone_master".
 *
 * The followings are the available columns in table 'zone_master':
 * @property string $pkZoneId
 * @property string $ZoneName
 * @property string $ZoneCode
 * @property integer $Status
 *
 * The followings are the available model relations:
 * @property BranchMaster[] $branchMasters
 */
class ZoneMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ZoneMaster the static model class
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
		return 'zone_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('ZoneName, ZoneCode', 'required'),
		array('Status', 'numerical', 'integerOnly'=>true),
		array('ZoneName, ZoneCode', 'length', 'max'=>45),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('pkZoneId, ZoneName, ZoneCode, Status', 'safe', 'on'=>'search'),
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
			'branchMasters' => array(self::HAS_MANY, 'BranchMaster', 'fkZoneId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkZoneId' => 'Zone ID',
			'ZoneName' => 'Zone Name',
			'ZoneCode' => 'Zone Code',
			'Status' => 'Status',
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

		$criteria->compare('pkZoneId',$this->pkZoneId,true);
		$criteria->compare('ZoneName',$this->ZoneName,true);
		$criteria->compare('ZoneCode',$this->ZoneCode,true);
		$criteria->compare('Status',$this->Status);

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
		),
			'criteria'=>$criteria,
		));
	}
}