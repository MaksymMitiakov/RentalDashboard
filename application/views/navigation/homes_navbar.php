<ul class="nav nav-pills nav-pills-primary">
    <?php $site = $_SERVER['PATH_INFO']; ?>

    <?php if ($this->session->userdata('usertype') == 'Guest') { ?>
        <li class="nav-item">
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('create_home');?>" href="<?php echo base_url(); ?>homes/create-homes"><i class="material-icons">add_box</i> <?=$this->lang->line('create_home');?></a>
        </li>
    <?php } else { ?>
        <li class="nav-item">
            <?php if (strpos($site, 'homes/create-homes')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('create_home');?>" href="<?php echo base_url(); ?>homes/create-homes"><i class="material-icons">add_box</i> <?=$this->lang->line('create_home');?></a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('create_home');?>" href="<?php echo base_url(); ?>homes/create-homes"><i class="material-icons">add_box</i> <?=$this->lang->line('create_home');?></a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if (strpos($site, 'homes/new-homes')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('list_of_all_empty_homes');?>" href="<?php echo base_url(); ?>homes/new-homes"><i class="material-icons">home</i> <?=$this->lang->line('empty_homes');?></a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('list_of_all_empty_homes');?>" href="<?php echo base_url(); ?>homes/new-homes"><i class="material-icons">home</i><?=$this->lang->line('empty_homes');?></a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if (strpos($site, 'homes/active-homes')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('active_homes');?>" href="<?php echo base_url(); ?>homes/active-homes"><i class="material-icons">verified_user</i> <?=$this->lang->line('active_homes');?></a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('active_homes');?>" href="<?php echo base_url(); ?>homes/active-homes"><i class="material-icons">verified_user</i> <?=$this->lang->line('active_homes');?></a>
            <?php } ?>
        </li>
        <!-- <li class="nav-item">
        <?php if (strpos($site, 'homes/homes-info')) { ?>
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('edit_homes');?>" href="<?php echo base_url(); ?>homes/homes-info/10000"><i class="material-icons">verified_user</i> <?=$this->lang->line('edit_homes');?></a>
        <?php } else { ?>
            <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('edit_homes');?>" href="<?php echo base_url(); ?>homes/homes-info/10000"><i class="material-icons">verified_user</i> <?=$this->lang->line('edit_homes');?></a>
        <?php } ?>
        </li> -->
    <?php } ?>
</ul>