<?php
$this->breadcrumbs=array(
	'Matrimonial Packages',
);

$this->menu=array(
	array('label'=>'Create MatrimonialPackage', 'url'=>array('create')),
	array('label'=>'Manage MatrimonialPackage', 'url'=>array('admin')),
);
?>

<h1>Matrimonial Packages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
