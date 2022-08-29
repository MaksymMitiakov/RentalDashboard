<div class="sidebar" data-color="purple" data-background-color="white">
	<!--
		Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

		Tip 2: you can also add an image using data-image tag
	-->
	<div class="logo m-1 form-group">
		<a href="#" class="simple-text logo-normal font-weight-bold"><img src="<?php echo base_url();?>/assets/images/mobsy.png" height="70" width="160"></a>
	</div>
	<?php $site = $_SERVER['PATH_INFO'];?>
	<div class="sidebar-wrapper">
		<ul class="nav">
		<?php if($this->session->userdata('usertype') == 'Admin') { ?>
		<?php if($site == '/dashboard') {?>
			<li class="nav-item active  ">
		<?php }else{ ?>
			<li class="nav-item">
		<?php }?>
				<a class="nav-link" href="<?php echo base_url();?>dashboard">
				<i class="material-icons">dashboard</i>
				<p><?php echo $this->lang->line("dashboard"); ?></p>
				</a>
			</li>
		<?php if(strpos($site,'buildings/') || strpos($site,'buildings')){?>
			<li class="nav-item active">
		<?php }else{ ?>
			<li class="nav-item">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>buildings/create-buildings">
				<i class="material-icons">business</i>
				<p><?php echo $this->lang->line("buildings"); ?></p>
				</a>
			</li>

		<?php if(strpos($site,'homes/') || strpos($site,'homes')){?>
			<li class="nav-item active">
		<?php }else{ ?>
			<li class="nav-item">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>homes/create-homes">
				<i class="material-icons">home</i>
				<p><?php echo $this->lang->line("homes"); ?></p>
				</a>
			</li>

		<?php if(strpos($site,'customers/') || strpos($site,'customers')){?>
			<li class="nav-item active">
		<?php }else{ ?>
			<li class="nav-item">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>customers/create-customers">
				<i class="material-icons">sentiment_satisfied_alt</i>
				<p><?php echo $this->lang->line("customers"); ?></p>
				</a>
			</li>

		<?php if(strpos($site,'contract/') || strpos($site,'promissory')){?>
			<li class="nav-item active">
		<?php }else{ ?>
			<li class="nav-item">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>contract/create-contract">
				<i class="material-icons">description</i>
				<p><?php echo $this->lang->line("contracts"); ?></p>
				</a>
			</li>

		<?php if(strpos($site,'payments/')){?>
			<li class="nav-item active">
		<?php }else{ ?>
			<li class="nav-item">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>payments/contract-details">
				<i class="material-icons">payment</i>
				<p><?php echo $this->lang->line("payments"); ?></p>
				</a>
			</li>

		<?php if(strpos($site, 'reports')){?>
		<li class="nav-item active">
		<?php }else{ ?>
		<li class="nav-item">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>reports">
				<i class="material-icons">equalizer</i>
				<p><?php echo $this->lang->line("reports"); ?></p>
				</a>
			</li>

		<?php if(strpos($site,'memberships/') || strpos($site,'memberships')){?>
			<li class="nav-item active">
		<?php }else{ ?>
			<li class="nav-item">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>memberships/create-packages-memberships">
				<i class="material-icons">stars</i>
				<p><?php echo $this->lang->line("memberships"); ?></p>
				</a>
			</li>
		
		<?php if(strpos($site, 'membershiplans')){?>
			<li class="nav-item active">
		<?php }else{ ?>
			<li class="nav-item">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>membershiplans">
				<i class="material-icons">star_rate</i>
				<p><?php echo $this->lang->line("membership_plans"); ?></p>
				</a>
			</li>

		<?php if(strpos($site, 'staff')){?>
			<li class="nav-item active">
		<?php }else{ ?>
			<li class="nav-item ">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>staff">
				<i class="material-icons">person</i>
				<p><?php echo $this->lang->line("staffs"); ?></p>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link collapsed" data-toggle="collapse" href="#pagesExamples" aria-expanded="false">
				<i class="material-icons">reorder</i>
				<p> <?php echo $this->lang->line("others"); ?>
					<b class="caret"></b>
				</p>
				</a>
		<?php if(strpos($site, 'kvkk') || strpos($site, 'privacy-policy') || strpos($site, 'terms-conditions')){ ?>
            	<div class="collapse show" id="pagesExamples" style="">
		<?php } else {?>
				<div class="collapse" id="pagesExamples" style="">
		<?php } ?>
        			<ul class="nav">
		<?php if(strpos($site, 'about-us')){?>
						<li class="nav-item active">
		<?php }else{ ?>
						<li class="nav-item ">
		<?php } ?>
							<a class="nav-link" href="<?php echo base_url();?>about-us">
								<i class="material-icons">info</i>
								<p><?php echo $this->lang->line("about_us"); ?></p>
							</a>
						</li>
		<?php if(strpos($site, 'privacy-policy')){?>
						<li class="nav-item active">
		<?php }else{ ?>
						<li class="nav-item ">
		<?php } ?>
							<a class="nav-link" href="<?php echo base_url();?>privacy-policy">
								<i class="material-icons">verified_user</i>
								<p><?php echo $this->lang->line("privacy_policy"); ?></p>
							</a>
						</li>
		<?php if(strpos($site, 'kvkk')){?>
						<li class="nav-item active">
		<?php }else{ ?>
						<li class="nav-item ">
		<?php } ?>
							<a class="nav-link" href="<?php echo base_url();?>kvkk">
								<i class="material-icons">visibility</i>
								<p><?php echo $this->lang->line("kvkk"); ?></p>
							</a>
						</li>
        <?php if(strpos($site, 'terms-conditions')){?>
						<li class="nav-item active">
		<?php }else{ ?>
						<li class="nav-item ">
		<?php } ?>
							<a class="nav-link" href="<?php echo base_url();?>terms-conditions">
								<i class="material-icons">assignment</i>
								<p><?php echo $this->lang->line("terms_and_conditions"); ?></p>
							</a>
						</li>
              		</ul>
				</div>
        	</li>
		<?php }?>
		<?php if($this->session->userdata('usertype') == 'Vendor') { ?>
		<?php echo $this->session->userdata('status'); if($this->session->userdata('status') == true) { ?>
		<?php if($site == '/dashboard') {?>
			<li class="nav-item active  ">
		<?php }else{ ?>
			<li class="nav-item">
		<?php }?>
				<a class="nav-link" href="<?php echo base_url();?>dashboard">
				<i class="material-icons">dashboard</i>
				<p><?php echo $this->lang->line("dashboard"); ?></p>
				</a>
			</li>
		<?php if(strpos($site,'buildings/') || strpos($site,'buildings')){?>
			<li class="nav-item active">
		<?php }else{ ?>
			<li class="nav-item">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>buildings/create-buildings">
				<i class="material-icons">business</i>
				<p><?php echo $this->lang->line("buildings"); ?></p>
				</a>
			</li>

		<?php if(strpos($site,'homes/') || strpos($site,'homes')){?>
			<li class="nav-item active">
		<?php }else{ ?>
			<li class="nav-item">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>homes/create-homes">
				<i class="material-icons">home</i>
				<p><?php echo $this->lang->line("homes"); ?></p>
				</a>
			</li>

		<?php if(strpos($site,'customers/') || strpos($site,'customers')){?>
			<li class="nav-item active">
		<?php }else{ ?>
			<li class="nav-item">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>customers/create-customers">
				<i class="material-icons">sentiment_satisfied_alt</i>
				<p><?php echo $this->lang->line("customers"); ?></p>
				</a>
			</li>

		<?php if(strpos($site,'contract/') || strpos($site,'promissory')){?>
			<li class="nav-item active">
		<?php }else{ ?>
			<li class="nav-item">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>contract/create-contract">
				<i class="material-icons">description</i>
				<p><?php echo $this->lang->line("contracts"); ?></p>
				</a>
			</li>

		<?php if(strpos($site,'payments/')){?>
			<li class="nav-item active">
		<?php }else{ ?>
			<li class="nav-item">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>payments/contract-details">
				<i class="material-icons">payment</i>
				<p><?php echo $this->lang->line("payments"); ?></p>
				</a>
			</li>

		<?php if(strpos($site, 'reports')){?>
		<li class="nav-item active">
		<?php }else{ ?>
		<li class="nav-item">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>reports">
				<i class="material-icons">equalizer</i>
				<p><?php echo $this->lang->line("reports"); ?></p>
				</a>
			</li>

		<?php if(strpos($site, 'membershiplans')){?>
			<li class="nav-item active">
		<?php }else{ ?>
			<li class="nav-item">
		<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>membershiplans">
				<i class="material-icons">star_rate</i>
				<p><?php echo $this->lang->line("membership_plans"); ?></p>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link collapsed" data-toggle="collapse" href="#pagesExamples" aria-expanded="false">
				<i class="material-icons">reorder</i>
				<p> <?php echo $this->lang->line("others"); ?>
					<b class="caret"></b>
				</p>
				</a>
		<?php if(strpos($site, 'kvkk') || strpos($site, 'privacy-policy') || strpos($site, 'terms-conditions')){ ?>
            	<div class="collapse show" id="pagesExamples" style="">
		<?php } else {?>
				<div class="collapse" id="pagesExamples" style="">
		<?php } ?>
        			<ul class="nav">
		<?php if(strpos($site, 'about-us')){?>
						<li class="nav-item active">
		<?php }else{ ?>
						<li class="nav-item ">
		<?php } ?>
							<a class="nav-link" href="<?php echo base_url();?>about-us">
								<i class="material-icons">info</i>
								<p><?php echo $this->lang->line("about_us"); ?></p>
							</a>
						</li>
		<?php if(strpos($site, 'privacy-policy')){?>
						<li class="nav-item active">
		<?php }else{ ?>
						<li class="nav-item ">
		<?php } ?>
							<a class="nav-link" href="<?php echo base_url();?>privacy-policy">
								<i class="material-icons">verified_user</i>
								<p><?php echo $this->lang->line("privacy_policy"); ?></p>
							</a>
						</li>
		<?php if(strpos($site, 'kvkk')){?>
						<li class="nav-item active">
		<?php }else{ ?>
						<li class="nav-item ">
		<?php } ?>
							<a class="nav-link" href="<?php echo base_url();?>kvkk">
								<i class="material-icons">visibility</i>
								<p><?php echo $this->lang->line("kvkk"); ?></p>
							</a>
						</li>
        <?php if(strpos($site, 'terms-conditions')){?>
						<li class="nav-item active">
		<?php }else{ ?>
						<li class="nav-item ">
		<?php } ?>
							<a class="nav-link" href="<?php echo base_url();?>terms-conditions">
								<i class="material-icons">assignment</i>
								<p><?php echo $this->lang->line("terms_and_conditions"); ?></p>
							</a>
						</li>
              		</ul>
				</div>
			</li>
		<?php } else { ?>
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url();?>membershiplans">
				<i class="material-icons">star_rate</i>
				<p><?php echo $this->lang->line("membership_plans"); ?></p>
				</a>
			</li>
		<?php } ?>
		<?php } ?>
		</ul>
	</div>
</div>
