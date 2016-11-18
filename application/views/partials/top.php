<div class="row pagebg">
	<div id="logotype" class="col-md-7 col-sm-7">
		<a href="<?= base_url('/') ?>"><img src="images/logo.png" class="img-responsive pull-left" alt="logo"/></a>
		<a id="bdesign" href="https://wrapdesignstudio.com/globalcustomz/" target="_blank"><img class="img-responsive" src="images/button_design.png" alt="design"></a>
	</div>
	<div id="login" class="col-md-5 col-sm-5">

		<h4 class="pull-right">Admin area</h4>
		<div class="clearfix"></div>

		<?= form_open('auth/login', array('class' => 'form-horizontal')) ?>
		<div class="form-group">
			<label for="identity" class="col-sm-5 control-label"><?= lang('login_identity_label') ?></label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="identity" name="identity">
			</div>
		</div>

		<div class="form-group">
			<label for="password" class="col-sm-5 control-label"><?= lang('login_password_label') ?></label>
			<div class="col-sm-7">
				<input type="password" class="form-control" id="password" name="password">
			</div>
		</div>
		<div class="form-group pull-right">
			<div class="col-sm-12">
				<button type="submit" class="btn btn-primary pull-right">Login</button>
				<a id="forgotpass" href="forgot_password"><?= lang('login_forgot_password'); ?></a>
			</div>
		</div>
		<?= form_close() ?>
	</div>
</div>

<div id="menu" class="row pagebg">
	<div class="pull-right t20">
		<a href="<?= base_url('global') ?>">GLOBAL</a>
		<div class="dropdown">
			<!--the disabled class applied next to dropdown-toggle allows dropdown links to be clickable-->
			<a href="<?= base_url('products') ?>" class="dropdown-toggle disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">PRODUCTS
				<span class="caret"></span>
			</a>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				<li><a href="<?= base_url('products#water-print') ?>">WATER PRINT</a></li>
				<li><a href="<?= base_url('products#comercial-wrap') ?>">COMERCIAL WRAP</a></li>
				<li><a href="<?= base_url('products#comercial-signs') ?>">COMERCIAL SIGNS</a></li>
				<li><a href="<?= base_url('products#car-window-tint') ?>">CAR WINDOW TINT</a></li>
				<li><a href="<?= base_url('products#boat-wrapping') ?>">BOAT WRAPPING</a></li>
			</ul>
		</div>
		<a href="<?= base_url('gallery') ?>">GALLERY</a>
		<a href="<?= base_url('visual-communications') ?>">VISUAL COMMUNICATION</a>
		<a href="<?= base_url('contact') ?>">CONTACT</a>
	</div>
	<div class="clearfix"></div>
	<hr>
</div>
