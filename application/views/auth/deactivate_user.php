<div class="col-sm-6 col-sm-offset-3">

  <h1 class="adm-title"><?= lang('deactivate_heading');?></h1>
  <p>
    <?= sprintf(lang('deactivate_subheading'), $user->username);?>
  </p>

  <?= form_open('auth/deactivate/'.$user->id, array('class' => 'form-horizontal'));?>


    <label class="radio-inline">
      <?= form_radio('confirm', 'yes').lang('deactivate_confirm_y_label', 'confirm'); ?>
    </label>


    <label class="radio-inline">
      <?= form_radio('confirm', 'no', array('checked' => 'checked')).lang('deactivate_confirm_n_label', 'confirm'); ?>
    </label>

    <?= form_hidden($csrf); ?>
    <?= form_hidden(array('id' => $user->id)); ?>

        <div class="form-group t20">
          <div class="col-sm-8">
            <?= form_submit('submit', lang('deactivate_submit_btn'), array('class' => 'btn btn-primary'));?>
          </div>
        </div>

  <?= form_close();?>

</div>
