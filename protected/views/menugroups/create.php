<?php
/* @var $this MenugroupsController */
/* @var $model Menugroups */

$this->breadcrumbs=array(
	'Menugroups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Menugroups', 'url'=>array('index')),
	array('label'=>'Manage Menugroups', 'url'=>array('admin')),
);
?>

<h1>Create Menugroups</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>