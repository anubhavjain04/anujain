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
	
	public function init(){
		if(!isset(Yii::app()->session['tempImgName'])){
			$path = Yii::app()->params['tempPath'];
			$files1 = scandir($path);
			for($i=0;$i<count($files1); $i++){
				if($files1[$i]!="." && $files1[$i]!=".."){
					$file = $path."/".$files1[$i];
					unlink($file);
				}
			}
		}
		
	}
	
	public function getPager($dataProvider){
		if(isset($dataProvider)){
			$pager['dataList'] = $dataProvider->getData();
			$pager['count'] = $dataProvider->getItemCount();
			$pager['total'] = $dataProvider->getTotalItemCount();
			//$pager['pid'] = $dataProvider->getId();
			$pagination = $dataProvider->getPagination();
			$pager['start'] = $pagination->currentPage*$pagination->pageSize+1;
			$pager['end'] = $pager['start']+$pager['count']-1;
			if($pager['end']>$pager['total'])
			{
				$pager['end']=$pager['total'];
				$pager['start']=$pager['end']-$pager['count']+1;
			}
			$pager['pageSize']=$pagination->pageSize;
			$pager['currentPage'] = $pagination->currentPage+1;
			$pager['pageCount'] = ceil($pager['total']/$pager['pageSize']);
			return $pager; 
		}else{
			throw new CHttpException(400,'The requested search criteria is invalid.');
		}
	}
	
	public function echoObjectAsJSON($data){
		header('Content-type: application/json');
		echo CJSON::encode($data);
		Yii::app()->end();
	}
	 
	public function AdminName($id)
	{
		/*$connection=Yii::app()->db;
		$query = "select * from login_master where pkLoginId='$id'";
		$command=$connection->createCommand($query);
		$command->execute();
		$rows=$command->queryRow();
		return $rows;*/
	}

}