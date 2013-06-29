<?php

/**
 * This is the model class for table "function_group_master".
 *
 * The followings are the available columns in table 'function_group_master':
 * @property string $pkgroupId
 * @property string $groupName
 * @property string $shortDesc
 * @property string $longDesc
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property FunctionGroupAuth[] $functionGroupAuths
 * @property LoginMaster[] $loginMasters
 */
class FunctionGroupMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FunctionGroupMaster the static model class
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
		return 'function_group_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('groupName', 'required'),
		array('status', 'numerical', 'integerOnly'=>true),
		array('groupName, shortDesc', 'length', 'max'=>45),
		array('longDesc', 'length', 'max'=>100),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('pkgroupId, groupName, shortDesc, longDesc, status', 'safe', 'on'=>'search'),
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
			'functionGroupAuths' => array(self::HAS_MANY, 'FunctionGroupAuth', 'fkgroupId'),
			'loginMasters' => array(self::HAS_MANY, 'LoginMaster', 'fkgroupId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkgroupId' => 'Pkgroup',
			'groupName' => 'Group Name',
			'shortDesc' => 'Short Desc',
			'longDesc' => 'Long Desc',
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

		$criteria->compare('pkgroupId',$this->pkgroupId,true);
		$criteria->compare('groupName',$this->groupName,true);
		$criteria->compare('shortDesc',$this->shortDesc,true);
		$criteria->compare('longDesc',$this->longDesc,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
		),
			'criteria'=>$criteria,
		));
	}
}