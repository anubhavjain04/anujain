<?php
$this->breadcrumbs=array(
	'Group Posts',
);

$this->menu=array(
	array('label'=>'Create GroupPosts', 'url'=>array('create')),
	array('label'=>'Manage GroupPosts', 'url'=>array('admin')),
);
?>

<h1>Group Posts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
