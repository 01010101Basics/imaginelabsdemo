<?php
/* @var $this MenugroupsController */
/* @var $model Menugroups */

$this->breadcrumbs=array(
	'Menugroups'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List', 'url'=>array('index'),'linkOptions'=>array('onClick' => "$('#cru-frame').load($(this).attr('href')); $('#cru-dialog').dialog('open');  return false",'class'=>'button-link')),
	array('label'=>'Create', 'url'=>array('create'),'linkOptions'=>array('onClick' => "$('#cru-frame').load($(this).attr('href')); $('#cru-dialog').dialog('open');  return false",'class'=>'button-link')),
	array('label'=>'Update', 'url'=>array('update', 'id'=>$model->id),'linkOptions'=>array('onClick' => "$('#cru-frame').load($(this).attr('href')); $('#cru-dialog').dialog('open');  return false",'class'=>'button-link')),
	array('label'=>'Delete', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','class'=>'button-link')),
	//array('label'=>'Manage Menugroups', 'url'=>array('admin'),'linkOptions'=>array('class'=>'button-link')),
	
);
?>

<h1>View Menugroups #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'group_name',
	),
)); ?>

<?php 
echo CHtml::ajaxLink('Add Menu Item', array('menu/create'),
array('success' => 'js:function(data){
    //alert(data);
	$("#jobDialog").dialog("open");
    $("#add_location").html(data);
}'));
$model2=Menu::model();

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'menu-grid',
	'dataProvider'=>$model2->mysearch($model->id),
	'filter'=>$model2,
	'columns'=>array(
		'id',
		'label',
		'view_page',
		'url',
		'options',
		'urloptions',
		/*
		'description',
		'status',
		'position',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{view}{delete}',
			'buttons'=>array(
                'view'=>
                    array(
                        'url'=>'Yii::app()->createUrl("menu/view", array("id"=>$data->id))',
                                    'click'=>'function(){$("#cru-frame").load($(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
                    ),
					 'update'=>
                    array(
                        'url'=>'Yii::app()->createUrl("menu/update", array("id"=>$data->id))',
                         'click'=>'function(){$("#cru-frame").load($(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
                    ),
					
				    'delete'=>
                    array(
                        'url'=>'Yii::app()->createUrl("menu/delete", array("id"=>$data->id))',
                         'click'=>'function(){$("#cru-frame").load($(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
                    ),
            ),
        ),
        
		
	),
));

?>
<?php /*echo CHtml::ajaxLink('Add Menu Item', array('menu/create'),
array('success' => 'js:function(data){
    //alert(data);
	$("#jobDialog").dialog("open");
    document.getElementById("add_location").innerHTML=data;
}')); */



	$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'jobDialog',
                'options'=>array(
                    'title'=>Yii::t('job','Create Job'),
                    'autoOpen'=>false,
                    'modal'=>'true',
                    'width'=>'auto',
                    'height'=>'auto',
					'position'=>array(300,50),
                ),
                ));
 

 echo "<div id='add_location'></div>";
 
$this->endWidget('zii.widgets.jui.CJuiDialog');



$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog',
    'options'=>array(
	
        'title'=>'Detail view',
        'autoOpen'=>false,
        'modal'=>false,
        'width'=>'auto',
        'height'=>'auto',
		'position'=>array(300,50),
    ),
	
    ));
?> 
<div id="cru-frame" width="100%" height="100%"></div>
<?php
 
$this->endWidget();

$arr = Yii::app()->db->schema->tableNames;

$arr2=array();
foreach (Yii::app()->db->schema->tableNames as $key => $value) {
      $arry2[]= '/'.$value;
	 
}

