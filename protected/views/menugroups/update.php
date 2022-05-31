<?php
/* @var $this MenugroupsController */
/* @var $model Menugroups */

$this->breadcrumbs=array(
	'Menugroups'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Menugroups', 'url'=>array('index')),
	array('label'=>'Create Menugroups', 'url'=>array('create')),
	array('label'=>'View Menugroups', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Menugroups', 'url'=>array('admin')),
);
?>

<h1>Update Menugroups <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>