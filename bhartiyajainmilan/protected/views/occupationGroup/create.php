<?php
$this->breadcrumbs=array(
	'Occupation Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OccupationGroup', 'url'=>array('index')),
	array('label'=>'Manage OccupationGroup', 'url'=>array('admin')),
);
?>

<h1>Create OccupationGroup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>