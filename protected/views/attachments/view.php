<?php
/* @var $this AttachmentsController */
/* @var $model Attachments */




?>


<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		
		'origfile',
	
	),
));*/ ?>

 <object
  data="<?php echo Yii::app()->baseUrl.'/'.$model->path; ?>"
  type="application/pdf"
  width="100%"
  height="100%">
  <p>Your browser does not support PDFs.
    <a href="<?php echo Yii::app()->baseUrl.'/'.$model->path; ?>">Download the PDF</a>.</p>
</object>
