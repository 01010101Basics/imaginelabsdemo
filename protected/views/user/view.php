<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
		'activkey',
		'createtime',
		'lastvisit',
		array(
				  'name'=>'Superuser',
				  'type'=>'raw',
				  'value'=>(($model->superuser==1)?"Yes":"No"),
				),
		array(
				  'name'=>'Status',
				  'type'=>'raw',
				  'value'=>(($model->status==1)?"Activated":"Not Activated"),
				),
		array(
                        'name' => 'group',
                        'value' => $model->group->group_name,
                ),
		
	),
)); ?>
<?php
$model2=Groups::model();

 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'groups-grid',
	'dataProvider'=>$model2->mysearch($model->group_id),
	
	'columns'=>array(
		'id',
		'group_name',
		
	),
)); ?>
<br />
<h1>Adding Gridview from another model to CDetailView (Model) </h1>
<h4>In the model add modified search criteria:</h4>
<div class="codeDIV">
<?php
$this->beginWidget('system.web.widgets.CTextHighlighter',array(

    'language'=>'PHP',

    'showLineNumbers'=>'show-line-numbers',

));
?>
 public function mysearch($id)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$id);
		$criteria->compare('group_name',$this->group_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


<?php
$this->endWidget();
?>
</div>
<br />
<h1>Adding Gridview from another model to CDetailView (View.php) </h1>
<h4>In the view add the following code:</h4>
<div class="codeDIV">
<?php
$this->beginWidget('system.web.widgets.CTextHighlighter',array(

    'language'=>'PHP',

    'showLineNumbers'=>'show-line-numbers',

));
?>
 
$model2=Groups::model();

 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'groups-grid',
	'dataProvider'=>$model2->mysearch($model->group_id),
	
	'columns'=>array(
		'id',
		'group_name',
		
	),
)); 


<?php
$this->endWidget();
?>
</div>
<br />
<h1>Joined Table Example (MODEL)</h1>
<h4>In the model under relations it needs to resemble:</h4>
<div class="codeDIV">
<?php
$this->beginWidget('system.web.widgets.CTextHighlighter',array(

    'language'=>'PHP',

    'showLineNumbers'=>'show-line-numbers',

));
?>
  public function relations()
        {
                // NOTE: you may need to adjust the relation name and the related
                // class name for the relations automatically generated below.
                return array(
                        'group' => array(self::BELONGS_TO, 'Groups', 'group_id'),
						
                );
        }


<?php
$this->endWidget();
?>
</div>

<br />
<h1>Joined Table Example (View)</h1>
<h4>In view.php or CDetailView it needs to resemble:</h4>
<div class="codeDIV">
<?php
$this->beginWidget('system.web.widgets.CTextHighlighter',array(

    'language'=>'PHP',

    'showLineNumbers'=>'show-line-numbers',

));
?>
 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'email',
		'activkey',
		'createtime',
		'lastvisit',
		array(
				  'name'=>'Superuser',
				  'type'=>'raw',
				  'value'=>(($model->superuser==1)?"Yes":"No"),
				),
		array(
				  'name'=>'Status',
				  'type'=>'raw',
				  'value'=>(($model->status==1)?"Activated":"Not Activated"),
				),
		array(
                        'name' => 'group',
                        'value' => $model->group->group_name,
                ),
		
	),
));

<?php
$this->endWidget();
?>
</div>




