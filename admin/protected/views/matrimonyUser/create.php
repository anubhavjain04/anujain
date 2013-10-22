<?php
$this->breadcrumbs=array(
	'Matrimony Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MatrimonyUser', 'url'=>array('index')),
	array('label'=>'Manage MatrimonyUser', 'url'=>array('admin')),
);
?>

<h1>Create MatrimonyUser</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>