<?php

/**
 * This is the model class for table "magazine".
 *
 * The followings are the available columns in table 'magazine':
 * @property string $pkMagazineId
 * @property string $MagazineName
 * @property string $MagzineDate
 * @property string $Path
 * @property string $fkMagTypeId
 * @property integer $Status
 * @property string $Type
 *
 * The followings are the available model relations:
 * @property MagazineType $fkMagType
 */
class Magazine extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Magazine the static model class
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
		return 'magazine';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MagazineName, fkMagTypeId, Status', 'required'),
			array('Status', 'numerical', 'integerOnly'=>true),
			array('MagazineName, Path', 'length', 'max'=>100),
			array('fkMagTypeId', 'length', 'max'=>10),
			array('Type', 'length', 'max'=>45),
			array('MagzineDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkMagazineId, MagazineName, MagzineDate, Path, fkMagTypeId, Status, Type', 'safe', 'on'=>'search'),
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
			'fkMagType' => array(self::BELONGS_TO, 'MagazineType', 'fkMagTypeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkMagazineId' => 'Pk Magazine',
			'MagazineName' => 'Magazine Name',
			'MagzineDate' => 'Magzine Date',
			'Path' => 'Path',
			'fkMagTypeId' => 'Magazine Type',
			'Status' => 'Status',
			'Type' => 'Sub Level',
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

		$criteria->compare('pkMagazineId',$this->pkMagazineId,true);
		$criteria->compare('MagazineName',$this->MagazineName,true);
		$criteria->compare('MagzineDate',$this->MagzineDate,true);
		$criteria->compare('Path',$this->Path,true);
		$criteria->compare('fkMagTypeId',$this->fkMagTypeId,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('Type',$this->Type,true);

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
		),
			'criteria'=>$criteria,
		));
	}
}