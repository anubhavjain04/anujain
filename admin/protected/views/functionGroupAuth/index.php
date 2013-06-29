<?php
$this->breadcrumbs=array(
	'Function Group Auths',
);

$this->menu=array(
array('label'=>'Create FunctionGroupAuth', 'url'=>array('create')),
array('label'=>'Manage FunctionGroupAuth', 'url'=>array('admin')),
);
?>

<h1>Function Group Auths</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
