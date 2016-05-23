<?php

/**
 * This is the model class for table "matrimony_sect".
 *
 * The followings are the available columns in table 'matrimony_sect':
 * @property string $pkSectId
 * @property string $SectName
 *
 * The followings are the available model relations:
 * @property MatrimonyMembers[] $matrimonyMembers 
 * @property MatrimonySubSect[] $matrimonySubSects
 */
class MatrimonySect extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatrimonySect the static model class
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
		return 'matrimony_sect';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SectName', 'required'),
			array('SectName', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkSectId, SectName', 'safe', 'on'=>'search'),
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
			'matrimonyMembers' => array(self::HAS_MANY, 'MatrimonyMembers', 'fkSect'),
			'matrimonySubSects' => array(self::HAS_MANY, 'MatrimonySubSect', 'fkSectId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkSectId' => 'Pk Sect',
			'SectName' => 'Sect Name',
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

		$criteria->compare('pkSectId',$this->pkSectId,true);
		$criteria->compare('SectName',$this->SectName,true);
		$criteria->order = 'SectName ASC';
		
		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
}