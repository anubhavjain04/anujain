<?php

class SearchController extends Controller
{
	public $layout='column1';
	
	

/**

	 * Displays a particular model.

	 * @param integer $id the ID of the model to be displayed

	 */

	public function actionView()
	{
		//$model = $this->loadModel();

		/*$id = $_GET['id'];

		$model = $this->loadModel($id);

		$this->pageTitle = $model['static_page_name'];

		

		////Code to show Meta title and Meta Description////// 

		

		Yii::app()->clientScript->registerMetaTag($model['static_page_meta_tag'], 'keywords');

		Yii::app()->clientScript->registerMetaTag($model['static_page_meta_description'], 'description');

		

		////Code to show Meta title and Meta Description////// 
		*/
		

		

		/*$this->render('view',array(
			'model'=>$model,
		));*/

	}
	
	public function actionSearch(){
		//$model = $this->loadModel();
		$this->render('regularSearch');
	}
	
	public function actionResults(){
		//$model = $this->loadModel();
		//Code to display the selected no of result from dropdown in Manage Static Pages
		if (isset($_GET['pageSize'])) {
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
		}
		
		$model=new MatrimonyMembers('search');		
		if(isset($_POST['Search'])){
			$search = $_POST['Search'];
			$search['status'] = 1;
			$dataProvider = $model->search($search);
			
			$this->render('searchResult',array(
				'dataProvider'=>$dataProvider,
				'searchSpec'=>$search,
			));
		}else{
			throw new CHttpException(400,'The requested search criteria is invalid.');
		}
		
	}

	
	/*public function loadModel(){
		return Search::model();
	}*/

}

?>