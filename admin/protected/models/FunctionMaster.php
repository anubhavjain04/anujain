<?php

/**
 * This is the model class for table "function_master".
 *
 * The followings are the available columns in table 'function_master':
 * @property string $pkfunctionId
 * @property string $functionName
 * @property string $shortDesc
 * @property string $longDesc
 * @property integer $status
 * @property string $functionCode
 * @property string $parentFunctionId
 *
 * The followings are the available model relations:
 * @property FunctionGroupAuth[] $functionGroupAuths
 * @property UserFunctionAuth[] $userFunctionAuths
 */
class FunctionMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FunctionMaster the static model class
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
		return 'function_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('functionName, functionCode', 'required'),
		array('status', 'numerical', 'integerOnly'=>true),
		array('functionName', 'length', 'max'=>45),
		array('shortDesc', 'length', 'max'=>50),
		array('longDesc', 'length', 'max'=>100),
		array('functionCode', 'length', 'max'=>20),
		array('parentFunctionId', 'length', 'max'=>10),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('pkfunctionId, functionName, shortDesc, longDesc, status, functionCode, parentFunctionId', 'safe', 'on'=>'search'),
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
			'functionGroupAuths' => array(self::HAS_MANY, 'FunctionGroupAuth', 'fkfunctionId'),
			'userFunctionAuths' => array(self::HAS_MANY, 'UserFunctionAuth', 'fkfunctionId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkfunctionId' => 'Pkfunction',
			'functionName' => 'Right\'s Name',
			'shortDesc' => 'Short Desc',
			'longDesc' => 'Long Desc',
			'status' => 'Status',
			'functionCode' => 'Right\'s Code',
			'parentFunctionId' => 'Parent Function',
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

		$criteria->compare('pkfunctionId',$this->pkfunctionId,true);
		$criteria->compare('functionName',$this->functionName,true);
		$criteria->compare('shortDesc',$this->shortDesc,true);
		$criteria->compare('longDesc',$this->longDesc,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('functionCode',$this->functionCode,true);
		$criteria->compare('parentFunctionId',$this->parentFunctionId,true);

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
		),
			'criteria'=>$criteria,
		));
	}

	/**
	 * Retrieves a function code.
	 */
	public function getFunctionCode($id)
	{
		$connection=Yii::app()->db;
		$query = "select functionCode from function_master where pkfunctionId='$id'";
		$command=$connection->createCommand($query);
		$command->execute();
		$rows=$command->queryRow();
		if(count($rows)>0){
			return $rows['functionCode'];
		}else{
			return 'Parent';
		}
	}
}