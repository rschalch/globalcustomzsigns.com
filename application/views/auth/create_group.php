<div class="col-md-6 col-sm-6">

	<h1 class="adm-title"><?= lang('create_group_heading'); ?></h1>

	<div id="infoMessage"><?= $message; ?></div>

	<?= form_open('auth/create_group', array('class' => 'form-horizontal')); ?>

	<div class="form-group">
		<?= lang('create_group_name_label', 'group_name', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
			<?= form_input($group_name, '', array('class' => 'form-control')); ?>
		</div>
	</div>

	<div class="form-group">
		<?= lang('create_group_desc_label', 'description', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
			<?= form_input($description, '', array('class' => 'form-control')); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8">
			<?= form_submit('submit', lang('create_group_submit_btn'), array('class' => 'btn btn-primary')); ?>
		</div>
	</div>

	<?= form_close(); ?>

</div>
