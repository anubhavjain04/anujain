<?php
class StaticPages extends CActiveRecord
{
		
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
	
	//this is the condition to show only published records
	public function scopes()
    {
        return array(
            'published'=>array(
                'condition'=>'static_page_status=1',
            ),
        );
    }

}


?>