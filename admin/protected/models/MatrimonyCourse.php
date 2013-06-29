<?php

/**
 * This is the model class for table "matrimony_course".
 *
 * The followings are the available columns in table 'matrimony_course':
 * @property string $pkCourseId
 * @property string $fkCourseGroupId
 * @property string $CourseName
 *
 * The followings are the available model relations:
 * @property MatrimonyCourseGroup $fkCourseGroup
 * @property MatrimonyMembers[] $matrimonyMembers
 */
class MatrimonyCourse extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatrimonyCourse the static model class
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
		return 'matrimony_course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fkCourseGroupId, CourseName', 'required'),
			array('fkCourseGroupId', 'length', 'max'=>10),
			array('CourseName', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkCourseId, fkCourseGroupId, CourseName', 'safe', 'on'=>'search'),
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
			'fkCourseGroup' => array(self::BELONGS_TO, 'MatrimonyCourseGroup', 'fkCourseGroupId'),
			'matrimonyMembers' => array(self::HAS_MANY, 'MatrimonyMembers', 'fkEducation'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkCourseId' => 'Pk Course',
			'fkCourseGroupId' => 'Course Group',
			'CourseName' => 'Course Name',
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
		$criteria->with = array('fkCourseGroup');
		$criteria->together = true;
		$criteria->compare('pkCourseId',$this->pkCourseId,true);
		$criteria->compare('fkCourseGroup.GroupName',$this->fkCourseGroupId,true);
		$criteria->compare('CourseName',$this->CourseName,true);
		
		$criteria->order = 'fkCourseGroup.GroupName, CourseName ASC';

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
}