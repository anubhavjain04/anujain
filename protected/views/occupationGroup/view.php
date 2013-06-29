<?php
$this->breadcrumbs=array(
	'Occupation Groups'=>array('index'),
	$model->pkOccGroupId,
);

$this->menu=array(
	array('label'=>'List OccupationGroup', 'url'=>array('index')),
	array('label'=>'Create OccupationGroup', 'url'=>array('create')),
	array('label'=>'Update OccupationGroup', 'url'=>array('update', 'id'=>$model->pkOccGroupId)),
	array('label'=>'Delete OccupationGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pkOccGroupId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OccupationGroup', 'url'=>array('admin')),
);
?>

<h1>View OccupationGroup #<?php echo $model->pkOccGroupId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pkOccGroupId',
		'GroupName',
	),
)); ?>
