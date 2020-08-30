<?php

/**
 * This is the model class for table "branch_master".
 *
 * The followings are the available columns in table 'branch_master':
 * @property string $pkBranchId
 * @property string $BranchName
 * @property string $BranchCode
 * @property string $City
 * @property string $District
 * @property string $State
 * @property integer $Status
 * @property string $fkZoneId
 *
 * The followings are the available model relations:
 * @property ZoneMaster $fkZone
 * @property MilanDetails[] $milanDetails
 */
class BranchMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BranchMaster the static model class
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
		return 'branch_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('BranchName, BranchCode, City, District, State, fkZoneId', 'required'),
		array('Status, RunningStatus', 'numerical', 'integerOnly'=>true),
		array('BranchName', 'length', 'max'=>100),
		array('BranchCode, fkZoneId', 'length', 'max'=>10),
		array('City, District, State', 'length', 'max'=>45),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('pkBranchId, BranchName, BranchCode, City, District, State, Status, fkZoneId, RunningStatus', 'safe', 'on'=>'search'),
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
			'milanDetails' => array(self::HAS_MANY, 'MilanDetails', 'fkBranchId'),
		);
	}

	/**
	 * @return array scope definitions.
	 */
	public function scopes()
	{
		return array(
			'published'=>array(
				'condition'=>'Status=1',
			),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkBranchId' => 'Pk Branch',
			'BranchName' => 'Branch Name',
			'BranchCode' => 'Branch Code',
			'City' => 'City',
			'District' => 'District',
			'State' => 'State',
			'Status' => 'Status',
			'fkZoneId' => 'Zone No.',
			'RunningStatus' => 'Running Status'
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
		$criteria->with = array('fkZone');
		$criteria->together = true;
		$criteria->compare('pkBranchId',$this->pkBranchId,true);
		$criteria->compare('BranchName',$this->BranchName,true);
		$criteria->compare('BranchCode',$this->BranchCode,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('District',$this->District,true);
		$criteria->compare('State',$this->State,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('RunningStatus',$this->RunningStatus);
		
		//$criteria->compare('fkZoneId',$this->fkZoneId,true);
		$criteria->compare('fkZone.ZoneCode',$this->fkZoneId,true);

		$criteria->order = 'fkZone.ZoneCode ASC, BranchName ASC';
		

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
		),
			'criteria'=>$criteria,
		));
	}
}