<?php

/**
 * This is the model class for table "level_master".
 *
 * The followings are the available columns in table 'level_master':
 * @property string $pkLevel
 * @property string $LevelName
 * @property string $LevelCode
 *
 * The followings are the available model relations:
 * @property LevelPosts[] $levelPosts
 */
class LevelMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LevelMaster the static model class
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
		return 'level_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('LevelName, LevelCode', 'required'),
		array('LevelName, LevelCode', 'length', 'max'=>45),
		array('LevelOrder', 'length', 'max'=>10),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('pkLevel, LevelName, LevelCode, LevelOrder', 'safe', 'on'=>'search'),
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
			'levelPosts' => array(self::HAS_MANY, 'LevelPosts', 'fkLevelId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkLevel' => 'Pk Level',
			'LevelName' => 'Level Name',
			'LevelCode' => 'Level Code',
			'LevelOrder' => 'Level Order',
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

		$criteria->compare('pkLevel',$this->pkLevel,true);
		$criteria->compare('LevelName',$this->LevelName,true);
		$criteria->compare('LevelCode',$this->LevelCode,true);
		$criteria->compare('LevelOrder',$this->LevelOrder,true);
		
		$criteria->order = 'LevelOrder ASC';

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
		),
			'criteria'=>$criteria,
		));
	}
}