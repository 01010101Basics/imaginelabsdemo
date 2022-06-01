<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>





<br></br>
<p>This is a demo app to test out in lab instances.
</br>
<p><strong>For practical uses cases such as:</strong></br></br> Testing ELB/Scalling in AWS with deployment templates</br>
</p>
<?php //echo CHtml::image(Yii::app()->baseUrl . '/img/netwrk.jpg', "this is alt tag of image", array('height'=>'450', 'width'=>'900')); ?>
<?php
  $curl_handle=curl_init();
  curl_setopt($curl_handle,CURLOPT_URL,'http://169.254.169.254/latest/meta-data/placement/availability-zone');
  curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
  curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
  $buffer = curl_exec($curl_handle);
  curl_close($curl_handle);
  if (empty($buffer)){
      
  }
  else{
      $region= $buffer;
  }
  echo "AWS AZ: <b>".$region."</b>";
?>

<!DOCTYPE html>
<html>
<body>



<video width="900" height="450" autoplay loop muted>
  <source src="<?php echo Yii::app()->baseUrl;?>/img/movie.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>

</body>
</html>