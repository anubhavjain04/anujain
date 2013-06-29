<?php
$this->breadcrumbs=array(
	'User Function Auths',
);

$this->menu=array(
array('label'=>'Create UserFunctionAuth', 'url'=>array('create')),
array('label'=>'Manage UserFunctionAuth', 'url'=>array('admin')),
);
?>

<h1>User Function Auths</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
