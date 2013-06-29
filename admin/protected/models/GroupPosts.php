<?php

/**
 * This is the model class for table "group_posts".
 *
 * The followings are the available columns in table 'group_posts':
 * @property string $pkGroupPostId
 * @property string $fkGroupId
 * @property string $fkPostId
 * @property integer $Status
 *
 * The followings are the available model relations:
 * @property GroupMaster $fkGroup
 * @property PostMaster $fkPost
 */
class GroupPosts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GroupPosts the static model class
	 */
	public $level_search;
	 
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'group_posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fkGroupId, fkPostId', 'required'),
			array('Status', 'numerical', 'integerOnly'=>true),
			//array('fkGroupId, fkPostId', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkGroupPostId, level_search, fkGroupId, fkPostId, Status', 'safe', 'on'=>'search'),
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
			'fkGroup' => array(self::BELONGS_TO, 'GroupMaster', 'fkGroupId'),
			'fkPost' => array(self::BELONGS_TO, 'PostMaster', 'fkPostId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkGroupPostId' => 'Pk Group Post',
			'fkGroupId' => 'Post-Group Name',
			'fkPostId' => 'Post Name',
			'Status' => 'Status',
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
		$criteria->with = array('fkGroup','fkPost');
		$criteria->together = true;
		$criteria->compare('pkGroupPostId',$this->pkGroupPostId,true);
		//$criteria->compare('fkGroupId',$this->fkGroupId,true);
		$criteria->compare('fkGroup.GroupName',$this->fkGroupId,true);
		//$criteria->compare('fkPostId',$this->fkPostId,true);
		$criteria->compare('fkPost.PostName',$this->fkPostId,true);
		$criteria->compare( 'fkPost.LevelCode', $this->level_search, true );
		$criteria->compare('Status',$this->Status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}