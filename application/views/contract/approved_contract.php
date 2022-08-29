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

                            <?php $this->load->view('navigation/contract_navbar'); ?>

                            <div class="tab-content tab-space">
                                <div class="tab-pane active">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title mt-0"><?php echo $this->lang->line("approved_customer_table"); ?></h4>
                                            <p class="card-category"><?php echo $this->lang->line("below_is_the_list_of_all_approved_customer"); ?> </p>
                                        </div>
                                        <div class="card-body container-fluid">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-sm" id="approved_customers_table">
                                                    <thead class="text-primary">
                                                        <th><?php echo $this->lang->line("contract_no"); ?></th>
                                                        <th class="text-center"><?php echo $this->lang->line("customername"); ?></th>
                                                        <th class="text-right"><?php echo $this->lang->line("contract_amount"); ?></th>
                                                        <th class="text-center"><?php echo $this->lang->line("approved_by"); ?></th>
                                                        <th><?php echo $this->lang->line("approved_date"); ?></th>
                                                        <th><?php echo $this->lang->line("status"); ?></th>
                                                        <th><?php echo $this->lang->line("action"); ?></th>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($approved as $key => $appr) {
                                                            if (!empty($appr)) {
                                                        ?>
                                                                <tr>
                                                                    <td><a href="<?php echo base_url() . 'payments/contract-details/' . $appr['id']; ?>"><?php echo $appr['id']; ?></a></td>
                                                                    <td class="text-center">
                                                                        <a href="<?php echo base_url() . 'customers/profile/' . $appr['ids']; ?>" rel="tooltip" title="<?php echo $this->lang->line("go_to_profile"); ?>"><?php echo $appr['fullname']; ?></a>
                                                                    </td>
                                                                    <td class="text-right"><?php echo $appr['contract_amount']; ?></td>
                                                                    <td class="text-center"><?php echo $appr['approved']; ?></td>
                                                                    <td class="text-center"><?php echo changeDate($appr['date_approved']); ?></td>
                                                                    <td>
                                                                        <span class="font-italic text-muted ">
                                                                            <?php if ($appr['contract_status'] == 'Approved') { ?>

                                                                                <?php echo $appr['contract_status'] . $this->lang->line("waiting_for_cash_release"); ?>
                                                                            <?php } else { ?>
                                                                                <?php echo $this->lang->line('contract_is') . $this->lang->line($appr['contract_status']); ?>.
                                                                            <?php } ?>
                                                                        </span>
                                                                    </td>
                                                                    <td class="td-actions text-right">
                                                                        <?php if ($appr['contract_status'] == 'Approved') { ?>
                                                                            <button type="button" rel="tooltip" title="<?php echo $this->lang->line("release_cash_for_this_contract"); ?>" class="btn btn-primary btn-sm btn-link" data-target="#cash<?php echo $appr['id']; ?>" id="cash-release2<?php echo $appr['id']; ?>" data-toggle="modal">
                                                                                <i class="material-icons">monetization_on</i>
                                                                            </button>|
                                                                        <?php } else { ?>
                                                                            <button type="button" rel="tooltip" title="<?php echo $this->lang->line("go_to_payments"); ?>" class="btn btn-info btn-sm btn-link" onclick="location.href='<?php echo base_url() . 'payments/contract-details/' . $appr['id']; ?>'">
                                                                                <i class="material-icons">payment</i>
                                                                            </button>|
                                                                        <?php } ?>
                                                                        <button type="button" rel="tooltip" title="<?php echo $this->lang->line("view_evacuation"); ?>" class="btn btn-danger btn-sm btn-link" onclick="location.href='<?php echo base_url() . 'payments/evacuation/' . $appr['id']; ?>'">
                                                                            <i class="material-icons">assignment_late</i>
                                                                        </button>|
                                                                        <button type="button" rel="tooltip" title="<?php echo $this->lang->line("view_turkey"); ?>" class="btn btn-warning btn-sm btn-link" onclick="location.href='<?php echo base_url() . 'payments/turnkey/' . $appr['id']; ?>'">
                                                                            <i class="material-icons">vpn_key</i>
                                                                        </button>|
                                                                        <button type="button" rel="tooltip" title="<?php echo $this->lang->line("view_agreement"); ?>" class="btn btn-success btn-sm mr-2 btn-link" onclick="location.href='<?php echo base_url() . 'contract/promissory/' . $appr['id']; ?>'">
                                                                            <i class="material-icons">assignment</i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <!-- Modal  -->
                                                                <div class="modal fade" id="cash<?php echo $appr['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("cash_release"); ?></h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p><?php echo $this->lang->line("cash_has_been_released"); ?></p>

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line("cancel"); ?></button>
                                                                                <button type="button" class="btn btn-primary cash-release2" id="<?php echo $appr['id']; ?>"><?php echo $this->lang->line("yes"); ?></button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End of modal -->
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
