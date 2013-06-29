<?php

/**
 * This is the model class for table "programs".
 *
 * The followings are the available columns in table 'programs':
 * @property string $pkProgramId
 * @property string $programName
 * @property string $shortDesc
 * @property string $longDesc
 * @property string $venuePlace
 * @property string $venueDate
 * @property string $fkLevelCode
 * @property string $fkLevelTableId
 * @property integer $Status
 */
class Programs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Programs the static model class
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
		return 'programs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('programName, shortDesc, venuePlace, venueDate, fkLevelCode', 'required'),
			array('Status', 'numerical', 'integerOnly'=>true),
			array('programName', 'length', 'max'=>70),
			array('shortDesc', 'length', 'max'=>150),
			array('longDesc', 'safe'),
			array('venuePlace, fkLevelCode', 'length', 'max'=>45),
			array('fkLevelTableId', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkProgramId, programName, shortDesc, longDesc, venuePlace, venueDate, fkLevelCode, fkLevelTableId, Status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkProgramId' => 'Pk Program',
			'programName' => 'Program Name',
			'shortDesc' => 'Short Desc',
			'longDesc' => 'Long Desc',
			'venuePlace' => 'Venue Place',
			'venueDate' => 'Venue Date',
			'fkLevelCode' => 'Level',
			'fkLevelTableId' => 'Sub Level',
			'Status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($searchType)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('pkProgramId',$this->pkProgramId,true);
		$criteria->compare('programName',$this->programName,true);
		$criteria->compare('shortDesc',$this->shortDesc,true);
		$criteria->compare('longDesc',$this->longDesc,true);
		$criteria->compare('venuePlace',$this->venuePlace,true);
		$criteria->compare('venueDate',$this->venueDate,true);
		$criteria->compare('fkLevelCode',$this->fkLevelCode,true);
		$criteria->compare('fkLevelTableId',$this->fkLevelTableId,true);
		$criteria->compare('Status',$this->Status);
		
		if($searchType){
			$todayDate = date('Y-m-d', time());
			if($searchType=="forthcoming"){				
				$criteria->addCondition("venueDate>="."'".$todayDate."'");	
			}
			else if($searchType=="recent"){
				$criteria->addCondition("venueDate<"."'".$todayDate."'");
			}			
			$criteria->order = 'venueDate DESC';
			//$criteria->params=array(":venueDate"=>$todayDate);
		}

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
	
}