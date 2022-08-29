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
                                            <h4 class="card-title mt-0"><?php echo $this->lang->line("rejected_contracts_table"); ?></h4>
                                            <p class="card-category"><?php echo $this->lang->line("below_is_the_list_of_all_rejected_contracts"); ?> </p>
                                        </div>
                                        <div class="card-body container-fluid">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-sm" id="rejected_customers_table">
                                                    <thead class="text-primary">
                                                        <th><?php echo $this->lang->line("contract_no"); ?>.</th>
                                                        <th><?php echo $this->lang->line("customername"); ?></th>
                                                        <th><?php echo $this->lang->line("reason"); ?></th>
                                                        <th><?php echo $this->lang->line("rejected_by"); ?></th>
                                                        <th><?php echo $this->lang->line("status"); ?></th>
                                                        <th><?php echo $this->lang->line("action"); ?></th>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($rejected as $key => $reject) {
                                                            if (!empty($reject)) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $reject['id']; ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url() . 'customers/profile/' . $reject['ids']; ?>" rel="tooltip" title="<?php echo $this->lang->line("go_to_profile"); ?>"><?php echo $reject['fullname']; ?></a>
                                                                    </td>

                                                                    <td>
                                                                        <span class="font-italic text-muted ">
                                                                            <?php if ($reject['reason'] == 'No reason given') { ?>

                                                                                <?php echo $this->lang->line("No reason given"); ?>
                                                                            <?php } else { ?>
                                                                                  <?php echo $reject['reason']; ?>
                                                                            <?php } ?>
                                                                        </span>
                                                                    </td>
                                                                    <td><?php echo $reject['approved']; ?></td>
                                                                    <td>
                                                                        <span class="font-italic text-muted "><?php echo $this->lang->line($reject['sta']); ?></span>
                                                                    </td>
                                                                    <td class="td-actions text-right">
                                                                        <button type="button" rel="tooltip" title="<?php echo $this->lang->line("view_contract_information"); ?>" class="btn btn-info btn-sm btn-link" data-target="#customers-<?php echo $reject['ids']; ?>" data-toggle="modal">
                                                                            <i class="material-icons">visibility</i>
                                                                        </button>|
                                                                        <button type="button" rel="tooltip" title="<?php echo $this->lang->line("re_apply_contract"); ?>" class="btn btn-primary btn-sm btn-link" data-target="#reapply_contract<?php echo $reject['id']; ?>" id="reapply-contract<?php echo $reject['id']; ?>" data-toggle="modal">
                                                                            <i class="material-icons">monetization_on</i>
                                                                        </button>|
                                                                        <button type="button" rel="tooltip" title="<?php echo $this->lang->line("remove_contract"); ?>" class="btn btn-danger btn-sm btn-link" data-target="#remove_contract<?php echo $reject['id']; ?>" id="remove-rejected-contract<?php echo $reject['id']; ?>" data-toggle="modal">
                                                                            <i class="material-icons">remove_circle</i>
                                                                        </button>
                                                                    </td>
                                                                </tr>

                                                                <!-- Modal to view client data -->
                                                                <div class="modal fade" id="customers-<?php echo $reject['ids']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("contract_information"); ?></h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="row">

                                                                                    <div class="col-md-8">
                                                                                        <p><strong><?php echo $this->lang->line("customername"); ?>:</strong>
                                                                                            <?php echo $reject['fullname']; ?>
                                                                                        </p>
                                                                                        <p><strong><?php echo $this->lang->line("gender"); ?>:</strong>
                                                                                            <?php echo $reject['gender']; ?>
                                                                                        </p>
                                                                                        <p><strong><?php echo $this->lang->line("address"); ?>:</strong>
                                                                                            <?php echo $reject['address']; ?>
                                                                                        </p>
                                                                                        <p><strong><?php echo $this->lang->line("contract_amount"); ?>:</strong>
                                                                                            <?php echo $reject['contract_amount']; ?>
                                                                                        </p>


                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="button" onclick="location.href='<?php echo base_url() . 'customers/profile/' . $reject['ids']; ?>'" class="btn btn-primary"><?php echo $this->lang->line("go_to_profile"); ?></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End of modal -->
                                                                <!-- Modal for reject clients -->
                                                                <div class="modal fade" id="reapply_contract<?php echo $reject['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("reapply_customer_contract"); ?></h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p><?php echo $this->lang->line("are_you_sure_want_to_reapply_this_contract"); ?></p>

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line("cancel"); ?></button>
                                                                                <button type="button" class="btn btn-primary re-applyContract" id="<?php echo $reject['id']; ?>"><?php echo $this->lang->line("re_apply"); ?></button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End of modal -->
                                                                <!-- Modal for remove clients -->
                                                                <div class="modal fade" id="remove_contract<?php echo $reject['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("removing_customer_contract"); ?></h5>
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
                                                                                <button type="button" class="btn btn-danger remove-rejected-contract" id="<?php echo $reject['id']; ?>"><?php echo $this->lang->line("remove"); ?></button>
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
