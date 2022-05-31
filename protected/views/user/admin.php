<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php
$toggleUDetails = <<<JS
 $('a.toggle').live('click',function(e){
    e.preventDefault();

    if(this.href.split('#')[1]=='loaded') return $(this).closest("tr").next('tr.toggle').toggle();

    trow=$(this).closest("tr");

   var ajaxOpts={type:"POST", url:this.href ,dataType:'json',success:function(data){
            $(trow).after(data.row);
      }
    };

   this.href=this.href+'#loaded';

   $.ajax(ajaxOpts);

  });
JS;
Yii::app()->clientScript->registerScript('toggleUD', $toggleUDetails, CClientScript::POS_READY); 
?>
<?php /*$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'password',*/
		/* array(
           'class' => 'editable.EditableColumn',
		   'type'=>'password',
           'name' => 'password',
           'headerHtmlOptions' => array('style' => 'width: 110px'),
           'editable' => array(    //editable section
                  'apply'      => '$data->password != 4', //can't edit deleted users
                  'url'        => $this->createUrl('site/updateUser'),
                  'placement'  => 'right',
              )               
        ),*/
		/*'email',*/
		/*array(
           'class' => 'editable.EditableColumn',
           'name' => 'email',
           'headerHtmlOptions' => array('style' => 'width: 110px'),
		   
           'editable' => array(    //editable section
                  'apply'      => '$data->email', //can't edit deleted users
                  'url'        => $this->createUrl('updateEditable', array('model'=>'User', 'field'=>'email')),
                  'placement'  => 'right',
				   
              )               
        ),
		/*'activkey',
		'createtime',*/
		
		/* array( 
              'class' => 'editable.EditableColumn',
              'name'  => 'createtime',
              'headerHtmlOptions' => array('style' => 'width: 100px'),
              'editable' => array(
                  'type'          => 'date',
                  'viewformat'    => 'yyyy-mm-dd',
                  'url'        => $this->createUrl('updateEditable', array('model'=>'User', 'field'=>'createtime')),
                  'placement'     => 'right',
              )
         ), */
			
			//array(
         /* 'name'=>'status',
          'visible'=>false
            ),
			
			array( 
              'class' => 'editable.EditableColumn',
              'name' => 'status',
              'headerHtmlOptions' => array('style' => 'width: 100px'),
              'editable' => array(
                  'type'     => 'select',
                  'url'      => $this->createUrl('updateEditable',array('model'=>'User', 'field'=>'status')),
                  'source'   => array('1'=>'Active','0'=>'Not Active'),
                  
			  ),
			),*/
		/*'superuser',
		'status',
		'group_id',
		'company_id',
		*/
		/*array(
        'class'=>'CButtonColumn',
         'header'=>'Toggle Details',
          'template'=>'{toggle}{view}{delete}{update}',
            'buttons'=>array(
              'toggle'=>array(
                        'label'=>'Details',                        
                             'imageUrl'=>Yii::app()->request->baseUrl.'/images/expand.png',  
                             'url'=>'Yii::app()->createUrl("user/getExtra", array("id"=>$data->id))',
                             'options'=>array('class'=>'toggle',

                                      ),
                               ),
                        ),
          ),
	),
)); */

?>

<?php 
$dialog = $this->widget('ext.ecolumns.EColumnsDialog', array(
       'options'=>array(
            'title' => 'Layout settings',
            'autoOpen' => false,
            'show' =>  'fade',
            'hide' =>  'fade',
        ),
       'htmlOptions' => array('style' => 'display: none'), //disable flush of dialog content
       'ecolumns' => array(
            'gridId' => 'user-grid', //id of related grid
            'storage' => 'db',  //where to store settings: 'db', 'session', 'cookie'
            'fixedLeft' => array('CCheckBoxColumn'), //fix checkbox to the left side 
            'model' => $model->search(), //model is used to get attribute labels
			
            'columns' => array(
               'username',
			   
               'password',
			   array( 
              'class' => 'editable.EditableColumn',
              'name' => 'status',
              'headerHtmlOptions' => array('style' => 'width: 100px'),
              'editable' => array(
                  'type'     => 'select',
                  'url'      => $this->createUrl('updateEditable',array('model'=>'User', 'field'=>'status')),
                  'source'   => array('1'=>'Active','0'=>'Not Active'),
                  
			 	 ),
			 ), 
                array(
        'class'=>'CButtonColumn',
         'header'=>'Toggle Details',
          'template'=>'{view}{delete}{update}',
            'buttons'=>array(
              'toggle'=>array(
                        'label'=>'Details',                        
                             'imageUrl'=>Yii::app()->request->baseUrl.'/images/expand.png',  
                             'url'=>'Yii::app()->createUrl("user/getExtra", array("id"=>$data->id))',
                             'options'=>array('class'=>'toggle',

                                      ),
                               ),
							   'view'=>array( 'url'=>'$this->grid->controller->createUrl("view", array("id"=>$data->primaryKey,"asDialog"=>1,"gridId"=>$this->grid->id))',
                                    'click'=>'function(){$("#cru-frame").load($(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
									'options'=>array('height'=>'20px','width'=>'20px'),
                                ),
								'update' => array(
                                    'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey,"asDialog"=>1,"gridId"=>$this->grid->id))',
                                    'click'=>'function(){$("#cru-frame").load($(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
                                ),
                         ),
						),
					
           ),
       )
    ));
	 $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog',
    'options'=>array(
	
        'title'=>'Detail view',
        'autoOpen'=>false,
        'modal'=>false,
        'width'=>'auto',
        'height'=>'auto',
    ),
	
    ));
?>
<div id="cru-frame" width="100%" height="100%"></div>
<?php
$this->endWidget();
$this->widget('zii.widgets.grid.CGridView', array(
       'id' => 'user-grid',
       'dataProvider' => $model->search(),
	   'filter'=>$model,
       'columns' => $dialog->columns(),
       'template' => $dialog->link()."{summary}\n{items}\n{pager}",
));

?>
