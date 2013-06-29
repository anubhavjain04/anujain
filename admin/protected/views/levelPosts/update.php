<?php
$this->breadcrumbs=array(
	'Level Posts'=>array('index'),
$model->pkLevelPostId=>array('view','id'=>$model->pkLevelPostId),
	'Update',
);

$this->menu=array(
array('label'=>'List LevelPosts', 'url'=>array('index')),
array('label'=>'Create LevelPosts', 'url'=>array('create')),
array('label'=>'View LevelPosts', 'url'=>array('view', 'id'=>$model->pkLevelPostId)),
array('label'=>'Manage LevelPosts', 'url'=>array('admin')),
);
?>

<h1>Update LevelPosts <?php echo $model->pkLevelPostId; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>