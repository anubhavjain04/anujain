<?php
$this->breadcrumbs=array(
	'Post Masters',
);

$this->menu=array(
array('label'=>'Create PostMaster', 'url'=>array('create')),
array('label'=>'Manage PostMaster', 'url'=>array('admin')),
);
?>

<h1>Post Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
