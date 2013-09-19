<?php
$this->breadcrumbs=array(
	'Matrimony Family Details'=>array('index'),
	$model->pkFamilyId,
);

$this->menu=array(
	array('label'=>'List MatrimonyFamilyDetails', 'url'=>array('index')),
	array('label'=>'Create MatrimonyFamilyDetails', 'url'=>array('create')),
	array('label'=>'Update MatrimonyFamilyDetails', 'url'=>array('update', 'id'=>$model->pkFamilyId)),
	array('label'=>'Delete MatrimonyFamilyDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pkFamilyId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MatrimonyFamilyDetails', 'url'=>array('admin')),
);
?>

<h1>View MatrimonyFamilyDetails #<?php echo $model->pkFamilyId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pkFamilyId',
		'MemberCode',
		'FatherOccupation',
		'MotherOccupation',
		'UnmarriedBrothers',
		'MarriedBrothers',
		'UnmarriedSisters',
		'MarriedSisters',
		'AboutFamily',
	),
)); ?>
