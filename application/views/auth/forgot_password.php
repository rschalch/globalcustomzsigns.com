<h1 class="adm-title"><?= lang('forgot_password_heading');?></h1>
<p><?= sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div id="infoMessage"><?= $message;?></div>

<?= form_open('auth/forgot_password');?>

      <p>
      	<label for="email"><?= sprintf(lang('forgot_password_email_label'), $identity_label);?></label> <br />
      	<?= form_input($email);?>
      </p>

      <p><?= form_submit('submit', lang('forgot_password_submit_btn'));?></p>

<?= form_close();?>
