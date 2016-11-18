<div id='logotype' class="row">
		<div class="col-sm-6">
			<img class="img-responsive" src="<?= base_url('images/logo.png') ?>" alt="GlobalCustomzSigns">
		</div>
		<div class="col-sm-6">
			<div class="dropdown pull-right">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $this->ion_auth->user()->row()->email ?><span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="<?= base_url('auth/logout') ?>">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="menu" class="row">
		<div class="col-sm-6 menu-item">
			<a href="<?= base_url('orders') ?>" role="button"><span class="glyphicon glyphicon-copy"></span>Orders</a>
		</div>
		<div class="col-sm-6 menu-item">
			<a href="<?= base_url('orders/add') ?>" role="button"><span class="glyphicon glyphicon-plus"></span>Add Order</a>
		</div>
	</div>
