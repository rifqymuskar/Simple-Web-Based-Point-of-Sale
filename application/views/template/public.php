<!DOCTYPE html>
<html>
<head>
	<title>Erporate Business Center</title>

	<?=$this->template->css('materialize.min')?>
	<?=$this->template->css('custom')?>
</head>
<body data-url="<?=site_url()?>" data-groups="<?=$this->ion_auth->get_users_groups()->row()->id?>">

  <nav style="margin-bottom: 5%;">
  	<div class="container">
	    <div class="nav-wrapper">
	      <a href="#" class="brand-logo">Logo</a>
			<?=$navbar?>
	    </div>
    </div>
  </nav>

	<div class="container">
		<?=$content?>
	</div>

	<?=$this->template->js('jquery-3.3.1.min')?>
	<?=$this->template->js('materialize.min')?>
	<?=$this->template->js('sweetalert2.all.min')?>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
	<?=$this->template->js('custom')?>
</body>
</html>