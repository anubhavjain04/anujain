<?php

/**
 * This is the model class for table "matrimony_course_group".
 *
 * The followings are the available columns in table 'matrimony_course_group':
 * @property string $pkCourseGroupId
 * @property string $GroupName
 *
 * The followings are the available model relations:
 * @property MatrimonyCourse[] $matrimonyCourses
 */
class MatrimonyCourseGroup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatrimonyCourseGroup the static model class
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
		return 'matrimony_course_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('GroupName', 'required'),
			array('GroupName', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkCourseGroupId, GroupName', 'safe', 'on'=>'search'),
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
			'matrimonyCourses' => array(self::HAS_MANY, 'MatrimonyCourse', 'fkCourseGroupId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkCourseGroupId' => 'Pk Course Group',
			'GroupName' => 'Course Group Name',
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

		$criteria->compare('pkCourseGroupId',$this->pkCourseGroupId,true);
		$criteria->compare('GroupName',$this->GroupName,true);
		
		$criteria->order = 'GroupName ASC';

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
}