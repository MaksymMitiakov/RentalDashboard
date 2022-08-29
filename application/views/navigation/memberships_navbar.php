<ul class="nav nav-pills nav-pills-primary">
    <?php $site = $_SERVER['PATH_INFO']; ?>
    <?php if ($this->session->userdata('usertype') == 'Guest') { ?>
        <li class="nav-item">
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?php echo $this->lang->line("create_membership"); ?>" href="<?php echo base_url(); ?>memberships/create-memberships">
                <i class="material-icons">add_box</i> <?php echo $this->lang->line("create_membership"); ?>
            </a>
        </li>
    <?php } else { ?>
        <li class="nav-item">
            <?php if (strpos($site, 'memberships/create-packages-memberships')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?php echo $this->lang->line("create_membership_packages"); ?>" href="<?php echo base_url(); ?>memberships/create-packages-memberships">
                    <i class="material-icons">add_box</i> <?php echo $this->lang->line("create_membership_packages"); ?>
                </a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?php echo $this->lang->line("create_membership_packages"); ?>" href="<?php echo base_url(); ?>memberships/create-packages-memberships">
                    <i class="material-icons">add_box</i> <?php echo $this->lang->line("create_membership_packages"); ?>
                </a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if (strpos($site, 'memberships/all-memberships')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?php echo $this->lang->line("list_of_all_memberships"); ?>" href="<?php echo base_url(); ?>memberships/all-memberships">
                    <i class="material-icons">group</i> <?php echo $this->lang->line("memberships_packages"); ?>
                </a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?php echo $this->lang->line("list_of_all_memberships"); ?>" href="<?php echo base_url(); ?>memberships/all-memberships">
                    <i class="material-icons">group</i> <?php echo $this->lang->line("memberships_packages"); ?>
                </a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if (strpos($site, 'memberships/create-memberships')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?php echo $this->lang->line("create_membership"); ?>" href="<?php echo base_url(); ?>memberships/create-memberships">
                    <i class="material-icons">add_box</i> <?php echo $this->lang->line("create_membership"); ?>
                </a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?php echo $this->lang->line("create_membership"); ?>" href="<?php echo base_url(); ?>memberships/create-memberships">
                    <i class="material-icons">add_box</i> <?php echo $this->lang->line("create_membership"); ?>
                </a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if (strpos($site, 'memberships/passive-memberships')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?php echo $this->lang->line("list_of_passive_memberships"); ?>" href="<?php echo base_url(); ?>memberships/passive-memberships">
                    <i class="material-icons">group</i> <?php echo $this->lang->line("passive_memberships"); ?>
                </a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?php echo $this->lang->line("list_of_passive_memberships"); ?>" href="<?php echo base_url(); ?>memberships/passive-memberships">
                    <i class="material-icons">group</i> <?php echo $this->lang->line("passive_memberships"); ?>
                </a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if (strpos($site, 'memberships/active-memberships')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?php echo $this->lang->line("list_of_active_memberships"); ?>" href="<?php echo base_url(); ?>memberships/active-memberships">
                    <i class="material-icons">group</i> <?php echo $this->lang->line("active_memberships"); ?>
                </a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?php echo $this->lang->line("list_of_active_memberships"); ?>" href="<?php echo base_url(); ?>memberships/active-memberships">
                    <i class="material-icons">group</i> <?php echo $this->lang->line("active_memberships"); ?>
                </a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if (strpos($site, 'memberships/expired-memberships')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?php echo $this->lang->line("list_of_expired_memberships"); ?>" href="<?php echo base_url(); ?>memberships/expired-memberships">
                    <i class="material-icons">group</i> <?php echo $this->lang->line("expired_memberships"); ?>
                </a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?php echo $this->lang->line("list_of_expired_memberships"); ?>" href="<?php echo base_url(); ?>memberships/expired-memberships">
                    <i class="material-icons">group</i> <?php echo $this->lang->line("expired_memberships"); ?>
                </a>
            <?php } ?>
        </li>

        <li class="nav-item">
            <?php if (strpos($site, 'memberships/transactions')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?php echo $this->lang->line("list_of_transaction"); ?>" href="<?php echo base_url(); ?>memberships/transactions">
                    <i class="material-icons">group</i> <?php echo $this->lang->line("transactions"); ?>
                </a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?php echo $this->lang->line("list_of_transaction"); ?>" href="<?php echo base_url(); ?>memberships/transactions">
                    <i class="material-icons">group</i> <?php echo $this->lang->line("transactions"); ?>
                </a>
            <?php } ?>
        </li>
        <!-- <li class="nav-item">
        <?php if (strpos($site, 'buildings/update-buildings')) { ?>
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="Update Building Information" href="<?php echo base_url(); ?>buildings/update-buildings/100000">
                <i class="material-icons">group</i> Update Buildings
            </a>
        <?php } else { ?>
            <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="Update Building Information" href="<?php echo base_url(); ?>buildings/update-buildings/100000">
                <i class="material-icons">group</i> Update Buildings
            </a>
        <?php } ?>
        </li> -->
    <?php } ?>
</ul>