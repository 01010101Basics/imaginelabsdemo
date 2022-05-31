<?php
/* @var $this SubmenuController */
/* @var $model Submenu */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'submenu-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sublabel'); ?>
		<?php echo $form->textField($model,'sublabel',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'sublabel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_view_page'); ?>
		<?php echo $form->textField($model,'sub_view_page',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sub_view_page'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suburl'); ?>
		<?php echo $form->textField($model,'suburl',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'suburl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suboptions'); ?>
		<?php echo $form->textField($model,'suboptions',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'suboptions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suburloptions'); ?>
		<?php echo $form->textField($model,'suburloptions',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'suburloptions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subposition'); ?>
		<?php echo $form->textField($model,'subposition'); ?>
		<?php echo $form->error($model,'subposition'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'menu_id'); ?>
		<?php echo $form->dropDownList( $model,'menu_id', 
              CHtml::listData(Menu::model()->findAll(),'id', 'label'),
              array('empty' => '(Select an menu)')); ?>
		<?php echo $form->error($model,'menu_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->