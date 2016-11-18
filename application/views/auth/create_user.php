<div class="container">
	<div class="row">
		<h1 class="adm-title"><?= lang('create_user_heading') ?></h1>
		<div class="col-md-8 col-md-offset-1">
			<div id="infoMessage"><?= $message ?></div>
			<?= form_open('auth/create_user', ['id' => 'form-create-user', 'class' => 'form-horizontal']); ?>

				<div class="form-group">
					<?= lang('create_user_fname_label', 'first_name', array('class' => 'control-label col-sm-4')); ?>
						<div class="col-sm-8">
							<?= form_input($first_name, '', array('class' => 'form-control')); ?>
						</div>
				</div>

				<div class="form-group">
					<?= lang('create_user_lname_label', 'last_name', array('class' => 'control-label col-sm-4')); ?>
						<div class="col-sm-8">
							<?= form_input($last_name, '', array('class' => 'form-control')); ?>
						</div>
				</div>

				<?php
            if ($identity_column !== 'email') {
                echo '<div class="form-group">';
                echo lang('create_user_identity_label', 'identity', ['class' => 'control-label col-sm-4']);
                echo form_error('identity');
                echo '<div class="col-sm-8">';
                echo form_input($identity, '', array('class' => 'form-control'));
                echo '</div></div>';
            }
        ?>

					<div class="form-group">
						<?= lang('create_user_email_label', 'email', array('class' => 'control-label col-sm-4')); ?>
							<div class="col-sm-8">
								<?= form_input($email, '', array('class' => 'form-control')); ?>
							</div>
					</div>

					<div class="form-group">
						<?= lang('create_user_phone_label', 'phone', array('class' => 'control-label col-sm-4')); ?>
							<div class="col-sm-8">
								<?= form_input($phone, '', array('class' => 'form-control')); ?>
							</div>
					</div>

					<div class="form-group">
						<?= lang('create_user_password_label', 'password', array('class' => 'control-label col-sm-4')); ?>
							<div class="col-sm-8">
								<?= form_input($password, '', array('class' => 'form-control')); ?>
							</div>
					</div>

					<div class="form-group">
						<?= lang('create_user_password_confirm_label', 'password_confirm', array('class' => 'control-label col-sm-4')); ?>
							<div class="col-sm-8">
								<?= form_input($password_confirm, '', array('class' => 'form-control')); ?>
							</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<?= form_submit('submit', lang('create_user_submit_btn'), array('class' => 'btn btn-lg btn-primary')); ?>
						</div>
					</div>

					<?= form_close(); ?>
		</div>
	</div>
</div>
