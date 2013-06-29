<?php

/**
 * This is the model class for table "group_master".
 *
 * The followings are the available columns in table 'group_master':
 * @property string $pkGroupId
 * @property string $GroupName
 * @property string $GroupCode
 *
 * The followings are the available model relations:
 * @property GroupPosts[] $groupPosts
 */
class GroupMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GroupMaster the static model class
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
		return 'group_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('GroupName, GroupCode', 'required'),
			array('GroupName, GroupCode', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkGroupId, GroupName, GroupCode', 'safe', 'on'=>'search'),
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
			'groupPosts' => array(self::HAS_MANY, 'GroupPosts', 'fkGroupId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkGroupId' => 'Pk Group',
			'GroupName' => 'Group Name',
			'GroupCode' => 'Group Code',
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

		$criteria->compare('pkGroupId',$this->pkGroupId,true);
		$criteria->compare('GroupName',$this->GroupName,true);
		$criteria->compare('GroupCode',$this->GroupCode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}