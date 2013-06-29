<?php

/**
 * This is the model class for table "login_master".
 *
 * The followings are the available columns in table 'login_master':
 * @property string $pkLoginId
 * @property string $UserId
 * @property string $Password
 * @property string $Type
 * @property integer $Status
 * @property string $CreationDate
 * @property string $fkgroupId

 *
 * The followings are the available model relations:
 * @property FunctionGroupMaster $fkgroup
 * @property MemberDetails[] $memberDetails
 * @property UserFunctionAuth[] $userFunctionAuths
 */
class LoginMaster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LoginMaster the static model class
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
		return 'login_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('UserId, Password, Type, CreationDate', 'required'),
		array('Status', 'numerical', 'integerOnly'=>true),
		array('UserId, Password', 'length', 'max'=>45),
		array('Type', 'length', 'max'=>3),
		array('fkgroupId', 'length', 'max'=>10),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('pkLoginId, UserId, Password, Type, Status, CreationDate, fkgroupId', 'safe', 'on'=>'search'),
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
			'fkgroup' => array(self::BELONGS_TO, 'FunctionGroupMaster', 'fkgroupId'),
			'memberDetails' => array(self::HAS_MANY, 'MemberDetails', 'fkLoginId'),
			'userFunctionAuths' => array(self::HAS_MANY, 'UserFunctionAuth', 'fkuserId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkLoginId' => 'Pk Login',
			'UserId' => 'User',
			'Password' => 'Password',
			'Type' => 'Type',
			'Status' => 'Status',
			'CreationDate' => 'Creation Date',
			'fkgroupId' => 'Fkgroup',
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

		$criteria->compare('pkLoginId',$this->pkLoginId,true);
		$criteria->compare('UserId',$this->UserId,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Type',$this->Type,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('CreationDate',$this->CreationDate,true);
		$criteria->compare('fkgroupId',$this->fkgroupId,true);


		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
		),
			'criteria'=>$criteria,
		));
	}

	/**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return $this->hashPassword($password)===$this->Password;
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @param string salt
	 * @return string hash
	 */
	public function hashPassword($password)
	{
		$salt = $this->getSalt();
		$newpass = md5($password);
		return md5($salt.$newpass);
	}
	
	

	/**
	 * Generates a salt that can be used to generate a password hash.
	 * @return string the salt
	 */
	/*protected function generateSalt()
	 {
		return uniqid('',true);
		}*/

	protected function getSalt(){
		return '98b206599478ce621m204afd9cf91761';
	}
}