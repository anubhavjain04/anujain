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
		$this->render('search');
	}
	
	public function actionResults(){
		//Code to display the selected no of result from dropdown in Manage Static Pages
		if (isset($_POST['pageSize'])) {
			Yii::app()->user->setState('pageSize',(int)$_POST['pageSize']);
			unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
		}
		if (isset($_POST['page'])) {
			$_GET['MatrimonyMembers_page']=(int)$_POST['page'];	
			unset($_POST['page']);
		}
		$model=new MatrimonyMembers('search');
		if(isset($_POST['Search'])){			
			$search = CJSON::decode($_POST['Search']);
			$search['status'] = 1;			
			$dataProvider = $model->search($search);
			$pager = $this->getPager($dataProvider);
			
			$dataList = $pager['dataList'];
			$plainDataList = array();
			for($i=0; $i<count($dataList); $i++){
				$plainData = CJSON::decode(CJSON::encode($dataList[$i]));
				$plainData['age'] = date('Y',time()) - date('Y',strtotime($dataList[$i]['DOB']));
				$plainData['sectName'] = $dataList[$i]->fkSect0->SectName;
				$plainData['subSectName'] = $dataList[$i]->fkSubSect0->SubSectName;
				$plainData['country'] = $dataList[$i]->fkCountryLivingIn0->CountryName;
				$plainData['state'] = $dataList[$i]->fkResidingState0->StateName;
				$plainData['education'] = $dataList[$i]->fkEducation0->CourseName;
				$plainData['occupation'] = $dataList[$i]->occupation->OccupationName;
				array_push($plainDataList, $plainData);
			}
			$pager['dataList'] = $plainDataList;
			echo CJSON::encode($pager);
	
		}else{
			throw new CHttpException(400,'The requested search criteria is invalid.');
		}
		
	}
	
	public function actionMember($id){
		if($id){
			$criteria=new CDbCriteria;
			$criteria->condition='MemberCode=:MemberCode';
			$criteria->params=array(':MemberCode'=>$id);
			$member = MatrimonyMembers::model()->find($criteria);
			$jsonMember = CJSON::decode(CJSON::encode($member));
			$jsonMember['age'] = date('Y',time()) - date('Y',strtotime($member['DOB']));
			$jsonMember['sectName'] = $member->fkSect0->SectName;
			$jsonMember['subSectName'] = $member->fkSubSect0->SubSectName;
			$jsonMember['country'] = $member->fkCountryLivingIn0->CountryName;
			$jsonMember['state'] = $member->fkResidingState0->StateName;
			$jsonMember['education'] = $member->fkEducation0->CourseName;
			$jsonMember['occupation'] = $member->occupation->OccupationName;
			$jsonMember['motherTongue'] = $member->fkMotherTongue0->TongueName;
			$jsonMember['caste'] = $member->fkCaste0->CasteName;
			
			echo CJSON::encode($jsonMember);;
		}else{
			throw new CHttpException(404,'The requested member does not found.');
		}
	}

	
	/*public function loadModel(){
		return Search::model();
	}*/

}

?>