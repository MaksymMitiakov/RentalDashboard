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
                                            <h4 class="card-title mt-0"><?php echo $this->lang->line("contract_application_table"); ?></h4>
                                            <p class="card-category"> <?php echo $this->lang->line("below_is_the_list_of_all_new_contract_applications"); ?></p>
                                        </div>
                                        <div class="card-body container-fluid">
                                            <div class="table-responsive ">
                                                <table class="display nowrap table table-hover" id="contract_customers_table">
                                                    <thead class="text-primary">
                                                        <th><?php echo $this->lang->line("contract_no"); ?>.</th>
                                                        <th><?php echo $this->lang->line("name"); ?></th>
                                                        <th><?php echo $this->lang->line("contract_amount"); ?></th>
                                                        <th><?php echo $this->lang->line("date_contract"); ?></th>
                                                        <th><?php echo $this->lang->line("verified_by"); ?></th>
                                                        <th><?php echo $this->lang->line("status"); ?></th>
                                                        <th><?php echo $this->lang->line("action"); ?></th>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($verify as $key => $verified) {
                                                            if (!empty($verified)) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $verified['id']; ?></td>
                                                                    <td class="text-center">
                                                                        <a href="<?php echo base_url() . 'customers/profile/' . $verified['customer_id']; ?>" rel="tooltip" title="<?php echo $this->lang->line("go_to_profile"); ?>"><?php echo $verified['fullname']; ?></a>
                                                                    </td>
                                                                    <td class="text-center" id="amount<?php echo $verified['id']; ?>"><?php echo $verified['contract_amount']; ?></td>
                                                                    <td class="text-center"><?php echo changeDate($verified['date_contract']); ?></td>
                                                                    <td class="text-center"><?php echo $verified['verified']; ?></td>

                                                                    <td>
                                                                        <span class="font-italic text-muted "><?php echo $this->lang->line($verified['status']); ?></span>
                                                                    </td>
                                                                    <td class="td-actions text-right">

                                                                        <?php if ($this->session->userdata('usertype') == 'Vendor' || ($this->session->userdata('usertype') == 'Admin')) { ?>

                                                                            <button type="button" rel="tooltip" title="<?php echo $this->lang->line("approve_this_contract"); ?>" class="btn btn-success btn-link btn-sm approvecontract approvecontract<?php echo $verified['id']; ?>" id="<?php echo $verified['id']; ?>">
                                                                                <i class="material-icons">verified_user</i>
                                                                            </button>|
                                                                            <button type="button" rel="tooltip" title="<?php echo $this->lang->line("reject_this_contract"); ?>" class="btn btn-warning btn-sm btn-link" data-target="#reject_customer<?php echo $verified['id']; ?>" id="reject-button<?php echo $verified['id']; ?>" data-toggle="modal">
                                                                                <i class="material-icons">warning</i>
                                                                            </button>|

                                                                        <?php } ?>

                                                                        <button type="button" rel="tooltip" title="<?php echo $this->lang->line("remove_this_contract"); ?>" class="btn btn-danger btn-sm btn-link" data-target="#remove_contract<?php echo $verified['id']; ?>" id="remove-contract<?php echo $verified['id']; ?>" data-toggle="modal">
                                                                            <i class="material-icons">remove_circle</i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <!-- Modal for reject clients -->
                                                                <div class="modal fade" id="reject_customer<?php echo $verified['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("rejecting_customers_contract"); ?></h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p><?php echo $this->lang->line("are_you_sure_you_want_to_reject_this_contract"); ?></p>
                                                                                <p><?php echo $this->lang->line("please_provide_any_reason"); ?>:</p>
                                                                                <form method="POST">
                                                                                    <textarea class="form-control reason" placeholder="<?php echo $this->lang->line("write_something_here"); ?>"></textarea>

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line("cancel"); ?></button>
                                                                                <button type="button" class="btn btn-warning rejectContract" id="<?php echo $verified['id']; ?>"><?php echo $this->lang->line("reject"); ?></button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End of modal -->
                                                                <!-- Modal for remove clients -->
                                                                <div class="modal fade" id="remove_contract<?php echo $verified['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("removing_customers_contract"); ?></h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p><?php echo $this->lang->line("are_you_sure_want_to_remove_this_contract"); ?></p>
                                                                                <small class="text-danger font-italic"><?php echo $this->lang->line("note_this_process_cannot_be_undoned"); ?></small>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line("cancel"); ?></button>
                                                                                <button type="button" class="btn btn-danger removeContract" id="<?php echo $verified['id']; ?>"><?php echo $this->lang->line("remove"); ?></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End of modal -->

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
