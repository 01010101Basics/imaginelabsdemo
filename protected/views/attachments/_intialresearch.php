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
		<table style="border-collapse: collapse; width:150px; " >
			<tr>
				<td>
					<?php echo $form->labelEx($model,'intialdocs'); ?>
					<?php echo $form->checkbox($model,'intialdocs'); ?>
					<?php echo $form->error($model,'intialdocs'); ?>
				</td>
				
				
			</tr>
		</table>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'filename'); ?>
		<?php echo $form->hiddenField($model,'filename'); ?>

		<?php //echo $form->error($model,'filename'); ?>
	</div>
	<div class="row">
		<?php //echo $form->labelEx($model,'uploaddate'); ?>
		<?php echo $form->FileField($model,'file',array('name'=>'file','onchange' => ' 
														 
							
																	
																		
														$("#Awsfiles_filename").val(removeFakePath($(this).val()));')); ?>
		<?php //echo $form->error($model,'uploaddate'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'path'); ?>
		<?php echo $form->hiddenField($model,'path',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'path'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'claim_id'); ?>
		<?php echo $form->hiddenField($model,'project_id',array('value'=>$_GET['project_id'])); ?>
		
		<?php echo $form->error($model,'project_id'); ?>
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