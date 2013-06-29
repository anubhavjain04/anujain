<?php

/**
 * This is the model class for table "advertisement".
 *
 * The followings are the available columns in table 'advertisement':
 * @property string $pkAddId
 * @property string $TitleName
 * @property string $Description
 * @property string $FooterDescription
 * @property string $WebPage
 * @property string $DateFrom
 * @property string $DateTo
 * @property string $CreatedDate
 * @property string $ModifiedDate
 * @property integer $Status
 * @property string $AddImagePath
 * @property string $WebsiteLink
 * @property string $CustomerName
 */
class Advertisement extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Advertisement the static model class
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
		return 'advertisement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TitleName, DateFrom, DateTo, CreatedDate, ModifiedDate, CustomerName', 'required'),
			array('Status', 'numerical', 'integerOnly'=>true),
			array('TitleName, WebsiteLink', 'length', 'max'=>100),
			array('Description', 'length', 'max'=>500),
			array('FooterDescription', 'length', 'max'=>150),
			array('AddImagePath, CustomerName', 'length', 'max'=>45),
			array('WebPage', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkAddId, TitleName, Description, FooterDescription, WebPage, DateFrom, DateTo, CreatedDate, ModifiedDate, Status, AddImagePath, WebsiteLink, CustomerName', 'safe', 'on'=>'search'),
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
			'pkAddId' => 'Pk Add',
			'TitleName' => 'Title Name',
			'Description' => 'Description',
			'FooterDescription' => 'Footer Description',
			'WebPage' => 'Web Page',
			'DateFrom' => 'Date From',
			'DateTo' => 'Date To',
			'CreatedDate' => 'Created Date',
			'ModifiedDate' => 'Modified Date',
			'Status' => 'Status',
			'AddImagePath' => 'Add Image Path',
			'WebsiteLink' => 'Website Link',
			'CustomerName' => 'Customer Name',
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

		$criteria->compare('pkAddId',$this->pkAddId,true);
		$criteria->compare('TitleName',$this->TitleName,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('FooterDescription',$this->FooterDescription,true);
		$criteria->compare('WebPage',$this->WebPage,true);
		$criteria->compare('DateFrom',$this->DateFrom,true);
		$criteria->compare('DateTo',$this->DateTo,true);
		$criteria->compare('CreatedDate',$this->CreatedDate,true);
		$criteria->compare('ModifiedDate',$this->ModifiedDate,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('AddImagePath',$this->AddImagePath,true);
		$criteria->compare('WebsiteLink',$this->WebsiteLink,true);
		$criteria->compare('CustomerName',$this->CustomerName,true);

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
		),
			'criteria'=>$criteria,
		));
	}
	
	public function getRandomAdvertisement(){
		$criteria=new CDbCriteria;
		$criteria->condition = ' CURDATE() between Datefrom and DateTo ';
		$criteria->order = ' RAND() ';
		$criteria->limit = 8;
		$advertisementData = $this->findAll($criteria);		
		return $advertisementData;
	}
}