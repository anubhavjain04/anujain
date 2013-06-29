<?php

class User extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_user':
	 * @var integer $id
	 * @var string $username
	 * @var string $password
	 * @var string $salt
	 * @var string $email
	 * @var string $profile
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
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
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('pkLoginId, UserId, Password, Type, Status, CreationDate', 'safe', 'on'=>'search'),
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
			'memberDetails' => array(self::HAS_MANY, 'MemberDetails', 'fkLoginId'),
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
		);
	}

	/**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return $this->hashPassword($password,$this->getSalt())===$this->Password;
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @param string salt
	 * @return string hash
	 */
	public function hashPassword($password,$salt)
	{
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