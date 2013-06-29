<?php
$this->breadcrumbs=array(
	'Occupation Groups'=>array('index'),
	$model->pkOccGroupId=>array('view','id'=>$model->pkOccGroupId),
	'Update',
);

$this->menu=array(
	array('label'=>'List OccupationGroup', 'url'=>array('index')),
	array('label'=>'Create OccupationGroup', 'url'=>array('create')),
	array('label'=>'View OccupationGroup', 'url'=>array('view', 'id'=>$model->pkOccGroupId)),
	array('label'=>'Manage OccupationGroup', 'url'=>array('admin')),
);
?>

<h1>Update OccupationGroup <?php echo $model->pkOccGroupId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>