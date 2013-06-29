<?php

/**
 * This is the model class for table "function_group_auth".
 *
 * The followings are the available columns in table 'function_group_auth':
 * @property string $pkgroupAuthId
 * @property string $fkgroupId
 * @property string $fkfunctionId
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property FunctionMaster $fkfunction
 * @property FunctionGroupMaster $fkgroup
 */
class FunctionGroupAuth extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FunctionGroupAuth the static model class
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
		return 'function_group_auth';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('fkgroupId, fkfunctionId', 'required'),
		array('status', 'numerical', 'integerOnly'=>true),
		array('fkgroupId, fkfunctionId', 'length', 'max'=>10),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('pkgroupAuthId, fkgroupId, fkfunctionId, status', 'safe', 'on'=>'search'),
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
			'fkgroup' => array(self::BELONGS_TO, 'FunctionGroupMaster', 'fkgroupId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkgroupAuthId' => 'Pkgroup Auth',
			'fkgroupId' => 'Right Group Name',
			'fkfunctionId' => 'Right Name',
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

		$criteria->compare('pkgroupAuthId',$this->pkgroupAuthId,true);
		$criteria->compare('fkgroupId',$this->fkgroupId,true);
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