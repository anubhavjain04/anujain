<?php
$this->breadcrumbs=array(
	'Login Masters',
);

$this->menu=array(
array('label'=>'Create LoginMaster', 'url'=>array('create')),
array('label'=>'Manage LoginMaster', 'url'=>array('admin')),
);
?>

<h1>Login Masters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
