<?php
$this->breadcrumbs=array(
	'Matrimony Family Details'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MatrimonyFamilyDetails', 'url'=>array('index')),
	array('label'=>'Manage MatrimonyFamilyDetails', 'url'=>array('admin')),
);
?>

<h1>Create MatrimonyFamilyDetails</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>