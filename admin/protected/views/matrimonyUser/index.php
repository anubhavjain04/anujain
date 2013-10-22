<?php
$this->breadcrumbs=array(
	'Matrimony Users',
);

$this->menu=array(
	array('label'=>'Create MatrimonyUser', 'url'=>array('create')),
	array('label'=>'Manage MatrimonyUser', 'url'=>array('admin')),
);
?>

<h1>Matrimony Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
