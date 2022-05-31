
<?php 


class DBMenuWidget extends CWidget {
 public $getMenuItems;
 public $getSubMenuItems;
 private $assetsPath = '';
 
  protected function registerClientScripts()  {	
	
		$cs = Yii::app()->clientScript;
		$cs->registerCssFile('/css/jqueryslidemenu.css');
		$cs->registerCoreScript('jquery');
 }
 
 public function init(){
  
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
		$items[] = array('label'=>$result['sublabel'], 'url'=>array($result['suburl'],'visibility'=>$result['status']));
		}
		
		return $items;
 }
 public function run(){
	 
  $this->assetsPath = Yii::app()->getAssetManager()->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets');	
  $this->registerClientScripts();
  $this->render('DBMenu');
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
		/*if(Yii::app()->user->checkAccess($result['role'],Yii::app()->user->id)==1 & Yii::app()->user->isGuest<>1 ) {
			$rolecheck = TRUE;	
		}
		else {
			$rolecheck = FALSE;        
		}	*/
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
  
  

}

?>