<?php

/**
 * This is the model class for table "states".
 *
 * The followings are the available columns in table 'states':
 * @property string $pkStateId
 * @property string $fkCountryId
 * @property string $StateName
 *
 * The followings are the available model relations:
 * @property MatrimonyMembers[] $matrimonyMembers
 * @property Country $fkCountry
 */
class States extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return States the static model class
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
		return 'states';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fkCountryId, StateName', 'required'),
			array('fkCountryId', 'length', 'max'=>10),
			array('StateName', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkStateId, fkCountryId, StateName', 'safe', 'on'=>'search'),
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
			'matrimonyMembers' => array(self::HAS_MANY, 'MatrimonyMembers', 'fkResidingState'),
			'fkCountry' => array(self::BELONGS_TO, 'Country', 'fkCountryId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkStateId' => 'Pk State',
			'fkCountryId' => 'Country Name',
			'StateName' => 'State Name',
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
		$criteria->with = array('fkCountry');
		$criteria->together = true;
		$criteria->compare('pkStateId',$this->pkStateId,true);
		$criteria->compare('fkCountry.CountryName',$this->fkCountryId,true);
		$criteria->compare('StateName',$this->StateName,true);

		$criteria->order = 'fkCountry.CountryName, StateName ASC';
		
		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
}