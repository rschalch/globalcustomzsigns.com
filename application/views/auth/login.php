<!doctype html>
<html lang="pt-br">
<?php $this->load->view('partials/header') ?>
<body>
<?php $this->load->view('partials/navbar') ?>

<div id="login" class="container">
	<div class="col-md-4 col-sm-6">
		<h1><?= lang('login_heading'); ?></h1>
		<p><?= lang('login_subheading'); ?></p>

		<?= form_open(base_url('auth/login'), array('class' => 'form-horizontal t20')); ?>
		<div class="form-group">
			<label for="identity" class="col-sm-2 control-label"><?= lang('login_identity_label') ?></label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="identity" name="identity">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label"><?= lang('login_password_label') ?></label>
			<div class="col-sm-10">
				<input type="password" class="form-control" id="password" name="password">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="remember" id="remember"><?= lang('login_remember_label') ?></label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Entrar</button>
				<div class="t20"><a href="forgot_password"><?= lang('login_forgot_password'); ?></a></div>
			</div>
		</div>
		<?php form_close() ?>
		<div class="alert t20"><?= $message ?></div>
	</div>

</div>

<?php $this->load->view('partials/scripts') ?>
</body>
</html>
