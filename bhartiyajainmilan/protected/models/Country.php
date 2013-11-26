<?php

/**
 * This is the model class for table "country".
 *
 * The followings are the available columns in table 'country':
 * @property string $pkCountryId
 * @property string $CountryName
 * @property string $CountryCode
 * @property string $Currency
 *
 * The followings are the available model relations:
 * @property MatrimonyMembers[] $matrimonyMembers
 * @property States[] $states
 */
class Country extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Country the static model class
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
		return 'country';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CountryName, CountryCode, Currency', 'required'),
			array('CountryName, CountryCode, Currency', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkCountryId, CountryName, CountryCode, Currency', 'safe', 'on'=>'search'),
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
			'matrimonyMembers' => array(self::HAS_MANY, 'MatrimonyMembers', 'fkCountryLivingIn'),
			'states' => array(self::HAS_MANY, 'States', 'fkCountryId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkCountryId' => 'Pk Country',
			'CountryName' => 'Country Name',
			'CountryCode' => 'Country Code',
			'Currency' => 'Currency',
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

		$criteria->compare('pkCountryId',$this->pkCountryId,true);
		$criteria->compare('CountryName',$this->CountryName,true);
		$criteria->compare('CountryCode',$this->CountryCode,true);
		$criteria->compare('Currency',$this->Currency,true);

		$criteria->order = 'CountryName ASC';
		
		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
}