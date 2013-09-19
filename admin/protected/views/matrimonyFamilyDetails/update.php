<?php
$this->breadcrumbs=array(
	'Matrimony Family Details'=>array('index'),
	$model->pkFamilyId=>array('view','id'=>$model->pkFamilyId),
	'Update',
);

$this->menu=array(
	array('label'=>'List MatrimonyFamilyDetails', 'url'=>array('index')),
	array('label'=>'Create MatrimonyFamilyDetails', 'url'=>array('create')),
	array('label'=>'View MatrimonyFamilyDetails', 'url'=>array('view', 'id'=>$model->pkFamilyId)),
	array('label'=>'Manage MatrimonyFamilyDetails', 'url'=>array('admin')),
);
?>

<h1>Update MatrimonyFamilyDetails <?php echo $model->pkFamilyId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>