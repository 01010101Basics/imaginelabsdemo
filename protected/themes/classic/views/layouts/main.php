<?php /* @var $this Controller */ 
$cssUrl = yii::app()->baseURL.'/css/';
$jsUrl = yii::app()->baseURL.'/js/';
$cs = Yii::app()->clientScript;
$cs->registerCssFile($cssUrl.'jqueryslidemenu.css');
$cs->registerCoreScript('jquery');
        
$cs->registerScriptFile(
                $jsUrl . 'jqueryslidemenu.js'
        );

$permissions = 0;


function getsubsubitems($id=null)
 {
	$results = Yii::app()->getDb()->createCommand();
    $results->select('*')->from('subsubmenu');
	$results->where('submenu_id='.$id );
	
	$results->order('subposition ASC');
    $results = $results->queryAll();
	
	$items = array();
	$addid = "";
	$permissions = 1;
	foreach($results AS $result)
        {
		$items[] = array(
						'label'=>$result['sublabel'], 
						'url'=>array($result['suburl'],
						'visibility'=>$result['status']
						));
		}
		
		return $items;
 }
 function getsubitems($id=null)
 {
	$results = Yii::app()->getDb()->createCommand();
    $results->select('*')->from('submenu');
	$results->where('menu_id='.$id );
	
	$results->order('subposition ASC');
    $results = $results->queryAll();
	
	$items = array();
	$addid = "";
	$permissions = 1;
	foreach($results AS $result)
        {
		$items[] = array(
						'label'=>$result['sublabel'], 
						'url'=>array($result['suburl'],
						'visibility'=>$result['status'],
						
						)
						);
		}
		
		return $items;
		
 }
 
 
 
function getMenuItems($id=null)
{
 	$results = Yii::app()->getDb()->createCommand();
    $results->select('*')->from('menu');
	$results->where('menu_group_id='.$id );
	$results->order('position ASC');
    $results = $results->queryAll();
	
	$items = array();
	$addid = "";
	$permissions = 1;
	
foreach($results AS $result)
        {
	
		if (Yii::app()->user->isGuest<>1 & $result['label'] == 'Login' ) {
			$rolecheck = FALSE;
		}
		if(Yii::app()->user->checkAccess($result['role'],Yii::app()->user->id)==1 & Yii::app()->user->isGuest<>1 ) {
			$rolecheck = TRUE;	
		}
		else {
			$rolecheck = FALSE;        
		}	
		if($result['label'] == 'Logout' & Yii::app()->user->isGuest<>1 ){
					$rolecheck = TRUE; 
				
		} 
		else  if($result['label'] == 'Logout' & Yii::app()->user->isGuest==1 ){ 
					$rolecheck = FALSE;
		}
		
		if(Yii::app()->user->isGuest==1) {
			$rolecheck = $result['status'];
				if($result['label'] == 'Logout' & Yii::app()->user->isGuest==1 ){ 
							$rolecheck = FALSE;
				}
		}
	
		if($result['urloptions']==1) {
				
			  $addid = array($result['url'],'id'=>yii::app()->user->id,$result['suburl']);
		}
		else {
			  $addid = array($result['url']);
		}
				
			
		
			if(getsubitems($result['id'])) {	
            $items[] = array(
               
			   'label'         		 => $result['label'],
               'url'           		 => $addid,
			   'visible'	   		 =>  $rolecheck,
			   
			   'submenuOptions'=>array('class'=>'subitems'),'items'=>getsubitems($result['id'])
			);
			}
			else {
			 $items[] = array(
               
			   'label'         		 => $result['label'],
               'url'           		 => $addid,
			   'visible'	   		 => $rolecheck,
			   
			 
			);
			}
        }
 		
        return $items;
		
		
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	
 <div id="myslidemenu" class="jqueryslidemenu">	
	
		<?php
		$group_id = 1;
		 /*$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		));*/ 
		
		$this->widget('zii.widgets.CMenu',array(
			'id'=>'mymenu',
			'activeCssClass'=>'current',
			'items'=>getMenuItems($group_id),
			)); 
		
		
     
		 
      
		?>
       
	</div><!-- mainmenu -->
    <div id="header">
        <?php echo CHtml::image(Yii::app()->theme->baseUrl."/images/banner_top.jpg","footer",array('width'=>'100%','height'=>180)); ?>
	</div><!-- header -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; 
	
	
	?>

	<div class="clear"></div>

	<center><?php echo CHtml::image(Yii::app()->theme->baseUrl."/images/banner_bottom.jpg","footer",array('width'=>'100%','height'=>180,'id'=>'myfooter','align'=>'middle'));?></center>	
	<div id="footer">
	
		
		<p>Copyright &copy; <?php echo date('Y'); ?> by Cable Engineering Services.<br/>
		All Rights Reserved.</p>

	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
