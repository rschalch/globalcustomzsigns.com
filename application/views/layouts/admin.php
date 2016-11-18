<!doctype html>
<html lang="en">
<?php $this->load->view('partials/header') ?>
<body>
<div class="container-fluid adm">
  <?php $this->ion_auth->is_admin() ? $this->load->view('partials/navbar-admin') : $this->load->view('partials/navbar-user') ?>
	<?php $this->load->view($this->session->flashdata('page')) ?>
</div>
<?php $this->load->view('partials/scripts-admin') ?>
</body>
</html>
