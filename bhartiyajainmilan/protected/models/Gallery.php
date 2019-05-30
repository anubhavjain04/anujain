<?php

/**
 * This is the model class for table "gallery".
 *
 * The followings are the available columns in table 'gallery':
 * @property string $pkGalleryId
 * @property string $title
 * @property string $shortDesc
 * @property string $longDesc
 * @property string $date
 * @property integer $status
 * @property integer $type
 * @property string $folderPath
 */
class Gallery extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Gallery the static model class
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
		return 'gallery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, shortDesc, date', 'required'),
			array('status, type', 'numerical', 'integerOnly'=>true),
			array('title, folderPath', 'length', 'max'=>100),
			array('shortDesc', 'length', 'max'=>150),
			array('longDesc', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkGalleryId, title, shortDesc, longDesc, date, status, type, folderPath', 'safe', 'on'=>'search'),
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
			'pkGalleryId' => 'Pk Gallery',
			'title' => 'Title',
			'shortDesc' => 'Short Desc',
			'longDesc' => 'Long Desc',
			'date' => 'Date',
			'status' => 'Status',
			'type' => 'Type',
			'folderPath' => 'Folder Path',
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

		$criteria->compare('pkGalleryId',$this->pkGalleryId,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('shortDesc',$this->shortDesc,true);
		$criteria->compare('longDesc',$this->longDesc,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('folderPath',$this->folderPath,true);

		if($searchType){
			$criteria->compare('type', $searchType);
			$criteria->order = 'date DESC';
		}

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
}