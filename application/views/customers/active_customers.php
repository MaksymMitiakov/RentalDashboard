    <body class="">

        <?php $this->load->view('loading_screen'); ?>

        <div class="wrapper ">

            <!-- Top NavBar -->
            <?php $this->load->view('navigation/sidebar'); ?>
            <!-- End of NavBar -->

            <div class="main-panel">

                <!-- Navbar -->
                <?php $this->load->view('navigation/topbar'); ?>
                <!-- End Navbar -->

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php $this->load->view('navigation/customers_navbar'); ?>

                                <div class="tab-content tab-space">
                                    <div class="tab-pane active">
                                        <div class="card">
                                            <div class="card-header card-header-primary">
                                                <h4 class="card-title mt-0"><?php echo $this->lang->line("active_customers_table"); ?></h4>
                                                <p class="card-category"> <?php echo $this->lang->line("below_is_the_list_of_all_active_customers"); ?></p>
                                            </div>
                                            <div class="card-body container-fluid">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-sm" id="rejected_customers_table">
                                                        <thead class="text-primary">
                                                            <th><?php echo $this->lang->line("account_no"); ?>.</th>
                                                            <th><?php echo $this->lang->line("name"); ?></th>
                                                            <th><?php echo $this->lang->line("contract_no"); ?></th>
                                                            <th><?php echo $this->lang->line("contract_amount"); ?></th>
                                                            <th><?php echo $this->lang->line("approved_by"); ?></th>
                                                            <th><?php echo $this->lang->line("status"); ?></th>
                                                            <th><?php echo $this->lang->line("action"); ?></th>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($active as $key => $actv) {
                                                                if (!empty($actv)) {
                                                            ?>
                                                                    <tr>
                                                                        <td><?php echo $actv['ids']; ?></td>
                                                                        <td>
                                                                            <a href="<?php echo base_url() . 'customers/profile/' . $actv['ids']; ?>" rel="tooltip" title="<?php echo $this->lang->line("go_to_profile"); ?>"><?php echo $actv['fullname']; ?></a>
                                                                        </td>
                                                                        <td><a href="<?php echo base_url() . 'payments/contract-details/' . $actv['contract_id']; ?>"><?php echo $actv['contract_id']; ?></td>
                                                                        <td><?php echo $actv['contract_amount']; ?></td>
                                                                        <td><?php echo $actv['approved']; ?></td>
                                                                        <td>
                                                                            <span class="font-italic text-muted "><?php echo $this->lang->line($actv['sta']); ?></span>
                                                                        </td>
                                                                        <?php if ( $actv['sta'] != "Waiting for approval") {?>
                                                                        <td class="td-actions text-right">
                                                                            <button type="button" rel="tooltip" title="<?php echo $this->lang->line("go_to_payments"); ?>" class="btn btn-info btn-sm btn-link" onclick="location.href='<?php echo base_url() . 'payments/contract-details/' . $actv['contract_id']; ?>'">
                                                                                <i class="material-icons">payment</i>
                                                                            </button>
                                                                        </td>
                                                                        <?php } else {?>
                                                                        <td></td>
                                                                        <?php }?>
                                                                    </tr>
                                                                <?php } else { ?>

                                                                    <tr>
                                                                        <td colspan="5"><?php echo $this->lang->line("no_data_available"); ?></td>
                                                                    </tr>
                                                            <?php }
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        