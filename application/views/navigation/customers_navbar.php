<ul class="nav nav-pills nav-pills-primary">
        <?php $site = $_SERVER['PATH_INFO'];?>

        <?php if($this->session->userdata('usertype') == 'Guest') {?>
            <li class="nav-item">
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('create_customer_profile');?>" href="<?php echo base_url();?>customers/create-customers"><i class="material-icons">add_box</i> <?=$this->lang->line('create_customers');?></a>
            </li>
        <?php }else{ ?>
            <?php if(strpos($site, 'customers/create-customers')){ ?>
                <li class="nav-item">
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('create_customer_profile');?>" href="<?php echo base_url();?>customers/create-customers"><i class="material-icons">add_box</i> <?=$this->lang->line('create_customers');?></a>
            <?php }else{ ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('create_customer_profile');?>" href="<?php echo base_url();?>customers/create-customers"><i class="material-icons">add_box</i> <?=$this->lang->line('create_customers');?></a>
            <?php } ?>
            </li>
            <li class="nav-item">
            <?php if(strpos($site, 'customers/new-customers')){ ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('list_of_all_new_customers');?>" href="<?php echo base_url();?>customers/new-customers"><i class="material-icons">group</i> <?=$this->lang->line('all_customers');?></a>
            <?php } else {?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('list_of_all_new_customers');?>" href="<?php echo base_url();?>customers/new-customers"><i class="material-icons">group</i> <?=$this->lang->line('all_customers');?></a>
            <?php } ?>
            </li>
            <li class="nav-item">
            <?php if(strpos($site, 'customers/active-customers')){ ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('active_customers_loan');?>" href="<?php echo base_url();?>customers/active-customers"><i class="material-icons">verified_user</i> <?=$this->lang->line('contracted_customers');?></a>
            <?php }else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('active_customers_loan');?>" href="<?php echo base_url();?>customers/active-customers"><i class="material-icons">verified_user</i> <?=$this->lang->line('contracted_customers');?></a>
            <?php } ?>
        </li>
    <?php } ?>
</ul>
