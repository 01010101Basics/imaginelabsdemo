<?php

$alerts  =  Yii::app()->db->createCommand()
                             ->select('*')
                            ->from('assets')
                            ->where("depreciated>DATE_FORMAT(DATE_SUB(NOW(),INTERVAL 1 MONTH), '%Y-%m-%d') 
                              AND depreciated<DATE_FORMAT(DATE_ADD(NOW(),INTERVAL 1 MONTH), '%Y-%m-%d'")
							   
                           ->queryAll();
	 $myalerts = array();
	$flashmessage='';		
foreach($alerts as $value) {
	$myalerts[] = '<strong>'.CHtml::link($value['name'],yii::app()->createURL('contractnames/view',array('id'=>$value['id']))).'</strong><br />';
	$flashmessage= $flashmessage .=  '<strong>'.CHtml::link($value['name'],yii::app()->createURL('contractnames/view',array('id'=>$value['id']))).'</strong><br />';
	
Yii::app()->user->setFlash(
    'error',
   $flashmessage
);
}
							
/*Yii::app()->user->setFlash(
    'success',
    "<strong>Well done!</strong> You're successful in reading this."
);*/



 

    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }

  ?>
  

