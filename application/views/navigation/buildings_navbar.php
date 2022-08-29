<ul class="nav nav-pills nav-pills-primary">
    <?php $site = $_SERVER['PATH_INFO']; ?>
    <?php if ($this->session->userdata('usertype') == 'Guest') { ?>
        <li class="nav-item">
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('create_buildings');?>" href="<?php echo base_url(); ?>buildings/create-buildings">
                <i class="material-icons">add_box</i> <?=$this->lang->line('create_buildings');?>
            </a>
        </li>
    <?php } else { ?>
        <li class="nav-item">
            <?php if (strpos($site, 'buildings/create-buildings')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('create_buildings');?>" href="<?php echo base_url(); ?>buildings/create-buildings">
                    <i class="material-icons">add_box</i> <?=$this->lang->line('create_buildings');?>
                </a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('create_buildings');?>" href="<?php echo base_url(); ?>buildings/create-buildings">
                    <i class="material-icons">add_box</i> <?=$this->lang->line('create_buildings');?>
                </a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if (strpos($site, 'buildings/new-buildings')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('list_of_all_buildings');?>" href="<?php echo base_url(); ?>buildings/new-buildings">
                    <i class="material-icons">business</i> <?=$this->lang->line('building_list');?>
                </a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('list_of_all_buildings');?>" href="<?php echo base_url(); ?>buildings/new-buildings">
                    <i class="material-icons">business</i><?=$this->lang->line('building_list');?>
                </a>
            <?php } ?>
        </li>
        <!-- <li class="nav-item">
        <?php if (strpos($site, 'buildings/update-buildings')) { ?>
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('update_building_information');?>" href="<?php echo base_url(); ?>buildings/update-buildings/100000">
                <i class="material-icons">group</i> <?=$this->lang->line('update_buildings');?>
            </a>
        <?php } else { ?>
            <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('update_building_information');?>" href="<?php echo base_url(); ?>buildings/update-buildings/100000">
                <i class="material-icons">group</i> <?=$this->lang->line('update_buildings');?>
            </a>
        <?php } ?>
        </li> -->
    <?php } ?>
</ul>