<?php
$this->breadcrumbs=array(
	'Level Posts'=>array('index'),
$model->pkLevelPostId,
);

$this->menu=array(
array('label'=>'List LevelPosts', 'url'=>array('index')),
array('label'=>'Create LevelPosts', 'url'=>array('create')),
array('label'=>'Update LevelPosts', 'url'=>array('update', 'id'=>$model->pkLevelPostId)),
array('label'=>'Delete LevelPosts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pkLevelPostId),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage LevelPosts', 'url'=>array('admin')),
);
?>

<h1>View LevelPosts #<?php echo $model->pkLevelPostId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pkLevelPostId',
		'fkLevelId',
		'fkPostId',
),
)); ?>
