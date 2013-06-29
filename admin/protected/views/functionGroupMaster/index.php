<?php
$this->breadcrumbs=array(
	'Function Group Masters',
);

$this->menu=array(
array('label'=>'Create FunctionGroupMaster', 'url'=>array('create')),
array('label'=>'Manage FunctionGroupMaster', 'url'=>array('admin')),
);
?>

<h1>Function Group Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
