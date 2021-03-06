<section id="navigation-main">  
<div class="navbar">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
  
          <div class="nav-collapse">
			<?php /*$this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
						array('label'=>'Home <span class="caret"></span>', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"our home page"), 
                        'items'=>array(
                            array('label'=>'Home 1 - Nivoslider', 'url'=>array('/site/index')),
							array('label'=>'Home 2 - Bootstrap carousal', 'url'=>array('/site/page', 'view'=>'home2')),
							array('label'=>'Home 3 - Piecemaker2', 'url'=>array('/site/page', 'view'=>'home3')),
							array('label'=>'Home 4 - Static image', 'url'=>array('/site/page', 'view'=>'home4')),
							array('label'=>'Home 5 - Video header', 'url'=>array('/site/page', 'view'=>'home5')),
							array('label'=>'Home 6 - Without slider', 'url'=>array('/site/page', 'view'=>'home6')),
                        )),
						array('label'=>'Styles <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"6 styles"), 
                        'items'=>array(
                            array('label'=>'<span class="style" style="background-color:#0088CC;"></span> Style 1', 'url'=>"javascript:chooseStyle('none', 60)"),
							array('label'=>'<span class="style" style="background-color:#e42e5d;"></span> Style 2', 'url'=>"javascript:chooseStyle('style2', 60)"),
							array('label'=>'<span class="style" style="background-color:#c80681;"></span> Style 3', 'url'=>"javascript:chooseStyle('style3', 60)"),
							array('label'=>'<span class="style" style="background-color:#51a351;"></span> Style 4', 'url'=>"javascript:chooseStyle('style4', 60)"),
							array('label'=>'<span class="style" style="background-color:#b88006;"></span> Style 5', 'url'=>"javascript:chooseStyle('style5', 60)"),
							array('label'=>'<span class="style" style="background-color:#f9630f;"></span> Style 6', 'url'=>"javascript:chooseStyle('style6', 60)"),
                        )),
						
						array('label'=>'Features <span class="caret"></span>', 'url'=>array('/site/page', 'view'=>'columns'),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"cool features"), 
                        'items'=>array(
                            array('label'=>'Columns', 'url'=>array('/site/page', 'view'=>'columns')),
							array('label'=>'Pricing tables', 'url'=>array('/site/page', 'view'=>'pricing-tables')),
							array('label'=>'UI Elements', 'url'=>array('/site/page', 'view'=>'elements')),
                        )),

                        array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'),'linkOptions'=>array("data-description"=>"what we are about"),),
                       
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"member area")),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"member area")),
                    ),
                ));*/ 
				
				
function getMenuItems($id=null)
{
 	$results = Yii::app()->getDb()->createCommand();
    $results->select('*')->from('menu');
	$results->where('menu_group_id='.$id);
	$results->order('position ASC');
    $results = $results->queryAll();
	
	$items = array();
	$addid = "";
	$permissions = 1;
foreach($results AS $result)
        {
        
			if(yii::app()->user->id){
				if(Yii::app()->user->isGuest<>1 & $result['options']<>'IsGuest') 
					{ 
					$permissions = 1;  
					} 
					else { 
					$permissions = 0; 
					} 
				if($result['urloptions']==1) {
				
				$addid = array($result['url'],'id'=>yii::app()->user->user_id);
				}
				else {
				
				$addid = array($result['url']);
				}
				
			}
			else {
					$addid = array($result['url']);
				}
            $items[] = array(
               
			   'label'         		 => $result['label'],
               'url'           		 => $addid
                   			 
			 ,'visible'	   => $permissions,
			);
        }
 		
        return $items;
	
}
if(yii::app()->user->id) {
$group_id = yii::app()->user->group_id;
}
else {
$group_id = 4;
}

//print_r(getMenuItems(2));
?>
<?php
	$this->widget('zii.widgets.CMenu',array(
			'id'=>'mynav',
			'htmlOptions'=>array('class'=>'nav'),
			'items'=>getMenuItems($group_id),
			)); 
		
		?>

    	</div>
    </div>
	</div>
</div>
</section><!-- /#navigation-main -->