<?php
/* @var $this SubmenuController */
/* @var $data Submenu */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sublabel')); ?>:</b>
	<?php echo CHtml::encode($data->sublabel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_view_page')); ?>:</b>
	<?php echo CHtml::encode($data->sub_view_page); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suburl')); ?>:</b>
	<?php echo CHtml::encode($data->suburl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suboptions')); ?>:</b>
	<?php echo CHtml::encode($data->suboptions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('suburloptions')); ?>:</b>
	<?php echo CHtml::encode($data->suburloptions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subposition')); ?>:</b>
	<?php echo CHtml::encode($data->subposition); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_id')); ?>:</b>
	<?php echo CHtml::encode($data->menu_id); ?>
	<br />

	*/ ?>

</div>