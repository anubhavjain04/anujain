<?php
$this->breadcrumbs=array(
	'Group Masters',
);

$this->menu=array(
	array('label'=>'Create GroupMaster', 'url'=>array('create')),
	array('label'=>'Manage GroupMaster', 'url'=>array('admin')),
);
?>

<h1>Group Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
