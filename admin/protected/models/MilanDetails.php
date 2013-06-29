<?php

/**
 * This is the model class for table "milan_details".
 *
 * The followings are the available columns in table 'milan_details':
 * @property string $pkRecId
 * @property string $fkMemberId
 * @property string $fkBranchId
 *
 * The followings are the available model relations:
 * @property BranchMaster $fkBranch
 * @property MemberDetails $fkMember
 */
class MilanDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MilanDetails the static model class
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
		return 'milan_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('fkMemberId, fkBranchId', 'required'),
		array('fkMemberId, fkBranchId', 'length', 'max'=>10),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('pkRecId, fkMemberId, fkBranchId', 'safe', 'on'=>'search'),
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
			'fkBranch' => array(self::BELONGS_TO, 'BranchMaster', 'fkBranchId'),
			'fkMember' => array(self::BELONGS_TO, 'MemberDetails', 'fkMemberId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkRecId' => 'Pk Rec',
			'fkMemberId' => 'Member Name',
			'fkBranchId' => 'Branch Name',
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
		$criteria->with = array('fkMember','fkBranch');
		$criteria->together = true;
		$criteria->compare('pkRecId',$this->pkRecId,true);
		//$criteria->compare('fkMemberId',$this->fkMemberId,true);
		$criteria->compare( 'fkMember.MemberName', $this->fkMemberId, true );
		
		//$criteria->compare('fkBranchId',$this->fkBranchId,true);
		$criteria->compare('fkBranch.BranchName',$this->fkBranchId,true);

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
		),
			'criteria'=>$criteria,
		));
	}
}