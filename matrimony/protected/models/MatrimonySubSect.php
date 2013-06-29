<?php

/**
 * This is the model class for table "matrimony_sub_sect".
 *
 * The followings are the available columns in table 'matrimony_sub_sect':
 * @property string $pkSubSectId
 * @property string $fkSectId
 * @property string $SubSectName
 *
 * The followings are the available model relations:
 * @property MatrimonyMembers[] $matrimonyMembers 
 * @property MatrimonySect $fkSect
 */
class MatrimonySubSect extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatrimonySubSect the static model class
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
		return 'matrimony_sub_sect';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fkSectId, SubSectName', 'required'),
			array('fkSectId', 'length', 'max'=>10),
			array('SubSectName', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkSubSectId, fkSectId, SubSectName', 'safe', 'on'=>'search'),
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
			'matrimonyMembers' => array(self::HAS_MANY, 'MatrimonyMembers', 'fkSubSect'),
			'fkSect' => array(self::BELONGS_TO, 'MatrimonySect', 'fkSectId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkSubSectId' => 'Pk Sub Sect',
			'fkSectId' => 'Sect',
			'SubSectName' => 'Sub Sect Name',
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
		$criteria->with = array('fkSect');
		$criteria->together = true;
		$criteria->compare('pkSubSectId',$this->pkSubSectId,true);
		$criteria->compare('fkSect.SectName',$this->fkSectId,true);
		$criteria->compare('SubSectName',$this->SubSectName,true);
		$criteria->order = 'fkSect.SectName, SubSectName ASC';

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
}