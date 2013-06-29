<?php

/**
 * This is the model class for table "zone_members".
 *
 * The followings are the available columns in table 'zone_members':
 * @property string $pkZoneMember
 * @property string $fkZoneId
 * @property string $fkMemberId
 * @property integer $Status
 *
 * The followings are the available model relations:
 * @property ZoneMaster $fkZone
 * @property MemberDetails $fkMember
 */
class ZoneMembers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ZoneMembers the static model class
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
		return 'zone_members';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fkZoneId, fkMemberId', 'required'),
			array('Status', 'numerical', 'integerOnly'=>true),
			array('fkZoneId, fkMemberId', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkZoneMember, fkZoneId, fkMemberId, Status', 'safe', 'on'=>'search'),
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
			'fkZone' => array(self::BELONGS_TO, 'ZoneMaster', 'fkZoneId'),
			'fkMember' => array(self::BELONGS_TO, 'MemberDetails', 'fkMemberId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkZoneMember' => 'Zone Member ID',
			'fkZoneId' => 'Zone',
			'fkMemberId' => 'Member',
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
		$criteria->with = array('fkMember','fkZone');
		$criteria->together = true;
		$criteria->compare('pkZoneMember',$this->pkZoneMember,true);
		//$criteria->compare('fkZoneId',$this->fkZoneId,true);
		$zonecode = strtolower($this->fkZoneId);
		$criteria->compare('fkZone.ZoneCode',trim(str_replace('-','',str_replace('zone','',$zonecode))),true);
		//$criteria->compare('fkMemberId',$this->fkMemberId,true);
		$criteria->compare( 'fkMember.MemberName', $this->fkMemberId, true );
		$criteria->compare('Status',$this->Status);

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
}