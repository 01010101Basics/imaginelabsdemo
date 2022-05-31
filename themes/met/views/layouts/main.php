<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<?php 
	$cssUrl = yii::app()->baseURL.'/css/';
	$jsUrl = yii::app()->baseURL.'/js/';
	$cs = Yii::app()->clientScript;
	$cs->registerCssFile($cssUrl.'jqueryslidemenu.css');
	$cs->registerCoreScript('jquery');
        
	$cs->registerScriptFile(
                $jsUrl . 'jqueryslidemenu.js'
        ); ?>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="myslidemenu" class="jqueryslidemenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				
				array('label'=>'Forms', 'url'=>array('#'), 'items'=>array(

                array('label'=>'New Pole', 'url'=>array('poles/create')),

                    array('label'=>'Add Common Pole Deviations', 'url'=>array('commondeviations/create')),
                     array('label'=>'Add Common Cellsite Deviations', 'url'=>array('cellcommondeviations/create')),
                     array('label'=>'Add Common 3rd Party Deviations', 'url'=>array('thirdpartycommondeviations/create')),
					array('label'=>'Add Inspectors', 'url'=>array('inspectors/create')),
                     ),'submenuOptions'=>array('class'=>'subitems'),),
				array('label'=>'Queries', 'url'=>array('#'), 'items'=>array(

                                        array('label'=>'Manage Poles', 'url'=>array('poles/admin')),
                                         array('label'=>'Poles to Inspect', 'url'=>array('poles/gettgs')),

                                      
                     ),'submenuOptions'=>array('class'=>'subitems')),
				array('label'=>'Reports', 'url'=>array('#'), 'items'=>array(
						array('label'=>'Inspection Form', 'url'=>array('site/page/view/goform')),
						array('label'=>'Non Conformance Report', 'url'=>array('site/page/view/nonconform')),

					 
					),'submenuOptions'=>array('class'=>'subitems')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->

	<?php /*$this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	));*/ ?><!-- breadcrumbs -->
	<br></br>
	<br></br>
	
	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Motive<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>