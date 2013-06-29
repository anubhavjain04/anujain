<?php

/**
 * This is the model class for table "user_function_auth".
 *
 * The followings are the available columns in table 'user_function_auth':
 * @property string $pkuserAuthId
 * @property string $fkuserId
 * @property string $fkfunctionId
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property FunctionMaster $fkfunction
 * @property LoginMaster $fkuser
 */
class UserFunctionAuth extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserFunctionAuth the static model class
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
		return 'user_function_auth';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('fkuserId, fkfunctionId', 'required'),
		array('status', 'numerical', 'integerOnly'=>true),
		array('fkuserId, fkfunctionId', 'length', 'max'=>10),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('pkuserAuthId, fkuserId, fkfunctionId, status', 'safe', 'on'=>'search'),
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
			'fkfunction' => array(self::BELONGS_TO, 'FunctionMaster', 'fkfunctionId'),
			'fkuser' => array(self::BELONGS_TO, 'LoginMaster', 'fkuserId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkuserAuthId' => 'Pkuser Auth',
			'fkuserId' => 'Fkuser',
			'fkfunctionId' => 'Fkfunction',
			'status' => 'Status',
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

		$criteria->compare('pkuserAuthId',$this->pkuserAuthId,true);
		$criteria->compare('fkuserId',$this->fkuserId,true);
		$criteria->compare('fkfunctionId',$this->fkfunctionId,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
		),
			'criteria'=>$criteria,
		));
	}
}