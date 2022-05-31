<?php
/* @var $this MenugroupsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Menugroups',
);

$this->menu=array(
	array('label'=>'Create Menugroups', 'url'=>array('create')),
	array('label'=>'Manage Menugroups', 'url'=>array('admin')),
);
?>

<h1>Menugroups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>


