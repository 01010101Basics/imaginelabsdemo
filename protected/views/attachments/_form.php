<?php
/* @var $this AttachmentsController */
/* @var $model Attachments */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'attachments-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'filename'); ?>
		<?php echo $form->hiddenField($model,'filename'); ?>

		<?php //echo $form->error($model,'filename'); ?>
	</div>
	<div class="row">
		<?php //echo $form->labelEx($model,'uploaddate'); ?>
		<?php 

		$this->widget('CMultiFileUpload', array(
					     'model'=>$model,
					     'name'=>'files',
					     'attribute'=>'file',
					     'accept'=>'docx|doc|xls|xlsx|pdf|jpg|gif|png',
					     'options'=>array(
					        // 'onFileSelect'=>'function(e, v, m){ alert("onFileSelect - "+v) }',
					        // 'afterFileSelect'=>'function(e, v, m){ alert("afterFileSelect - "+v) }',
					        // 'onFileAppend'=>'function(e, v, m){ alert("onFileAppend - "+v) }',
					        // 'afterFileAppend'=>'function(e, v, m){ alert("afterFileAppend - "+v) }',
					        // 'onFileRemove'=>'function(e, v, m){ alert("onFileRemove - "+v) }',
					        // 'afterFileRemove'=>'function(e, v, m){ alert("afterFileRemove - "+v) }',
     ),
     'denied'=>'File is not allowed',
     'max'=>10, // max 10 files


  ));



		/*echo $form->FileField($model,'file',array('name'=>'file','onchange' => ' 
														 
							
																	
																		
														$("#Awsfiles_filename").val(removeFakePath($(this).val()));')); */?>
		<?php //echo $form->error($model,'uploaddate'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'path'); ?>
		<?php echo $form->hiddenField($model,'path',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'path'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'claim_id'); ?>
		<?php echo $form->hiddenField($model,'pole_id',array('value'=>$_GET['pole_id'])); ?>
		
		<?php echo $form->error($model,'pole_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        <?php echo CHtml::htmlButton ('Cancel', array('onClick'=>'window.location.reload(true)')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
function removeFakePath(path) {
	
	filename = path.replace(/^.*\\/, "");
	return filename;
	}

</script>