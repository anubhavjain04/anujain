<?php
$this->breadcrumbs=array(
	'Level Masters',
);

$this->menu=array(
array('label'=>'Create LevelMaster', 'url'=>array('create')),
array('label'=>'Manage LevelMaster', 'url'=>array('admin')),
);
?>

<h1>Level Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
