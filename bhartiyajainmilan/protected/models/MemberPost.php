<?php

/**
 * This is the model class for table "member_post".
 *
 * The followings are the available columns in table 'member_post':
 * @property string $pkMemPostId
 * @property string $fkMemberId
 * @property string $fkPostId
 * @property integer $Status
 * @property string $AssignDate
 * @property string $TillDate
 *
 * The followings are the available model relations:
 * @property MemberDetails $fkMember
 * @property PostMaster $fkPost
 */
class MemberPost extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MemberPost the static model class
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
		return 'member_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('fkMemberId, fkPostId, AssignDate', 'required'),
		array('Status', 'numerical', 'integerOnly'=>true),
		array('fkMemberId, fkPostId', 'length', 'max'=>10),
		array('TillDate', 'safe'),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('pkMemPostId, fkMemberId, fkPostId, Status, AssignDate, TillDate', 'safe', 'on'=>'search'),
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
			'fkMember' => array(self::BELONGS_TO, 'MemberDetails', 'fkMemberId'),
			'fkPost' => array(self::BELONGS_TO, 'PostMaster', 'fkPostId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkMemPostId' => 'Pk Mem Post',
			'fkMemberId' => 'Fk Member',
			'fkPostId' => 'Fk Post',
			'Status' => 'Status',
			'AssignDate' => 'Assign Date',
			'TillDate' => 'Till Date',
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

		$criteria->compare('pkMemPostId',$this->pkMemPostId,true);
		$criteria->compare('fkMemberId',$this->fkMemberId,true);
		$criteria->compare('fkPostId',$this->fkPostId,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('AssignDate',$this->AssignDate,true);
		$criteria->compare('TillDate',$this->TillDate,true);

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
		),
			'criteria'=>$criteria,
		));
	}
}