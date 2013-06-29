<?php
$this->breadcrumbs=array(
	'Magazine Types',
);

$this->menu=array(
	array('label'=>'Create MagazineType', 'url'=>array('create')),
	array('label'=>'Manage MagazineType', 'url'=>array('admin')),
);
?>

<h1>Magazine Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
