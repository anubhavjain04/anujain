<?php

/**
 * This is the model class for table "magazine_type".
 *
 * The followings are the available columns in table 'magazine_type':
 * @property string $pkMagTypeId
 * @property string $MagazineType
 * @property string $TypeCode
 * @property integer $Status
 *
 * The followings are the available model relations:
 * @property Magazine[] $magazines
 */
class MagazineType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MagazineType the static model class
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
		return 'magazine_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MagazineType, TypeCode, Status', 'required'),
			array('Status', 'numerical', 'integerOnly'=>true),
			array('MagazineType, TypeCode', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkMagTypeId, MagazineType, TypeCode, Status', 'safe', 'on'=>'search'),
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
			'magazines' => array(self::HAS_MANY, 'Magazine', 'fkMagTypeId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkMagTypeId' => 'Pk Mag Type',
			'MagazineType' => 'Magazine Type',
			'TypeCode' => 'Type Code',
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

		$criteria->compare('pkMagTypeId',$this->pkMagTypeId,true);
		$criteria->compare('MagazineType',$this->MagazineType,true);
		$criteria->compare('TypeCode',$this->TypeCode,true);
		$criteria->compare('Status',$this->Status);

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
		),
			'criteria'=>$criteria,
		));
	}
}