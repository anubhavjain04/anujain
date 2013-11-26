<?php
$this->breadcrumbs=array(
	'Milan Details'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List MilanDetails', 'url'=>array('index')),
array('label'=>'Manage MilanDetails', 'url'=>array('admin')),
);
?>

<h1>Create MilanDetails</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>