<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property string $pkNewsId
 * @property string $title
 * @property string $news
 * @property string $newsDate
 * @property string $newsOrder
 * @property integer $status
 * @property integer $newsType
 * @property string $city
 */
class News extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, newsDate, status, newsType, city', 'required'),
			array('status, newsType', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('newsOrder', 'length', 'max'=>10),
			array('city', 'length', 'max'=>45),
			array('news', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkNewsId, title, news, newsDate, newsOrder, status, newsType, city', 'safe', 'on'=>'search'),
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
			'pkNewsId' => 'Pk News',
			'title' => 'Title',
			'news' => 'News',
			'newsDate' => 'News Date',
			'newsOrder' => 'News Order',
			'status' => 'Status',
			'newsType' => 'News Type',
			'city' => 'City',
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

		$criteria->compare('pkNewsId',$this->pkNewsId,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('news',$this->news,true);
		$criteria->compare('newsDate',$this->newsDate,true);
		$criteria->compare('newsOrder',$this->newsOrder,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('newsType',$this->newsType);
		$criteria->compare('city',$this->city,true);

		$criteria->order = ' newsDate DESC, newsOrder ASC ';


		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
}