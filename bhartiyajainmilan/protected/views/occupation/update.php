<?php
$this->breadcrumbs=array(
	'Occupations'=>array('index'),
	$model->pkOccupationId=>array('view','id'=>$model->pkOccupationId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Occupation', 'url'=>array('index')),
	array('label'=>'Create Occupation', 'url'=>array('create')),
	array('label'=>'View Occupation', 'url'=>array('view', 'id'=>$model->pkOccupationId)),
	array('label'=>'Manage Occupation', 'url'=>array('admin')),
);
?>

<h1>Update Occupation <?php echo $model->pkOccupationId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>