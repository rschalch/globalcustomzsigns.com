<div class="col-sm-6 col-sm-offset-3">

	<h1 class="adm-title"><?= lang('delete_user_heading'); ?></h1>
	<h2>Are you sure you  want to delete the user <?= $user->first_name . ' ' . $user->last_name ?> ?</h2>

	<?= form_open('auth/delete_user_action/'.$user->id, ['class' => 'form-horizontal']);?>

    <label class="radio-inline">
      <?= form_radio('confirm', 'yes').lang('delete_confirm_y_label', 'confirm'); ?>
    </label>

    <label class="radio-inline">
      <?= form_radio('confirm', 'no', array('checked' => 'checked')).lang('delete_confirm_n_label', 'confirm'); ?>
    </label>

    <div class="form-group t20">
      <div class="col-sm-8">
        <?= form_submit('submit', lang('deactivate_submit_btn'), ['class' => 'btn btn-lg btn-primary']);?>
      </div>
    </div>

  <?= form_close();?>

</div>
