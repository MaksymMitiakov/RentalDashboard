<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
	<div class="container-fluid">
		<div class="navbar-wrapper">
			<?php $site = $_SERVER['PATH_INFO'];
			if ($site == '/dashboard') { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>dashboard"><?php echo $this->lang->line("dashboard"); ?></a>
			<?php } elseif (strpos($site, 'borrowers/')) { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>borrowers/create-borrowers"><?php echo $this->lang->line("manage_borrowers"); ?></a>
			<?php } elseif (strpos($site, 'homes/')) { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>buildings/create-homes"><?php echo $this->lang->line("homes"); ?></a>
			<?php } elseif (strpos($site, 'buildings/')) { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>buildings/create-buildings"><?php echo $this->lang->line("buildings"); ?></a>
			<?php } elseif (strpos($site, 'customers/')) { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>customers/create-customers"><?php echo $this->lang->line("manage_customers"); ?></a>
			<?php } elseif (strpos($site, 'borrowers/profile')) { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>borrowers/create-borrowers"><?php echo $this->lang->line("client_profile"); ?></a>
			<?php } elseif (strpos($site, 'memberships/')) { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>memberships/create-memberships"><?php echo $this->lang->line("memberships"); ?></a>
			<?php } elseif (strpos($site, 'loan/')) { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>loan/create-loan"><?php echo $this->lang->line("manage_loan"); ?></a>
			<?php } elseif (strpos($site, 'contract/')) { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>contract/create-contract"><?php echo $this->lang->line("manage_contracts"); ?></a>
			<?php } elseif (strpos($site, 'payments/')) { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>payments/loan_details"><?php echo $this->lang->line("manage_payments"); ?></a>
			<?php } elseif (strpos($site, 'reports')) { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>reprots"><?php echo $this->lang->line("manage_reports"); ?></a>
			<?php } elseif (strpos($site, 'staff')) { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>staff"><?php echo $this->lang->line("manage_staff"); ?></a>
			<?php } elseif (strpos($site, 'my-profile')) { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>staff"><?php echo $this->lang->line("my_profile"); ?></a>
			<?php } elseif (strpos($site, 'back-up')) { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>staff"><?php echo $this->lang->line("manage_files"); ?></a>
			<?php } elseif (strpos($site, 'back-up')) { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>staff"><?php echo $this->lang->line("membership_plans"); ?></a>
			<?php } elseif (strpos($site, 'membershiplans')) { ?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url(); ?>staff"><?php echo $this->lang->line("membership_plans"); ?></a>
			<?php } else { ?>
				<a class="navbar-brand font-weight-bold" href="#"></a>
			<?php } ?>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
			<span class="sr-only"><?php echo $this->lang->line("toggle_navigation"); ?></span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end">
			<ul class="navbar-nav">
				<?php if ($this->session->userdata('usertype') == 'Guest') { ?>
					<li class="nav-item">
						<a class="nav-link" href="#" rel="tooltip" title="<?php echo $this->lang->line("dashboard"); ?>">
							<i class="material-icons">dashboard</i>
							<p class="d-lg-none d-md-block"><?php echo $this->lang->line("status"); ?></p>
						</a>
					</li>
				<?php } else { ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>dashboard" rel="tooltip" title="<?php echo $this->lang->line("dashboard"); ?>">
							<i class="material-icons">dashboard</i>
							<p class="d-lg-none d-md-block"><?php echo $this->lang->line("status"); ?></p>
						</a>
					</li>
				<?php } ?>
				<li class="nav-item dropdown">
					<a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="material-icons">person</i>
						<p class="d-lg-none d-md-block"><?php echo $this->lang->line("account"); ?></p>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
						<?php if ($this->session->userdata('usertype') == 'Guest') { ?>
							<a class="dropdown-item" href="#">Profile</a>
							<a class="dropdown-item" href="#"><?php echo $this->lang->line("change_password"); ?></a>
						<?php } else { ?>
							<a class="dropdown-item" href="<?php echo base_url() . 'my-profile/' . $this->session->userdata('user_id'); ?>"><?php echo $this->lang->line("profile"); ?></a>
							<a class="dropdown-item" href="#change_pass" data-toggle="modal"><?php echo $this->lang->line("change_password"); ?></a>
						<?php } ?>
						<div class="dropdown-divider"></div>

						<a class="dropdown-item" href="<?php echo base_url(); ?>logout"><?php echo $this->lang->line("log_out"); ?></a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- End Navbar -->