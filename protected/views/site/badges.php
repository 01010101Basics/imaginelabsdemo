<?php

$alerts  =  Yii::app()->db->createCommand()
                             ->selectdistinct(  ' id,claim_no,claim_status_id')
                            ->from('claims')
                            ->group('claim_no')
                            ->queryAll();
	 $myalerts = array();
	$flashmessage='';	
	$flashmessage1='';	
foreach($alerts as $value) {
	$myalerts[] = '<strong>'.CHtml::link($value['claim_no'],yii::app()->createURL('claims/view',array('id'=>$value['id']))).'</strong><br />';
	
	
	if($value['claim_status_id']== 1) {
	$flashmessage= $flashmessage .=  '<strong>'.CHtml::link($value['claim_no'],yii::app()->createURL('claims/view',array('id'=>$value['id']))).'</strong><br />';
	}
	if($value['claim_status_id']== 2) {
		$flashmessage1= $flashmessage1 .=  '<strong>'.CHtml::link($value['claim_no'],yii::app()->createURL('claims/view',array('id'=>$value['id']))).'</strong><br />';
	
	}
?>

<?php

if($value['claim_status_id']==1) {

Yii::app()->user->setFlash(
    'error',
   $flashmessage
);

}

if($value['claim_status_id']==2) {
	
	Yii::app()->user->setFlash(
    'success',
   $flashmessage1
);
	}
}
						

?>	
<div id="badges" style="display:block; width:200; height:100%;">

<?php
 

    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div style="display:block; width:34%; height:100%;" class="flash-' . $key . '">' . $message . "</div>\n";
    }

  ?>
  </div>
