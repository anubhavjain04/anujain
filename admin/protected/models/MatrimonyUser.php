<?php

/**
 * This is the model class for table "matrimony_user".
 *
 * The followings are the available columns in table 'matrimony_user':
 * @property string $pkUserId
 * @property string $EmailID
 * @property string $Password
 * @property string $Type
 * @property integer $Status
 * @property string $ActivationCode
 * @property string $CreatedDate
 * @property string $ModifiedDate
 */
class MatrimonyUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatrimonyUser the static model class
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
		return 'matrimony_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EmailID, Password, Type, Status, CreatedDate, ModifiedDate', 'required'),
			array('Status', 'numerical', 'integerOnly'=>true),
			array('EmailID', 'length', 'max'=>100),
			array('Password, ActivationCode', 'length', 'max'=>45),
			array('Type', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkUserId, EmailID, Password, Type, Status, ActivationCode, CreatedDate, ModifiedDate', 'safe', 'on'=>'search'),
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
			'matrimonyMembers' => array(self::HAS_MANY, 'MatrimonyMembers', 'fkLoginId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkUserId' => 'Pk User',
			'EmailID' => 'Email',
			'Password' => 'Password',
			'Type' => 'Type',
			'Status' => 'Status',
			'ActivationCode' => 'Activation Code',
			'CreatedDate' => 'Created Date',
			'ModifiedDate' => 'Modified Date',
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

		$criteria->compare('pkUserId',$this->pkUserId,true);
		$criteria->compare('EmailID',$this->EmailID,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Type',$this->Type,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('ActivationCode',$this->ActivationCode,true);
		$criteria->compare('CreatedDate',$this->CreatedDate,true);
		$criteria->compare('ModifiedDate',$this->ModifiedDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}