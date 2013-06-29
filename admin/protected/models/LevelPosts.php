<?php

/**
 * This is the model class for table "level_posts".
 *
 * The followings are the available columns in table 'level_posts':
 * @property string $pkLevelPostId
 * @property string $fkLevelId
 * @property string $fkPostId
 *
 * The followings are the available model relations:
 * @property LevelMaster $fkLevel
 * @property PostMaster $fkPost
 */
class LevelPosts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LevelPosts the static model class
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
		return 'level_posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('fkLevelId, fkPostId', 'required'),
		array('fkLevelId, fkPostId', 'length', 'max'=>10),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('pkLevelPostId, fkLevelId, fkPostId', 'safe', 'on'=>'search'),
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
			'fkLevel' => array(self::BELONGS_TO, 'LevelMaster', 'fkLevelId'),
			'fkPost' => array(self::BELONGS_TO, 'PostMaster', 'fkPostId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkLevelPostId' => 'Pk Level Post',
			'fkLevelId' => 'Fk Level',
			'fkPostId' => 'Fk Post',
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

		$criteria->compare('pkLevelPostId',$this->pkLevelPostId,true);
		$criteria->compare('fkLevelId',$this->fkLevelId,true);
		$criteria->compare('fkPostId',$this->fkPostId,true);

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
		),
			'criteria'=>$criteria,
		));
	}
}