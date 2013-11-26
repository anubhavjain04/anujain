<?php

/**
 * This is the model class for table "message".
 *
 * The followings are the available columns in table 'message':
 * @property string $pkMessageId
 * @property string $Message
 * @property integer $LineNo
 * @property integer $MessageOrder
 * @property integer $Status
 * @property integer $MessageType
 */
class Message extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Message the static model class
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
		return 'message';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Message, LineNo, MessageType', 'required'),
			array('LineNo, MessageOrder, Status, MessageType', 'numerical', 'integerOnly'=>true),
			array('Message', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkMessageId, Message, LineNo, MessageOrder, Status, MessageType', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkMessageId' => 'Pk Message',
			'Message' => 'Message',
			'LineNo' => 'Line No',
			'MessageOrder' => 'Message Order',
			'Status' => 'Status',
			'MessageType' => 'Message Type',
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

		$criteria->compare('pkMessageId',$this->pkMessageId,true);
		$criteria->compare('Message',$this->Message,true);
		$criteria->compare('LineNo',$this->LineNo);
		$criteria->compare('MessageOrder',$this->MessageOrder);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('MessageType',$this->MessageType);
		
		$criteria->order = ' LineNo,MessageOrder ASC ';

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
}