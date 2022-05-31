<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-4">
		<p>
			<h2>Menu</h2>
			<?php
		
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
		</p>
	</div>
	<div id="content" class="span-14">
		<?php echo $content; ?>
	</div><!-- content -->
	<div class="span-4">
		<p>
			<h2>Operations Menu</h2>
			 <?php 
$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
?>
		</p>
	</div>
</div>
<?php $this->endContent(); ?>
