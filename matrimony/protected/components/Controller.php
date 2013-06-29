<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to 'column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	/**
	 * this function gives a username of cretaer either restaurent or coupon.
	 */
	/**
	 * Retrieves restaurent by id.
	 */
	public function init(){
		/*if(!isset(Yii::app()->session['tempImgName'])){
			$path = "..".Yii::app()->params['tempPath'];
			$files1 = scandir($path);
			for($i=0;$i<count($files1); $i++){
				if($files1[$i]!="." && $files1[$i]!=".."){
					$file = $path."/".$files1[$i];
					unlink($file);
				}
			}
		}*/
		
	}
	 
	public function AdminName($id)
	{
		$connection=Yii::app()->db;
		$query = "select * from login_master where pkLoginId='$id'";
		$command=$connection->createCommand($query);
		$command->execute();
		$rows=$command->queryRow();
		return $rows;
	}

}