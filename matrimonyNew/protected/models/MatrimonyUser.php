<?php

/**
 * This is the model class for table "matrimony_user".
 *
 * The followings are the available columns in table 'matrimony_user':
 * @property string $pkUserId
 * @property string $EmailID
 * @property string $Password
 * @property string $Type
 * @property integer $Status
 * @property string $ActivationCode
 * @property string $CreatedDate
 * @property string $ModifiedDate
 * @property string $ResetPassword
 * @property string $Comments
 * @property string $LastLoginDate
 */
class MatrimonyUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MatrimonyUser the static model class
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
		return 'matrimony_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EmailID, Password, Type, Status, CreatedDate, ModifiedDate', 'required'),
			array('Status', 'numerical', 'integerOnly'=>true),
			array('EmailID', 'length', 'max'=>100),
			array('Password, ActivationCode, ResetPassword', 'length', 'max'=>45),
			array('Type', 'length', 'max'=>3),
			array('Comments', 'length', 'max'=>200),
			array('LastLoginDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pkUserId, EmailID, Password, Type, Status, ActivationCode, CreatedDate, ModifiedDate, ResetPassword, Comments, LastLoginDate', 'safe', 'on'=>'search'),
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
			'matrimonyMembers' => array(self::HAS_MANY, 'MatrimonyMembers', 'fkLoginId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkUserId' => 'Pk User',
			'EmailID' => 'Email',
			'Password' => 'Password',
			'Type' => 'Type',
			'Status' => 'Status',
			'ActivationCode' => 'Activation Code',
			'CreatedDate' => 'Created Date',
			'ModifiedDate' => 'Modified Date',
			'ResetPassword' => 'Reset Password',
			'Comments' => 'Comments',
			'LastLoginDate' => 'Last Login Date',
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

		$criteria->compare('pkUserId',$this->pkUserId,true);
		$criteria->compare('EmailID',$this->EmailID,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Type',$this->Type,true);
		$criteria->compare('Status',$this->Status);
		$criteria->compare('ActivationCode',$this->ActivationCode,true);
		$criteria->compare('CreatedDate',$this->CreatedDate,true);
		$criteria->compare('ModifiedDate',$this->ModifiedDate,true);
		$criteria->compare('ResetPassword',$this->ResetPassword,true);
		$criteria->compare('Comments',$this->Comments,true);
		$criteria->compare('LastLoginDate',$this->LastLoginDate,true);

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

	public function resetHashPassword($datetimeSalt)
	{
		$salt = $this->getResetSalt();
		$newpass = md5($this->Password);
		return md5($salt.$datetimeSalt.$newpass);
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

	protected function getResetSalt(){
		return '9askd$%?478ce6df8r489df93n03@&k*';
	}
}