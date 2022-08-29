<ul class="nav nav-pills nav-pills-primary" role="tablist">
    <?php $site = $_SERVER['PATH_INFO']; ?>
    <?php if ($this->session->userdata('usertype') == 'Guest') { ?>
        <li class="nav-item">
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('create_contract_here')?>" href="<?php echo base_url(); ?>contract/create-contract"><i class="material-icons">add_box</i> <?=$this->lang->line('')?>Create New Contract</a>
        </li>
    <?php } else { ?>
        <li class="nav-item">
            <?php if (strpos($site, 'contract/create-contract')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('create_contract_here')?>" href="<?php echo base_url(); ?>contract/create-contract"><i class="material-icons">add_box</i> <?=$this->lang->line('create_new_contract')?></a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('create_contract_here')?>" href="<?php echo base_url(); ?>contract/create-contract"><i class="material-icons">add_box</i> <?=$this->lang->line('create_new_contract')?></a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if (strpos($site, 'contract/new-contracts')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('list_of_new_contracts')?>" href="<?php echo base_url(); ?>contract/new-contracts"><i class="material-icons">monetization_on</i> <?=$this->lang->line('new_contracts')?></a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('list_of_new_contracts')?>" href="<?php echo base_url(); ?>contract/new-contracts"><i class="material-icons">monetization_on</i> <?=$this->lang->line('new_contracts')?></a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if (strpos($site, 'contract/rejected-contracts')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('list_of_rejected_contracts')?>" href="<?php echo base_url(); ?>contract/rejected-contracts"><i class="material-icons">warning</i> <?=$this->lang->line('rejected_contracts')?></a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('list_of_rejected_contracts')?>" href="<?php echo base_url(); ?>contract/rejected-contracts"><i class="material-icons">warning</i> <?=$this->lang->line('rejected_contracts')?></a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if (strpos($site, 'contract/approved-contracts')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('list_of_approved_contracts')?>" href="<?php echo base_url(); ?>contract/approved-contracts"><i class="material-icons">verified_user</i> <?=$this->lang->line('approved_contracts')?></a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('list_of_approved_contracts')?>" href="<?php echo base_url(); ?>contract/approved-contracts"><i class="material-icons">verified_user</i> <?=$this->lang->line('approved_contracts')?></a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if (strpos($site, 'contract/paid-contracts')) { ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('list_of_paid_contracts')?>" href="<?php echo base_url(); ?>contract/paid-contracts"><i class="material-icons">check</i> <?=$this->lang->line('paid_contracts')?></a>
            <?php } else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="<?=$this->lang->line('list_of_paid_contracts')?>" href="<?php echo base_url(); ?>contract/paid-contracts"><i class="material-icons">check</i> <?=$this->lang->line('paid_contracts')?></a>
            <?php } ?>
        </li>
    <?php } ?>
</ul>