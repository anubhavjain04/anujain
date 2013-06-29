<?php

/**
 * This is the model class for table "member_details".
 *
 * The followings are the available columns in table 'member_details':
 * @property string $pkMemberId
 * @property string $FName
 * @property string $MName
 * @property string $LName
 * @property string $DOB
 * @property string $Sex
 * @property integer $MaritalStatus
 * @property string $SpouseName
 * @property string $MarriageDate
 * @property string $HAddress1
 * @property string $HAddress2
 * @property string $HAddress3
 * @property string $HContactNo
 * @property integer $OccType
 * @property string $Occupation
 * @property string $OAddress1
 * @property string $OAddress2
 * @property string $OAddress3
 * @property string $FatherName
 * @property string $MotherName
 * @property string $City
 * @property string $District
 * @property string $State
 * @property string $Country
 * @property string $OccContactNo
 * @property string $PersonalNo
 * @property string $MemberCode
 * @property string $fkLoginId
 * @property string $EmailId
 *
 * The followings are the available model relations:
 * @property LoginMaster $fkLogin
 * @property MemberPost[] $memberPosts
 * @property MilanDetails[] $milanDetails
 */
class MemberDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MemberDetails the static model class
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
		return 'member_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		array('MemberName, Sex, MemberCode', 'required'),
		array('MaritalStatus, OccType', 'numerical', 'integerOnly'=>true),
		array('HAddress1, HAddress2, HAddress3, HContactNo, Occupation, OAddress1, OAddress2, OAddress3, City, District, State, Country, OccContactNo, PersonalNo, MemberCode', 'length', 'max'=>45),
		array('MemberName', 'length', 'max'=>100),
		array('Sex', 'length', 'max'=>6),
		array('SpouseName, FatherName, MotherName, PhotoPath', 'length', 'max'=>100),
		array('fkLoginId', 'length', 'max'=>10),
		array('EmailId', 'length', 'max'=>50),
		array('DOB, MarriageDate', 'safe'),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('pkMemberId, MemberName, DOB, Sex, MaritalStatus, SpouseName, MarriageDate, HAddress1, HAddress2, HAddress3, HContactNo, OccType, Occupation, OAddress1, OAddress2, OAddress3, FatherName, MotherName, City, District, State, Country, OccContactNo, PersonalNo, MemberCode, fkLoginId, EmailId, PhotoPath', 'safe', 'on'=>'search'),
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
			'fkLogin' => array(self::BELONGS_TO, 'LoginMaster', 'fkLoginId'),
			'memberPosts' => array(self::HAS_MANY, 'MemberPost', 'fkMemberId'),
			'milanDetails' => array(self::HAS_MANY, 'MilanDetails', 'fkMemberId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pkMemberId' => 'Pk Member',
			'MemberName' => 'Member Name',
			'DOB' => 'Dob',
			'Sex' => 'Sex',
			'MaritalStatus' => 'Marital Status',
			'SpouseName' => 'Spouse Name',
			'MarriageDate' => 'Marriage Date',
			'HAddress1' => 'Haddress1',
			'HAddress2' => 'Haddress2',
			'HAddress3' => 'Haddress3',
			'HContactNo' => 'Hcontact No',
			'OccType' => 'Occ Type',
			'Occupation' => 'Occupation',
			'OAddress1' => 'Oaddress1',
			'OAddress2' => 'Oaddress2',
			'OAddress3' => 'Oaddress3',
			'FatherName' => 'Father Name',
			'MotherName' => 'Mother Name',
			'City' => 'City',
			'District' => 'District',
			'State' => 'State',
			'Country' => 'Country',
			'OccContactNo' => 'Occ Contact No',
			'PersonalNo' => 'Personal No',
			'MemberCode' => 'Member Code',
			'fkLoginId' => 'Fk Login',
			'EmailId' => 'Email',
			'PhotoPath' => 'PhotoPath',
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

		$criteria->compare('pkMemberId',$this->pkMemberId,true);
		$criteria->compare('MemberName',$this->MemberName,true);
		$criteria->compare('DOB',$this->DOB,true);
		$criteria->compare('Sex',$this->Sex,true);
		$criteria->compare('MaritalStatus',$this->MaritalStatus);
		$criteria->compare('SpouseName',$this->SpouseName,true);
		$criteria->compare('MarriageDate',$this->MarriageDate,true);
		$criteria->compare('HAddress1',$this->HAddress1,true);
		$criteria->compare('HAddress2',$this->HAddress2,true);
		$criteria->compare('HAddress3',$this->HAddress3,true);
		$criteria->compare('HContactNo',$this->HContactNo,true);
		$criteria->compare('OccType',$this->OccType);
		$criteria->compare('Occupation',$this->Occupation,true);
		$criteria->compare('OAddress1',$this->OAddress1,true);
		$criteria->compare('OAddress2',$this->OAddress2,true);
		$criteria->compare('OAddress3',$this->OAddress3,true);
		$criteria->compare('FatherName',$this->FatherName,true);
		$criteria->compare('MotherName',$this->MotherName,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('District',$this->District,true);
		$criteria->compare('State',$this->State,true);
		$criteria->compare('Country',$this->Country,true);
		$criteria->compare('OccContactNo',$this->OccContactNo,true);
		$criteria->compare('PersonalNo',$this->PersonalNo,true);
		$criteria->compare('MemberCode',$this->MemberCode,true);
		$criteria->compare('fkLoginId',$this->fkLoginId,true);
		$criteria->compare('EmailId',$this->EmailId,true);
		$criteria->compare('PhotoPath',$this->PhotoPath,true);
		
		$criteria->order = ' (MemberCode*1) ';

		return new CActiveDataProvider(get_class($this), array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
		),
			'criteria'=>$criteria,
		));
	}
	
	public function searchTrusti($type)
	{
		if($type && $type=='FOUNDER'){
			$type = 'FFONDTRUSTI';
		}else{
			$type = 'FAAJTRUSTI';
		}
		
		$connection=Yii::app()->db;
		$query = "SELECT t.*,member_post.AssignDate,member_post.TillDate,post_master.PostName,member_post.`Order` as FounderOrder FROM member_details t"
					 ." inner join member_post on (t.pkMemberId=member_post.fkMemberId) inner join post_master on (post_master.pkPostId=member_post.fkPostId) inner join group_posts on (post_master.pkPostId=group_posts.fkPostId) inner join group_master on (group_master.pkGroupId=group_posts.fkGroupId)"
					 ." where member_post.`Status`=1 and post_master.`Status`=1 and group_posts.`Status`=1 and post_master.LevelCode='FOUNDATION' and group_master.GroupCode='".$type."'"
					 ." order by post_master.PostOrder,member_post.`Order`";
		$command=$connection->createCommand($query);
		$founderTrusti = $command->queryAll();	
		
		return $dataProvider=new CArrayDataProvider($founderTrusti, array(
			'pagination'=>array(
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			 ),
		));
	}
	
	
}