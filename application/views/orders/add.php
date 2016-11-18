<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<?php if ($this->session->tempdata()) : ?>
				<div id="warning" class="row">
					<div class="col-md-12">
						<div class="<?= $this->session->tempdata('class') ?>">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong><?= $this->session->tempdata('message') ?></strong>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<h1 class="adm-title"><?= lang('add_order_heading'); ?></h1>

			<div class="row">
				<div class="col-sm-12">
					<?= form_open('orders/create', ['class' => 'form-horizontal', 'id' => 'form-add-order']); ?>

					<div class="form-group">
						<?= lang('add_order_client', 'client', array('class' => 'control-label col-sm-2')); ?>
						<div class="col-md-8 col-sm-10">
							<div class="input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								</span>
								<?= form_input('client', '', array('class' => 'form-control')); ?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<?= lang('add_order_client_address', 'client_address', array('class' => 'control-label col-sm-2')); ?>
						<div class="col-md-8 col-sm-10">
							<div class="input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
								</span>
								<?= form_input('client_address', '', array('class' => 'form-control')); ?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<?= lang('add_order_client_email', 'client_email', array('class' => 'control-label col-sm-2')); ?>
						<div class="col-md-8 col-sm-10">
							<div class="input-group">
							  <span class="input-group-addon" id="basic-addon1">@</span>
								<?= form_input('client_email', '', array('class' => 'form-control', 'aria-describedby' => 'basic-addon1')); ?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<?= lang('add_order_client_phone', 'client_phone', array('class' => 'control-label col-sm-2')); ?>
						<div class="col-md-8 col-sm-10">
							<div class="input-group">
							  <span class="input-group-addon">
									<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
								</span>
								<?= form_input('client_phone', '', array('class' => 'form-control')); ?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<?= lang('add_order_work', 'work', array('class' => 'control-label col-sm-2')); ?>
						<div class="col-md-8 col-sm-10">
							<?= form_dropdown('work', $work_options, '', array('class' => 'form-control')); ?>
						</div>
					</div>

					<div class="form-group">
						<?= lang('add_order_work_description', 'work_description', array('class' => 'control-label col-sm-2')); ?>
						<div class="col-md-8 col-sm-10">
							<?php $options = ['name' => 'work_description', 'value' => '','rows' => '6', 'class' => 'form-control']; ?>
							<?= form_textarea($options); ?>
						</div>
					</div>

					<div class="form-group">
						<?= lang('add_order_logo', 'logo', array('class' => 'control-label col-sm-2')); ?>
						<div class="col-md-8 col-sm-10">
							<?= form_dropdown('logo', $logo_types, '', array('class' => 'form-control')); ?>
						</div>
					</div>

					<div class="form-group">
						<?= lang('add_order_logo_delivery_date', 'logo_delivery_date', array('class' => 'control-label col-sm-2')); ?>
						<div class="col-md-8 col-sm-10">
							<div id="datetimepicker1" class="input-group date">
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								<?= form_input('logo_delivery_date', '', ['class' => 'form-control', 'id' => 'logo_delivery_date', 'onkeydown' => 'return false']); ?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<?= lang('add_order_pay_method', 'pay_method', array('class' => 'control-label col-sm-2')); ?>
						<div class="col-md-8 col-sm-10">
							<?= form_dropdown('pay_method', $pay_methods, '', array('class' => 'form-control')); ?>
						</div>
					</div>

					<div class="form-group">
						<?= lang('add_order_pay_total', 'pay_total', array('class' => 'control-label col-sm-2')); ?>
						<div class="col-md-8 col-sm-10">
							<div class="input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
								</span>
								<?= form_input('pay_total', '', ['class' => 'form-control', 'aria-label' => 'Amount', 'id' => 'pay_total']); ?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<?= lang('add_order_deposit', 'deposit', array('class' => 'control-label col-sm-2')); ?>
						<div class="col-md-8 col-sm-10">
							<div class="input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
								</span>
								<?= form_input('deposit', '', array('class' => 'form-control', 'aria-label' => 'Deposit')); ?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<?= lang('add_order_balance', 'balance', array('class' => 'control-label col-sm-2')); ?>
						<div class="col-md-8 col-sm-10">
							<div class="input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
								</span>
								<?= form_input('balance', '', array('class' => 'form-control', 'aria-label' => 'Balance')); ?>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-md-8 col-sm-10">
							<?= form_submit('submit', lang('add_order_submit_btn'), array('class' => 'btn btn-lg btn-primary')); ?>
						</div>
					</div>

					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
