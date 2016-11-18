<div class="container">
	<div class="row">
		<h1 class="adm-title"><?= lang('index_heading'); ?></h1>
		<table id="usuarios" class="table table-condensed table-hover">
			<thead>
			<tr>
				<th><?= lang('index_fname_th'); ?></th>
				<th><?= lang('index_lname_th'); ?></th>
				<th><?= lang('index_email_th'); ?></th>
				<th><?= lang('index_groups_th'); ?></th>
				<th><?= lang('index_status_th'); ?></th>
				<th><?= lang('index_action_th'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($users as $user): ?>
				<!--<tr>
						<td width="80%"><?/*= $user->username */?></td>
						<td>
							<a href="#" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="<?/*= base_url('users/delete/' . $user->id ) */?>" data-toggle="tooltip" title="Excluir"><span class="glyphicon glyphicon-trash"></span></a>
						</td>
					</tr>-->
				<tr>
					<td><?= htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
					<td><?= htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
					<td><?= htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
					<td>
						<?php foreach ($user->groups as $group): ?>
							<?= anchor('auth/edit_group/'.$group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?>
							<br/>
						<?php endforeach ?>
					</td>
					<td><?= ($user->active) ? anchor('auth/deactivate/'.$user->id, lang('index_active_link')) : anchor('auth/activate/'.$user->id, lang('index_inactive_link')); ?></td>
					<td><?= anchor('auth/edit_user/'.$user->id, 'Edit'); ?> <? if(!$user->company == "ADMIN") { echo " | "; echo(anchor('auth/delete_user/'.$user->id, 'Delete')); } ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
