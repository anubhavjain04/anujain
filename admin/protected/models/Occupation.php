<?php

/**
 * This is the model class for table "occupation".
 *
 * The followings are the available columns in table 'occupation':
 * @property string $pkOccupationId
 * @property string $fkOccGroupId
 * @property string $OccupationName
 *
 * The followings are the available model relations:
 * @property MatrimonyMembers[] $matrimonyMembers
 * @property OccupationGroup $fkOccGroup
 */
class Occupation extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Occupation the static model class
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
		return 'occupation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fkOccGroupId, OccupationName', 'required'),
			array('fkOccGroupId', 'length', 'max'=>10),
			array('OccupationName', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkOccupationId, fkOccGroupId, OccupationName', 'safe', 'on'=>'search'),
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
			'matrimonyMembers' => array(self::HAS_MANY, 'MatrimonyMembers', 'Occupation'),
			'fkOccGroup' => array(self::BELONGS_TO, 'OccupationGroup', 'fkOccGroupId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkOccupationId' => 'Pk Occupation',
			'fkOccGroupId' => 'Occupation Group',
			'OccupationName' => 'Occupation Name',
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
		$criteria->with = array('fkOccGroup');
		$criteria->together = true;
		$criteria->compare('pkOccupationId',$this->pkOccupationId,true);
		$criteria->compare('fkOccGroup.GroupName',$this->fkOccGroupId,true);
		$criteria->compare('OccupationName',$this->OccupationName,true);
		
		$criteria->order = 'fkOccGroup.GroupName, OccupationName ASC';

		return new CActiveDataProvider($this, array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
}