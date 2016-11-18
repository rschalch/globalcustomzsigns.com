<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header') ?>
<body>

<div class="container">

	<?php $this->load->view('partials/top') ?>

	<h2 class="pagetitle">Contact</h2>

	<div id="product-content" class="row pagebg">

		<?php if ($this->session->tempdata('result')): ?>
				<div id="warning" class="row t20">
				<div class="col-md-12">
					<div class="alert <?= $this->session->tempdata('class') ?>">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?= $this->session->tempdata('result') ?></strong>
					</div>
				</div>
			</div>
		<?php endif ?>

		<div class="row">
			<div class="col-md-12">
				<p class="product-title">Please contact us</p>
			</div>
		</div>

		<div id="form-email" class="row">
			<div class="col-md-5">
				<?= form_open(base_url('front/sendmail'), ['id' => 'form-mail', 'class' => 'form-horizontal']); ?>

				<div class="form-group">
					<?= form_label('Name:', 'name', ['class' => 'col-sm-3 control-label']); ?>
					<div class="col-sm-8">
						<?= form_input('name', '', ['class' => 'form-control']); ?>
					</div>
				</div>

				<div class="form-group">
					<?= form_label('Phone:', 'phone', ['class' => 'col-sm-3 control-label']); ?>
					<div class="col-sm-8">
						<?= form_input('phone', '', ['class' => 'form-control']); ?>
					</div>
				</div>

				<div class="form-group">
					<?= form_label('Email:', 'email', ['class' => 'col-sm-3 control-label']); ?>
					<div class="col-sm-8">
						<?= form_input('email', '', ['class' => 'form-control']); ?>
					</div>
				</div>

				<div class="form-group">
					<?= form_label('Subject:', 'subject', ['class' => 'col-sm-3 control-label']); ?>
					<div class="col-sm-8">
						<?= form_input('subject', '', ['class' => 'form-control']); ?>
					</div>
				</div>

				<div class="form-group">
					<?= form_label('Message:', 'message', ['class' => 'col-sm-3 control-label']); ?>
					<div class="col-sm-8">

						<?php $options = [
                                'name' => 'message',
                                'id' => 'message',
                                'value' => '',
                                'rows' => '6',
                                'class' => 'form-control',
                        ]; ?>

						<?= form_textarea($options); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-8">
						<?= form_submit('submit', 'Send', ['class' => 'btn btn-primary btn-lg']); ?>
					</div>
				</div>

				<?= form_close(); ?>
			</div>
			<div class="col-md-7">
				<div id="map"></div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<p class="product-title">Phones:</p>
				<p class="contact-text">774 517 5171 / 774 517 5172</p>
				<p class="contact-text">Fax: 774 517 5173</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<p class="product-title">Address:</p>
				<p class="contact-text">71 Oak Hill Way - Brockton - MA - 02301</p>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('partials/footer') ?>
<?php $this->load->view('partials/scripts') ?>

<script type="text/javascript">
	function initMap() {
		var myLatLng = {lat: 42.052929, lng: -71.005668};
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 15,
			center: myLatLng
		});
		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			title: 'GlobalCustomzSigns'
		});
	}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZIqf38ORl4bX0omcZs-T5ckLG03pqNTw&callback=initMap"></script>
</body>
</html>
