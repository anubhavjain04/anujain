<?php

/**
 * This is the model class for table "post_master".
 *
 * The followings are the available columns in table 'post_master':
 * @property string $pkPostId
 * @property string $PostName
 * @property string $PostCode
 * @property integer $Status
 * @property string $LevelCode
 *
 * The followings are the available model relations:
 * @property LevelPosts[] $levelPosts
 * @property MemberPost[] $memberPosts
 */
class PostMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PostMaster the static model class
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
		return 'post_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PostName, PostCode', 'required'),
			array('Status', 'numerical', 'integerOnly'=>true),
			array('PostName, PostCode, LevelCode', 'length', 'max'=>45),
			array('PostOrder', 'length', 'max'=>10),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkPostId, PostName, PostCode, Status, LevelCode, PostOrder', 'safe', 'on'=>'search'),
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
			'levelPosts' => array(self::HAS_MANY, 'LevelPosts', 'fkPostId'),
			'memberPosts' => array(self::HAS_MANY, 'MemberPost', 'fkPostId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkPostId' => 'Pk Post',
			'PostName' => 'Post Name',
			'PostCode' => 'Post Code',
			'Status' => 'Status',
			'LevelCode' => 'Level Code',
			'PostOrder' => 'Post Order',
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

		$criteria->compare('pkPostId',$this->pkPostId,true);
		$criteria->compare('PostName',$this->PostName,true);
		$criteria->compare('PostCode',$this->PostCode,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('LevelCode',$this->LevelCode,true);
		$criteria->compare('PostOrder',$this->PostOrder,true);
		
		$criteria->order = 'LevelCode,PostOrder ASC';		

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
}