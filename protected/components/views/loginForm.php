<div id="data">
<?php $this->controller->renderPartial('application.views.mylogin._ajaxContent', array('myValue'=>$myValue)); ?>
</div>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'login-form',
'enableClientValidation'=>true,
'clientOptions'=>array(
'validateOnSubmit'=>true,
),

));
?>

<div class="row">

<?php echo $form->textField($model,'username',array('placeholder'=>'Username / Email Address')); ?>
<?php echo $form->error($model,'username'); ?>

</div>

<div class="row">

<?php echo $form->passwordField($model,'password',array('placeholder'=>'Password')); ?>
<?php echo $form->error($model,'password'); ?>

</div>

<div class="row rememberMe">
<?php echo $form->checkBox($model,'rememberMe'); ?>
<?php echo $form->label($model,'rememberMe'); ?>
<?php echo $form->error($model,'rememberMe'); ?>
</div>

<?php 
$this->widget('bootstrap.widgets.TbButton', array(
				'encodeLabel' => false,
				'buttonType' => 'submit',
				'type' => 'bee',
				'label' => 'LOGIN',
				'htmlOptions' => array(
				'style' => 'float:right;',
				'id' => uniqid(), //has to be in htmlOptions ...
				'ajax' => array(
				'type' => 'POST',
				'url' => Yii::app()->createUrl('MyLogin/UpdateAjax'),
				'success' => 'function(data){

											if(data=="login-success"){
											
											setTimeout(
											function()
											{
											location.reload();
											}, 500);
											
											}
											else{
											alert("Wrong password or username");
								}
							}',

),
),
)
);

?>

<?php $this->endWidget(); ?>