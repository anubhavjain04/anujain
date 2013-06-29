<?php
$this->breadcrumbs=array(
	'Level Posts',
);

$this->menu=array(
array('label'=>'Create LevelPosts', 'url'=>array('create')),
array('label'=>'Manage LevelPosts', 'url'=>array('admin')),
);
?>

<h1>Level Posts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
