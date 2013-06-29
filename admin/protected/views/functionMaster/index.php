<?php
$this->breadcrumbs=array(
	'Function Masters',
);

$this->menu=array(
array('label'=>'Create FunctionMaster', 'url'=>array('create')),
array('label'=>'Manage FunctionMaster', 'url'=>array('admin')),
);
?>

<h1>Function Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
