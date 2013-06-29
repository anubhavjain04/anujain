<?php
$this->breadcrumbs=array(
	'Login Masters'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List LoginMaster', 'url'=>array('index')),
array('label'=>'Manage LoginMaster', 'url'=>array('admin')),
);
?>

<h1>Create LoginMaster</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>