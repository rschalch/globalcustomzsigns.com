<div class="col-sm-6 col-sm-offset-3">

	<h1 class="adm-title"><?= lang('edit_user_heading'); ?></h1>
	<div id="infoMessage"><?= $message; ?></div>

	<?= form_open(uri_string(), array('class' => 'form-horizontal')); ?>

	<div class="form-group">
		<?= lang('edit_user_fname_label', 'first_name', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
			<?= form_input($first_name, '', array('class' => 'form-control')); ?>
		</div>
	</div>

	<div class="form-group">
		<?= lang('edit_user_lname_label', 'last_name', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
			<?= form_input($last_name, '', array('class' => 'form-control')); ?>
		</div>
	</div>

	<div class="form-group">
		<?= lang('edit_user_company_label', 'company', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
			<?= form_input($company, '', array('class' => 'form-control')); ?>
		</div>
	</div>

	<div class="form-group">
		<?= lang('edit_user_phone_label', 'phone', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
			<?= form_input($phone, '', array('class' => 'form-control')); ?>
		</div>
	</div>

	<div class="form-group">
		<?= lang('edit_user_password_label', 'password', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
			<?= form_input($password, '', array('class' => 'form-control')); ?>
		</div>
	</div>

	<div class="form-group">
		<?= lang('edit_user_password_confirm_label', 'password_confirm', array('class' => 'col-sm-2 control-label')); ?>
		<div class="col-sm-8">
			<?= form_input($password_confirm, '', array('class' => 'form-control')); ?>
		</div>
	</div>


	<?php if ($this->ion_auth->is_admin()): ?>

		<div class="col-sm-offset-2 col-sm-8">
			<h3><?= lang('edit_user_groups_heading'); ?></h3>
		</div>
		<?php foreach ($groups as $group): ?>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-8">
					<div class="checkbox">
						<label>
							<?php
                                $gID = $group['id'];
                                $checked = null;
                                $item = null;
                                foreach ($currentGroups as $grp) {
                                    if ($gID == $grp->id) {
                                        $checked = ' checked="checked"';
                                        break;
                                    }
                                }
                            ?>
							<input type="checkbox" name="groups[]" value="<?= $group['id']; ?>"<?= $checked; ?>>
							<?= htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
						</label>
					</div>
				</div>
			</div>
		<?php endforeach ?>

	<?php endif ?>

	<?= form_hidden('id', $user->id); ?>
	<?= form_hidden($csrf); ?>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8">
			<?= form_submit('submit', lang('edit_user_submit_btn'), array('class' => 'btn btn-primary')); ?>
		</div>
	</div>

	<?= form_close(); ?>
</div>
