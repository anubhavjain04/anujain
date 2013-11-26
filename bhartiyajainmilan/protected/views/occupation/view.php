<?php
$this->breadcrumbs=array(
	'Occupations'=>array('index'),
	$model->pkOccupationId,
);

$this->menu=array(
	array('label'=>'List Occupation', 'url'=>array('index')),
	array('label'=>'Create Occupation', 'url'=>array('create')),
	array('label'=>'Update Occupation', 'url'=>array('update', 'id'=>$model->pkOccupationId)),
	array('label'=>'Delete Occupation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pkOccupationId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Occupation', 'url'=>array('admin')),
);
?>

<h1>View Occupation #<?php echo $model->pkOccupationId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pkOccupationId',
		'fkOccGroupId',
		'OccupationName',
	),
)); ?>
